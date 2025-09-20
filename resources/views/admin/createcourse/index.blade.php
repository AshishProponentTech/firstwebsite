@extends('layouts.master')
@section('title', 'Course Pages')
@section('showSidebar', true)
@section('content')
<section class="spacing">
    <div class="container">
        <h2>Course Pages</h2>
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Page Name</th>
                        <th>Page Slug</th>
                        <th>Category</th> <!-- New column -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $index => $page)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $page->name }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>{{ $page->category }}</td> <!-- Show category -->
                        <td>
                            <a href="{{ url('/' . $page->slug) }}" class="btn btn-primary btn-sm"
                                target="_blank">View</a>
                            <a href="{{ route('admin.course-page.edit', $page->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.course-page.destroy', $page->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this page?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No course pages found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection