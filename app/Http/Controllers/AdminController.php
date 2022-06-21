<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\AdminToken;
use Cookie;
use Illuminate\Support\Str;
use Mail;
use App\Mail\PasswordReset;

class AdminController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required | email | unique:admins',
            'password' => 'required | confirmed | min:8',
            'password_confirmation' => 'required',
            'terms' => 'required'
        ]);
        $info = Admin::insert([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($info) {
            return redirect()->route('admin.register')->with('success', 'Admin Registered Successfully.');
        } else {
            return redirect()->route('admin.register')->with('error', 'Something Went Wrong.');
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);

        if ($request->remember) {
            Cookie::queue(Cookie::make('email', $request->email, 1));
            Cookie::queue(Cookie::make('password', $request->pasword, 1));
        } elseif (!$request->remember) {
            Cookie::queue(Cookie::forget('email'));
            Cookie::queue(Cookie::forget('password'));
        }
        
        $isEmail = Admin::where('email', $request->email)->first();
        if ($isEmail && Hash::check($request->password, $isEmail->password)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', "Credentials doesn't match.");
        }
    }

    public function forget() {
        return view('forget-password');
    }

    public function resetlink(Request $request) {
        $request->validate([
            'email' => 'required | email'
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->with('error', "Email doesn't exist.");
        } else {
            if (AdminToken::firstWhere('admin_id', $admin->id)) {
                return redirect()->back()->with('error', "We have already sent you a reset link.");
            } else {
                $tokens = time().Str::random(100);
                $info = AdminToken::create([
                    'admin_id' => $admin->id,
                    'token' => $tokens
                ]);
                Mail::to($request->email)->send(new PasswordReset($request->email, $tokens));
                return redirect()->back()->with('success', 'Password reset link sent successfully.');
            }
        }
    }

    public function update($email, $token) {
        return view('update-form', ['email' => $email, 'token' => $token]);
    }

    public function reset(Request $request, $email, $token) {
        $request->validate([
            'password' => 'required | min:8 | same:password_confirmation',
            'password_confirmation' => 'required'
        ]);
        if(AdminToken::where('token', $token)->delete() && Admin::where('email', $email)->update([
            'password' => Hash::make($request->password)
        ])) {
            return redirect()->back()->with('success', 'Password updated successfully. Now, you can close this window.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
