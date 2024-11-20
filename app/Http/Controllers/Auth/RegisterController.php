<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }


    public function signup(Request $request){
        $manager = new ImageManager(new Driver());
        $request->validate([
            'first_name' => 'required|max:20|min:2',
            'last_name' => 'required|max:20|min:2',
            'email' => 'required|email',
            'mobile' => 'required|digits:11',
            'password' => 'required|min:8|max:25',
            'city_id' => 'required|',
        ]);
        if ($request->hasFile('image')) {
            $new_name = now()->format('M-d-Y'). time(). '-'. rand(0,9999). '.' . $request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->toPng()->save(public_path('profile/'.$new_name));
            $new_img = 'profile/'. $new_name;

            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile' => $request->mobile,
                'hoby' => isset($request->hoby) ? implode(',',$request->hoby) : null,
                'gender' => $request->gender,
                'image' => isset($new_img) ? $new_img: null,
                'city_id' => $request->city_id,
                'created_at' => now(),
            ]);
            return redirect()->route('login')->with('success','Registered Successfully');

        }else{
            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile' => $request->mobile,
                'hoby' => ($request->hoby) ? implode(',',$request->hoby) : null,
                'gender' => $request->gender,
                'city_id' => $request->city_id,
                'created_at' => now(),
            ]);
            return redirect()->route('login')->with('success','Registered Successfully');
        }
    }
}
