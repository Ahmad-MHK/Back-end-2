<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\AppointmentStatus;


class Appointment extends Model
{
    use HasFactory;

        protected $casts = [
            'date' => 'date',
            'start' => 'datetime:H:i', // Ensuring correct time format
            'status' => AppointmentStatus::class,
        ];


    public function customer(): BelongsTo
    {
        return $this->belongsTo(customer::class);
    }

    public function ourteam(): BelongsTo
    {
        return $this->belongsTo(Ourteam::class);
    }
}
