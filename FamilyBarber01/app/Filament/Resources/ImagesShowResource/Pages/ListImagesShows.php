<?php

namespace App\Filament\Resources\ImagesShowResource\Pages;

use App\Filament\Resources\ImagesShowResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImagesShows extends ListRecords
{
    protected static string $resource = ImagesShowResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
