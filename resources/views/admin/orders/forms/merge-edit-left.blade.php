<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                @lang('merge')
            </h5>
        </div>
        <div class="row card-body">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('Thông tin người nhận ') }}</h5>
                    </div>
                    <div class="card-body">
                        <!-- Fullname -->
                        <div class="mb-3">
                            <label class="control-label"><strong>@lang('fullname')</strong>:</label>
                            <a
                                href="{{ route('admin.customer.edit', $order->receiver->id)}}">{{$order->receiver->fullname }}</a>
                        </div>

                        <!-- Type -->
                        <div class="mb-3">
                            <label class="control-label"><strong>@lang('type'):</strong></label>
                            <span>{{ $order->receiver->type->description() }}</span>
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label class="control-label"><strong>@lang('phone'):</strong></label>
                            <span>{{ $order->receiver->phone }}</span>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="control-label"><strong>{{ __('Địa chỉ') }}:</strong></label>
                            <span>{{ $order->receiver->fulladdress }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('Thông tin đơn hàng') }}</h5>
                    </div>
                    <div class="card-body">
                        <!-- ID -->
                        <div class="mb-3">
                            <label class="control-label"><strong>@lang('Mã đơn')</strong>:</label>
                            <!-- <span>{{format_label_id($order->id) }}</span> -->
                            <a href="{{ route('admin.order.edit', $order->id)}}">{{format_label_id($order->id) }}</a>
                        </div>

                        <!-- Order Status -->
                        <div class="mb-3">
                            <label class="control-label"><strong>{{ __('order_status') }}:</strong></label>
                            <span>{{ $order->status->description() }}</span>
                        </div>

                        <!-- Order Payment Status -->
                        <div class="mb-3">
                            <label class="control-label"><strong>{{ __('payment_status') }}:</strong></label>
                            <span>{{ $order->payment_status->description() }}</span>
                        </div>

                        <!-- Order Payment Method -->
                        <div class="mb-3">
                            <label class="control-label"><strong>{{ __('payment_method') }}:</strong></label>
                            <span>{{ $order->payment_method->description() }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Các đơn hàng có thể gộp') }}</h5>
                </div>
                <div class="card-body">
                    @include('admin.orders.forms.merge-form')
                </div>
            </div>
        </div>
    </div>
</div>