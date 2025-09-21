<section class="course-about-section spacing">
    <div class="container">
        <div class="heading-wrapper">
            <span class="title">{{ $page->name }}</span>
            <h2 class="common-heading">{{ $page->about->heading ?? 'Please add heading' }}</h2>
        </div>
        <div class="row g-4">
            <div class="col-xl-6">
                <div class="special-img-wrap">
                    @if($page->about && $page->about->image_1)
                    <img src="{{ asset('storage/' . $page->about->image_1) }}"
                        alt="{{ $page->about->image_1_alt ?? $page->name }}">
                    @endif

                    @if($page->about && $page->about->image_2)
                    <img src="{{ asset('storage/' . $page->about->image_2) }}"
                        alt="{{ $page->about->image_2_alt ?? $page->name }}">
                    @endif
                </div>
            </div>
            <div class="col-xl-6">
                <div class="course-content-wrap">
                    @if($page->about)
                    {!! $page->about->content_top !!}
                    @else
                    <p>No course description available.</p>
                    @endif
                </div>
            </div>

            <div class="col-lg-12">
                <div class="common-content-wrap p-0">
                    @if($page->about)
                    {!! $page->about->content_bottom !!}
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>