<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shop_id',
        'last_name',
        'first_name',
        'last_name_kana',
        'first_name_kana',
        'email',
        'memo',
    ];

    public static function findByID($staff_id) {
        return self::query()
                ->where('id', $staff_id)
                ->first();
    }
}
