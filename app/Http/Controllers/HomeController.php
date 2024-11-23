<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user = User::join('cities','cities.id','users.city_id')->where('users.id',Auth::id())->select('users.*','cities.name')->first();

        if (!$user) {
            return redirect()->route('login');
        }
        return view('home',compact('user'));
    }
}
