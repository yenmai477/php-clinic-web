<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaoCaoSuDungThuoc extends Model
{
    //
    protected $table = "baocaosudungthuoc";
    protected $primaryKey = 'MaBCSDT';

    //connect chi tiet bao co doanh thu
    public function ctbcsdt()
    {
        return $this->hasMany('App\ChiTietBCSDT','MaBCSDT');
    }
}
