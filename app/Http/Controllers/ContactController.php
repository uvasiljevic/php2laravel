<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;


class ContactController extends Controller
{


    public function sendMessage(ContactRequest $request){

        if($request->has('btnContact')){

            $message = new Message;

            try{

                $message->email          = $request->contact_email;
                $message->message        = $request->contact_message;


                $message->Save();

                return redirect()->back()->with('message','Message sent!');
            }
            catch(\Exception $ex) {

                return redirect()->back()->with('messageError','Problem with server.');
                \Log::error($ex->getMessage());

            }
        }
    }

}
