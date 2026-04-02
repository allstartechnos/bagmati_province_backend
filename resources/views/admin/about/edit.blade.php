<form action="{{ route($base_route . 'update', $about->id) }}" method="POST" enctype="multipart/form-data"
    class="main_form">
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="form-floating">
                <select name="parent_id" class="form-control about_category_id" id="floatingName">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $about->parent_id == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>

                <label for="floatingName">Category</label>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-floating">
                <input type="text" name="title" class="form-control title" value="{{ $about->title ?? '' }}"
                    id="floatingName" placeholder="Title">
                <label for="floatingName">Name</label>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="d-flex justify-content-between align-items-center image dropify-wrapper">
                <label for="" class="form-label me-2 "> Image</label>
                <input name="image" class="form-control my-2 me-2 file-input custom-file-input" type="file"
                    id="formFile3">
                @if ($about->image)
                    <img src="{{ asset($img_path . $about->image) }}" width="20%" class="img-thumbnail previewImage">
                @else
                    <img src="{{ asset('no_image.jpg') }}" width="20%" class="img-thumbnail previewImage">
                @endif

            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-floating">
                <input type="text" name="sub_title" class="form-control sub_title"
                    value="{{ $about->sub_title ?? '' }}" id="floatingName" placeholder="sub title">
                <label for="floatingName">Subtitle</label>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-floating">
                <select name="design" class="form-control design" id="floatingName">
                    <option value="{{ $about->design }}">{{ ucfirst($about->design) }}</option>

                    @if ($about->parent_id == null)
                        <option value="">Please Select Design</option>
                        <option value="grid">GRID</option>
                        <option value="long">LONG</option>
                    @endif
                </select>

                <label for="floatingName">Design</label>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-floating">
                <input type="number" name="rank" class="form-control rank" value="{{ $about->rank ?? '' }}"
                    id="floatingName" placeholder="Rank">
                <label for="floatingName">Rank</label>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <textarea name="description" class="form-control summernote" id="editor" placeholder="Description">
                {{ $about->description ?? '' }}
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
