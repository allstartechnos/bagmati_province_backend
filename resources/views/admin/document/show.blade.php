<div class="card-body">

    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-4">
                <label for="email" class="form-label">Name</label>
            </div>
            <div class="col-md-8">
                <p>{{ $document->title }}</p>
            </div>
        </div>
    </div>



    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-4">
                <label for="email" class="form-label">Image</label>
            </div>
            <div class="col-md-8">
                @if (isset($document->image))
                    <img src="{{ asset($img_path . $document->image) }}" width="50%" class="img-thumbnail">
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
                <span style="text-align: justify">{!! $document->description !!}</span>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="row row-sm">

            <div class="col-md-4">
                <label for="email" class="form-label">Created By</label>
            </div>
            <div class="col-md-8">
                <p>{{ $document->createdBy?->name ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row row-sm">

            <div class="col-md-4">
                <label for="email" class="form-label">Updated By</label>
            </div>
            <div class="col-md-8">
                <p>{{ $document->updatedBy?->name ?? 'N/A' }}</p>
            </div>
        </div>
    </div>


</div>
