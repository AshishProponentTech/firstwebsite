<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseAbout;
use Illuminate\Support\Facades\Storage;

class CoursePage extends Model
{
    use HasFactory;

    protected $table = 'courses_pages';

    protected $fillable = ['name', 'slug', 'category'];

    public function about()
    {
        return $this->hasOne(CourseAbout::class, 'course_page_id');
    }

    protected static function booted()
    {
        static::deleting(function ($coursePage) {
            // Check if the related CourseAbout exists
            if ($coursePage->about) {
                // Delete images if they exist
                if ($coursePage->about->image_1 && Storage::disk('public')->exists($coursePage->about->image_1)) {
                    Storage::disk('public')->delete($coursePage->about->image_1);
                }

                if ($coursePage->about->image_2 && Storage::disk('public')->exists($coursePage->about->image_2)) {
                    Storage::disk('public')->delete($coursePage->about->image_2);
                }

                // Delete the CourseAbout record itself
                $coursePage->about->delete();
            }
        });
    }
}
