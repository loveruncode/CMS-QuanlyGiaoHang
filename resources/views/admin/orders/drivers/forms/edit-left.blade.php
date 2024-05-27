<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">
                {!! __('Thông tin đơn hàng (Mã đơn: :id, Loại đơn: :type)', ['id' => format_label_id($order->id), 'type'
                => __(\App\Enums\Order\OrderType::getDescription($order->type->value))]) !!}
            </h5>
        </div>
        <div class="row card-body">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3 wrap-select2">
                    <label class="control-label">{{ __('receiver') }}:</label>
                    <x-select class="select2-bs5-ajax-many customer_receiver" name="customer_receiver_id"
                        :data-url="route('admin.search.select.receiver')" disabled>
                        @if ($order->receiver)
                        <x-select-option :option="$order->receiver->id" :value="$order->receiver->id"
                            :title="$order->receiver->fullname . ' - ' . $order->receiver->phone" />
                        @endif
                    </x-select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3 wrap-select2">
                    <label class="control-label">{{__('order_status')}}:</label>
                    <x-select name="status" :required="true">
                        @foreach ($status as $key => $value)
                        <x-select-option :option="$order->status->value" :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div id="full-info-receiver"></div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3 wrap-select2">
                    <label class="control-label">{{__('payment_status')}}:</label>
                    <x-select name="payment_status" :required="true" disabled>
                        @foreach ($payment_status as $key => $value)
                        <x-select-option :option="$order->payment_status->value" :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-3 wrap-select2">
                    <label class="control-label">{{__('payment_method')}}:</label>
                    <x-select name="payment_method" :required="true" disabled>
                        @foreach ($payment_method as $key => $value)
                        <x-select-option :option="$order->payment_method->value" :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title">{{ __('Thông tin tài xế và ảnh:') }}</h5>
            </div>
            <div class="row card-body">
                <!-- Driver list -->
                <div class="col-md-6 col-sm-12">
                    <div class="mb-3 wrap-select2">
                        <label class="control-label"><strong>{{__('driverReceives')}}:</strong></label>
                        <x-select class="select2-bs5-ajax-many" name="driver_id"
                            :data-url="route('admin.search.select.admin')" disabled>
                            @foreach($admins as $driver)
                            <x-select-option :option="$order->driver_id" :value="$driver->id"
                                :title="$driver->fullname. ' - ' . $driver->phone" />
                            @endforeach
                        </x-select>
                    </div>
                </div>
                <!-- Images -->
                <div class="col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="control-label"><strong>{{__('takePhotos')}}:</strong></label>
                        <div class="card-body p-2">
                            <x-input-gallery-ckfinder name="images" :value="$order->images" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title">{{ __('Các đơn hàng đã gộp:') }}</h5>
            </div>
            <div class="card-body">
                @if(count($similars) > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{__('Mã đơn')}}</th>
                                <th>@lang('fullname')</th>
                                <th>@lang('type')</th>
                                <th>@lang('phone')</th>
                                <th>@lang('content')</th>
                                <th>@lang('weight')</th>
                                <th>@lang('amount')</th>
                                <th>@lang('fee')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('admin.orders.forms.merge-edit-include')
                        </tbody>
                    </table>
                </div>
                @else
                <p>{{ __('Không có đơn hàng nào đã gộp.') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>