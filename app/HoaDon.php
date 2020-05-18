<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    //
    protected $table = "hoadon";
    protected $primaryKey = 'MaHoaDon';

    public function phieukhambenh()
    {
        return $this->hasOne('App\PhieuKhamBenh','MaPKB');
    }
}
