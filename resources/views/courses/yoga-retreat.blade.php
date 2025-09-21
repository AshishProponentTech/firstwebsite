@extends('layouts.master')

@section('title', 'yoga retreat')

@section('content')
 {{-- Includes Breadcrumb --}}
    @include('includes.breadcrumb', ['page' => $page])
    {{--Includes About Course --}}
    @include('includes.coursedetails.about', ['page' => $page])
<section class="spacing">
    <div class="container">
        <h1>yoga retreat</h1>
        <p>Welcome to the yoga retreat course page!</p>
    </div>
</section>
@endsection