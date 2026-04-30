<?php

namespace App\Filament\Resources\RightNowItems;

use App\Filament\Resources\RightNowItems\Pages\ManageRightNowItems;
use App\Models\RightNowItem;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RightNowItemsResource extends Resource
{
    protected static ?string $model = RightNowItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'text';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('category')
                    ->required()
                    ->maxLength(255),

                TextInput::make('text')
                    ->required()
                    ->maxLength(255),

                TextInput::make('subtext')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('text')
            ->columns([
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('text')
                    ->searchable(),
                TextColumn::make('subtext')
            ])
            ->recordActions([
                EditAction::make()
                    ->slideOver(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageRightNowItems::route('/'),
        ];
    }
}
