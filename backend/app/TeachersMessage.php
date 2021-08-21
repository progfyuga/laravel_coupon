<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class TeachersMessage extends Model
{
    use Sortable;
    use SoftDeletes;
    public $sortable = ['id'];
}
