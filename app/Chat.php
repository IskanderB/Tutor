<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  public function appendChat($message)
  {
    $this->insert([
      'content' => $message->message,
      'from_user' => $message->from,
      'to_user' => $message->to,
      'relationship' => $message->relationship,
    ]);
  }
}
