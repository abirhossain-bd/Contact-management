<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        // $user = User::join('cities','cities.id','users.city_id')
        //             ->where('users.id',Auth::id())
        //             ->select('users.*','.name')
        //             ->first();cities


        // $user = User::find(Auth::id()); or

        $user = Auth::user();


        if (!$user) {
            return redirect()->route('login');
        }
        return view('home', compact('user'));
    }

    public function city_test(){
        $user = Auth::user();
        $city = $user->city;
        $users = $city->users;

        dd($users->toArray());
    }
}
