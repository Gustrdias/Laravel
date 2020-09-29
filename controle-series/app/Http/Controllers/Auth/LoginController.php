<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    
    public function login(Request $request) 
    {
        $credentials = $request->only(['email','password']);
        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors('Usuário e/ou senha incorretos');
        }
        return redirect()->route('listar_Series');
    }

    public function index(Request $request) 
    {
        return view('Autentificacao.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
    
}
