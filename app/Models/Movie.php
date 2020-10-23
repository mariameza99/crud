<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
    	'title',
    	'description',
    	'classification',
    	'minutes',
    	'year',
    	'cover',
    	'trailer',
    	'category_id',
    ];
}
