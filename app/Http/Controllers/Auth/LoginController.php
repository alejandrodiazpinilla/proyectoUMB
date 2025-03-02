<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //permitir ingresar con username y no con email
    public function username()
    {
        return 'username';
    }

    // redireccionar al usuario inactivo al login con mensaje de advertencia
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        
        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }
        if (Auth::check() && Auth::user()->estado == 1) {
            return redirect('/home');
        }elseif (Auth::check() && Auth::user()->estado == 0) {
            Auth::guard()->logout();
            return redirect('/login')->with('mensaje', '¡¡Usuario inactivo!!, por favor comuníquese con el administrador de la plataforma.');
        }
        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }
}
