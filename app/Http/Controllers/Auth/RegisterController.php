<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserGroup;
use App\UserUserGroup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;

use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Illuminate\Http\Request;

use App\Mail\UserRegistered;
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
        try{
            $data['notification'];
            $notification = 1;

        } catch(\Exception $e) {
            $notification = 0;
        }
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'notification' => $notification,
           
        ]);
        foreach ($data['group'] as $id) {
            UserUserGroup::create([
                'user_id'=>$user->id,
                'user_group_id'=>$id
            ]);
        }

        return $user;
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        UserVerification::generate($user);
        Mail::to($request->email)->send(new UserRegistered(
            $user,
            $request->password,
            'Email Verification'
        ));
        // UserRegistered::send($user, $request->password, 'Email Verification');
        return redirect()->route('settings.index')->withStatus('A confirmation link has been sent to the email.');
    }
}