<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class usercontroller extends Controller
{
    public function profile(){
        return view('auth.profile');
    }
}
