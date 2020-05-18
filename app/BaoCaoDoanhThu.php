<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaoCaoDoanhThu extends Model
{
    //
    protected $table = "baocaodoanhthu";
    protected $primaryKey = 'MaBCDT';

    //connect chi tiet bao co doanh thu
    public function ctbcdt()
    {
        return $this->hasMany('App\ChiTietBCDT','MaBCDT');
    }
}
