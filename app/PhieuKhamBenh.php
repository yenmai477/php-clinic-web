<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuKhamBenh extends Model
{
    //App\bảng a,khóa ngoại trong bảng a,khóa chính của bảng a
    protected $table = "phieukham";
    protected $primaryKey = 'MaPKB';

    public function chitietpkb()
    {
        return $this->hasMany('App\ChiTietPKB','MaPKB');
    }

    public function benhnhan()
    {
        return $this->belongsTo('App\BenhNhan','MaBN');
    }

    public function hoadon()
    {
        return $this->hasOne('App\HoaDon','MaPKB');
    }

    public function loaibenh()
    {
        return $this->belongsTo('App\LoaiBenh','MaLoaiBenh');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($pkb) {
            $pkb->chitietpkb()->delete();
            $pkb->hoadon()->delete();
        });
    }
}
