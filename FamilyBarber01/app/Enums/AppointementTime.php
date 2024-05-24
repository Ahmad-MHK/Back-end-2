<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AppointmentTime: string implements HasLabel {
    case Created = 'created';
    case Confirmed = 'confirmed';
    case Canceled = 'canceled';

    public function getLabel(): ?string
    {
        return match($this) {
            self::Created => 'Created',
            self::Confirmed => 'Confirmed',
            self::Canceled => 'Canceled',
        };
    }

}
