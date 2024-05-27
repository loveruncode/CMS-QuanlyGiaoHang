<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card">
            <div class="card-header">
                @lang('action')
            </div>
            <div class="card-body p-2 d-flex justify-content-between">
                <x-button.submit :title="__('merge')" />
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{__('content')}}:</label>
        </div>
        <div class="card-body d-flex align-items-center">
            <textarea class="form-control"
                name="goods_content">{{ old('goods_content',$order->goods_content) }}</textarea>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{__('note')}}:</label>
        </div>
        <div class="card-body d-flex align-items-center">
            <textarea class="form-control" name="note">{{ old('note', $order->note) }}</textarea>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{__('order_status')}}:</label>
        </div>
        <div class="card-body p-2">
            <x-select name="status" :required="true">
                @foreach ($status as $key => $value)
                <x-select-option :option="$order->status->value" :value="$key" :title="__($value)" />
                @endforeach
            </x-select>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{__('payment_status')}}:</label>
        </div>
        <div class="card-body p-2">
            <x-select name="payment_status" :required="true">
                @foreach ($payment_status as $key => $value)
                <x-select-option :option="$order->payment_status->value" :value="$key" :title="__($value)" />
                @endforeach
            </x-select>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{__('payment_method')}}:</label>
        </div>
        <div class="card-body p-2">
            <x-select name="payment_method" :required="true">
                @foreach ($payment_method as $key => $value)
                <x-select-option :option="$order->payment_method->value" :value="$key" :title="__($value)" />
                @endforeach
            </x-select>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{__('weight')}}:</label>
        </div>
        <div class="card-body d-flex align-items-center">
            <x-input type="number" name="weight" :value="old('weight', $order->weight)" :required="true"
                placeholder="Ví dụ: 14.5" />
            <span class="input-group-text ml-2">g</span>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{__('fee')}}:</label>
        </div>
        <div class="card-body d-flex align-items-center">
            <x-input type="number" name="fee" :value="old('fee', $order->fee)" :required="true" placeholder="VNĐ" />
            <span class="input-group-text ml-2">VNĐ</span>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{__('amount')}}:</label>
        </div>
        <div class="card-body d-flex align-items-center">
            <x-input type="number" name="total_amount" :value="old('total_amount', $order->total_amount)"
                :required="true" placeholder="Số lượng" />
        </div>
    </div>
</div>