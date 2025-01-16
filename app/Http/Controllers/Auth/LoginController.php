<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Validators\LoginValidator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function __construct(LoginValidator $loginValidator)
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');

        $this->loginValidator = $loginValidator;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function checkUser(Request $request)
    {

        /**
         * Validating form. $request->all() - taking all parameters which
         * were transmitted through the form, in particular email and password
         */

        // Using validator
         $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Check, the user is?
        $user = User::where('email', $request->email)->first();

        // Checking password
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home');
        } else {
            return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
        }
    }

}
