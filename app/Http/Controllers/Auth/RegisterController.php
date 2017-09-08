<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Email constant
     */
    const EMAIL     = 'email';

    /**
     * Password constant
     */
    const PWD       = 'password';

    /**
     * Name constant
     */
    const NAME      = 'name';

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);
        $token = JWTAuth::attempt($request->only('email', 'password') ,
            ['exp'   => Carbon::now()->addWeek()->timestamp,]);
        $data = [];
        $meta = [];
        $data['name']       = $user->name;
        $data['user_id']    = $user->id;
        $data['email']      = $user->email;
        $data['pwd']      = $user->password;
        $data['is_admin']   = $user->is_admin;
        $data['is_debug']   = $user->is_debug;
        $meta['token']      = $token;
        return response()->json(['data' => $data, 'meta' => $meta]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            self::NAME      => 'required|max:255',
            self::EMAIL     => 'required|email|max:255|unique:users',
            self::PWD       => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            self::NAME      => $data[self::NAME],
            self::EMAIL     => $data[self::EMAIL],
            self::PWD       => bcrypt($data[self::PWD]),
        ]);
    }
}
