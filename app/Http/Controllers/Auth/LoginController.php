<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\DB;
use Socialite;


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

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();        
        $user_db =DB::table('users')->where('email', $user->getEmail())->first();


        //  if(!$user_db)
        //  {
        //  User::create([
        //      'name'=>$user->getNickname(),
        //      'email'=>$user->getEmail(),

        //  ]);
        //  }
        //return redirect()->route('posts.index');
        if(!$user_db)
        {
        $email=$user->getEmail();
        $name=$user->getNickname();
        return view('auth/register',[
            'name'=>$name,
           'email'=>$email,

        ]);

        }
        else{ 
        $email=$user->getEmail();
        return view('auth/loging',[
           'email'=>$email,
         
        ]);

        }

}


}

