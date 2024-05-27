@if($order->type->value == 1)
<div class="col-12 col-md-9">
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            @if($order->parent_id != null)
            <h5 class="card-title">
                {!! __('Thông tin đơn hàng (Mã đơn: :id, Loại đơn: :type, Đơn gộp: :link)', [
                'id' => format_label_id($order->id),
                'type' => $order->type->description(),
                'link' => '<a href="' . route('admin.order.edit', $order->parent_id) . '">' .
                    format_label_id($order->parent_id) . '</a>'
                ]) !!}
            </h5>
            @else
            <h5 class="card-title">
                {!! __('Thông tin đơn hàng (Mã đơn: :id, Loại đơn: :type)', ['id' => format_label_id($order->id), 'type'
                => $order->type->description()]) !!}
            </h5>
            @endif
            @if($order->parent_id == Null)
            <x-link class="btn btn-primary btn-icon" :href="route('admin.order.mergeEdit', $order->id)">
                <i class="ti ti-layers-intersect-2"></i>
            </x-link>
            @endif
        </div>
        <div class="row card-body">
            <!-- sender -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3 wrap-select2">
                    <label class="control-label">{{ __('sender') }}:</label>
                    <x-select class="select2-bs5-ajax-many customer_sender" name="customer_sender_id"
                        :data-url="route('admin.search.select.sender')">
                        @if ($order->sender)
                        <x-select-option :option="$order->sender->id" :value="$order->sender->id"
                            :title="$order->sender->fullname . ' - ' . $order->sender->phone" />
                        @endif
                    </x-select>
                </div>
            </div>  
            <!-- Receiver -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3 wrap-select2">
                    <label class="control-label">{{ __('receiver') }}:</label>
                    <x-select class="select2-bs5-ajax-many customer_receiver" name="customer_receiver_id"
                        :data-url="route('admin.search.select.receiver')">
                        @if ($order->receiver)
                        <x-select-option :option="$order->receiver->id" :value="$order->receiver->id"
                            :title="$order->receiver->fullname . ' - ' . $order->receiver->phone" />
                        @endif
                    </x-select>
                </div>
            </div>
            <!-- Show information of sender and receiver-->
            <div class="col-md-6 col-sm-12">
                <div id="full-info-sender"></div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div id="full-info-receiver"></div>
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
                        :data-url="route('admin.search.select.admin', ['roles' => App\Enums\Admin\AdminRoles::Driver->value])">
                        @if($order->driver)
                        <x-select-option :option="$order->driver_id" :value="$order->driver_id"
                            :title="$order->driver->fullname. ' - ' . $order->driver->phone" />
                        @endif
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
    @if($order->parent_id == Null)
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
    @endif
</div>

@else
@include('admin.orders.forms.new-mergedOrder-left')
@endif
