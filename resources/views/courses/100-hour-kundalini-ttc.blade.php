@extends('layouts.master')

@section('title', '100 hour kundalini ttc')

@section('content')
 {{-- Includes Breadcrumb --}}
    @include('includes.breadcrumb', ['page' => $page])
    {{--Includes About Course --}}
    @include('includes.coursedetails.about', ['page' => $page])
<section class="spacing">
    <div class="container">
        <h1>100 hour kundalini ttc</h1>
        <p>Welcome to the 100 hour kundalini ttc course page!</p>
    </div>
</section>
@endsection