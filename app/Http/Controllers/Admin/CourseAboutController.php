<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CourseAbout;
use App\Models\CoursePage;

class CourseAboutController extends Controller
{
    public function index() {
    $aboutDetails = CourseAbout::with('coursePage')->get();
    return view('admin.coursedetail.about.index', compact('aboutDetails'));
}
 public function create() {
        // Get all course pages to populate the dropdown
        $coursePages = CoursePage::all();

        return view('admin.coursedetail.about.add-about', compact('coursePages'));
    }
public function store(Request $request)
{
    // ✅ Validate the request data
    $validated = $request->validate([
        'course_page_id' => 'required|exists:courses_pages,id',
        'title'          => 'required|string|max:255',
        'heading'        => 'required|string|max:255',
        'image_1'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'image_1_alt'    => 'nullable|string|max:255',
        'image_2'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'image_2_alt'    => 'nullable|string|max:255',
        'content_top'    => 'nullable|string',
        'content_bottom' => 'nullable|string',
    ]);

    // ✅ Handle file uploads
    if ($request->hasFile('image_1')) {
        $validated['image_1'] = $request->file('image_1')->store('course_about_images', 'public');
    }

    if ($request->hasFile('image_2')) {
        $validated['image_2'] = $request->file('image_2')->store('course_about_images', 'public');
    }

    // ✅ Save to database
    CourseAbout::create($validated);

    return redirect()->route('admin.course-about.index')->with('success', 'Course About details added successfully!');
}
 public function edit($id)
    {
        $courseAbout = CourseAbout::findOrFail($id);
        $coursePages = CoursePage::all(); // for the dropdown

        return view('admin.coursedetail.about.update-about', compact('courseAbout', 'coursePages'));
    }

    // Handle the update request
    public function update(Request $request, $id)
    {
        $courseAbout = CourseAbout::findOrFail($id);

        // Validation rules
        $request->validate([
            'course_page_id' => 'required|exists:courses_pages,id',
            'title'          => 'required|string|max:255',
            'heading'        => 'required|string|max:255',
            'image_1'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_1_alt'    => 'nullable|string|max:255',
            'image_2'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_2_alt'    => 'nullable|string|max:255',
            'content_top'    => 'nullable|string',
            'content_bottom' => 'nullable|string',
        ]);

        // Update fields
        $courseAbout->course_page_id = $request->course_page_id;
        $courseAbout->title = $request->title;
        $courseAbout->heading = $request->heading;
        $courseAbout->image_1_alt = $request->image_1_alt;
        $courseAbout->image_2_alt = $request->image_2_alt;
        $courseAbout->content_top = $request->content_top;
        $courseAbout->content_bottom = $request->content_bottom;

        // Handle image 1 upload
        if ($request->hasFile('image_1')) {
            // Delete old image if exists
            if ($courseAbout->image_1) {
                Storage::disk('public')->delete($courseAbout->image_1);
            }

            $path1 = $request->file('image_1')->store('course_about_images', 'public');
            $courseAbout->image_1 = $path1;
        }

        // Handle image 2 upload
        if ($request->hasFile('image_2')) {
            // Delete old image if exists
            if ($courseAbout->image_2) {
                Storage::disk('public')->delete($courseAbout->image_2);
            }

            $path2 = $request->file('image_2')->store('course_about_images', 'public');
            $courseAbout->image_2 = $path2;
        }

        $courseAbout->save();

        return redirect()->route('admin.course-about.index', $courseAbout->id)
                         ->with('success', 'Course About details updated successfully.');
    }

    public function destroy($id)
{
    $courseAbout = CourseAbout::findOrFail($id);

    // Delete uploaded images if they exist
    if ($courseAbout->image_1 && Storage::disk('public')->exists($courseAbout->image_1)) {
        Storage::disk('public')->delete($courseAbout->image_1);
    }

    if ($courseAbout->image_2 && Storage::disk('public')->exists($courseAbout->image_2)) {
        Storage::disk('public')->delete($courseAbout->image_2);
    }

    $courseAbout->delete();

    return redirect()->route('admin.course-about.index')->with('success', 'Course About entry deleted successfully.');
}
}