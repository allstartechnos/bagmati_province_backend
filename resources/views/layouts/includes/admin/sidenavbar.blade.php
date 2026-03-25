<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        @if (isset($setting->logo))
            <a href="{{ route('frontend.index') }}" class="header-logo">
                <img src="{{ asset('logo.png') }}" alt="logo" class="desktop-logo">
                <img src="{{ asset('logo.png') }}" alt="logo" class="toggle-dark">
                <img src="{{ asset('images/setting/' . $setting->logo) }}" alt="logo" class="desktop-dark">
                <img src="{{ asset('images/setting/' . $setting->logo) }}" alt="logo" class="toggle-logo">
                <img src="{{ asset('images/setting/' . $setting->logo) }}" alt="logo" class="toggle-white">
                <img src="{{ asset('images/setting/' . $setting->logo) }}" alt="logo" class="desktop-white">
            </a>
        @endif
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">


                <li class="slide">
                    <a href="{{ route('admin.index') }}" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                        </svg>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="#" class="side-menu__item">
                        <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span class="side-menu__label">Home</span>
                    </a>
                    <ul class="slide-menu child1">

                        <li class="slide">
                            <a href="{{ route('admin.slider.index') }}" class="side-menu__item">Slider </a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.notice.index') }}" class="side-menu__item">Notices </a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.message.index') }}" class="side-menu__item">Messages</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.client.index') }}" class="side-menu__item">Former President</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.document.index') }}" class="side-menu__item">News & Events</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="#" class="side-menu__item">
                        <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75">
                            </path>
                        </svg>
                        <span class="side-menu__label">About Us</span>
                    </a>
                    <ul class="slide-menu child1">

                        <li class="slide">
                            <a href="{{ route('admin.about.index') }}" class="side-menu__item">About </a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.team.index') }}" class="side-menu__item">Our Team</a>
                        </li>


                    </ul>
                </li>
                <!-- End::slide -->



                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('admin.contact.index') }}" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                        </svg>
                        <span class="side-menu__label">Contact Us</span>
                    </a>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Category & Page</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('admin.information.index') }}" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                        </svg>
                        <span class="side-menu__label">Videos</span>
                    </a>
                </li>
                <!-- End::slide -->


                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="#" class="side-menu__item">
                        <i class="ri-arrow-down-s-line side-menu__angle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span class="side-menu__label">Albums</span>
                    </a>
                    <ul class="slide-menu child1">

                        <li class="slide">
                            <a href="{{ route('admin.category.index') }}" class="side-menu__item"> Album </a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.page.index') }}" class="side-menu__item">Photo </a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->



            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
