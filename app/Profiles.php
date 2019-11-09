<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profiles extends Model
{
  use SoftDeletes;

  protected $fillable = [
      'staff_id',
      'age',
      'job',
  ];

  public function staff()
    {
        return $this->belongsTo('App\Staffs')->withTrashed();;
    }
}
