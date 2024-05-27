<div class="col-12 col-md-3">
    <div class="card">
        <div class="card-header">
            @lang('action')
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('update')" />
            <x-button.modal-delete data-route="{{ route('admin.admin.delete', $admin->id) }}" :title="__('delete')" />
        </div>
    </div>
</div>