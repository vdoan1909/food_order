<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Rating;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categorys = Category::all();
        $dish_populars = Dish::orderBy('luot_xem', 'desc')->take(8)->get();

        foreach ($dish_populars as $dish) {
            $dish->average_rating = Rating::where('id_mon_an', $dish->id)->avg('so_sao');
            $dish->reviewers_count = Rating::where('id_mon_an', $dish->id)->count('id_khach_hang');
        }
        return view("client.home", compact("categorys", "dish_populars"));
    }

    public function detail(Request $request, $id)
    {
        $dish_detail = Dish::find($id);

        $average_rating = Rating::where('id_mon_an', $id)->avg('so_sao');
        $reviewers_count = Rating::where('id_mon_an', $id)->count('id_khach_hang');


        if ($dish_detail) {
            $dish_detail->luot_xem += 1;
            $dish_detail->save();
            return view("client.pages.detail", compact("dish_detail", "average_rating", "reviewers_count"));
        } else {
            return view("404");
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
                foreach ($list_menu as $dish) {
                    $dish->average_rating = Rating::where('id_mon_an', $dish->id)->avg('so_sao');
                }
                $menu_ctg = Category::all();
                break;
        }

        $list_menu = $query->paginate(12);
        foreach ($list_menu as $dish) {
            $dish->average_rating = Rating::where('id_mon_an', $dish->id)->avg('so_sao');
            $dish->reviewers_count = Rating::where('id_mon_an', $dish->id)->count('id_khach_hang');
        }
        $menu_ctg = Category::all();
        return view("client.pages.menu", compact("list_menu", "menu_ctg"));
    }
}
