<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function append($request)
    {
      $this->insert([
        'relationship' => $request->task_id_com,
        'grade' => $request->grade,
        'comment' => $request->comment,
      ]);
    }
}
