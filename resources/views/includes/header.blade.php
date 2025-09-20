<header>
    <a class="logo-wrap" href="{{ url('/') }}">
        <img src="{{ asset('image/logo.png') }}" alt="Bali Yogalaya" title="Bali Yogalaya">
    </a>
    <div class="header-inner">
        <div class="top-header">
            <div class="contact-detail">
                <a href="tel:+91-1234567890" title="Call Bali Yogalaya Now"><span
                        class="icon phone"></span>+91-1234567890</a>
                <a href="mailto:info@baliyogalaya.com" title="Email Bali Yogalaya Now"><span
                        class="icon email"></span>info@baliyogalaya.com</a>
            </div>

            <div class="right-box">
                <button class="host-btn" data-bs-toggle="modal">
                    <span class="host-btn-inner">
                        <span class="upper-text">Get 15% Off Today !</span>
                        <span class="lower-text">Don’t Miss This Offer</span>
                    </span>
                    <span class="btn-imgwrap">
                        <img src="{{ asset('image/icons/host-retreat.svg') }}" alt="course enroll">
                        <img src="{{ asset('image/icons/host-retreats.svg') }}" alt="course enroll btn">
                    </span>
                </button>
            </div>
        </div>
        <nav>
            <ul class="main-nav">
                <li><a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li class="has-dropdown">
                    <span
                        class="nav-link {{ request()->is('about*') || request()->is('food-and-accommodation') || request()->is('our-teachers') || request()->is('our-spiritual-gurus') || request()->is('frequently-asked-questions') || request()->is('gallery') ? 'active' : '' }}">About</span>
                    <ul class="dropdown">
                        <li><a href="{{ url('about') }}"
                                class="drop-link {{ request()->is('about') ? 'active' : '' }}">About Bali Yogalaya</a>
                        </li>
                        <li><a href="{{ url('food-and-accommodation') }}"
                                class="drop-link {{ request()->is('food-and-accommodation') ? 'active' : '' }}">Food And
                                Accommodation</a></li>
                        <li><a href="{{ url('our-teachers') }}"
                                class="drop-link {{ request()->is('our-teachers') ? 'active' : '' }}">Our Teachers</a>
                        </li>
                        <li><a href="{{ url('our-spiritual-gurus') }}"
                                class="drop-link {{ request()->is('our-spiritual-gurus') ? 'active' : '' }}">Our
                                Spiritual Gurus</a></li>
                        <li><a href="{{ url('frequently-asked-questions') }}"
                                class="drop-link {{ request()->is('frequently-asked-questions') ? 'active' : '' }}">FAQs</a>
                        </li>
                        <li><a href="{{ url('gallery') }}"
                                class="drop-link {{ request()->is('gallery') ? 'active' : '' }}">Our Gallery</a></li>
                    </ul>
                </li>
                <li class="has-dropdown">
                    <span
                        class="nav-link 
        {{ collect($courses)->pluck('slug')->map(fn($slug) => request()->is($slug.'*'))->contains(true) ? 'active' : '' }}">
                        Yoga Course
                    </span>
                    <ul class="dropdown">
                        @foreach ($courses as $course)
                        <li>
                            <a href="{{ url($course->slug) }}"
                                class="drop-link {{ request()->is($course->slug.'*') ? 'active' : '' }}">
                                {{ $course->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="has-dropdown">
                    <span
                        class="nav-link {{ request()->is('yoga-retreat*') || request()->is('ayurveda-retreat*') ? 'active' : '' }}">Retreat</span>
                    <ul class="dropdown">
                        <li><a href="{{ url('yoga-retreat-in-bali') }}"
                                class="drop-link {{ request()->is('yoga-retreat*') ? 'active' : '' }}">Yoga Retreat</a>
                        </li>
                        <li><a href="{{ url('ayurveda-retreat-in-bali') }}"
                                class="drop-link {{ request()->is('ayurveda-retreat*') ? 'active' : '' }}">Ayurveda
                                Retreat</a></li>
                    </ul>
                </li>

                <li><a href="{{ url('blog') }}" class="nav-link {{ request()->is('blog') ? 'active' : '' }}">Blog</a>
                </li>
                <li><a href="{{ url('contact') }}"
                        class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
                <li><a href="{{ url('payment') }}" class="nav-link {{ request()->is('payment') ? 'active' : '' }}">Pay
                        Online</a></li>
            </ul>
        </nav>
    </div>

    <div class="toggle-wrap">
        <span class="toggle"><img src="{{ asset('image/icons/hamburger.svg') }}" alt="hamburger"></span>
    </div>
</header>