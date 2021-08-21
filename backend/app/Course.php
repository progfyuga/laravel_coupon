<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Course extends Model
{
    use sortable;

    protected $fillable = [
        'course',
        'class_id',
        'class_name',
    ];
}
