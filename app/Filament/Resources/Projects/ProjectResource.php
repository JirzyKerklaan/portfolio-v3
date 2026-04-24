<?php

namespace App\Filament\Resources\Projects;

use App\Filament\Resources\Projects\Pages\ManageProjects;
use App\Models\Project;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Project information')->schema([
                            Grid::make(3)->schema([
                                Grid::make()->schema([
                                    TextInput::make('title')
                                        ->label('Project')
                                        ->required(),
                                    TextInput::make('client')
                                        ->label('Client')
                                        ->required(),
                                    TextInput::make('description')
                                        ->label('Sector')
                                        ->required(),
                                    TextInput::make('role')
                                        ->label('My role')
                                        ->required(),
                                    Grid::make(1)->schema([
                                        FileUpload::make('image_url')
                                            ->label('Image')
                                            ->image()
                                            ->preserveFilenames()
                                            ->disk('images')
                                            ->directory('projects')
                                            ->required(),
                                        RichEditor::make('long_text')
                                            ->label('Content')
                                            ->required()
                                    ])->columnSpanFull()
                                ])->columnSpan(2),

                                Grid::make(1)->schema([
                                    TextInput::make('slug')
                                        ->required(),
                                    TextInput::make('url')
                                        ->url()
                                        ->required(),
                                    DatePicker::make('year')
                                        ->required(),
                                    ColorPicker::make('color')
                                        ->required(),
                                    Toggle::make('archived')
                                        ->required(),
                                ]),
                            ]),
                        ]),
                        Tabs\Tab::make('SEO')->schema([
                            TextInput::make('seo_title')
                                ->label('SEO Title'),
                            Textarea::make('seo_description')
                                ->label('SEO Description')
                                ->rows(4),
                        ])
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('client')
                    ->searchable(),
                TextColumn::make('role')
                    ->searchable(),
                IconColumn::make('archived')
                    ->boolean(),
            ])
            ->recordActions([
                EditAction::make()
                    ->slideOver(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageProjects::route('/'),
        ];
    }
}
