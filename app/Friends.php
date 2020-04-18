<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Friends extends Model
{
    public function append($second_id)
    {
      $this->insert([
        'first_id' => Auth::id(),
        'second_id' => $second_id,
      ]);

    }

    public function deleteFriend($delete_id)
    {
      $this->where([
        ['first_id', Auth::id()],
        ['second_id', $delete_id],
      ])->orWhere([
        ['first_id', $delete_id],
        ['second_id', Auth::id()],
      ])->delete();

    }

    public function isFriends($id)
    {
      $auth_id = Auth::id();
      return $this
      ->where([
        ['first_id', '=', $id],
        ['second_id', '=', $auth_id],
      ])->count();
    }
}
