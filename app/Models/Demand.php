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
    protected $fillable = ['name', 'salary', 'country', 'number_of_people_needed', 'active', 'image', 'description'];

    public function image(): Attribute
    {
        $publicPath = env('STORAGE_URL') ? '/public/' : '';

        return Attribute::make(
            get: fn () => asset($publicPath. 'storage/'.$this->attributes['image']),
        );
    }
    public static function countActiveDemands()
    {
        return self::where('active', true);
    }
}
