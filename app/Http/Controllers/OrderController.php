<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::join('tai_khoan', 'don_hang.id_khach_hang', '=', 'tai_khoan.id')
            ->join('hoa_don', 'tai_khoan.id', '=', 'hoa_don.id_khach_hang')
            ->select('don_hang.*', 'tai_khoan.ho_ten as ten_khach_hang', 'hoa_don.trang_thai as trang_thai_dh', 'hoa_don.loai_thanh_toan as pttt')
            ->get();
        return view("admin.order.list", compact("orders"));
    }
}
