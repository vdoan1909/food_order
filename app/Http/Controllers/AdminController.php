<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        $count_account = Account::count('id');
        $count_dish = Dish::count('id');
        $count_order = Order::count('id');
        $count_bill = Bill::where('trang_thai', 1)->count('id');

        $bill_info = BillDetail::join('hoa_don', 'hoadon_chitiet.ma_don_hang', '=', 'hoa_don.ma_don_hang')
            ->join('tai_khoan', 'hoa_don.id_khach_hang', '=', 'tai_khoan.id')
            ->select('hoadon_chitiet.*', 'tai_khoan.ho_ten as ho_ten', 'hoa_don.trang_thai as trang_thai')
            ->orderByDesc('hoadon_chitiet.id')
            ->take(4)
            ->get();

        $new_customer = Account::where('vai_tro', 0)->orderByDesc('id')->take(4)->get();

        $data_doanhthu = DB::table('hoadon_chitiet')
            ->join('hoa_don', 'hoa_don.ma_don_hang', '=', 'hoadon_chitiet.ma_don_hang')
            ->select(DB::raw('MONTH(hoa_don.ngay_mua) as month'), DB::raw('SUM(hoadon_chitiet.tong_tien) as total'))
            ->groupBy('month')
            ->get();

        return view('admin.home', [
            'count_account' => $count_account,
            'count_dish' => $count_dish,
            'count_order' => $count_order,
            'count_bill' => $count_bill,
            "bill_info" => $bill_info,
            'new_customer' => $new_customer,
            'data_doanhthu' => $data_doanhthu
        ]);
    }
}
