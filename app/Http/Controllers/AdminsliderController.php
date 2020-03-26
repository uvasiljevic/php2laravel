<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Ads;
use App\Http\Requests\EditsliderRequest;
use App\Http\Requests\EditbanerRequest;
use Illuminate\Http\Request;

class AdminsliderController extends Controller
{
    public function getEditSlider($id){

        $slider = Slider::where('id', $id)->first();

        return view('admineditslider', ['slider' => $slider]);

    }

    public function editSlider(EditsliderRequest $request){

        if($request->has('btnEditSlider')){

            $slider = Slider::find($request->id);

            $slider->title        = $request->title;
            $slider->text         = $request->text;

            if($request->image != null){

                $file                 = $request->image;
                $filename             = $file->getClientOriginalName();
                $slider->image        = $filename;
                $file->move(public_path()."/images/", $filename);
            }

            $slider->save();

            if($slider){

                return redirect()->back()->with('message', 'Slider edited!');
            }
            else {
                return redirect()->back()->with('messageError', 'Not edited.');
            }
        }

        return redirect()->back()->with('messageError', 'Denied');

    }

    public function getEditBaner($id){

        $baner = Ads::where('id', $id)->first();

        return view('admineditbaner', ['baner' => $baner]);

    }

    public function editBaner(EditbanerRequest $request){

        if($request->has('btnEditBaner')){

            $baner = Ads::find($request->id);

            $baner->title        = $request->title;

            if($request->text != null){
                $baner->text         = $request->text;
            }

            if($request->discount != null){
                $baner->discount         = $request->discount;
            }

            if($request->image != null){

                $file                 = $request->image;
                $filename             = $file->getClientOriginalName();
                $baner->image         = $filename;
                $file->move(public_path()."/images/", $filename);
            }

            $baner->save();

            if($baner){

                return redirect()->back()->with('message', 'Baner edited!');
            }
            else {
                return redirect()->back()->with('messageError', 'Not edited.');
            }
        }

        return redirect()->back()->with('messageError', 'Denied');

    }
}
