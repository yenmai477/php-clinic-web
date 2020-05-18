<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thuoc extends Model
{
    //
    protected $table = "thuoc";
    protected $primaryKey = 'MaThuoc';

    public function donvi()
    {
        return $this->belongsTo('App\DonVi','MaDonVi');
    }

    public function cachdung()
    {
        return $this->belongsTo('App\CachDung','MaCachDung');
    }

    public function chitietphieukhambenh()
    {
        return $this->hasMany('App\ChiTietPKB','MaThuoc');
    }
}
