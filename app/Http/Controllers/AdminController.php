<?php

namespace App\Http\Controllers;

use App\Http\Requests\EdituserRequest;
use App\Models\User;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Action;
use App\Models\Menu;
use App\Models\Message;
use App\Models\Slider;
use App\Models\Ads;
use App\Models\Order;
use App\Models\Logs;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function adminDashboard(){

        $orderModel    = new Order();
        $orders        = $orderModel->getOrders();
        $ordersCount   = Order::all()->count();
        $usersCount    = User::all()->where('roleId','<>',1)->count();
        $ordersSum     = Order::all()->where('send','=',1)->sum('orderPrice');
        $productsCount = Product::all()->count();

        return view('admindashboard', [
            'orders'=>$orders,
            'ordersCount'=>$ordersCount,
            'usersCount'=>$usersCount,
            'ordersSum'=>$ordersSum,
            'productsCount'=>$productsCount
        ]);

    }

    public function getUsers(){

        $users = User::where('roleId','<>',1)->paginate(10);

        return view('adminusers',['users' => $users] );

    }

    public function getProducts(){

        $productsModel   = new Product();
        $categoriesModel = new Categories();
        $action          = Action::all();
        $products        = $productsModel->getProductsAdmin();
        $categories      = $categoriesModel->getCategories();

        return view('adminproducts',[
            'products' => $products,
            'categories' => $categories,
            'actions' => $action,

        ] );
    }

    public function getCategories(){

        $categoriesModel = new Categories();
        $menuModel       = new Menu();
        $menu            = $menuModel->getParents();
        $categories      = $categoriesModel->getCategoriesMenu();

        return view('admincategories',[
            'categories' => $categories,
            'menu'       => $menu
            ] );

    }

    public function getMessages(){

        $messages = Message::all()->sortByDesc('id');

        return view('adminmessages',['messages'=> $messages]);


    }

    public function getSlider(){

        $sliders = Slider::all();

        return view('adminslider',['sliders'=> $sliders]);

    }

    public function getBaners(){

        $baners = Ads::all();

        return view('adminbaners',['baners'=> $baners]);
    }

    public function getLogs(){

        $logsModel = new Logs();
        $logs      = $logsModel->getAllLogs();

        return view('adminlogs',['logs'=> $logs]);
    }

}
