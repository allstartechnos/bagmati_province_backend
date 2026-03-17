<div class="row">
      <div class="col-md-6 col-lg-4 col-xl">
        <div class="card custom-card">
            <div class="card-body">
                <div class="">
                    <div class="d-flex justify-content-between mb-2">
                        <div class="p-2 border border-primary border-opacity-10 bg-primary rounded-pill">
                                <span class="avatar avatar-md avatar-rounded bg-primary svg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                                        viewBox="0 0 256 256">
                                        <path
                                            d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                    </div>
                    <p class="flex-fill text-muted fs-14 mb-0">News & Events</p>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-1">
                    <span
                        class="text-success badge bg-success-transparent rounded-pill d-flex align-items-center fs-11 me-0 ms-2 mb-0"><i
                            class="ri-arrow-left-up-line fs-11"></i></span>

                    <div class="d-flex justify-content-between mb-2">
                        <div class="p-2 border border-success border-opacity-10 bg-success-transparent rounded-pill">
                            <span class="avatar avatar-md avatar-rounded bg-success svg-white">
                                {{ $documents['documents']?->count() ?? 0 }}
                            </span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
     <div class="col-md-6 col-lg-4 col-xl">
        <div class="card custom-card">
            <div class="card-body">
                <div class="">
                    <div class="d-flex justify-content-between mb-2">
                        <div class="p-2 border border-primary border-opacity-10 bg-primary rounded-pill">
                                <span class="avatar avatar-md avatar-rounded bg-primary svg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                                        viewBox="0 0 256 256">
                                        <path
                                            d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                    </div>
                    <p class="flex-fill text-muted fs-14 mb-0">Albums</p>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-1">
                    <span
                        class="text-success badge bg-success-transparent rounded-pill d-flex align-items-center fs-11 me-0 ms-2 mb-0"><i
                            class="ri-arrow-left-up-line fs-11"></i></span>

                    <div class="d-flex justify-content-between mb-2">
                        <div class="p-2 border border-success border-opacity-10 bg-success-transparent rounded-pill">
                            <span class="avatar avatar-md avatar-rounded bg-success svg-white">
                                {{ $albums['categories']?->count() ?? 0 }}
                            </span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
       <div class="col-md-6 col-lg-4 col-xl">
        <div class="card custom-card">
            <div class="card-body">
                <div class="">
                    <div class="d-flex justify-content-between mb-2">
                        <div class="p-2 border border-primary border-opacity-10 bg-primary rounded-pill">
                                <span class="avatar avatar-md avatar-rounded bg-primary svg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                                        viewBox="0 0 256 256">
                                        <path
                                            d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                    </div>
                    <p class="flex-fill text-muted fs-14 mb-0">Former President</p>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-1">
                    <span
                        class="text-success badge bg-success-transparent rounded-pill d-flex align-items-center fs-11 me-0 ms-2 mb-0"><i
                            class="ri-arrow-left-up-line fs-11"></i></span>

                    <div class="d-flex justify-content-between mb-2">
                        <div class="p-2 border border-success border-opacity-10 bg-success-transparent rounded-pill">
                            <span class="avatar avatar-md avatar-rounded bg-success svg-white">
                                {{ $clients['clients']?->count() ?? 0 }}
                            </span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
