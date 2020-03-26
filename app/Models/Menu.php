<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{


    protected $table = 'menu';
    public $timestamps = false;

    public function getMenu(){
        $categories = new Categories();

        $menus = \DB::table($this->table)
            ->get();

        foreach($menus as $menu){

            $menu->categories = $categories->getCategoriesForMenu($menu->id);

        }

        return $menus;
    }

    public function getParents(){

        $menu = \DB::table($this->table)
            ->get();

        return $menu;
    }



}
