<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;

    public function create($data)
    {

      $res = $this->insertGetId([
        'path' => $data['path'],
        'relationship' => $data['relationship'],
      ]);

      return $res;
    }

    public function messageOwn($data)
    {
      $this->incrementing = true;
      $this->whereIn('id', $data['images_id'])->update([
        'relationship' => $data['message_id'],
      ]);
      // $this->where('id', 1)->update(['path' => 'test']);
      // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
      // $out->writeln($a);
    }

}
