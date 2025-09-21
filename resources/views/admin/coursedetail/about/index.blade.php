@extends('layouts.master')

@section('title', 'Course About Details')

@section('showSidebar', true)

@section('content')
<section class="spacing">
    <div class="container">
        <div class="d-flex align-center justify-content-between w-100"><h2>Course About Details</h2>
        <a href="{{ route('admin.course-about.create') }}" class="btn btn-success mb-3">Add New About Detail</a></div>
        <div class="table-wrapper">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Page</th>
                        <th>Title</th>
                        <th>Heading</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aboutDetails as $index => $about)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $about->coursePage->name ?? 'N/A' }}</td>
                        <td>{{ $about->title }}</td>
                        <td>{{ $about->heading }}</td>
                        <td>
                            @if($about->image_1)
                                <img src="{{ asset('storage/' . $about->image_1) }}" alt="{{ $about->image_1_alt }}" style="max-width: 100px; max-height: 60px;">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($about->image_2)
                                <img src="{{ asset('storage/' . $about->image_2) }}" alt="{{ $about->image_2_alt }}" style="max-width: 100px; max-height: 60px;">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.course-about.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.course-about.destroy', $about->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this about detail?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No course about details found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
