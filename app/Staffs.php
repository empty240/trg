<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staffs extends Model
{
  use SoftDeletes;

  protected $fillable = [
      'factory_id',
      'code',
      'full_name',
  ];
  protected $appends = ['idname'];

  public function getIdnameAttribute()
  {
      if(!isset($this->id) || !isset($this->full_name)){
        return null;
      }
      return $this->id . " " . $this->full_name;
  }

  public function factory()
    {
        return $this->belongsTo('App\Factories')->withTrashed();
    }
  public function profile()
    {
        return $this->hasOne('App\Profiles', 'staff_id')->withTrashed();
    }
}
