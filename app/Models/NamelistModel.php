<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NamelistModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['fullname','passport_no','dob','doe','status','ref'];
}
