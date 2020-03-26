<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;

    public function getOrders(){

        return \DB::table($this->table)
            ->select('orders.id', 'orders.orderPrice', 'orders.dateCreate', 'orders.quantity', 'orders.send', 'p.image', 'p.title', 'p.price', 'u.firstName', 'u.lastName', 'u.street', 'u.streetNumber', 'u.zipCode', 'u.city')
            ->join('product as p','p.id',$this->table.'.productId')
            ->join('user as u','u.id',$this->table.'.userId')
            ->orderBy($this->table.'.dateCreate', 'DESC')
            ->paginate(8);
    }
}
