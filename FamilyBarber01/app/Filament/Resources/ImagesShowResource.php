<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImagesShowResource\Pages;
use App\Filament\Resources\ImagesShowResource\RelationManagers;
use App\Models\ImagesShow;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;

class ImagesShowResource extends Resource
{
    protected static ?string $model = ImagesShow::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                FileUpload::make('image')
                ->image()
                ->imageEditor()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                ->circular(),
                TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make()
                //     ->before(function (ImagesShow $record) {
                //         Storage::delete('public/' . $record->avatar);
                //     })
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
            'index' => Pages\ListImagesShows::route('/'),
            'create' => Pages\CreateImagesShow::route('/create'),
            'edit' => Pages\EditImagesShow::route('/{record}/edit'),
        ];
    }
}
