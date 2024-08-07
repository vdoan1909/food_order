<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table = "hoadon_chitiet";

    public $timestamps = false;

    protected $fillable = [
        "ma_don_hang",
        "id_khach_hang",
        "id_mon_an",
        "so_luong_mua",
        "tong_tien",
    ];
}
