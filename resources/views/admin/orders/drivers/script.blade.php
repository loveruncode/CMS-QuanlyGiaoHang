<input hidden name="getSenderCustomer" value="{{route('admin.driver.getSenderCustomer',['id' => ':id'])}}">
<input hidden name="getReceiverCustomer" value="{{route('admin.driver.getReceiverCustomer',['id' => ':id'])}}">
<script>
$(document).ready(function() {
    $('.customer_sender').trigger("change");
    $('.customer_receiver').trigger("change");
});

$(document).on("change", ".customer_sender", function(e) {
    var url = $('input[name="getSenderCustomer"]').val();
    var customerId = $(this).val();

    if (customerId) {
        url = url.replace(':id', customerId);
        $.ajax({
            type: "GET",
            url: url,
            data: {
                id: customerId
            },
            success: function(response) {
                $("#full-info-sender").html(response);
            },
        });
    }
});

$(document).on("change", ".customer_receiver", function(e) {
    var url = $('input[name="getReceiverCustomer"]').val();
    var customerId = $(this).val();

    if (customerId) {
        url = url.replace(':id', customerId);
        console.log(url);
        $.ajax({
            type: "GET",
            url: url,
            data: {
                id: customerId
            },
            success: function(response) {
                $("#full-info-receiver").html(response);
            },
        })
    }
});
</script>
