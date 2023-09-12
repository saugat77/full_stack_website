<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Demand extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['name','salary','country','number_of_people_needed','active','image','description'];

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset(Storage::url($value)),
        );
    }
}
