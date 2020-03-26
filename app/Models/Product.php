<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public $timestamps = false;

    public function getProducts($id = 0, $sort = 0, $search = "", $offset = 0){


        $query =  \DB::table($this->table)
            ->select('product.id', 'product.title', 'product.description', 'product.image', 'product.price', 'product.actionId', 'action.name', 'action.class')
            ->join('action','action.id','=',$this->table.'.actionId');


            if( $sort!=0){
                if($sort == 1){
                    $query = $query->orderBy($this->table.'.price', 'ASC');
                }elseif($sort == 2){
                    $query = $query->orderBy($this->table.'.price', 'DESC');
                }
            }else{
                $query = $query->orderBy($this->table.'.Id', 'DESC');
            }
            if($search != ""){
                $query = $query->where($this->table.'.title','LIKE','%'.$search.'%');
            }
            if($id != 0){
                $query = $query->where($this->table.'.categoryId',$id);
            }

        $query = $query->offset($offset)->limit(8)->get();


        return $query;

    }

    public function getProductsCount($id = 0, $sort = 0, $search = ""){

        $query =  \DB::table($this->table)
            ->select('product.id', 'product.title', 'product.description', 'product.image', 'product.price', 'product.actionId', 'action.name', 'action.class')
            ->join('action','action.id','=',$this->table.'.actionId');


        if( $sort!=0){
            if($sort == 1){
                $query = $query->orderBy($this->table.'.price', 'ASC');
            }elseif($sort == 2){
                $query = $query->orderBy($this->table.'.price', 'DESC');
            }
        }else{
            $query = $query->orderBy($this->table.'.Id', 'DESC');
        }
        if($search != ""){
            $query = $query->where($this->table.'.title','LIKE','%'.$search.'%');
        }
        if($id != 0){
            $query = $query->where($this->table.'.categoryId',$id);
        }

        $query = $query->get();

        return $query;

    }

    public function getProduct($id){
        return \DB::table($this->table)
            ->select('product.id', 'product.title', 'product.description', 'product.image', 'product.price', 'product.actionId', 'action.name', 'action.class')
            ->join('action','action.id','=',$this->table.'.actionId')
            ->where($this->table.'.id',$id)
            ->get();
    }

    public function getProductCart($id){
        return \DB::table($this->table)
            ->where('id',$id)
            ->get();
    }

    public function getRelatedProducts(){
        return \DB::table($this->table)
            ->select('product.id', 'product.title', 'product.description', 'product.image', 'product.price', 'product.actionId', 'action.name', 'action.class')
            ->join('action','action.id','=',$this->table.'.actionId')
            ->where($this->table.'.actionId','<>',4)
            ->limit(4)
            ->get();
    }

    public function getProductsAdmin(){

        $query =  \DB::table($this->table)
            ->select('product.id', 'product.title', 'product.description', 'product.image', 'product.price', 'product.actionId', 'action.name as actionName', 'action.class', 'categories.name as categoryName')
            ->join('action','action.id','=',$this->table.'.actionId')
            ->join('categories','categories.id','=',$this->table.'.categoryId')
            ->orderBy('product.id', 'DESC')
            ->paginate(8);


        return $query;

    }






}
