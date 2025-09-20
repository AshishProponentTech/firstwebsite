<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'category'];

    protected $table = 'courses_pages';
}
