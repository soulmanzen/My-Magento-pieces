jQuery(document).ready(sendOrderForm());

function sendOrderForm() {
    jQuery(document).on( "submit", "#orderform", function( event ) {
        event.preventDefault();
        var data = jQuery( this ).serialize();
        jQuery.ajax({
            url: '/purchase/index/ajax',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(response) {
                jQuery("#ordercontainer").empty();
                if (response.length === 1) {
                    jQuery('#orderform')[0].reset();
                    jQuery("#ordercontainer").css({"color": "green", "margin-top": "1em"});
                } else {
                    jQuery("#ordercontainer").css("color", "red");
                }
                jQuery.each(response, function (index, value) {
                    jQuery("#ordercontainer").append("<p>" + value + "</p>");
                })
            },
            error: function (xhr, status) {
                console.log('Error: ' + status);
            }
        });
    });
}