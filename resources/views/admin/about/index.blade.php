@extends('layouts.admin')

@section('title')
    {{ $panel ?? '' }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <div class="d-flex justity-content-between">
                        <h6 class="card-title">{{ $panel ?? '' }} (Post) </h6>
                        <span class="ms-auto"></span>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add-board"><i
                                class="ri-add-circle-line  ms-auto text-success" title="Add Post"
                                style="font-size: 32px;"></i></a>

                    </div>
                    @include('admin.about.table')



                </div>
                {{-- //View Post Details --}}
                <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <span>View Details</span>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                        class="fa fa-close"></i></button>

                            </div>
                            <div class="modal-body render_about_show">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card custom-card overflow-hidden border px-2">

                <form action="{{ route($base_route . 'store') }}" method="POST" enctype="multipart/form-data"
                    class="row g-3 main_form">
                    @csrf
                    <input type="hidden" name="type" value="page">

                    <div class="card-body">

                        <h6 class="card-title">{!! isset($data['about']) ? '<i class="ri-edit-2-fill"></i>' : '<i class="ri-add-large-fill"></i>' !!}
                            {{ isset($data['about']) ? 'Update' : 'Create' }}
                            {{ $panel ?? '' }}(Page)</h6>
                        <hr />

                        <ul class="nav nav-tabs tab-style-6 mb-3 p-0" id="myTab" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link w-100 text-start active" id="edit-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#edit-profile-tab-pane" type="button" role="tab"
                                    aria-controls="edit-profile-tab-pane" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link w-100 text-start" id="social-media" data-bs-toggle="tab"
                                    data-bs-target="#social-media-pane" type="button" role="tab"
                                    aria-controls="social-media-pane" aria-selected="false">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link w-100 text-start" id="banner" data-bs-toggle="tab"
                                    data-bs-target="#banner-pane" type="button" role="tab" aria-controls="banner-pane"
                                    aria-selected="false">Banner</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link w-100 text-start" id="reset-password" data-bs-toggle="tab"
                                    data-bs-target="#reset-password-pane" type="button" role="tab"
                                    aria-controls="reset-password-pane" aria-selected="false">SEO</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="profile-tabs">

                            <div class="tab-pane p-0 border-0 active" id="edit-profile-tab-pane" role="tabpanel"
                                aria-labelledby="edit-profile-tab" tabindex="0">
                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="title"
                                            value="{{ isset($data['about']->title) ? $data['about']->title : old('title') }}"
                                            class="form-control" id="title" placeholder="Title">


                                        <label for="floatingName">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="sub_title"
                                            value="{{ isset($data['about']->sub_title) ? $data['about']->sub_title : old('sub_title') }}"
                                            class="form-control" placeholder="Subtitle">

                                        <label for="floatingUser">Subtitle</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 image">
                                    <label for="formFile3" class="form-label">Image</label>
                                    <div class="form-group">
                                        <div class="image dropify-wrapper">
                                            @if (!empty($data['about']->image))
                                                <img src="{{ asset($img_path . $data['about']->image) }}" alt=""
                                                    class="previewImage" width="100%">
                                            @else
                                                <img src="{{ asset('no_image.jpg') }}" alt=""
                                                    class="previewImage" width="100%">
                                            @endif
                                        </div>
                                        <input name="image" class="form-control file-input custom-file-input mt-3"
                                            type="file" id="formFile3" width="100%">

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane p-0 border-0 py-3" id="social-media-pane" role="tabpanel"
                                aria-labelledby="social-media-pane" tabindex="0">
                                <textarea name="description" class="form-control summernote" id="editor3">{{ isset($data['about']->description) ? $data['about']->description : old('description') }}</textarea>
                            </div>

                            <div class="tab-pane p-0 border-0" id="banner-pane" role="tabpanel"
                                aria-labelledby="banner-tab" tabindex="0">
                                <div class="col-md-12 mb-3 image">
                                    <label for="formFile3" class="form-label">Banner</label>
                                    <div class="form-group">
                                        <div class="image dropify-wrapper">
                                            @if (!empty($data['about']->banner))
                                                <img src="{{ asset($img_path . $data['about']->banner) }}" alt=""
                                                    class="previewImage" width="30%">
                                            @else
                                                <img src="{{ asset('no_image.jpg') }}" alt=""
                                                    class="previewImage" width="30%">
                                            @endif
                                        </div>
                                        <input name="banner" class="form-control file-input custom-file-input mt-3"
                                            type="file" id="formFile2" width="100px">

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane p-0 border-0" id="reset-password-pane" role="tabpanel"
                                aria-labelledby="reset-password-tab" tabindex="0">
                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="seo_title"
                                            value="{{ isset($data['about']) ? $data['about']->seo_title : '' }}"
                                            class="form-control" id="floatingName" placeholder="Seo Title">

                                        <label for="floatingName">Seo Title</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="seo_keyword"
                                            value="{{ isset($data['about']) ? $data['about']->seo_keyword : '' }}"
                                            class="form-control" placeholder="Seo Keyword">

                                        <label for="floatingUser">Seo Keyword</label>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <textarea name="seo_description" value="" class="form-control" placeholder="Seo Description">{{ isset($data['about']) ? $data['about']->seo_description : '' }}</textarea>

                                        <label for="floatingUser">Seo Description</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" data-button="page"
                                class="formButton  btn btn-{{ isset($data['about']) ? 'danger' : 'primary' }} text-center mx-auto btn-w-md d-flex align-items-center justify-content-center btn-wave waves-light text-nowrap waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#create-folder">
                                {!! isset($data['about']) ? '<i class="ri-edit-2-fill p-1"></i>' : '<i class="ri-add-large-fill p-1"></i>' !!}
                                {{ isset($data['about']) ? 'Update' : 'Create' }}

                            </button>
                        </div>


                    </div>
            </div>
            </form>
        </div>

        <!-- Start::Edit Post modal -->
        <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit {{ $panel ?? '' }}</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body render_about_edit">

                    </div>
                </div>

            </div>
        </div>

        <!-- Start::Add Post modal -->
        <div class="modal fade" id="add-board" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Add {{ $panel ?? '' }}</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route($base_route . 'store') }}" method="POST" class="row g-3 main_form"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="post">

                            <!--For Multiple Images Step 1-->
                            <div class="other_image">
                            </div>
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="form-floating">
                                        <select name="parent_id" class="form-control about_category_id"
                                            id="floatingName">
                                            <option value="">Select Category</option>
                                            @foreach ($data['categories'] as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>

                                        <label for="floatingName">Category</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="title" class="form-control title" value=""
                                            id="floatingName" placeholder="Title" required>
                                        <label for="floatingName">Title</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="d-flex justify-content-between align-items-center image dropify-wrapper">
                                        <label for="" class="form-label me-2 "> Image</label>
                                        <input name="image" class="form-control my-2 me-2 file-input custom-file-input"
                                            type="file" id="formFile3">
                                        <img src="{{ asset('no_image.jpg') }}" width="20%"
                                            class="img-thumbnail previewImage">
                                    </div>
                                </div>

                                <div class="col-md-5 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="sub_title" class="form-control sub_title"
                                            value="" id="floatingName" placeholder="sub title">
                                        <label for="floatingName">Sub title</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3 design-wrapper">
                                    <div class="form-floating">
                                        <select name="design" class="form-control design" id="floatingName">
                                            <option value="">Select Design</option>
                                            <option value="grid">GRID</option>
                                            <option value="long">LONG</option>
                                        </select>

                                        <label for="floatingName">Design</label>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-floating">
                                        <input type="number" name="rank" class="form-control rank" value=""
                                            id="floatingName" placeholder="Rank">
                                        <label for="floatingName">Rank</label>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <textarea name="description" class="form-control summernote" id="editor2" placeholder="Description"></textarea>
                                        {{-- <label for="floatingName">Description</label> --}}
                                    </div>
                                </div>

                                <div class="text-center d-flex justify-content-around py-3">
                                    <button type="submit" data-button="post"
                                        class="formButton btn btn-primary text-center mx-auto btn-w-md d-flex align-items-center justify-content-center btn-wave waves-light text-nowrap waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target="#create-folder">
                                        <i class="ri-add-large-fill p-1"></i>
                                        Create

                                    </button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                        </form><!-- End floating Labels Form -->


                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            //Status
            $(document).on('click', '.status_show_hide', function() {
                let id = $(this).attr('data-id')

                $.ajax({
                    url: "{{ route('admin.aboutcategory.status') }}",
                    data: {
                        id: id
                    },
                    success: function(resp) {
                        successAlert(resp.success_message);
                        // location.reload();
                        // window.location.href = res.url;
                    },
                    error: function(err) {
                        errorAlert('error');
                    }
                })
            });

            //Show
            $(document).on('click', '.view-about', function() {
                let id = $(this).data('id');

                // let url = "{{ route('admin.about.show', ':id') }}"; 
                // url = url.replace(':id', id);
                let url = "{{ url('/admin/abouts') }}/" + id;

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(resp) {
                        $('.render_about_show').html(resp);
                    },
                    error: function(xhr) {
                        errorAlert(xhr.responseJSON?.message || 'Something went wrong');
                    }
                });
            });

            //Edit

            $(document).on('click', '.edit-about', function() {
                let id = $(this).data('id');

                let url = "{{ route('admin.abouts.edit', ':id') }}";
                url = url.replace(':id', id);
                // let url = "{{ url('/admin/about') }}/" + id;

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(resp) {
                        $('.render_about_edit').html(resp);
                        initializeCkEditor();
                        // $('#edit').modal('show');
                    },
                    error: function(xhr) {
                        errorAlert(xhr.responseJSON?.message || 'Something went wrong');
                    }
                });
            });


        });



        $(document).ready(function() {

            $(document).on('change', '.about_category_id', function() {
                let parentId = $(this).val();

                if (parentId) {
                    $(this).closest('form').find('.design-wrapper').hide();
                } else {
                    $(this).closest('form').find('.design-wrapper').show();
                }
            });


        });

        
        function updateData(res) {
            $('#table_rows').html(res.html);
        }

    </script>
@endpush
