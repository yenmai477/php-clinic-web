<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BenhNhan extends Model
{
    //
    protected $table = "benhnhan";
    protected $primaryKey = 'MaBN';

    public function phieukhambenh()
    {
        return $this->hasMany('App\PhieuKhamBenh','MaBN');
    }

}
