@if(auth('admin')->user()->isSuperAdmin() || auth('admin')->user()->isAdmin() || auth('admin')->user()->isEmployee())
<button type="button" {{ $attributes->class(['btn', 'btn-danger', 'open-modal-delete'])
->merge([
    'data-bs-toggle' => 'modal',
    'data-bs-target' => '#modalDelete',
]) }}>
    {{ $title ?? '' }}
    {{ $slot }}
</button>
@endif
