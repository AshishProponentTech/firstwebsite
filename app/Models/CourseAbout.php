<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\CoursePage;

class CourseAbout extends Model
{
    // Allow mass assignment on these fields
    protected $fillable = [
        'course_page_id',
        'title',
        'heading',
        'image_1',
        'image_1_alt',
        'image_2',
        'image_2_alt',
        'content_top',
        'content_bottom',
    ];

    // Define relationship: CourseAbout belongs to CoursePage
    public function coursePage()
    {
        return $this->belongsTo(CoursePage::class);
    }
}
