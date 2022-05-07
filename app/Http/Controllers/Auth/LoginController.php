<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email', Rule::exists('users')->where(function ($query) use ($request) {
                return $query;
            })],
            'password' => 'required|min: 6',
        ], [
            'email.required' => web("Email is required"),
            'email.email' => web("Email is not correct"),
            'email.exists' => web("Email is not exists"),
            'password.required' => web("Password is required"),
            'password.min' => web("Password at least must be 6 digits"),
        ]);
        if (auth()->guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $language = User::where('email', $request->email)->first()->main_language;
            $id = User::where('email', $request->email)->first()->id;
            Session::put('user_id', $id);
            Session::put('user_locale', $language);
            $return = ["result" => "ok", "message" => web("Welcome back , Login Successfully"),"url" => route('home')];
            return $return;
        }
        $return = ["result" => "error", "message" => web("Password is not correct")];
        return $return;

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
