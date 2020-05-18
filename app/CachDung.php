<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CachDung extends Model
{
    //
    protected $table = "cachdung";
    protected $primaryKey = 'MaCachDung';

    public function thuoc()
    {
        return $this->hasMany('App\Thuoc','MaCachDung');
    }
}
