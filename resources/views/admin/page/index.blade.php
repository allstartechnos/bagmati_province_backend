@extends('layouts.admin')

@section('title')
    {{ $panel ?? '' }}
@endsection

@push('css')
    <style>
        .nav.nav-style-4 .nav-link.active {
            background-color: rgb(32, 237, 59);
            rgb(32, 237, 59) color: var(--default-text-color);
            border: 0;

        }

        table.dataTable,
        table.dataTable th,
        table.dataTable td {
            border: none !important;
        }

        div.dt-container .dt-search input {
            border: 1px solid #aaa;
            border-radius: 10px;
            padding: 5px;
            background-color: transparent;
            color: inherit;
            margin-left: 3px;
        }

        div.dt-container .dt-input {
            border: 1px solid #aaa;
            border-radius: 10px;
            margin-right: 10px;
            padding: 5px;
            background-color: transparent;
            color: inherit;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        {{ $panel ?? '' }}
                    </div>
                    <div class="ml-auto">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add-board"><i
                                class="ri-add-circle-line  ms-auto text-success" title="Add Post"
                                style="font-size: 26px;"></i></a>
                    </div>
                </div>
                <div class="card-body">


                    <div class="row">
                        {{-- <div class="col-xl-3 p-3">

                            <ul class="nav nav-pills flex-column py-5- nav-style-4" role="tablist">

                                @forelse ($data['categories'] as $category)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                            role="tab" aria-current="page" href="#{{ $category->slug }}"
                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div> --}}
                        <div class="col-xl-12">

                            <div class="card recent-sales overflow-auto">

                                <div class="table-responsive">
                                    <table id="myTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">#</th>
                                                <th style="width: 20%">Category</th>
                                                <th style="width: 20%">Title</th>
                                                <th style="width: 20%">Sub Title</th>
                                                <th style="width: 10%">Image</th>
                                                <th style="width: 10%">status</th>
                                                <th style="width: 15%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_rows">
                                            @include('admin.page.table')
                                        </tbody>
                                    </table>
                                    {{-- //View Details --}}
                                </div>

                                {{-- //View Post Details --}}
                                <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <span>View Details</span>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="fa fa-close"></i></button>

                                            </div>
                                            <div class="modal-body render_page_show">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- <div class="col-lg-5">
            <div class="card custom-card overflow-hidden border px-2">

                <form action="{{ route($base_route . 'store') }}" method="POST" enctype="multipart/form-data"
                    class="row g-3 main_form">
                    @csrf
                    <input type="hidden" name="type" value="page"> 
                    <div class="card-body">

                        <h6 class="card-title">{!! isset($data['page']) ? '<i class="ri-edit-2-fill"></i>' : '<i class="ri-add-large-fill"></i>' !!}
                            {{ isset($data['page']) ? 'Update' : 'Create' }}
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
                                            value="{{ isset($data['page']->title) ? $data['page']->title : old('title') }}"
                                            class="form-control" id="title" placeholder="Title">


                                        <label for="floatingName">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="sub_title"
                                            value="{{ isset($data['page']->sub_title) ? $data['page']->sub_title : old('sub_title') }}"
                                            class="form-control" placeholder="Subtitle">

                                        <label for="floatingUser">Subtitle</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 image">
                                    <label for="formFile3" class="form-label">Image</label>
                                    <div class="form-group">
                                        <div class="image dropify-wrapper">
                                            @if (!empty($data['page']->image))
                                                <img src="{{ asset($img_path . $data['page']->image) }}" alt=""
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
                                <textarea name="description" class="form-control summernote" id="editor3">{{ isset($data['page']->description) ? $data['page']->description : old('description') }}</textarea>
                            </div>

                            <div class="tab-pane p-0 border-0" id="banner-pane" role="tabpanel"
                                aria-labelledby="banner-tab" tabindex="0">
                                <div class="col-md-12 mb-3 image">
                                    <label for="formFile3" class="form-label">Banner</label>
                                    <div class="form-group">
                                        <div class="image dropify-wrapper">
                                            @if (!empty($data['page']->banner))
                                                <img src="{{ asset($img_path . $data['page']->banner) }}" alt=""
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
                                            value="{{ isset($data['page']) ? $data['page']->seo_title : '' }}"
                                            class="form-control" id="floatingName" placeholder="Seo Title">

                                        <label for="floatingName">Seo Title</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="seo_keyword"
                                            value="{{ isset($data['page']) ? $data['page']->seo_keyword : '' }}"
                                            class="form-control" placeholder="Seo Keyword">

                                        <label for="floatingUser">Seo Keyword</label>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <textarea name="seo_description" value="" class="form-control" placeholder="Seo Description">{{ isset($data['page']) ? $data['page']->seo_description : '' }}</textarea>

                                        <label for="floatingUser">Seo Description</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="btn btn-{{ isset($data['page']) ? 'danger' : 'primary' }} text-center mx-auto btn-w-md d-flex align-items-center justify-content-center btn-wave waves-light text-nowrap waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#create-folder">
                                {!! isset($data['page']) ? '<i class="ri-edit-2-fill p-1"></i>' : '<i class="ri-add-large-fill p-1"></i>' !!}
                                {{ isset($data['page']) ? 'Update' : 'Create' }}

                            </button>
                        </div>


                    </div>
            </div>
            </form>
        </div> --}}


        <!-- Start::Edit Post modal -->
        <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit {{ $panel ?? '' }}</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body render_page_edit">

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

                                <div class="col-xl-12 mb-3">
                                    {{-- <label for="product-category-add" class="form-label">Category</label> --}}
                                    <select name="parent_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @forelse ($data['categories'] as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="title" class="form-control title" value=""
                                            id="floatingName" placeholder="Title">
                                        <label for="floatingName">Name</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="d-flex justify-content-between align-items-center image dropify-wrapper">
                                        <label for="" class="form-label me-2 "> Image</label>
                                        <input name="image" class="form-control my-2 me-2 file-input custom-file-input"
                                            type="file" id="formFile3">
                                        <img src="{{ asset('no_image.jpg') }}" width="20%"
                                            class="img-thumbnail previewImage">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="sub_title" class="form-control sub_title"
                                            value="" id="floatingName" placeholder="sub title">
                                        <label for="floatingName">Sub title</label>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <textarea name="description" class="form-control summernote" id="editor2" placeholder="Description"
                                            rows="5" style="height: 120px"></textarea>
                                        {{-- <label for="floatingName">Description</label> --}}
                                    </div>
                                </div>

                                <div class="text-center d-flex justify-content-around py-3">
                                    <button type="submit"
                                        class="btn btn-primary text-center mx-auto btn-w-md d-flex align-items-center justify-content-center btn-wave waves-light text-nowrap waves-effect waves-light"
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
                    url: "{{ route('admin.page.status') }}",
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
            $(document).on('click', '.view-page', function() {
                let id = $(this).data('id');

                // let url = "{{ route('admin.page.show', ':id') }}"; 
                // url = url.replace(':id', id);
                let url = "{{ url('/admin/page') }}/" + id;

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(resp) {
                        $('.render_page_show').html(resp);
                    },
                    error: function(xhr) {
                        errorAlert(xhr.responseJSON?.message || 'Something went wrong');
                    }
                });
            });

            //Edit

            $(document).on('click', '.edit-page', function() {
                let id = $(this).data('id');

                let url = "{{ route('admin.page.edit', ':id') }}";
                url = url.replace(':id', id);
                // let url = "{{ url('/admin/page') }}/" + id;

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(resp) {
                        $('.render_page_edit').html(resp);
                        initializeCkEditor();
                        // $('#edit').modal('show');
                    },
                    error: function(xhr) {
                        errorAlert(xhr.responseJSON?.message || 'Something went wrong');
                    }
                });
            });


        });

        function updateData(res) {
            $('#table_rows').html(res.html);
        }
    </script>
@endpush
