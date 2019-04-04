<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;#

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function redirectToProvider(){
    //     return Socialite::driver('facebook')->redirect();
    // }

    // public function handleProviderCallback(){
    //     $user = Socialite::driver('facebook')->user();
    //     if($user = User::where('email',$user->email)->first()){
    //         return $this->authAndRedirect($user);
    //     }else{
    //         $data = User::create([
    //             'name' => $user->name,
    //             'email' => $user->email,
    //             'avatar'=> $user->avatar
    //         ]);

    //         return $this->authAndRedirect($data);
    //     }
    // }

    public function authAndRedirect($user){
        Auth::login($user);
        return $redirect
    }
}
