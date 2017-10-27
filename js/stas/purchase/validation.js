jQuery(function() {
    jQuery("#orderform").validate({
        rules: {
            Costumer_Name: {
                required: true,
                maxlength: 20,
                alphanumericno_: true
            },
            Costumer_Email: {
                required: true,
                email: true
            },
            Product_Name: "required"
        }
    })
});