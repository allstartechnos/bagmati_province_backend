<form action="{{ route($base_route . 'update', $slider->id) }}" method="POST" enctype="multipart/form-data"
    class="main_form">
    @csrf
    @method('PUT')



    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-floating">
                <input type="text" name="title" class="form-control title" value="{{ $slider->title ?? '' }}"
                    id="floatingName" placeholder="Title">
                <label for="floatingName">Title</label>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="d-flex justify-content-between align-items-center image dropify-wrapper">
                <label for="" class="form-label me-2 "> Image</label>
                <input name="image" class="form-control my-2 me-2 file-input custom-file-input" type="file"
                    id="formFile3">
                @if ($slider->image)
                    <img src="{{ asset($img_path . $slider->image) }}" width="15%"
                        class="img-thumbnail previewImage">
                @else
                    <img src="{{ asset('no_image.jpg') }}" width="15%" class="img-thumbnail previewImage">
                @endif

            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <input type="number" name="sub_title" class="form-control sub_title"
                    value="{{ $slider->sub_title ?? '' }}" id="floatingName" placeholder="Sub Title">
                <label for="floatingName">Sub Title</label>
            </div>
        </div>



        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <textarea name="description" class="form-control summernote" id="editor" placeholder="Description">
                {{ $slider->description ?? '' }}
              </textarea>
                {{-- <label for="floatingName">Description</label> --}}
            </div>
        </div>

        <div class="text-center py-3">
            <button type="submit"
                class="btn btn-danger text-center mx-auto btn-w-md d-flex align-items-center justify-content-center btn-wave waves-light text-nowrap waves-effect waves-light"
                data-bs-toggle="modal" data-bs-target="#create-folder">
                <i class="ri-edit-2-fill p-1"></i>
                Update

            </button>
        </div>
</form><!-- End floating Labels Form -->
