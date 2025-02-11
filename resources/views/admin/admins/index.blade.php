@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h2 class="mb-0">@lang('list')</h2>
                    <x-link :href="route('admin.admin.create')" class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                        <span>@lang('add')</span>
                    </x-link>
                </div>
                <div class="card-body">
                    <x-form id="formMultiple" :action="route('admin.admin.action_multiple_record')" type="post" :validate="true">
                        <div class="table-responsive position-relative">
                            <x-admin.partials.toggle-column-datatable />
                            @isset($actionMultiple)
                                <x-admin.partials.select-action-multiple :actionMultiple="$actionMultiple" />
                            @endisset
                            {{ $dataTable->table(['class' => 'table table-bordered'], true) }}
                        </div>
                    </x-form>
                </div>
        </div>
    </div>
@endsection

@push('libs-js')
<!-- button in datatable -->
<script src="{{ asset('/public/vendor/datatables/buttons.server-side.js') }}"></script>
@endpush

@push('custom-js')

{{ $dataTable->scripts() }}

@include('admin.scripts.datatable-toggle-columns', [
    'id_table' => $dataTable->getTableAttribute('id')
])
@endpush
