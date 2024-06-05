<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BillDetail;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Account;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        $id_dish_bill_detail = [];

        $count_account = Account::count('id');
        $count_dish = Dish::count('id');

        $list_ctg = Category::all();
        $list_bill_detail = BillDetail::all();

        foreach ($list_bill_detail as $bill) {
            $ids = explode(",", $bill->id_mon_an);
            foreach ($ids as $id) {
                $id_dish_bill_detail[] = $id;
            }
        }

        // đếm số lần xuất hiện của id món ăn
        $count = array_count_values($id_dish_bill_detail);
        // sắp xếp lại số lần xhiện từ cao --> thấp
        arsort($count);

        // 5 món ăn xhiện nh nhất
        $top5_id_dish = array_slice($count, 0, 5, true);
        $top5_id_dish_keys = array_keys($top5_id_dish);

        $top5_dish = Dish::whereIn('id', $top5_id_dish_keys)->get();

        $orders = Order::join('tai_khoan', 'don_hang.id_khach_hang', '=', 'tai_khoan.id')
            ->join('hoa_don', 'tai_khoan.id', '=', 'hoa_don.id_khach_hang')
            ->join('hoadon_chitiet', 'hoadon_chitiet.ma_don_hang', '=', 'hoa_don.ma_don_hang')
            ->select(
                'don_hang.*',
                'tai_khoan.ho_ten as ten_khach_hang',
                'hoa_don.trang_thai as trang_thai_dh',
                'hoa_don.loai_thanh_toan as pttt',
                'hoa_don.ma_don_hang as ma_don_hang',
                'hoadon_chitiet.tong_tien as tong_tien'
            )
            ->get();

        $data_doanhthu = DB::table('hoadon_chitiet')
            ->join('hoa_don', 'hoa_don.ma_don_hang', '=', 'hoadon_chitiet.ma_don_hang')
            ->select(DB::raw('MONTH(hoa_don.ngay_mua) as month'), DB::raw('SUM(hoadon_chitiet.tong_tien) as total'))
            ->groupBy('month')
            ->get();

        return view(
            "admin.sales.list",
            compact(
                'top5_dish',
                'list_ctg',
                'count_account',
                'count_dish',
                'orders',
                'data_doanhthu'
            )
        );
    }
}
