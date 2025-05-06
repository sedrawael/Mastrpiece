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

    // الإضافات الجديدة
    protected $casts = [
        'is_available' => 'boolean',
        'price_per_hour' => 'float'
    ];

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function scopeBySpecialty($query, $specialty)
    {
        return $query->where('specialty', $specialty);
    }

    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price_per_hour, 2) . '/hour';
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}