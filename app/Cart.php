<?php

namespace App;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use ModelHelper;

    public const PAID = 1;
    public const UNPAID = 0;
}
