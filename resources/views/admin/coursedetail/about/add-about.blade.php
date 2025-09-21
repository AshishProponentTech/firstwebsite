@extends('layouts.master')
@section('title', 'Add Course About Details')
@section('showSidebar', true)
@section('content')
<section class="spacing">
    <div class="container">

        <div class="form-container about">
            <div class="form-card">
                <div class="form-header">
                    <h1 class="form-title">Add Course About Details</h1>
                    <p class="form-subtitle">Fill in all the details below</p>
                </div>

                <form action="{{ route('admin.course-about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Success Message --}}
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
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

                    <!-- Course Page + Title -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="course_page_id">Select Course Page</label>
                            <select id="course_page_id" name="course_page_id" class="form-select" required>
                                <option value="">-- Select Course Page --</option>
                                @foreach($coursePages as $page)
                                <option value="{{ $page->id }}"
                                    {{ old('course_page_id') == $page->id ? 'selected' : '' }}>
                                    {{ $page->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('course_page_id')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Heading -->
                    <div class="form-row">
                        <div class="flex-1 floating-label-group">
                            <input type="text" id="title" name="title" class="floating-input" placeholder=" "
                                value="{{ old('title') }}" required>
                            <label class="floating-label" for="title">Title</label>
                            @error('title')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 floating-label-group">
                            <input type="text" id="heading" name="heading" class="floating-input" placeholder=" "
                                value="{{ old('heading') }}" required>
                            <label class="floating-label" for="heading">Heading</label>
                            @error('heading')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Image Uploads (Side by Side) -->
                    <div class="form-row">
                        <!-- Image 1 -->
                        <div class="flex-1 upload-box">
                            <label class="form-label">Image 1</label>
                            <div class="upload-dropzone" id="dropzone1"
                                onclick="document.getElementById('image_1').click()">
                                <input type="file" id="image_1" name="image_1" accept="image/*"
                                    onchange="previewImage(event, 'preview1')" hidden>
                                <div class="upload-content">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>Drop your image here, or <span class="browse">browse</span></p>
                                    <small>Supports PNG, JPG, JPEG, WEBP</small>
                                </div>
                                <img id="preview1" class="upload-preview" />
                            </div>

                            <div class="floating-label-group">
                                <input type="text" id="image_1_alt" name="image_1_alt" class="floating-input"
                                    placeholder=" " value="{{ old('image_1_alt') }}">
                                <label class="floating-label" for="image_1_alt">Image 1 Alt Text</label>
                                @error('image_1_alt')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image 2 -->
                        <div class="flex-1 upload-box">
                            <label class="form-label">Image 2</label>
                            <div class="upload-dropzone" id="dropzone2"
                                onclick="document.getElementById('image_2').click()">
                                <input type="file" id="image_2" name="image_2" accept="image/*"
                                    onchange="previewImage(event, 'preview2')" hidden>
                                <div class="upload-content">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>Drop your image here, or <span class="browse">browse</span></p>
                                    <small>Supports PNG, JPG, JPEG, WEBP</small>
                                </div>
                                <img id="preview2" class="upload-preview" />
                            </div>

                            <div class="floating-label-group">
                                <input type="text" id="image_2_alt" name="image_2_alt" class="floating-input"
                                    placeholder=" " value="{{ old('image_2_alt') }}">
                                <label class="floating-label" for="image_2_alt">Image 2 Alt Text</label>
                                @error('image_2_alt')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Content Top -->
                    <div class="form-group">
                        <label class="form-label" for="content_top">Content Top</label>
                        <textarea id="content_top" name="content_top" class="form-input rich-text-editor"
                            rows="6">{{ old('content_top') }}</textarea>
                        @error('content_top')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Content Bottom -->
                    <div class="form-group">
                        <label class="form-label" for="content_bottom">Content Bottom</label>
                        <textarea id="content_bottom" name="content_bottom" class="form-input rich-text-editor"
                            rows="6">{{ old('content_bottom') }}</textarea>
                        @error('content_bottom')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="form-button">Add About Details</button>
                    </div>
                </form>

                <div class="login-footer">
                    &copy; {{ date('Y') }} Admin Panel. All rights reserved.
                </div>
            </div>
        </div>

    </div>
</section>

{{-- FontAwesome for upload icon --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

{{-- Image Preview --}}
<script>
function previewImage(event, previewId) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById(previewId).src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
</script>

{{-- TinyMCE --}}
<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
<script>
tinymce.init({
    selector: '.rich-text-editor',
    plugins: 'lists link image table code',
    toolbar: 'undo redo | bold italic underline | bullist numlist | link image | code',
    menubar: false,
    height: 300
});
</script>
@endsection