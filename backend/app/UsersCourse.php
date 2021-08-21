<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersCourse extends Model
{
    protected $primaryKey = ['user_id', 'course_id'];

    protected $fillable = [
        'user_id',
        'course_id',
    ];
    public $incrementing = false;

    public function course(){
        return $this->hasOne('App\Course', 'id', 'course_id');
    }
}
