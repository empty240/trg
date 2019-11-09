<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkSchedules extends Model
{
  use SoftDeletes;
  protected $fillable = [
      'name'
  ];

  public function equipment()
    {
        return $this->belongsTo('App\Equipments')->withTrashed();
    }
}
