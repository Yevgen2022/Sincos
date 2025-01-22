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

        // Валідація форми
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Знаходимо користувача за email
        $user = User::where('email', $request->email)->first();

        // Перевіряємо існування користувача та правильність пароля
        if ($user && Hash::check($request->password, $user->password)) {
            // Аутентифікуємо користувача
            Auth::login($user);

            // Перевірка ролі
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Перенаправлення для адміністратора
            }

            // Перенаправлення для звичайного користувача
            return redirect()->route('homeUserPage');
        }

        // Якщо аутентифікація не вдалася
        return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }
}