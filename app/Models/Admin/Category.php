<?php

namespace App\Models\Admin;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use ModelHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
