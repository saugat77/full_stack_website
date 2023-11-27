<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeImage extends Model
{
    use HasFactory;
    public $fillable = ['pp_size_image'];
    public function getPpSizeImageUrlAttribute(): Attribute // Renamed the method
    {
        return Attribute::make([
            'get' => fn ($value) => asset(Storage::url($value)),
        ]);
    }


}
