<?php

namespace App\Filament\Pages;

use App\Models\GeneratedCode;
use Filament\Pages\Page;
use Illuminate\Http\Request;

class DisplayEmbedCode extends Page
{
    protected static string $view = 'filament.pages.display-embed-code';

    public GeneratedCode $generatedCode;


    public function mount(Request $request) // Inject the Request object
    {
        $widgetId = $request->query('widgetId'); // Get widgetId from the query parameter

        // Check if widgetId is provided
        if (!$widgetId) {
            abort(404); // Handle the case where widgetId is not provided
        }

        // Retrieve the generated code using the provided widgetId
        $this->generatedCode = GeneratedCode::where('widget_id', $widgetId)->firstOrFail();
    }
}
