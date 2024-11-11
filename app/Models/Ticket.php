<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'passanger_name',
        'passanger_phone',
        'seat_number', 
        'is_boarding',
        'boarding_time',  
        'flight_id',      
    ];

    public function flight(): BelongsTo{
        return $this->belongsTo(Flight::class);
    }

    public function passangerCount(): int {
        return $this->tickets()->count();
    }
}
