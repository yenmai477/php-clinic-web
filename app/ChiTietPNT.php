<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietPNT extends Model
{
    //
    protected $table = "chitietpnt";
    protected $primaryKey = ['MaPNT','MaThuoc'];
    public $incrementing = false;

    public function phieunhapthuoc()
    {
        return $this->belongsTo('App\PhieuNhapThuoc','MaPNT');
    }

    public function thuoc()
    {
        return $this->belongsTo('App\Thuoc','MaThuoc');
    }
}
