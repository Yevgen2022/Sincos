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
    protected $redirectTo = '/homeUserPage';

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

//    public function checkUser(Request $request)
    public function authenticated(Request $request)
    {

        /**
         * Validating form. $request->all() - taking all parameters which
         * were transmitted through the form, in particular email and password
         */

        // Form validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        //We find a user by email
        $user = User::where('email', $request->email)->first();

        // We check the existence of the user and the correctness of the password
        if ($user && Hash::check($request->password, $user->password)) {
            // We authenticate the user
            Auth::login($user);

            // Role check
            $role = $user->role;
            if ($role && $role->name === 'Admin') {
//                return redirect()->route('admin.dashboard'); // Redirection for admin
                return redirect()->route('home');
            }


            // Redirection for a normal user
            return redirect()->route('homeUserPage');
        }

        // If authentication fails
        return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }
}