<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhapThuoc extends Model
{
    //
    protected $table = "phieunhapthuoc";
    protected $primaryKey = "MaPNT";

    public function chitietpnt()
    {
        return $this->hasMany('App\ChiTietPNT','MaPNT');
    }
}
