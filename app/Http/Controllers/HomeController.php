<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoursePage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function coursedetail($slug)
{
    $page = CoursePage::where('slug', $slug)->firstOrFail();
    $viewPath = "courses.{$page->slug}";

    if (!view()->exists($viewPath)) {
        abort(404, 'Course page not found.');
    }

    // Set pageName from the page heading
    $pageName = $page->heading;

    // Pass both variables using compact
    return view($viewPath, compact('page', 'pageName'));
}
}