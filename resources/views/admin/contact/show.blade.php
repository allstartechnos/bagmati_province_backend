<div class="card-body">

    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-4">
                <label for="email" class="form-label">Name</label>
            </div>
            <div class="col-md-8">
                <p>{{ $contact->name }}</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
            </div>
            <div class="col-md-8">
                <p>{{ $contact->email }}</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-4">
                <label for="phone" class="form-label">Phone</label>
            </div>
            <div class="col-md-8">
                <p>{{ $contact->phone }}</p>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-4">
                <label for="address" class="form-label">Address</label>
            </div>
            <div class="col-md-8">
                <p>{{ $contact->address }}</p>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="row row-sm">
            <div class="col-md-12">
                <label for="email" class="form-label">Description</label>
                <span style="text-align: justify">{!! $contact->message !!}</span>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="row row-sm">

            <div class="col-md-4">
                <label for="email" class="form-label">Created Date</label>
            </div>
            <div class="col-md-8">
                <p> {{ $contact->created_at->format('d M Y') }}</p>
            </div>
        </div>
    </div>




</div>
