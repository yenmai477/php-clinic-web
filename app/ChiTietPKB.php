<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ChiTietPKB extends Model
{
    //
    protected $table = "chitietphieukham";
    protected $primaryKey = ['MaPKB','MaThuoc'];
    public $incrementing = false;

    public function phieukhambenh()
    {
        return $this->belongsTo('App\PhieuKhamBenh','MaPKB');
    }

    public function thuoc()
    {
        return $this->belongsTo('App\Thuoc','MaThuoc');
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
