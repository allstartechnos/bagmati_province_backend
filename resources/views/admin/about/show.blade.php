<div class="card-body">

    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-4">
                <label for="email" class="form-label">Category</label>
            </div>
            <div class="col-md-8">
                <p class="text-success">{{ $about->parent?->title ?? 'Self Parent' }}</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-4">
                <label for="email" class="form-label">Name</label>
            </div>
            <div class="col-md-8">
                <p>{{ $about->title }}</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-4">
                <label for="email" class="form-label">Sub Title</label>
            </div>
            <div class="col-md-8">
                <p>{{ $about->sub_title }}</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-4">
                <label for="email" class="form-label">Rank</label>
            </div>
            <div class="col-md-8">
                <p>{{ $about->rank }}</p>
            </div>
        </div>
    </div>



    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-4">
                <label for="email" class="form-label">Image</label>
            </div>
            <div class="col-md-8">
                @if (isset($about->image))
                    <img src="{{ asset($img_path . $about->image) }}" width="50%" class="img-thumbnail">
                @else
                    <img src="{{ asset('dummy_image.jpg') }}" width="80" class="img-thumbnail">
                @endif
            </div>
        </div>
    </div>



    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-12">
                <label for="email" class="form-label">Description</label>
                <span style="text-align: justify">{!! $about->description !!}</span>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="row row-sm">

            <div class="col-md-4">
                <label for="email" class="form-label">Created By</label>
            </div>
            <div class="col-md-8">
                <p>{{ $about->createdBy?->name ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row row-sm">

            <div class="col-md-4">
                <label for="email" class="form-label">Updated By</label>
            </div>
            <div class="col-md-8">
                <p>{{ $about->updatedBy?->name ?? 'N/A' }}</p>
            </div>
        </div>
    </div>


</div>
