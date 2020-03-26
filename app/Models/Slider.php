<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    public $timestamps = false;

    public function getHomeSlider(){

        return \DB::table($this->table)
            ->get();

    }





}

