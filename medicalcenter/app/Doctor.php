<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id', 'spec_id', 'biography', 'age', 'years_of_experience', 'picture'
  ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function specialty(){
      return $this->belongsTo('App\Specialty');
    }
}
