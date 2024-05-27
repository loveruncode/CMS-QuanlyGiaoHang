<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ __('Thông tin người nhận') }}</h5>
    </div>
    <div class="card-body">
        <!-- Fullname -->
        <div class="mb-3">
            <label class="control-label"><strong>@lang('fullname')</strong>:</label>
            <span>{{ old('fullname', $customer->fullname) }}</span>
        </div>

        <!-- Type -->
        <div class="mb-3">
            <label class="control-label"><strong>@lang('type'):</strong></label>
            <span>{{ $customer->type->description() }}</span>
        </div>

        <!-- Phone -->
        <div class="mb-3">
            <label class="control-label"><strong>@lang('phone'):</strong></label>
            <span>{{ old('phone', $customer->phone) }}</span>
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label class="control-label"><strong>{{ __('Địa chỉ') }}:</strong></label>
            <span>{{ old('fulladdress', $customer->fulladdress) }}</span>
        </div>
    </div>
</div>