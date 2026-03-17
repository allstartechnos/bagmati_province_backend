<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

@include('layouts.includes.admin.header')
<div class="error-page">
    <div class="container">
        <div class="my-auto">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-xl-7 col-lg-5 col-md-6 col-12">
                    <p class="error-text mb-4">403</p>
                    <p class="fs-4 fw-normal mb-2">You do not have permission to access for this page.</p>
                    <a href="{{ route('frontend.index') }}" class="btn btn-primary"><i
                            class="ri-arrow-left-line align-middle me-1 d-inline-block"></i> BACK TO HOME PAGE</a>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
