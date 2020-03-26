<?php

namespace App\Http\Controllers;

use App\Http\Requests\EdituserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminuserController extends Controller
{

    public function deleteUser($id){

        $user = User::find($id);

        $user->delete();

        if($user){

            return redirect()->back()->with('message', 'User deleted!');
        }
        else {
            return redirect()->back()->with('messageError', 'Not deleted.');
        }

    }

    public function getEditUser($id){

        $user = User::where('id',$id)->first();



        return view('adminedituser', ['user' => $user ]);

    }

    public function editUser(EdituserRequest $request){

        if($request->has('btnEditUser')){
            $user = User::find($request->input('id'));

            $user->firstName    = $request->input('firstname');
            $user->lastName     = $request->input('lastname');
            $user->email        = $request->input('email');
            $user->phone        = $request->input('phone');
            $user->city         = $request->input('city');
            $user->street       = $request->input('street');
            $user->streetNumber = $request->input('streetNumber');
            $user->zipCode      = $request->input('zip');
            $user->dateEdit     = date('Y-m-d H:i:s');

            $user->save();

            if($user){

                return redirect()->back()->with('message', 'User edited!');
            }
            else {
                return redirect()->back()->with('messageError', 'Not edited.');
            }
        }

        return redirect()->back()->with('messageError', 'Denied');


    }
}
