<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ModelHelper;

    /**
     * This path is inside public/uploads/ folder.
     */
    public const IMAGE_PATH = 'products/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        'price',
        'size',
        'colors',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['category_id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'colors' => 'array',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'image_path',
        'category',
    ];

    public function getImagePathAttribute()
    {
        return uploads_path(self::IMAGE_PATH . $this->image);
    }

    public function getCategoryAttribute()
    {
        return is_null($this->category()->first()) ? '' : $this->category()->first()->name;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
