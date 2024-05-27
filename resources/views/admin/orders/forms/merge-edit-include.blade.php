@foreach($similars as $similar)
@if($similar->parent_id == $order->id)
<tr>
    <td><a href="{{ route('admin.order.edit', $similar->id)}}">{{format_label_id($similar->id) }}</a>
    </td>
    <td><a href="{{ route('admin.customer.edit', $order->receiver->id)}}">{{$similar->receiver->fullname }}</a>
    </td>
    <td>{{$similar->receiver->type->description() }}</td>
    <td>{{$similar->receiver->phone }}</td>
    <td>{{$similar->goods_content }}</td>
    <td>
        @if ($similar->weight > 0)
        {{format_weight($similar->weight) }}
        @else
        0
        @endif
    </td>
    <td>{{$similar->total_amount }}</td>
    <td>{{format_price($similar->fee) }}</td>
</tr>
@endif
@endforeach