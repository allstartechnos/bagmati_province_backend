@extends('layouts.admin')

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <div class="row">

         @if (Request::is('admin/dashboard'))
                    @include('layouts.includes.admin.box-information')
        @endif
    </div>
@endsection
