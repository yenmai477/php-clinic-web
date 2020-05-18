<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiBenh extends Model
{
    //
    protected $table = "loaibenh";
    protected $primaryKey = 'MaLoaiBenh';

    public function phieukhambenh()
    {
        return $this->hasMany('App\PhieuKhamBenh','DuDoanLoaiBenh');
    }
}
