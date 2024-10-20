<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedCode extends Model
{
    use HasFactory;

    protected $fillable = ['widget_id', 'embed_code'];

    public function widget()
    {
        return $this->belongsTo(Widget::class);
    }
}
