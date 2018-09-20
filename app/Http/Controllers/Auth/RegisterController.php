<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserGroup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Illuminate\Http\Request;


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
    use VerifiesUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/settings';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('web',['except' => ['getVerification', 'getVerificationError']]);
    }

    public function showRegistrationForm()
    {
        $groups = UserGroup::all();
        return view('auth.register',['groups'=>$groups]);
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
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'nickname' => 'required|string|max:50|unique:users',
            'password' => 'required|string|min:6',
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
        if($data['notification']== null){
            dd("asd");
        }
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'group_id' => $data['group'],
            'notification' => $data['notification'],
           
        ]);
        $user->assignRole('user');

        return $user;
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        UserVerification::generate($user);
        UserVerification::send($user, 'Email Verification');
        return redirect()->route('settings.index')->withAlert('Register successfully, please verify your email.');
    }
}