@extends('admin.layouts.master')

@push('libs-css')
@endpush

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header justify-content-between">
            <h1 class="mb-0">{{ $page->title }}</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive position-relative">
                <p>{!! $page->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('libs-js')
<!-- button in datatable -->
<script src="{{ asset('/public/vendor/datatables/buttons.server-side.js') }}"></script>
@endpush


