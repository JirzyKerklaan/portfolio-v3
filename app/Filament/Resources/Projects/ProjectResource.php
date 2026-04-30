<?php

namespace App\Filament\Resources\Projects;

use App\Enums\ProjectRoleEnum;
use App\Filament\Resources\Projects\Pages\ManageProjects;
use App\Models\Project;
use App\Models\Tool;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Support\Colors\Color;

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
                                    TextInput::make('short_description')
                                        ->label('Sector')
                                        ->required(),
                                    Select::make('role')
                                        ->label('My role')
                                        ->options(ProjectRoleEnum::class)
                                        ->required(),
                                    Grid::make(1)->schema([
                                        Flex::make([
                                            FileUpload::make('cover_img')
                                                ->label('Cover image')
                                                ->image()
                                                ->preserveFilenames()
                                                ->disk('images')
                                                ->directory('projects')
                                                ->required(),
                                            FileUpload::make('mockup_img')
                                                ->label('Mockup image')
                                                ->image()
                                                ->preserveFilenames()
                                                ->disk('images')
                                                ->directory('projects')
                                                ->required(),
                                        ]),
                                        RichEditor::make('description')
                                            ->label('Description')
                                            ->required(),
                                        RichEditor::make('overview')
                                            ->label('Overview text')
                                            ->required(),
                                        RichEditor::make('outcome')
                                            ->label('Outcome text')
                                            ->required(),
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
                                    Select::make('tools')
                                        ->label('Languages & Frameworks')
                                        ->multiple()
                                        ->relationship('tools', 'tool')
                                        ->options(Tool::all()->pluck('tool', 'id')),
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
            ->defaultSort('year', 'desc')
            ->columns([
                TextColumn::make('year')
                    ->date('m / Y')
                    ->label('Year')
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('role')
                    ->label('Role')
                    ->badge()
                    ->sortable()
                    ->searchable(),
                IconColumn::make('archived')
                    ->alignCenter()
                    ->boolean()
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make()
                    ->hiddenLabel()
                    ->slideOver(),
                DeleteAction::make()
                    ->hiddenLabel(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageProjects::route('/'),
        ];
    }
}
