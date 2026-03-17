@extends('layouts.admin', ['page' => 'Temporary Deleted'])

@section('title')
    {{ $panel ?? '' }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <div class="d-flex justity-content-between">
                        <h6 class="card-title">{{ $panel ?? '' }} (Post) </h6><span class="ms-auto"></span>
                        <button type="submit" class="btn btn-success px-3">
                            <a href="{{ route('admin.team.index') }}">View</a></button>

                    </div>
                    <div class="table-responsive">
                        <table id="user-datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 30%">Title</th>
                                    <th style="width: 25%">Designation</th>
                                    <th style="width: 10%">Image</th>
                                    <th style="width: 25%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['teams'] as $teams)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }} </th>
                                        <td>{{ $teams->title }} </td>
                                        <td>{{ $teams->sub_title }} </td>
                                        <td>
                                            @if ($teams->image)
                                                <img src='{{ asset($img_path . $teams->image) }}' width='40'
                                                    class='img-thumbnail p-0 m-0' alt='{{ $teams->title }}'>
                                            @else
                                                <img src="{{ asset('no_image.jpg') }}" class="img-thumbnail p-0 m-0"
                                                    width="60">
                                            @endif
                                        </td>
                                        <td class="d-sm-flex justify-content-around align-items-center my-1 ">

                                            <form action="{{ route('admin.team.restore', $teams->id) }}" method="POST"
                                                enctype="multipart/form-data" class="main_form">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="btn btn-success px-3 restore-confirm text-light">
                                                    <a href="#">
                                                        Restore
                                                    </a>
                                                </button>
                                            </form>


                                            <form action="{{ route('admin.team.permanent_delete', $teams->id) }}"
                                                method="POST" class="main_form" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <a class="btn btn-sm btn-icon btn-danger-light delete-confirm"><i
                                                        class="ri-delete-bin-line"></i></a> --}}

                                                <button type="submit"
                                                    class="btn btn-danger px-3 delete-permanent text-light">
                                                    <a href="#" class="text-light">
                                                        Delete
                                                    </a>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                        {{-- //View Details --}}
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
