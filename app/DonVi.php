<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    //
    protected $table = "donvi";
    protected $primaryKey = 'MaDonVi';

    public function thuoc()
    {
        return $this->hasMany('App\Thuoc','MaDonVi');
    }
}
