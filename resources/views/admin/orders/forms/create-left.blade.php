<div class="col-12 col-md-9">
    <div class="card">
        <div class="row card-body">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3 wrap-select2">
                    <label class="control-label">{{__('sender')}}:</label>
                    <x-select class="select2-bs5-ajax-many customer_sender" name="customer_sender_id" :data-url="route('admin.search.select.sender')">
                    </x-select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3 wrap-select2">
                    <label class="control-label">{{__('receiver')}}:</label>
                    <x-select class="select2-bs5-ajax-many customer_receiver" name="customer_receiver_id" :data-url="route('admin.search.select.receiver')">
                    </x-select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div id="full-info-sender"></div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div id="full-info-receiver"></div>
            </div>
            <div class="mb-3">
                <label class="control-label">{{__('content')}}:</label>
                <textarea class="form-control" name="goods_content">{{ old('goods_content') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="control-label">{{__('note')}}:</label>
                <textarea class="form-control" name="note">{{ old('note') }}</textarea>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{__('weight')}}:</label>
                    <div class="input-group">
                        <x-input type="number" name="weight" :value="old('weight',0)" :required="true" placeholder="Ví dụ: 14.5" step="any" />
                        <span class="input-group-text">g</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{__('fee')}}:</label>
                    <div class="input-group">
                        <x-input type="number" name="fee" :value="old('fee',0)" :required="true" placeholder="VNĐ" />
                        <span class="input-group-text">VNĐ</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{__('amount')}}:</label>
                    <x-input type="number" name="total_amount" :value="old('total_amount',0)" :required="true" placeholder="Số lượng" />
                </div>
            </div>
            
            <!-- Driver -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{__('driverReceives')}}:</label>
                    <x-select name="driver_id" class="select2-bs5-ajax-many" :data-url="route('admin.search.select.admin', ['roles' => App\Enums\Admin\AdminRoles::Driver->value])">
                    </x-select>
                </div>
            </div>
        </div>
    </div>
</div>
