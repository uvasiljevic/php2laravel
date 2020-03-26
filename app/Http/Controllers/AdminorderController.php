<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminorderController extends Controller
{

    public function sendOrder($id){

        $order = Order::find($id);

        $order->send = 1;

        $order->save();

        return redirect()->back()->with('message', 'Order sent!');
    }
}
