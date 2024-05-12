<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|email|max:255',
                'password' => 'required|max:30'
            ]
        );
//       dd(request()->all());
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        if (Auth::guard('admin')->attempt($data, $remember)) {
            $request->session()->regenerate();

            return redirect('admin/dashboard');
        }

        return redirect()->back()->with(['error' => 'Invalid Credentials']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('admin/login');
    }


    public function one()
    {
        
    }
    
    
}
