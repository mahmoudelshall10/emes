<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
     public function callback($provider)
     {
       $getInfo = Socialite::driver($provider)->user(); 
    //    dd($getInfo);
       $user = $this->createUser($getInfo,$provider);
       auth()->login($user); 
       return redirect()->to('/');
     }
    
     function createUser($getInfo,$provider)
     {
        $user = User::where('provider_id', $getInfo->id)->first();
        // $arr = @explode(" ",$getInfo);
        if($getInfo->email === ''){
            $getInfo->email = 'fake@example.com';
        }else{
            if (!$user) {
                $user = User::create([
                    'name'     => $getInfo->name,
                    'first_name'     =>(@explode(" ",$getInfo->name))[0],
                    'last_name'     =>(@explode(" ",$getInfo->name))[1],
                    'email'    => $getInfo->email,
                    'profile_image'   => $getInfo->avatar,
                    'password' => Hash::make(Str::random(10)),
                    'provider' => $provider,
                    'provider_id' => $getInfo->id,
                ]);
            }
        }
        return $user;
    }
}