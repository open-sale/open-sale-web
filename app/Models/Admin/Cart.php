<?php

namespace App\Models\Admin;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use ModelHelper;

    public const PAID = 1;
    public const UNPAID = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'is_paid',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function scopeUnpaid($query)
    {
        return $query->where('is_paid', self::UNPAID);
    }

    public function scopePaid($query)
    {
        return $query->where('is_paid', self::PAID);
    }
}
