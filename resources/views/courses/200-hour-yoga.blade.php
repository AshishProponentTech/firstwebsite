@extends('layouts.master')

@section('title', '200 hour yoga')

@section('content')
 {{-- Includes Breadcrumb --}}
    @include('includes.breadcrumb', ['page' => $page])
    {{--Includes About Course --}}
    @include('includes.coursedetails.about', ['page' => $page])
<section class="spacing">
    <div class="container">
        <h1>200 hour yoga</h1>
        <p>Welcome to the 200 hour yoga course page!</p>
    </div>
</section>
@endsection