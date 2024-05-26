<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function vnpay_payment(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/client/checkout";
        $vnp_TmnCode = "31FL1YRP";//Mã website tại VNPAY 
        $vnp_HashSecret = "MX55T4WGVEVO6TNB2GZ9LANFBNT9U454"; //Chuỗi bí mật
        $current_time = date('YmdHis');

        $vnp_TxnRef = $current_time;
        $vnp_OrderInfo = 'Thanh toán hóa đơn';
        $vnp_OrderType = 'RegFood';
        $vnp_Amount = $request->total * 100;
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
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00'
            ,
            'message' => 'success'
            ,
            'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
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
        $data = $request->all();
        $data['address'] = $data['pay_city'] . ', ' . $data['pay_district'] . ', ' . $data['pay_ward'];

        if ($request->session()->has('customer') || $request->session()->has('admin')) {
            $id = null;

            if ($request->session()->has('customer')) {
                $id = session()->get('customer')->id;
            } elseif ($request->session()->has('admin')) {
                $id = session()->get('admin')->id;
            }

            if ($data["pay_type"] == 1) {
                $is_order = Order::insert(
                    [
                        "ten_nguoi_nhan" => $data["pay_username"],
                        "dia_chi_nhan" => $data["address"],
                        "email_nhan" => $data["pay_email"],
                        "sdt_nguoi_nhan" => $data["pay_phone"],
                        "id_khach_hang" => $id,
                        "ghi_chu" => $data["pay_note"]
                    ]
                );

                if($is_order){
                    return redirect()->route('client.home')->with('pay_success', '😍 Đơn hàng của bạn sẽ được giao sau ít phút');
                }
            }
        }
        return redirect()->route("client.login.add");
    }
}
