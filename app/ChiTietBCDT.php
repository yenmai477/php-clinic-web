<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder;

class ChiTietBCDT extends Model
{
    //
    protected $table = "chitietbcdt";
    protected $primaryKey = ['MaBCDT', 'Ngay'];
    public $incrementing = false;

    public function baocaodoanhthu()
    {
        return $this->belongsTo('App\BaoCaoDoanhThu','MaBCDT');
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

}
