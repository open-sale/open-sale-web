<?php

namespace App\Traits;

trait ModelHelper
{
    public static function getTableName()
    {
        return (new self())->getTable();
    }
}
