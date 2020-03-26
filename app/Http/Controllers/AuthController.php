<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\EditinfoRequest;
use App\Models\User;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\queue;

class AuthController extends Controller
{



    public function __construct()
    {


    }

    public function store(RegistrationRequest $request){
        if($request->has('btnReg')){

            $user = new User;

            try{

                $user->firstName    = $request->firstname;
                $user->lastName     = $request->lastname;
                $user->email        = $request->email;
                $user->phone        = $request->phone;
                $user->city         = $request->city;
                $user->zipCode      = $request->zip;
                $user->street       = $request->street;
                $user->streetNumber = $request->streetNumber;
                $md5password        = md5($request->password);
                $user->password     = $md5password;
                $user->dateCreate   = date('Y-m-d H:i:s');

                $user->Save();

                return redirect('/login')->with('message','Successfully registred!');
            }
            catch(\Exception $ex) {

                return redirect()->back()->with('message','Problem with server.');
                \Log::error($ex->getMessage());

            }
        }
    }



    public function login(LoginRequest $request){
        //dd('dsad');
        if($request->has('btnLog')){
            $md5password = md5($request->input('password'));
            $user = User::select('id','firstName','lastName','email','phone','street','streetNumber','city','zipCode','roleId')
                ->where('email', $request->input('email'))
                ->where('password', $md5password)
                ->first();
            //dd($user->firstName);
            if($user){
                $request->session()->put('user', $user);
                //dd(session()->get('user'));
                return redirect("/")->with('message', 'Loged in successfully!');
            }
            else {
                return redirect("/login")->with('messageError', 'No such a user. Register please.');
            }

        }

    }

    public function logout(Request $request){
        if($request->session()->has('user')){
            $request->session()->forget('user');
            $request->session()->flush();

            if($request->session()->has('cart')) {
                $request->session()->forget('cart');
                $request->session()->flush();
            }

            return redirect("/")->with('message', 'You are logged out.');
        }
    }

    public function editUserInfo(EditinfoRequest $request){

        if($request->has('btnEditInfo')){

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

            if($request->has('newpassword')){
                $md5password    = md5($request->input('newpassword'));
                $user->password = $md5password;
            }

            $user->save();

            if($user){

                return redirect()->back()->with('message', 'You have successfully edited your account!');
            }
            else {
                return redirect()->back()->with('messageError', 'Not edited.');
            }

        }

    }




}
