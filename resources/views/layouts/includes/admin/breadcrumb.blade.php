 <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
     <div>
         <nav>
             <ol class="breadcrumb mb-1">
                 @if (isset($base_route))
                     @if (Route::has($base_route . 'index'))
                         <li class="breadcrumb-item">
                             <a href="{{ route('admin.index') }}">
                                 Dashboard
                             </a>
                         </li>
                         <li class="breadcrumb-item active" aria-current="page"><a
                                 href="{{ route($base_route . 'index') }}">{{ $panel ?? '' }}</a></li>
                         <li class="breadcrumb-item " aria-current="page">{{ $page ?? '' }}</li>
                     @endif
                 @endif
             </ol>
         </nav>
         <h1 class="page-title fw-medium fs-18 mb-0 pt-2">{{ $panel ?? '' }}</h1>
     </div>
     {{-- <div class="btn-list">
         <button class="btn btn-white btn-wave">
             <i class="ri-filter-3-line align-middle me-1 lh-1"></i> Filter
         </button>
         <button class="btn btn-primary btn-wave me-0">
             <i class="ri-share-forward-line me-1"></i> Share
         </button>
     </div> --}}
 </div>
