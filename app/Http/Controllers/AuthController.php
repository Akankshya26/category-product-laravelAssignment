<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //validate code
        $request->validate([
            'email'     => 'required',
            'password'  => 'required |min:8',
        ]);
        //login code
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/')->with('success', 'You are register successfully');
        } else {
            return redirect('login')->withError('Login credentials are not valid');
        }
    }


    public function register_view()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|unique:users|email',
            'phone'    => 'required',
            'address'  => 'required',
            'password' => 'required |min:8|confirmed',
        ]);
        //save in user table
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $uploadPath = 'uploads/category/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $user->image = $uploadPath . $filename;
        }
        $user->save();
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     // 'account_name' => $request->account_name,
        //     'password' => Hash::make($request->password),
        // ]);
        $email = $request->get('email');
        $data = ([
            'name'  => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);
        Mail::to($email)->send(new WelcomeMail($data));
        $user->save();
        return redirect('/login')->with('success', 'register successfully');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('');
    }
    //
    public function profile()
    {
        $user = User::get();
        return view('profile', ['user' => $user]);
    }
}
