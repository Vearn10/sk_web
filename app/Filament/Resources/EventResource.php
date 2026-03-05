<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DateTimePicker::make('event_date')
                    ->label('Event Date & Time')
                    ->required()
                    ->native(false)
                    // THIS SETS THE PICKER TO 12-HOUR FORMAT (AM/PM)
                    ->displayFormat('M d, Y h:i A')
                    ->minutesStep(15) // Optional: makes selecting time faster
                    ->seconds(false)
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'unique' => 'An event is already scheduled for this exact time.',
                    ]),

                Forms\Components\TextInput::make('location')
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->weight('bold'),

                Forms\Components\DateTimePicker::make('event_date')
                    ->label('Event Date & Time')
                    ->required()
                    ->native(false) // This ensures the custom calendar popup appears
                    ->displayFormat('M d, Y h:i A') // Sets the 12-hour display format
                    ->format('Y-m-d H:i:s') // Keeps the database storage standard
                    ->seconds(false)
                    ->minutesStep(1) // Allows you to select any minute
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'unique' => 'Conflict: An event is already scheduled for this time.',
                    ]),

                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
            ])
            ->defaultSort('event_date', 'asc')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}