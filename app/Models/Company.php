<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'reference',
        'icon',
        'description', // If you're using description
    ];

    /**
     * Get the widgets for the company.
     */
    public function widgets(): HasMany
    {
        return $this->hasMany(Widget::class);
    }
}
