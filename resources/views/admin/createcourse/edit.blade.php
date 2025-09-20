@extends('layouts.master')
@section('title', 'Rename Page')
@section('showSidebar', true)
@section('content')
<section class="spacing">
    <div class="container">
        <div class="form-container">
            <div class="form-card">
                <div class="form-header">
                    <h1 class="form-title">Rename Page</h1>
                    <p class="form-subtitle">You are renaming: <strong>{{ $page->name }}</strong></p>
                </div>
                <form class="post-form" method="POST" action="{{ route('admin.course-page.update', $page->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <input type="text" name="new_name" id="new_name" class="form-input" placeholder=" "
                            value="{{ old('new_name', $page->name) }}" required>
                        <input type="hidden" name="id" value="{{ $page->id }}">
                        <label for="new_name" class="form-label">New Page Name</label>
                        @error('new_name')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Category -->
                    <div class="form-group">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-input" required>
                            <option value=""></option>
                            @php
                            $categories = ['Multi-Style YTTC', 'Kundalini YTTC', 'Specialized YTTC', 'Retreat',
                            'Other'];
                            @endphp
                            @foreach ($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category', $page->category) == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                            @endforeach
                        </select>

                        @error('category')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="form-button">Rename</button>
                </form>
                <div class="login-footer">
                    &copy; {{ date('Y') }} Admin Panel. All rights reserved.
                </div>
            </div>
        </div>

    </div>
</section>
@endsection