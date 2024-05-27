@if($type == 1)
<div class="d-flex">
    <x-link class="btn btn-primary btn-icon mx-2" :href="route('admin.order.mergeEdit', $id)">
        <i class="ti ti-layers-intersect-2"></i>
    </x-link>
    <x-button.modal-delete class="btn-icon" data-route="{{ route('admin.order.delete', $id) }}">
        <i class="ti ti-trash"></i>
    </x-button.modal-delete>
</div>
@else
<x-button.modal-delete class="btn-icon" data-route="{{ route('admin.order.delete', $id) }}">
    <i class="ti ti-trash"></i>
</x-button.modal-delete>
@endif