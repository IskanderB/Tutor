<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\EmailConfirmation;
use Redirect;

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

    public $user = 1;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/RedirectRegister';

    // protected function redirectTo()
    // {
    //   //$user = 1;
    //   //return \Redirect::route('verifycation', ['user' => $user]);
    //   //return redirect()->route('verifycation', ['user' => 1]);
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->middleware('guest');
      //  $this->user = $user;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
     // public function sendEmail($email)
     // {
     //   $token = $user->getConfirmationToken();
     //
     //   Mail::to($email)->send(new EmailConfirmation($user, $token));
     // }

    protected function create(array $data)
    {
      foreach($data as $key => $value)
        {
            if($value == null)
            {
               $data[$key] = 'Не заполнено';
            }
        }



        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'number_phone' => $data['number_phone'],
            'full_name' => $data['full_name'],
            'address' => $data['address'],
            'number_school' => $data['number_school'],
            'number_class' => $data['number_class'],
            'subject' => $data['subject'],
            'mark' => $data['mark'],
            'goal' => $data['goal'],
                    ]);


    }



}
