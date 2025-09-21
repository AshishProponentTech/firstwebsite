<div class="breadcrumb-section">
    <div class="container">
        <div class="bread-wrapper">
            <span class="common-heading">{{ $page->name }}</span>
            <ul class="bread-list">
                <li><span class="icon home"></span><a href="{{ url('/') }}">Home</a></li>
                <li><span class="icon arrow"></span></li>
                <li>{{ $page->name }}</li>
            </ul>
        </div>
    </div>
</div>