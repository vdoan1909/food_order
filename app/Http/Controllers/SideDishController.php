<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SideDish;
use Illuminate\Http\Request;

class SideDishController extends Controller
{
    public function index(){
        $list_side_dish = SideDish::all();
        return view("admin.sidedish.list", compact("list_side_dish"));
    }

    public function add()
    {
        return view("admin.sidedish.create");
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                "side_dish_name" => "required|regex:/^[\pL\s\d]+$/u",
                "side_dish_img" => "required|mimes:png,jpg,webp,jpeg",
                "side_dish_price" => "required|numeric|min:0"
            ],
            [
                "side_dish_name.required" => "Cần nhập tên món ăn phụ",
                "side_dish_name.regex" => "Tên món ăn phụ không được có ký tự đặc biệt",
                "side_dish_img.required" => "Ảnh món ăn phụ chưa được chọn",
                "side_dish_img.mimes" => "Chỉ được chọn ảnh có định dạng là PNG, JPG, JPEG hoặc WEBP",
                "side_dish_price.required" => "Giá món ăn phụ không được có ký tự đặc biệt",
                "side_dish_price.numeric" => "Giá món ăn phụ phải là 1 số",
                "side_dish_price.min" => "Giá món ăn phụ phải là một số dương"
            ]
        );

        if ($request->hasFile("side_dish_img")) {
            $file = $request->side_dish_img;
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . "." . $ext;
            $file->storeAs("public", $file_name);
        }

        $data["side_dish_img"] = $file_name;

        $is_insert = SideDish::insert(
            [
                "ten_mon_phu" => $data["side_dish_name"],
                "anh_mon_phu" => $data["side_dish_img"],
                "gia_mon_phu" => $data["side_dish_price"]
            ]
        );

        if ($is_insert) {
            return redirect()->route("admin.sidedish")->with("success", "Thêm mới món ăn phụ thành công");
        } else {
            return redirect()->route("admin.sidedish")->with("error", "Thêm mới món ăn phụ thất bại");
        }
    }

    public function detail(Request $request, $id)
    {
        $request->session()->put("id_side_dish", $id);

        $side_dish_detail = SideDish::find($id);
        return view("admin.sidedish.edit", compact("side_dish_detail"));
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $id = session()->has("id_side_dish") ? session("id_side_dish") : null;
        $get_side_dish = SideDish::find($id);

        $request->validate(
            [
                "side_dish_name" => "required|regex:/^[\pL\s\d]+$/u",
                "side_dish_img" => "mimes:png,jpg,webp,jpeg",
                "side_dish_price" => "required|numeric|min:0"
            ],
            [
                "side_dish_name.required" => "Cần nhập tên món ăn phụ",
                "side_dish_name.regex" => "Tên món ăn phụ không được có ký tự đặc biệt",
                "side_dish_img.mimes" => "Chỉ được chọn ảnh có định dạng là PNG, JPG, JPEG hoặc WEBP",
                "side_dish_price.required" => "Giá món ăn phụ không được có ký tự đặc biệt",
                "side_dish_price.numeric" => "Giá món ăn phụ phải là 1 số",
                "side_dish_price.min" => "Giá món ăn phụ phải là một số dương"
            ]
        );

        if ($request->hasFile("side_dish_img")) {
            $file = $request->side_dish_img;
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . "." . $ext;
            $file->storeAs("public", $file_name);
            $data["side_dish_img"] = $file_name;
        }else{
            $data["side_dish_img"] = $get_side_dish->anh_mon_phu;
        }


        $is_update = SideDish::findOrFail($id)->update(
            [
                "ten_mon_phu" => $data["side_dish_name"],
                "anh_mon_phu" => $data["side_dish_img"],
                "gia_mon_phu" => $data["side_dish_price"]
            ]
        );

        if ($is_update) {
            return redirect()->route("admin.sidedish")->with("success", "Sửa món ăn phụ thành công");
        } else {
            return redirect()->route("admin.sidedish")->with("error", "Sửa món ăn phụ thất bại");
        }
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $is_delete = SideDish::where("id", $id)->delete();

            if ($is_delete) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }
}
