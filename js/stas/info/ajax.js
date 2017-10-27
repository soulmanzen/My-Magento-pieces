jQuery(document).ready(sendFeedbackForm());

function sendFeedbackForm() {
    jQuery(document).on( "submit", "#feedbackform", function( event ) {
        event.preventDefault();
        var data = jQuery( this ).serialize();
        jQuery.ajax({
            url: '/info/feedback/ajax',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(response) {
                jQuery("#feedbackcontainer").empty();
                if (response.length === 1) {
                    jQuery('#feedbackform')[0].reset();
                    jQuery("#feedbackcontainer").css({"color": "green", "margin-top": "1em"});
                } else {
                    jQuery("#feedbackcontainer").css("color", "red");
                }
                jQuery.each(response, function (index, value) {
                    jQuery("#feedbackcontainer").append("<p>" + value + "</p>");
                })
            },
            error: function (xhr, status) {
                console.log('Error: ' + status);
            }
        });
    });
}