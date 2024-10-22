<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WidgetResource\Pages;
use App\Models\Widget;
use App\Models\GeneratedCode; // Ensure this is imported
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Textarea; // Import Textarea
use Filament\Forms\Components\Wizard; // Import Wizard

class WidgetResource extends Resource
{
    protected static ?string $model = Widget::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Basic Info')
                        ->schema([
                            Select::make('company_id')
                                ->relationship('company', 'name')
                                ->required(),
                            Select::make('type')
                                ->options([
                                    'converter' => 'Currency Converter',
                                    'form' => 'Contact Form',
                                ])
                                ->required(),
                        ]),
                    Wizard\Step::make('Color Settings')
                        ->schema([
                            ColorPicker::make('widget_color')->label('Widget Background Color'),
                            ColorPicker::make('header_color')->label('Header Color'),
                            ColorPicker::make('button_color')->label('Button Color'),
                        ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')->label('Company'),
                Tables\Columns\TextColumn::make('type')->label('Widget Type'),
                // Optionally, add other relevant columns
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWidgets::route('/'),
            'create' => Pages\CreateWidget::route('/create'),
            'edit' => Pages\EditWidget::route('/{record}/edit'),
        ];
    }
}
