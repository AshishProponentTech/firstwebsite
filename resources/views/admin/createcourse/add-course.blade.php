@extends('layouts.master')
@section('title', 'Welcome')
@section('showSidebar', true)
@section('content')
<section class="spacing">
    <div class="container">

        <div class="form-container">
            <div class="form-card">
                <div class="form-header">
                    <h1 class="form-title">Create Course Blade Page</h1>
                    <p class="form-subtitle">Fill in the details below to create a page</p>
                </div>
                {{-- Success Message --}}
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                {{-- Validation Errors --}}
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Add Course Page Name --}}
                <form class="post-form" action="{{ route('admin.add-course.store') }}" method="POST">
                    @csrf
                    {{-- Course Name --}}
                    <div class="form-group">
                        <input type="text" id="title" name="name" class="form-input" placeholder=" " required>
                        <label class="form-label" for="title">Course Page Name</label>
                        <div class="error-message">Enter Your Page Name to create blade</div>
                    </div>

                    {{-- Course Category --}}
                    <div class="form-group">
                        <label class="form-label" for="category">Select Category</label>
                        <select id="category" name="category" class="form-input" required>
                            <option value=""></option>
                            <option value="Multi-Style YTTC">Multi-Style YTTC</option>
                            <option value="Kundalini YTTC">Kundalini YTTC</option>
                            <option value="Specialized YTTC">Specialized YTTC</option>
                            <option value="Retreat">Retreat</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('category')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="form-button">Create Page</button>
                </form>

                <div class="login-footer">
                    &copy; {{ date('Y') }} Admin Panel. All rights reserved.
                </div>
            </div>
        </div>

    </div>
</section>
@endsection