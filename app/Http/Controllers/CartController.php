<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('customer') || $request->session()->has('admin')) {
            $user_id = null;

            if ($request->session()->has('customer')) {
                $user_id = session()->get('customer')->id;
            } elseif ($request->session()->has('admin')) {
                $user_id = session()->get('admin')->id;
            }

            $carts = DB::table('gio_hang')->where('gio_hang.id_khach_hang', $user_id)
                ->join('mon_an', 'gio_hang.id_mon_an', '=', 'mon_an.id')
                ->select(
                    'gio_hang.id as id',
                    'gio_hang.so_luong as so_luong',
                    'mon_an.id as id_mon_an',
                    'mon_an.anh_mon_an',
                    'mon_an.ten_mon_an',
                    'mon_an.gia_mon_an',
                    'mon_an.mo_ta',
                    'mon_an.id_the_loai',
                    DB::raw('gio_hang.so_luong * mon_an.gia_mon_an as tong_tien')
                )
                ->get();

            $tong_so_luong = DB::table('gio_hang')->where('gio_hang.id_khach_hang', $user_id)
                ->sum('gio_hang.so_luong');

            return view("client.pages.cart", compact("carts", "tong_so_luong"));
        } else {
            return redirect()->route("client.login.add");
        }
    }

    public function store(Request $request)
    {
        if ($request->session()->has('customer') || $request->session()->has('admin')) {
            $user_id = null;

            if ($request->session()->has('customer')) {
                $user_id = session()->get('customer')->id;
            } elseif ($request->session()->has('admin')) {
                $user_id = session()->get('admin')->id;
            }

            $dish_id = $request->input('dish_id');
            $quantity = $request->input('quantity');

            $cart = Cart::where('id_mon_an', $dish_id)
                ->where('id_khach_hang', $user_id)
                ->first();

            if ($cart) {
                $cart->so_luong += $quantity;
                $cart->save();
                $request->session()->put('cart', Cart::where('id_khach_hang', $user_id)->get());
                return response()->json(['success' => '😍 Số lượng món ăn đã tăng thêm !']);
            } else {
                Cart::insert(
                    [
                        'id_mon_an' => $dish_id,
                        'id_khach_hang' => $user_id,
                        'so_luong' => $quantity
                    ]
                );
            }
            $request->session()->put('cart', Cart::where('id_khach_hang', $user_id)->get());
            return response()->json(['success' => '😍 Món ăn đã thêm vào giỏ hàng của bạn !']);
        } else {
            return redirect()->route("client.login.add");
        }
    }

    public function update(Request $request)
    {
        $cart_item = Cart::find($request->cart_id);

        if ($cart_item) {
            $cart_item->so_luong = $request->so_luong;
            $cart_item->save();

            return response()->json(['success' => 'Số lượng đã được cập nhật!']);
        }
    }
}
