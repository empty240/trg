<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factories extends Model
{
    use SoftDeletes;

    public function getAllList()
    {
      //$list = Article::all();
      //return $list;
    }
    public function staffs()
      {
          return $this->hasMany('App\Staffs', 'factory_id');
      }
}
