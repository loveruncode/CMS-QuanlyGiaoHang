@if(auth('admin')->user()->isSuperAdmin() || auth('admin')->user()->isAdmin() || auth('admin')->user()->isEmployee())
<input type="{{ $type }}" {{ $attributes->class(['form-control'])->merge($isRequired()) }} />
@elseif(auth('admin')->user()->isDriver())
<input type="{{ $type }}" {{ $attributes->class(['form-control']) }} disabled/>
@endif
