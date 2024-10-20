<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Widget extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',     // Foreign key for the company
        'type',           // Type of widget (e.g., converter, form)
        'widget_color',   // Color for the widget background
        'header_color',   // Color for the widget header
        'button_color',   // Color for the button in the widget
        'embed_code',     // Generated embed code for the widget
    ];

    /**
     * Get the company that owns the widget.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
