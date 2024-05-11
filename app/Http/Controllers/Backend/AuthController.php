<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
//       dd(request()->all());
        $email= $request->email;
        $password=$request->password;
        $remember= $request->remember;
        
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $remember)) {
            $request->session()->regenerate();
            
            return redirect('admin/dashboard');
        }
        
        return redirect()->back()->with(['error'=>'Login Failed']);
    }
}
