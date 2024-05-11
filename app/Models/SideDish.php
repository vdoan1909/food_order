<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideDish extends Model
{
    use HasFactory;
    protected $table = "mon_phu";

    public $timestamps = false;

    protected $fillable = [
        "ten_mon_phu",
        "anh_mon_phu",
        "gia_mon_phu"
    ];
}
