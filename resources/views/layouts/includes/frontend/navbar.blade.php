 <header id="nav-bar">
     <div class="copy-right py-1">
         <div class="container">
             <div class="row">
                 <div class="col-lg-9 col-md-6 col-sm-12">
                     <div class="left__side-header d-flex">
                         <a href="#" class="me-4 " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                             aria-expanded="false">
                             <div class="phone__class d-flex align-items-center">
                                 <div class="icon__holder">
                                     <i class="fa-solid fa-phone text-light"></i>
                                 </div>
                                 <div class="inquiry">
                                     <p class="mb-0 text-light" style="font-size: 13px; margin-left: 5px;"> For
                                         Inquiry
                                     </p>
                                 </div>
                             </div>
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">


                             <li><a class="dropdown-item text-dark" href="tel: {{ $setting->phone ?? '' }}">
                                     <i class="fab fa-viber"></i> {{ $setting->phone ?? '' }}</a></li>

                             <li><a class="dropdown-item text-dark" href="tel: {{ $setting->whatsapp ?? '' }}">
                                     <i class="fab fa-whatsapp"></i> {{ $setting->whatsapp ?? '' }}</a></li>



                         </ul>
                         <a href="#">
                             <div class="phone__class d-flex align-items-center">
                                 <div class="icon__holder">
                                     <i class="fa-solid fa-envelope text-light"></i>
                                 </div>
                                 <div class="inquiry">
                                     <p class="mb-0 text-light" style="font-size: 13px; margin-left: 5px;">
                                         {{ $setting->email ?? '' }}
                                     </p>
                                 </div>
                             </div>
                         </a>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 col-sm-12">
                     <div class="copy__right-text justify-content-center">
                         <span class="text-light">LIC.NO. {{ $setting->licence ?? '' }}</span>
                         <!-- <div class="footer-icons">
                                 <a href="" target="_blank" class="icons">
                                     <i class="fa-brands fa-facebook-f"></i>
                                 </a>
                                 <a href="" target="_blank" class="icons">
                                     <i class="fa-brands fa-twitter"></i>
                                 </a>

                                 <a href="" target="_blank" class="icons">
                                     <i class="fa-brands fa-linkedin-in"></i>
                                 </a>
                                 <a href="" target="_blank" class="icons">
                                     <i class="fa-brands fa-pinterest-p"></i>
                                 </a>
                             </div> -->
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <nav class="navbar">
         <div class="container">
             <div class="logo">
                 <a href="{{ route('frontend.index') }}">
                     @if (isset($setting->image))
                         <img src="{{ asset('images/setting/' . $setting->logo) }}" width="100%" height="100%"
                             alt="Logo">
                     @else
                         <img src="{{ asset('frontend/assets/images/logo.png') }}" width="100%" height="100%"
                             alt="Logo">
                     @endif
                 </a>
             </div>
             <div class="sitenavigation">
                 <span class="menu-icon">
                     <a href="#" class="menu example5"><span></span></a>
                     <div id="hamburger">
                         <span></span>
                         <span></span>
                         <span></span>
                     </div>
                 </span>
                 <ul>
                     <li class="nav-dropdown"><a href="{{ route('frontend.index') }}" class="navbar__links">Home </a>
                     </li>
                     <li class="nav-dropdown"><a href="#" class="navbar__links">About Us <i
                                 class="fa-solid fa-caret-down"></i></a>
                         <ul>
                             <li><a href="{{ route('frontend.about') }}" class="sub__links">About Us</a>
                             </li>
                             <li><a href="{{ route('frontend.message') }}" class="sub__links">Chairman
                                     Message</a></li>
                             <li><a href="{{ route('frontend.team') }}" class="sub__links">Team</a></li>
                             <li><a href="{{ route('frontend.information') }}" class="sub__links">Nepal Information</a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-dropdown"><a href="{{ route('frontend.destination') }}"
                             class="navbar__links">Destination </a>
                     </li>

                     <li class="nav-dropdown"><a href="#" class="navbar__links">Recruitment <i
                                 class="fa-solid fa-caret-down"></i></a>
                         <ul>
                             @foreach ($recruitments['recruitments'] as $recruitement)
                                 <li><a href="{{ route('frontend.recruitment', $recruitement->slug) }}"
                                         class="sub__links">{{ $recruitement->title }}</a>
                                 </li>
                             @endforeach
                         </ul>
                     </li>

                     <li class="nav-dropdown"><a href="{{ route('frontend.demand') }}" class="navbar__links">Job
                             Demands </a>
                     </li>
                     <li class="nav-dropdown"><a href="{{ route('frontend.client') }}" class="navbar__links">Client
                         </a>
                     </li>
                     <li class="nav-dropdown"><a href="{{ route('frontend.contact') }}"
                             class="navbar__links">Contact
                         </a>
                     </li>



                 </ul>
                 </li>


                 </ul>
             </div>


             <a class="btn btn-nav" href="{{ route('frontend.contact') }}"> <span> Contact Us</span>
             </a>
         </div>
         </div>
         <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
             aria-labelledby="offcanvasRightLabel">
             <div class="offcanvas-header">
                 <h5 id="offcanvasRightLabel">Free Counselling</h5>
                 <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                     aria-label="Close"></button>
             </div>
             {{-- <div class="offcanvas-body">
                 <div class="inquiry-form"> 
                     <form action="{{ route('frontend.contact_submit') }}" method="POST"
                         enctype="multipart/form-data" id="contactUSForm" class="main_form">
                         @csrf

                         <div class="row">
                             <div class="col-12 mb-3">
                                 <input type="text" name="name" value="{{ old('name') }}"
                                     class="form-control" id="input1" placeholder="Name">
                                 <span class="text-danger"> {{ $errors->first('name') }} </span>
                             </div>
                             <div class="col-6 mb-3">
                                 <input type="email" name="email" value="{{ old('email') }}"
                                     class="form-control" id="input2" placeholder="Email">
                                 <span class="text-danger"> {{ $errors->first('email') }} </span>
                             </div>
                             <div class="col-6 mb-3">
                                 <input type="text" name="phone" value="{{ old('phone') }}"
                                     class="form-control" id="input3" placeholder="Phone"
                                     aria-describedby="basic-addon2">
                                 <span class="text-danger"> {{ $errors->first('phone') }} </span>
                             </div>
                             <div class="col-12 mb-3">
                                 <input type="text" name="address" value="{{ old('address') }}"
                                     class="form-control" id="input5" placeholder="Address">
                                 <span class="text-danger">{{ $errors->first('address') }}</span>
                             </div>
                             <div class="col-12 mb-3">
                                 <textarea class="form-control" name="message" id="input4" rows="3" placeholder="Message">{{ old('message') }}</textarea>
                                 <span class="text-danger"> {{ $errors->first('message') }}
                                 </span>
                             </div>
                             <div>
                                 @if ($errors->has('g-recaptcha-response'))
                                     <div class="alert alert-success alert-dismissible fade show text-center"
                                         role="alert">
                                         <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                         <button type="button" class="btn-close" data-bs-dismiss="alert"
                                             aria-label="Close"></button>
                                     </div>
                                 @endif
                             </div>


                         </div>
                         <div class="text-center">
                             <button type="submit" class="btn btn-success px-5"><span>submit</span></button>
                             <button type="submit" class="btn btn-danger px-5"><span>Reset</span></button>
                         </div>
                     </form>
                 </div>
             </div> --}}
         </div>
     </nav>
 </header>
