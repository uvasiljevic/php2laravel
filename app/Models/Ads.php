<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'baner';
    public $timestamps = false;

    public function getSmallAd(){

        return \DB::table($this->table)
            ->where('isLarge',-1)
            ->get();

    }
    public function getLargeAd(){

        return \DB::table($this->table)
            ->where('isLarge',1)
            ->get();

    }





}
