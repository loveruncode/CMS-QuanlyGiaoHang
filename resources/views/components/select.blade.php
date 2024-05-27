@if(auth('admin')->user()->isSuperAdmin() || auth('admin')->user()->isAdmin() || auth('admin')->user()->isEmployee())
<select {{ $attributes->class(['form-select'])->merge($isRequired()) }}>
    {{ $slot }}
</select>
@elseif(auth('admin')->user()->isDriver())
<select {{ $attributes->class(['form-select']) }}>
    {{ $slot }}
</select>
@endif