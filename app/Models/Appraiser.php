<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appraiser extends Model
{
    use HasFactory;

    protected $table = 'appraisers';

    protected $fillable = [
        'id',
        'biography',
        'slug',
        'name',
        'avatar',
        'titles',
    ];
}
