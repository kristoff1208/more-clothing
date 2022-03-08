<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'postcode',
        'city',
        'block',
    ];

    public static function findByID($shop_id) {
        return self::query()
                ->where('id', $shop_id)
                ->first();
    }
}
