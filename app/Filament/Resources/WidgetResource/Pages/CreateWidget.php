<?php

namespace App\Filament\Resources\WidgetResource\Pages;

use App\Filament\Resources\WidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\GeneratedCode;
use Illuminate\Support\Facades\Log;

class CreateWidget extends CreateRecord
{
    protected static string $resource = WidgetResource::class;

    protected function getRedirectUrl(): string
    {
        // Retrieve the generated code after the widget is created
        $generatedCode = GeneratedCode::where('widget_id', $this->record->id)->first();

        // Check if the generated code exists and return the appropriate URL
        if ($generatedCode) {
            return route('filament.pages.display-embed-code', [
                'widgetId' => $generatedCode->widget_id,
            ]);
        }

        // Default redirect to the index page if no generated code found
        return $this->getResource()::getUrl('index');
    }
}
