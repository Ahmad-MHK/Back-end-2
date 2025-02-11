<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Select;
use App\Enums\AppointmentStatus;
use App\Enums\AppointmentTime;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Tabs\Tab;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Select::make('Ourteam_id')
                    ->relationship('Ourteam', 'fullname')
                    ->searchable()
                    ->preload(),
                    DatePicker::make('date')
                        ->native(false)
                        ->live()
                        ->seconds(false)
                        ->required(),
                    TimePicker::make('start')
                        ->required()
                        ->seconds(false)
                        ->displayFormat('h:i A')
                        ->minutesStep(10),
                    Select::make('customer_id')
                        ->relationship('customer', 'name')
                        ->searchable()
                        ->preload(),
                    TextInput::make('description'),
                    Select::make('status')
                        ->native(false)
                        ->required()
                        ->options(AppointmentStatus::class)
                        ->visibleOn(Pages\EditAppointment::class),
                ])
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
        // ->groups([
        //     Tables\Grouping\Group::make('date')
        //     ->collapsible(),
        // ])

        ->columns([
            Tables\Columns\ImageColumn::make('ourteam.ourteamimage')
                    ->circular(),
            TextColumn::make('ourteam.fullname')
                ->searchable()
                ->sortable(),
            TextColumn::make('customer.name')
                ->searchable()
                ->sortable(),
            TextColumn::make('date')
                ->date('M d Y')
                ->sortable(),
            TextColumn::make('start')
                ->sortable()
                ->time('h:i A')
                ,
            // TextColumn::make('end')
            //     ->time('h:i A')
            //     ->label('To')
            //     ->sortable(),
            TextColumn::make('status')
                ->badge()
                ->sortable()
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Confirm')
                ->action(function (Appointment $record) {
                    $record->status = AppointmentStatus::Confirmed;
                    $record->save();
                })
                ->visible(fn (Appointment $record) => $record->status == AppointmentStatus::Created)
                ->color('success')
                ->icon('heroicon-o-check'),
                Tables\Actions\Action::make('Cancel')
                ->action(function (Appointment $record) {
                    $record->status = AppointmentStatus::Canceled;
                    $record->save();
                })
                ->visible(fn (Appointment $record) => $record->status != AppointmentStatus::Canceled)
                ->color('danger')
                ->icon('heroicon-o-x-mark'),
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
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
