@if(count($similarOrders) > 0)
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all" class="check-all"></th>
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
            @foreach($similarOrders as $similarOrder)
            <tr>
                <td>
                    <input type="checkbox" name="idCheck[]" class="check-list" value="{{ $similarOrder->id }}">
                </td>
                <td><a href="{{ route('admin.order.edit', $order->id)}}">{{format_label_id($similarOrder->id) }}</a>
                </td>
                <td><a
                        href="{{ route('admin.customer.edit', $order->receiver->id)}}">{{$similarOrder->receiver->fullname }}</a>
                </td>
                <td>{{$similarOrder->receiver->type->description() }}</td>
                <td>{{$similarOrder->receiver->phone }}</td>
                <td>{{$similarOrder->goods_content }}</td>
                <td>
                    @if ($similarOrder->weight > 0)
                    {{format_weight($similarOrder->weight) }}
                    @else
                    0
                    @endif
                </td>
                <td>{{$similarOrder->total_amount }}</td>
                <td>{{format_price($similarOrder->fee) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p>{{ __('Không có đơn hàng nào để gộp.') }}</p>
@endif