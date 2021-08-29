<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Tag extends Model
{
    use Sortable;
    public $sortable = ['id'];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'name',
    ];
}
