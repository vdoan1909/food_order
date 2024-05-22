<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        if ($request->session()->has('customer') || $request->session()->has('admin')) {
            $id = null;

            if ($request->session()->has('customer')) {
                $id = session()->get('customer')->id;
            } elseif ($request->session()->has('admin')) {
                $id = session()->get('admin')->id;
            }

            $get_rate = Rating::where('id_mon_an', $request->dish_id)->where('id_khach_hang', $id)->first();

            if ($get_rate) {
                $get_rate->so_sao = $request->rating;
                $get_rate->save();
                return response()->json([
                    "success" => true,
                    "message" => "Cảm ơn đánh giá của bạn!"
                ]);
            } else {
                $rate = Rating::insert(
                    [
                        "id_mon_an" => $request->dish_id,
                        "id_khach_hang" => $id,
                        "so_sao" => $request->rating
                    ]
                );
                if ($rate) {
                    return response()->json([
                        "success" => true,
                        "message" => "Cảm ơn đánh giá của bạn!"
                    ]);
                }
            }

        } else {
            return redirect()->route("client.login.add");
        }
    }
}
