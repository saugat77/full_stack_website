<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeModel extends Model
{
    use HasFactory;
    public $fillable = ['full_name','father_name','ward','district','dob','passport_number','issued_at','expiry_date','worked_as','years_of_experience','worked_at','pp_size_image'];
}
