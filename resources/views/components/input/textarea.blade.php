@if(auth('admin')->user()->isSuperAdmin() || auth('admin')->user()->isAdmin() || auth('admin')->user()->isEmployee())
<textarea {{ $attributes->class(['form-control']) }}>{{ $slot }}</textarea>
@elseif(auth('admin')->user()->isDriver())
<textarea {{ $attributes->class(['form-control']) }} disabled > {{ $slot }} </textarea>
@endif
