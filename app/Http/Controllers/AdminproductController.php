<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditproductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Action;
use App\Http\Requests\InsertproductRequest;

class AdminproductController extends Controller
{

    public function insert(InsertproductRequest $request){

        if($request->has('btnInsertProduct')){

            $product = new Product;

            $product->title       = $request->title;
            $product->description = $request->description;
            $product->price       = $request->price;
            $file                 = $request->image;
            $filename             = $file->getClientOriginalName();
            $product->image       = $filename;
            $product->categoryId  = $request->category;
            $product->actionId    = $request->action;

            $product->Save();

            $file->move(public_path()."/images/", $filename);
            return redirect()->back()->with('message','Successfully inserted!');

        }

        return redirect()->back()->with('messageError', 'Denied');

    }

    public function getEditProduct($id){

        $categoriesModel = new Categories();
        $action          = Action::all();
        $categories      = $categoriesModel->getCategories();
        $product = Product::where('id',$id)->first();

        return view('admineditproduct', [
            'product' => $product,
            'categories' => $categories,
            'actions' => $action,
        ]);

    }

    public function editProduct(EditproductRequest $request){

        if($request->has('btnEditProduct')){

            $product = Product::find($request->id);

            $product->title        = $request->title;
            $product->description  = $request->description;
            $product->price        = $request->price;
            $product->categoryId   = $request->category;
            $product->actionId     = $request->action;
            if($request->image != null){

                $file                 = $request->image;
                $filename             = $file->getClientOriginalName();
                $product->image       = $filename;
                $file->move(public_path()."/images/", $filename);
            }

            $product->save();

            if($product){

                return redirect()->back()->with('message', 'Product edited!');
            }
            else {
                return redirect()->back()->with('messageError', 'Not edited.');
            }
        }

        return redirect()->back()->with('messageError', 'Denied');


    }
    public function deleteProduct($id){

        $product = Product::find($id);

        $product->delete();

        if($product){

            return redirect()->back()->with('message', 'Product deleted!');
        }
        else {
            return redirect()->back()->with('messageError', 'Not deleted.');
        }

    }


}
