<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactValidate;
use App\Mail\SendOtp;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $search = $request->input('search', null);

        $users = Contact::where('user_id', Auth::id()) // ensure only logged-in user's data
                    ->when($search, function ($query) use ($search) {
                        $query->where(function ($q) use ($search) {
                            // Concatenate first_name and last_name for the search
                            $q->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $search . '%'])
                              ->orWhere('email', 'like', '%' . $search . '%')
                              ->orWhere('mobile', 'like', '%' . $search . '%');
                        });
                    })
                    ->paginate(10);

        return view('contact.list', compact('users', 'search'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactValidate $request)
    {

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        Contact::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'created_at' => now(),
        ]);
        return redirect()->route('contact.list')->with('success','New contact created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $contacts = Contact::find($id);
        return view('contact.show',compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $contacts = Contact::where('id',$id)->first();
        return view('contact.edit',compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactValidate $request, string $id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        Contact::find($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'updated_at' => now(),
        ]);
        return redirect()->route('contact.list')->with('success','Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        Contact::find($id)->delete();
        return redirect()->route('contact.list')->with('success','Contact Deleted Successfully!');
    }

    public function senOtp($id){
        $contacts = Contact::find($id);

        $data =[
            'otp' => rand(000000,999999),
            'username' => $contacts->first_name. ' '. $contacts->last_name,
        ];

        Mail::to($contacts->email)->send(new SendOtp($data));
        return back()->with('success','Mail has been sent');
    }
}
