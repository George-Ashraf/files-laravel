<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class usercontroller extends Controller
{
    public function profile(){
        return view('auth.profile');
    }
    public function updateimg($id,request $request) {
        $user=user::find($id);
        $img_data=$request->file('file');
        $img_name=$img_data->getClientOriginalName();
        $location=public_path('./profilee/');
        $img_data->move($location,$img_name);
        $user->img=$img_name;
        $user->save();
        return redirect()->back();





    }
}
