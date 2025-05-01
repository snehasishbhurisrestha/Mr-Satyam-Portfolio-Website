<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class GraphicDesign extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'graphic_designs_id',
        'description',
        'is_visible'
    ];

    public function parent()
    {
        return $this->belongsTo(GraphicDesign::class, 'graphic_designs_id');
    }

    public function children()
    {
        return $this->hasMany(GraphicDesign::class, 'graphic_designs_id');
    }
}
