<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Admin;

class FacebookController extends Controller
{
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleCallback() {
        $user = Socialite::driver('facebook')->user();
        
        $info = Admin::where('id', $user->id)->first();
        if ($info) {
            return redirect()->route('admin.dashboard');
        } else {
            Admin::create([
                'fullname' => $user->name,
                'email' => $user->email,
                'password' => encrypt('hello12345'),
                'facebookid' => $user->id
            ]);

            return redirect()->route('admin.dashboard');
        }
    }
}
