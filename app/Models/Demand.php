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
        return Attribute::make(
            get: function ($value) {
                if ($value) {
                    get: fn () => asset('demands/'.$this->attributes['image']);

                }
                // If the value doesn't exist or is empty, return something else or null
                return null; // Or any other default value you want to return
            }
        );
    }
    public static function countActiveDemands()
    {
        return self::where('active', true);
    }
}
