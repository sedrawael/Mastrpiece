<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'event_type', 'date', 'time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // الإضافات الجديدة
    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i'
    ];

    public function getFullEventAttribute()
    {
        return $this->event_type . ' on ' . $this->date->format('M d, Y') . ' at ' . $this->time;
    }

    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now()->toDateString())
                    ->orderBy('date')
                    ->orderBy('time');
    }

    public function scopePast($query)
    {
        return $query->where('date', '<', now()->toDateString())
                    ->orderByDesc('date')
                    ->orderByDesc('time');
    }
}