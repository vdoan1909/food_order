<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Rating;
use App\Models\SideDish;
use Illuminate\Http\Request;
use User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categorys = Category::all();

        if ($request->has('category')) {
            $category_id = $request->input('category');
            $dish_populars = Dish::where('id_the_loai', $category_id)->orderBy('luot_xem', 'desc')->take(8)->get();
        } else {
            $dish_populars = Dish::orderBy('luot_xem', 'desc')->take(8)->get();
        }

        return view("client.home", compact("categorys", "dish_populars"));
    }

    public function detail(Request $request, $id)
    {
        $dish_detail = Dish::find($id);
        if ($request->session()->has('customer') || $request->session()->has('admin')) {
            $id_user = null;

            if ($request->session()->has('customer')) {
                $id_user = session()->get('customer')->id;
            } elseif ($request->session()->has('admin')) {
                $id_user = session()->get('admin')->id;
            }

            $get_rate = Rating::where('id_mon_an', $id)->where('id_khach_hang', $id_user)->first();

            if ($dish_detail) {
                $dish_detail->luot_xem += 1;
                $dish_detail->save();
                return view("client.pages.detail", compact("dish_detail", "get_rate"));
            } else {
                return view("404");
            }
        }
    }

    public function menu(Request $request)
    {
        $query = Dish::query();

        if ($request->has('search') && $request->search != "") {
            $query->where('ten_mon_an', 'like', '%' . $request->search . '%');
        }

        switch ($request->sort_by) {
            case 'default':
                $list_menu = $query->paginate(12);
                $menu_ctg = Category::all();
                break;
            case 'newest':
                $query->orderBy('ngay_them', 'desc');
                break;
            case 'low':
                $query->orderBy('gia_mon_an', 'asc');
                break;
            case 'high':
                $query->orderBy('gia_mon_an', 'desc');
                break;
            default:
                $list_menu = $query->paginate(12);
                $menu_ctg = Category::all();
                break;
        }

        $list_menu = $query->paginate(12);
        $menu_ctg = Category::all();
        return view("client.pages.menu", compact("list_menu", "menu_ctg"));
    }

    public function submenu(Request $request)
    {
        $query = SideDish::query();

        if ($request->has('search') && $request->search != "") {
            $query->where('ten_mon_phu', 'like', '%' . $request->search . '%');
        }

        switch ($request->sort_by) {
            case 'default':
                $list_side_menu = $query->paginate(12);
                break;
            case 'newest':
                $query->orderBy('ngay_them', 'desc');
                break;
            case 'low':
                $query->orderBy('gia_mon_phu', 'asc');
                break;
            case 'high':
                $query->orderBy('gia_mon_phu', 'desc');
                break;
            default:
                $list_side_menu = $query->paginate(12);
                break;
        }

        $list_side_menu = $query->paginate(12);
        return view("client.pages.submenu", compact("list_side_menu"));
    }
}
