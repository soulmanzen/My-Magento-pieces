jQuery.validator.addMethod( "alphanumericno_", function( value, element ) {
	return this.optional( element ) || /^[a-z0-9]+$/i.test( value );
}, "Letters and numbers only please" );
