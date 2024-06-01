<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function vnpay_payment()
    {
        $data = session('pay_data');
        // dd($data);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/thanks";
        $vnp_TmnCode = "31FL1YRP";//Mã website tại VNPAY 
        $vnp_HashSecret = "MX55T4WGVEVO6TNB2GZ9LANFBNT9U454"; //Chuỗi bí mật
        $current_time = date('YmdHis');

        $vnp_TxnRef = $current_time;
        $vnp_OrderInfo = 'Thanh toán hóa đơn';
        $vnp_OrderType = 'RegFood';
        $vnp_Amount = $data['total'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }

    public function checkout(Request $request)
    {
        if ($request->session()->has('customer') || $request->session()->has('admin')) {
            $id = null;

            if ($request->session()->has('customer')) {
                $id = session()->get('customer')->id;
            } elseif ($request->session()->has('admin')) {
                $id = session()->get('admin')->id;
            }

            $data = $request->all();
            $quantity = Cart::where('id_khach_hang', $id)->sum('so_luong');
            return view('client.pages.checkout', compact('data', 'quantity'));
        }
        return redirect()->route("client.login.add");
    }

    public function checkout_confirm(Request $request)
    {
        // $id_dishs = $request->input('id_dish_check_out');
        // dd($id_dishs);

        $data = $request->all();
        // dd($data);die;
        $data['address'] = $data['pay_ward'] . ', ' . $data['pay_district'] . ', ' . $data['pay_city'];
        $id_dishs = $request->input('id_dish_check_out');
        $bill_detail_dishes = [];

        if ($request->session()->has('customer') || $request->session()->has('admin')) {
            $id = null;
            $welcome = "Thông tin đơn hàng !";
            $user_name = session('customer')->ho_ten;
            $user_email = session('customer')->email;

            if ($request->session()->has('customer')) {
                $id = session()->get('customer')->id;
            } elseif ($request->session()->has('admin')) {
                $id = session()->get('admin')->id;
            }

            $request->validate(
                [
                    'pay_username' => 'required',
                    'pay_city' => 'required',
                    'pay_district' => 'required',
                    'pay_ward' => 'required',
                    'pay_email' => 'required|email',
                    'pay_phone' => 'required|numeric|min:10',
                    'pay_type' => 'required'
                ],
                [
                    'pay_username.required' => 'Tên người nhận là bắt buộc.',
                    'pay_city.required' => 'Địa chỉ là bắt buộc.',
                    'pay_district.required' => 'Địa chỉ là bắt buộc.',
                    'pay_ward.required' => 'Địa chỉ là bắt buộc.',
                    'pay_email.required' => 'Email là bắt buộc.',
                    'pay_email.email' => 'Email không hợp lệ.',
                    'pay_phone.required' => 'Số điện thoại là bắt buộc.',
                    'pay_phone.numeric' => 'Số điện thoại phải là một số.',
                    'pay_phone.min' => 'Số điện thoại không hợp lệ.',
                    'pay_type.required' => 'Phương thức thanh toán chưa được chọn.'
                ]
            );

            if ($data["pay_type"] == 1) {
                $is_order = Order::create(
                    [
                        "ten_nguoi_nhan" => $data["pay_username"],
                        "dia_chi_nhan" => $data["address"],
                        "email_nhan" => $data["pay_email"],
                        "sdt_nguoi_nhan" => $data["pay_phone"],
                        "id_khach_hang" => $id,
                        "ghi_chu" => $data["pay_note"]
                    ]
                );

                $ma_don_hang = $is_order->id . date('YmdHis');
                $is_bill = Bill::create(
                    [
                        "id_khach_hang" => $id,
                        "ma_don_hang" => $ma_don_hang,
                        "trang_thai" => 0,
                        "loai_thanh_toan" => $data["pay_type"]
                    ]
                );

                // chuyen tat ca id mon an thanh 1 chuoi, them vao cot id_mon_an cach nhau boi dau ,

                if (is_array($id_dishs)) {
                    $unique_id_dishs = array_unique($id_dishs);
                    $id_dish_string = implode(',', $unique_id_dishs);
                } else {
                    $id_dish_string = $id_dishs;
                }

                $bill_detail = [
                    "ma_don_hang" => $ma_don_hang,
                    "id_khach_hang" => $id,
                    "id_mon_an" => $id_dish_string,
                    "so_luong_mua" => $data['quantity'],
                    "tong_tien" => $data['total']
                ];

                $is_bill_detail = BillDetail::create($bill_detail);

                if ($is_order && $is_bill && $is_bill_detail != null) {
                    Cart::where('id_khach_hang', $id)->delete();

                    $order = Order::where('id_khach_hang', $id)->orderBy('id', 'desc')->first();
                    $bill = Bill::where('id_khach_hang', $id)->orderBy('id', 'desc')->first();
                    $bill_detail = BillDetail::where('id_khach_hang', $id)->orderBy('id', 'desc')->first();

                    if (is_array($id_dishs)) {
                        $bill_detail_dishes = [];
                        foreach ($id_dishs as $id_dish) {
                            $dish = Dish::where('id', $id_dish)->first();
                            if ($dish && !in_array($dish, $bill_detail_dishes)) {
                                $bill_detail_dishes[] = $dish;
                            }
                        }
                    } else {
                        $bill_detail_dishes = Dish::where('id', $id_dishs)->first();
                    }

                    $ngay_mua = Carbon::createFromFormat('Y-m-d H:i:s', $bill->ngay_mua)->format('d/m/Y H:i:s');
                    Mail::send("emails.thanksyou", compact("user_name", "order", "bill", "ngay_mua", "bill_detail", "bill_detail_dishes"), function ($email) use ($user_name, $user_email, $welcome, $bill_detail_dishes) {
                        $email->to($user_email, $user_name)->subject($welcome);
                    });
                    return view('client.pages.thanksyou')->with('pay_success', '😍 Đơn hàng của bạn sẽ được giao sau ít phút');
                }
            }
            if ($data["pay_type"] == 2) {
                // dd($data);
                if (is_array($id_dishs)) {
                    $unique_id_dishs = array_unique($id_dishs);
                    $data['id_dish_string'] = implode(',', $unique_id_dishs);
                } else {
                    $data['id_dish_string'] = $id_dishs;
                }
                session()->put("pay_data", $data);

                // dd(session('pay_data'));

                return redirect()->route('client.payment');
            }
        }
        return redirect()->route("client.login.add");
    }

    public function thanks(Request $request)
    {
        // dd(session('customer'));
        // dd(session('pay_data'));
        // die;
        $pay_data = session('pay_data');

        $data = $request->all();
        $welcome = "Thông tin đơn hàng !";
        $user_name = session('customer')->ho_ten;
        $user_email = session('customer')->email;

        if ($request->session()->has('customer') || $request->session()->has('admin')) {
            $id = null;

            if ($request->session()->has('customer')) {
                $id = session()->get('customer')->id;
            } elseif ($request->session()->has('admin')) {
                $id = session()->get('admin')->id;
            }
        }

        $is_order = Order::create(
            [
                "ten_nguoi_nhan" => $pay_data['pay_username'],
                "dia_chi_nhan" => $pay_data['address'],
                "email_nhan" => $pay_data['pay_email'],
                "sdt_nguoi_nhan" => $pay_data['pay_phone'],
                "id_khach_hang" => $id,
                "ghi_chu" => $pay_data['pay_note'],
            ]
        );

        $ma_don_hang = $is_order->id . date('YmdHis');
        $is_bill = Bill::create(
            [
                "id_khach_hang" => $id,
                "ma_don_hang" => $ma_don_hang,
                "trang_thai" => 1,
                "loai_thanh_toan" => $pay_data['pay_type'],
            ]
        );

        $bill_detail = [
            "ma_don_hang" => $ma_don_hang,
            "id_khach_hang" => $id,
            "id_mon_an" => $pay_data["id_dish_string"],
            "so_luong_mua" => $pay_data['quantity'],
            "tong_tien" => $pay_data['total']
        ];

        $is_bill_detail = BillDetail::create($bill_detail);

        if ($is_order && $is_bill && $is_bill_detail != null) {
            Cart::where('id_khach_hang', $id)->delete();
            session()->forget('pay_data');

            $order = Order::where('id_khach_hang', $id)->orderBy('id', 'desc')->first();
            $bill = Bill::where('id_khach_hang', $id)->orderBy('id', 'desc')->first();
            $bill_detail = BillDetail::where('id_khach_hang', $id)->orderBy('id', 'desc')->first();

            if (is_array($pay_data['id_dish_check_out'])) {
                $bill_detail_dishes = [];
                foreach ($pay_data['id_dish_check_out'] as $id_dish) {
                    $dish = Dish::where('id', $id_dish)->first();
                    if ($dish && !in_array($dish, $bill_detail_dishes)) {
                        $bill_detail_dishes[] = $dish;
                    }
                }
            } else {
                $bill_detail_dishes = Dish::where('id', $pay_data['id_dish_string'])->first();
            }

            $ngay_mua = Carbon::createFromFormat('Y-m-d H:i:s', $bill->ngay_mua)->format('d/m/Y H:i:s');
            Mail::send("emails.thanksyou", compact("user_name", "order", "bill", "ngay_mua", "bill_detail", "bill_detail_dishes"), function ($email) use ($user_name, $user_email, $welcome, $bill_detail_dishes) {
                $email->to($user_email, $user_name)->subject($welcome);
            });
            return view('client.pages.thanksyou')->with('pay_success', '😍 Đơn hàng của bạn sẽ được giao sau ít phút');
        }
    }
}
