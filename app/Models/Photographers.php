<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotographerS extends Model
{
    use HasFactory;

    protected $table = 'photographers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialty',
        'price_per_hour',
        'is_available',
        'bio',
        'profile_image',
    ];
}
