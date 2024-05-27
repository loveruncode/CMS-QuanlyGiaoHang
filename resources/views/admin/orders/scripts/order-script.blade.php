<!-- <input hidden name="getOrder" value="{{ route('admin.order.getOrder', ['id' => ':id']) }}">

<script>
$(document).ready(function() {
    $(document).on("click", "#select-all", function(e) {
        var isChecked = $(this).prop("checked");
        $('.check-list').prop("checked", isChecked);
        updateOrders();
    });

    $(document).on("click", ".check-list", function(e) {
        updateOrders();
    });

    function updateOrders() {
        var url = $('input[name="getOrder"]').val();
        var selectedOrderIds = $('.check-list:checked').map(function() {
            return $(this).val();
        }).get();

        if (selectedOrderIds.length > 0) {
            // Xóa nội dung trước đó
            // $("#full-order").empty();

            // Duyệt qua từng đơn hàng được chọn và lấy thông tin
            selectedOrderIds.forEach(function(orderId) {
                var orderUrl = url.replace(':id', orderId);
                console.log(orderUrl);
                $.ajax({
                    type: "GET",
                    url: orderUrl,
                    success: function(response) {
                        // $("#full-order").append(response.receiver);
                        console.log(typeof(response))
                    },
                });
            });
        } else {
            // Nếu không có đơn hàng nào được chọn, hiển thị thông báo hoặc làm gì đó tương ứng
            $("#full-order").html("<p>Không có đơn hàng nào được chọn.</p>");
        }
    }
});
</script> -->

<script>
$(document).ready(function() {
    let totalWeight = parseFloat($('input[name="weight"]').val());
    let totalFee = parseFloat($('input[name="fee"]').val());
    let totalAmount = parseFloat($('input[name="total_amount"]').val());
    $('#select-all').change(function() {
        $('.check-list').prop('checked', $(this).prop('checked')).trigger('change');
    });
    $('.check-list').change(function() {
        let weightText = $(this).closest('tr').find('td:eq(6)').text();
        let feeText = $(this).closest('tr').find('td:eq(8)').text();
        let amountText = $(this).closest('tr').find('td:eq(7)').text();

        // Parse original values
        let weight = parseFloat(weightText);
        let fee = parseFloat(feeText);
        let amount = parseFloat(amountText);

        if (weightText.toLowerCase().includes('kg')) {
            weight *= 1000;
        }

        if (feeText.toLowerCase().includes('đ')) {
            fee *= 1000;
        }

        if ($(this).is(':checked')) {
            totalWeight += weight;
            totalFee += fee;
            totalAmount += amount;
        } else {
            totalWeight -= weight;
            totalFee -= fee;
            totalAmount -= amount;
        }

        $('input[name="weight"]').val(totalWeight);
        $('input[name="fee"]').val(totalFee);
        $('input[name="total_amount"]').val(totalAmount);
    });
});
</script>