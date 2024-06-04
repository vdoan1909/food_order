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
            ->select('don_hang.*', 'tai_khoan.ho_ten as ten_khach_hang')
            ->get();
        return view("admin.order.list", compact("orders"));
    }
}
