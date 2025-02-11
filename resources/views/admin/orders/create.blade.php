@extends('admin.layouts.master')
@push('libs-css')
<link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2-bootstrap-5-theme.min.css') }}">
@endpush
@section('content')
<div class="page-body">
    <div class="container-xl">
        <x-form :action="route('admin.order.store')" type="post" :validate="true">
            <div class="row justify-content-center">
                @include('admin.orders.forms.create-left')
                @include('admin.orders.forms.create-right')
            </div>
        </x-form>
    </div>
</div>
@endsection

@push('libs-js')
<script src="{{ asset('public/libs/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/libs/ckeditor/adapters/jquery.js') }}"></script>
@include('ckfinder::setup')
<script src="{{ asset('/public/libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('/public/libs/select2/dist/js/i18n/vi.js') }}"></script>
@endpush

@push('custom-js')
@include('admin.orders.scripts.script')
@endpush