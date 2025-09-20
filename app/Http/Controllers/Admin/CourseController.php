<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\CoursePage;

class CourseController extends Controller
{
    public function create()
    {
        return view('admin.createcourse.add-course');
    }
     // Store course in DB + create Blade file
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:90'
        ]);

        $name = $request->name;
        $slug = Str::slug($name);

        // Check if course already exists in DB
        if (CoursePage::where('slug', $slug)->exists()) {
            return back()->withErrors(['name' => 'This course already exists!']);
        }

        // Save to DB
        $course = CoursePage::create([
            'name' => $name,
            'slug' => $slug,
            'category' => $request->category,
        ]);

        // Create Blade file
        $filePath = resource_path("views/courses/{$slug}.blade.php");

        if (!File::exists(resource_path('views/courses'))) {
            File::makeDirectory(resource_path('views/courses'), 0755, true);
        }

        $stubPath = resource_path('stubs/course-page.stub');
        $content = File::get($stubPath);

        $content = str_replace(
            ['{{ title }}', '{{ heading }}'],
            [$name, $name],
            $content
        );

        File::put($filePath, $content);
        return redirect()->route('admin.course-pages.index')
                     ->with('success', "Course '{$name}' created successfully!");
    }
    // view all created pages
    public function index()
    {
    $pages = CoursePage::orderBy('created_at', 'desc')->get();
    return view('admin.createcourse.index', compact('pages'));
 }

 public function edit(CoursePage $page)
{
    // Show form to rename the page
    return view('admin.createcourse.edit', compact('page'));
}

    /**
     * Rename a course page (Blade file).
     * Expects 'new_name' in $request.
     */
     // Update course DB + rename Blade file

public function update(Request $request)
{
    $request->validate([
        'new_name' => 'required|string|max:90',
        'category' => 'required|string|in:Multi-Style YTTC,Kundalini YTTC,Specialized YTTC,Retreat,Other',
        'id' => 'required|exists:courses_pages,id'
    ]);

    // Retrieve the course by ID
    $course = CoursePage::findOrFail($request->input('id'));

    $newName = $request->input('new_name');
    $newSlug = Str::slug($newName);
    $newCategory = $request->input('category');

    // Check if new slug already exists for a different course
    if (CoursePage::where('slug', $newSlug)->where('id', '!=', $course->id)->exists()) {
        return back()->withErrors(['new_name' => 'Course name already exists!']);
    }

    // Rename Blade file
    $oldPath = resource_path("views/courses/{$course->slug}.blade.php");
    $newPath = resource_path("views/courses/{$newSlug}.blade.php");

    if (File::exists($oldPath)) {
        File::move($oldPath, $newPath);

        // Update content inside the Blade file
        $content = File::get($newPath);
        $content = str_replace($course->name, $newName, $content);
        File::put($newPath, $content);
    }

    // Update DB
    $course->update([
        'name' => $newName,
        'slug' => $newSlug,
        'category' => $newCategory,
    ]);

    return redirect()->route('admin.course-pages.index')
                     ->with('success', "Course '{$newName}' updated successfully!");
}
    
    public function destroy(CoursePage $page)
{
    // Delete the corresponding Blade file if it exists
    $filePath = resource_path("views/courses/{$page->slug}.blade.php");
    if (File::exists($filePath)) {
        File::delete($filePath);
    }

    // Delete the record from DB
    $page->delete();

    return back()->with('success', "Course '{$page->name}' deleted successfully!");
}

}

