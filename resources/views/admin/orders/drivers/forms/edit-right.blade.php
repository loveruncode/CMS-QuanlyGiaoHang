<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            @lang('action')
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('update')" />
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <label class="control-label">{{__('content')}}:</label>
            </div>
            <div class="card-body d-flex align-items-center">
                <textarea class="form-control" name="goods_content"
                    disabled>{{ old('goods_content',$order->goods_content) }}</textarea>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <label class="control-label">{{__('note')}}:</label>
            </div>
            <div class="card-body d-flex align-items-center">
                <textarea class="form-control" name="note" disabled>{{ old('note',$order->note) }}</textarea>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <label class="control-label">{{__('weight')}}:</label>
            </div>
            <div class="card-body d-flex align-items-center">
                <x-input type="number" name="weight" :value="old('weight', $order->weight)" :required="true"
                    placeholder="Ví dụ: 14.5" disabled />
                <span class="input-group-text ml-2">g</span>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <label class="control-label">{{__('fee')}}:</label>
            </div>
            <div class="card-body d-flex align-items-center">
                <x-input type="number" name="fee" :value="old('fee', $order->fee)" :required="true" placeholder="VNĐ"
                    disabled />
                <span class="input-group-text ml-2">VNĐ</span>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <label class="control-label">{{__('amount')}}:</label>
            </div>
            <div class="card-body d-flex align-items-center">
                <x-input type="number" name="total_amount" :value="old('total_amount', $order->total_amount)"
                    :required="true" placeholder="Số lượng" disabled />
            </div>
        </div>
    </div>
</div>