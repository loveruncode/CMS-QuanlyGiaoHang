@extends('admin.layouts.master')
@push('libs-css')
@endpush
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.blog.tag.update')" type="put" :validate="true">
                <x-input type="hidden" name="id" :value="$tag->id" />
                <div class="row justify-content-center">
                    @include('admin.blog.tags.forms.edit-left')
                    @include('admin.blog.tags.forms.edit-right')
                </div>
            </x-form>
        </div>
    </div>
@endsection

@push('libs-js')
<script src="{{ asset('public/libs/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/libs/ckeditor/adapters/jquery.js') }}"></script>
@include('ckfinder::setup')
@endpush

@push('custom-js')

@endpush
