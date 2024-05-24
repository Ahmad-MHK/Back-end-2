<?php

namespace App\Filament\Resources\OurteamResource\Pages;

use App\Filament\Resources\OurteamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurteams extends ListRecords
{
    protected static string $resource = OurteamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
