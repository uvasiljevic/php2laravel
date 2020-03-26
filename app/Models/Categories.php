<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    protected $table = 'categories';
    public $timestamps = false;

    public function getCategoriesForMenu($id){

        return \DB::table($this->table)
            ->where('parentId',$id)
            ->get();

    }

    public function getCategories(){

        return \DB::table($this->table)
            ->get();

    }

    public function getCategoriesMenu(){

        return \DB::table($this->table)
            ->select($this->table.'.id',$this->table.'.name','menu.title' )
            ->join('menu',$this->table.'.parentId', '=','menu.id' )
            ->paginate(5);

    }
}
