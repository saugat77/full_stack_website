<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;


class ResumeModel extends Model
{
    use HasFactory;
    public $fillable = [
        'full_name', 'father_name', 'ward', 'district', 'dob', 'passport_number', 'issued_at', 'expiry_date', 'worked_as',
        'years_of_experience', 'worked_at', 'pp_size_image', 'gender', 'weight', 'height', 'marital_status'
    ];
    public function ppSizeImage(): Attribute
    {
        return Attribute::make(
            get: fn () => asset('images/'.$this->attributes['pp_size_image']),
        );
    }
}
