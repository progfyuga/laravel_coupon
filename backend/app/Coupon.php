<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Coupon extends Model
{
    use Sortable;
    public $sortable = ['id'];
}
