<?php

namespace App\Observers;

use App\Models\Widget;
use App\Models\GeneratedCode;

class WidgetObserver
{
    /**
     * Handle the Widget "created" event.
     */
    public function created(Widget $widget): void
    {
        $companyReference = $widget->company->reference;
        $baseURL = 'https://aminemach.github.io/widget_laravel/resources';// Change to your actual base URL
        $widgetColor = $widget->widget_color ?? '#f9f9f9';
        $headerColor = $widget->header_color ?? '#007bff';
        $buttonColor = $widget->button_color ?? '#007bff';

        $embedCode = <<<EOD
        <script>
            (function(d, t) {
                var BASE_URL = '{$baseURL}';
                var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
                g.src = BASE_URL + "/js/currencyWidget.js"; // Link to your widgetConvert.js
                s.parentNode.insertBefore(g, s);
                console.log("widgetSDK:", window.widgetSDK);
                g.onload = function() {
                    window.widgetSDK.run({
                        companyRef: '{$companyReference}',
                        baseUrl: BASE_URL,
                        widgetColor: '{$widgetColor}',
                        headerColor: '{$headerColor}',
                        buttonColor: '{$buttonColor}'
                    });
                }
            })(document, "script");
        </script>
        EOD;

        GeneratedCode::create([
            'widget_id' => $widget->id,
            'embed_code' => $embedCode,
        ]);
    }

    /**
     * Handle the Widget "updated" event.
     */
    public function updated(Widget $widget): void
    {
        //
    }

    /**
     * Handle the Widget "deleted" event.
     */
    public function deleted(Widget $widget): void
    {
        //
    }

    /**
     * Handle the Widget "restored" event.
     */
    public function restored(Widget $widget): void
    {
        //
    }

    /**
     * Handle the Widget "force deleted" event.
     */
    public function forceDeleted(Widget $widget): void
    {
        //
    }
}
