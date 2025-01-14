<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Student;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StudentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StudentResource\RelationManagers;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nis')->type('number')->placeholder('0000')->extraAttributes(['maxlength' => 4])->required()->unique(ignorable: fn ($record) => $record),
                        TextInput::make('name')->placeholder('Your Name')->required(),
                        Textarea::make('addres')->placeholder('Your Addres')->rows(3)->required(),
                        Select::make('gender')->options([
                            'Man' => 'Man',
                            'Woman' => 'Woman'
                        ]),
                        Select::make('religion')->options([
                            'Christianity' => 'Christianity',
                            'Catholicism' => 'Catholicism',
                            'Hinduism' => 'Hinduism',
                            'Islam' => 'Islam',
                            'Buddhism' => 'Buddhism',
                            'Confucianism' => 'Confucianism'
                        ]),
                        Select::make('major')->options([
                            'Software Engineering' => 'Software Engineering',
                            'Multimedia' => 'Multimedia',
                            'Computer Network Engineering' => 'Computer Network Engineering',
                            'Tourism Services Business' => 'Tourism Services Business',
                            'Culinary' => 'Culinary',
                            'Hospitality' => 'Hospitality'
                        ])
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nis')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('addres')->sortable()->searchable(),
                TextColumn::make('gender')->sortable()->searchable(),
                TextColumn::make('religion')->sortable()->searchable(),
                TextColumn::make('major')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
