<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurteamResource\Pages;
use App\Filament\Resources\OurteamResource\RelationManagers;
use App\Models\Ourteam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;

class OurteamResource extends Resource
{
    protected static ?string $model = Ourteam::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->required(),
                TextInput::make('full-name')
                    ->required(),
                TextInput::make('speciality'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                Tables\Columns\TextColumn::make('full-name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('speciality')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (Ourteam $record) {
                        Storage::delete('public/' . $record->avatar);
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOurteams::route('/'),
            'create' => Pages\CreateOurteam::route('/create'),
            'edit' => Pages\EditOurteam::route('/{record}/edit'),
        ];
    }
}
