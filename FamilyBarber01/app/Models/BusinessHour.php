<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    use HasFactory;

    public function getTimesPeriodAttribute()
{
    // Ensure `from` and `to` are Carbon instances
    $from = Carbon::createFromFormat('H:i', $this->from);
    $to = Carbon::createFromFormat('H:i', $this->to);

    // Generate times based on the interval
    $times = CarbonInterval::minutes($this->step)->toPeriod($from, $to)->toArray();

    // Filter and format the times with date, time, and past attributes
    return array_map(function ($time) {
        $isPast = $this->day == today()->format('l') && $time->isPast();
        $isOlder = $time->toDateString() < today()->toDateString(); // Check if the date is older than today

        // If either it's past for today or the date is older than today, mark as past
        $past = $isPast || $isOlder;

        return [
            'date' => $time->toDateString(),
            'time' => $time->format('H:i'),
            'past' => $past
        ];
    }, $times);
}

}
