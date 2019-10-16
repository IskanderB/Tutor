<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password', 'number_phone', 'full_name', 'address', 'number_school', 'number_class', 'subject', 'mark', 'goal','confirmation-token'
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function confirmed()
    {
      return !! $this->is_confirmed;
    }

    public function getConfirmationToken()
    {
      $this->incrementing = true;
      $this->update([
        'confirmation-token' => $token = Str::random(),
      ]);



      // $affected = DB::table('users')
      //         ->where('id', Auth::user()->id)
      //         ->update(['confirmation-token' => $token = Str::random()]);

      return $token;
    }

    public function confirm()
    {
      $this->update([
        'is_confirmed' => true,
        'confirmation-token' => null,
      ]);
      return $this;
    }

    public function edit($request)
    {
      $this->incrementing = true;

      if($request->email == $this->email){
        $is_confirmed = true;
      }
      else{
        $is_confirmed = false;
      }
      $this->update([
        'email' => $request->email,
        'number_phone' => $request->number_phone,
        'full_name' => $request->full_name,
        'address' => $request->address,
        'number_school' => $request->number_school,
        'number_class' => $request->number_class,
        'subject' => $request->subject,
        'mark' => $request->mark,
        'goal' => $request->goal,
        'is_confirmed' => $is_confirmed,
      ]);
      return $is_confirmed;
    }
}
