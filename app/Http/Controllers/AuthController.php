<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function signup()
    {
        return view("auth.signup");
    }

    public function signup_google()
    {
        return Socialite::driver("google")->stateless()->redirect();
    }

    public function google_callback()
    {

        try {

            $user = Socialite::driver('google')->stateless()->user();


            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('/');
                // return true;

            }else{
                $newUser = User::create([
                    'firstname' => $user->user['given_name'],
                    'lastname' => $user->user['family_name'],
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'profile'=> $user->avatar,
                    'email_verified_at'=>Carbon::now(),
                    'password' => Hash::make($user->password),
                ]);

                Auth::login($newUser);

                return redirect()->intended('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function userLogin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
                $request->session()->regenerate();

               if(Auth::user()->role == 3)
               {

                return redirect('/admin/dashboard');
               }
               if(Auth::user()->role == 2)
               {

                return redirect('/owner/dashboard');
               }
               if(Auth::user()->role == 0)
               {

                return redirect('/');
               }
                if(Auth::user()->role == 1)
               {

                return redirect('/employee/appointment');
               }
        }else{
            return back()->with(['error'=>'Wrong Credentials']);
        }
    }
    public function userLogout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Auth::logout();

        return redirect('/auth/login');
    }
}
