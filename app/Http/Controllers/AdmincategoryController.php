<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\InsertcategoryRequest;

class AdmincategoryController extends Controller
{

    public function insert(InsertcategoryRequest $request){

        if($request->has('btnInsertCategory')){

            $category = new Categories;

            $category->name       = $request->name;
            $category->parentId    = $request->menu;


            $category->Save();


            return redirect()->back()->with('message','Successfully inserted!');

        }

        return redirect()->back()->with('messageError', 'Denied');

    }

    public function getEditCategory($id){

        $category = Categories::where('id',$id)->first();
        $menus    = Menu::all();


        return view('admineditcategory', [
            'category' => $category,
            'menu' => $menus
        ]);

    }

    public function editCategory(InsertcategoryRequest $request){

        if($request->has('btnEditCategory')){

            $category = Categories::find($request->id);

            $category->name        = $request->name;
            $category->parentId    = $request->menu;

            $category->save();

            if($category){

                return redirect()->back()->with('message', 'Category edited!');
            }
            else {
                return redirect()->back()->with('messageError', 'Not edited.');
            }
        }

        return redirect()->back()->with('messageError', 'Denied');

    }

    public function deleteCategory($id){

        $category = Categories::find($id);

        $category->delete();

        if($category){

            return redirect()->back()->with('message', 'Category deleted!');
        }
        else {
            return redirect()->back()->with('messageError', 'Not deleted.');
        }

    }

}
