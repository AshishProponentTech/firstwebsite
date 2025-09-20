<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel Site')</title>
    {{-- Include CSS --}}
    @include('includes.css')
</head>
<body>
    {{-- Include Header --}}
    @include('includes.header')

    @if(View::hasSection('showSidebar'))
        <div class="dashboard-layout">
            @include('includes.sidebar')

            <main>
                @yield('content')
            </main>
        </div>
    @else
        <main>
            @yield('content')
        </main>
    @endif

    {{-- Include Footer --}}
    @include('includes.footer')

    {{-- Include JS --}}
    @include('includes.js')
</body>

</html>
