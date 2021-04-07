<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        
        return view('home');
    }

 public function upload(Request $request)
 {
     if($request->hasFile('image')){
         $filename = $request->image->getClientOriginalName();
         $request->image->storeAs('images',$filename,'public');
         Auth()->user()->update(['image'=>$filename]);
     }
     return redirect()->back();
 }
}
