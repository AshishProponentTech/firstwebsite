@extends('layouts.master') {{-- Or whatever layout you use --}}

@section('title', 'Welcome')

@section('content')
<div class="container">
    <h1>Welcome to the Homepage</h1>
    <p>This is a public page. No login required.</p>
</div>
@endsection
