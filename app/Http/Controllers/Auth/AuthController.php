<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Traits\AuthTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
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

    //use AuthenticatesUsers;

    use AuthTrait;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function loginForm($type) {
        return view('auth.login',compact('type'));
    }


    public function registerForm() { 
        return view('auth.register');
    }

    
    public function login(LoginRequest $request) {
        $request->session()->regenerate();
        
        if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
            toastr()->info('You are now logged in!');
            return $this->redirect($request);
        } else {
            return redirect()->back()->withInput()->withErrors(['login' => 'There is an error in username or password']);
        }
    }
    


    public function register(RegisterRequest $request) {
        // ...
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($request->password);
        $user = Customer::create($validatedData);
    
        if ($user) {
            event(new Registered($user));
            Auth::guard('customer')->login($user);
            
            toastr()->info('You are now logged in!');
            return redirect(RouteServiceProvider::CUSTOMER);
        } else {
            toastr()->info('Registration faild');
            return redirect()->back();
        }
    }
    
    

    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        toastr()->info('Logged out successfully');
        return redirect('/');
    }



}
