<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $input     = $request->all();
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }
        else
        {
			// attempt to login
            if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']], $request->remember))
            {
                return redirect('home');
            }
            else
            {
                return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                    'approve' => 'Oops..... Wrong Credentials!'
                ]);
            }
        }
    }
}
