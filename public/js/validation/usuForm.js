selector = $.noConflict();
selector( document ).ready(function() {
//	console.log('dddddddddddddddddd');
	selector('#validateForm').bootstrapValidator({
			message:'This value is not valid',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh',
			},
			fields: {
				username:{
					validators: {
							notEmpty:{
								message: 'The username is required'
								},
								stringLenght:{
										min:6,
										max:20,
										message: 'The username must be more than 6 and less than 30 characters long.'
									},
									regexp: {
										regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
										message: 'The username can only consist of alphabetical, number dot and underscore'
									}
						}// end validators
				}, //End  Username
				gender:{
					validators:{
						notEmpty:{
							message: 'The gender is required',
							}// End notEmpty
						}// End validators
					},// End gender
				email:{
					validators:{
						notEmpty:{
							message: 'Please enter you email',
							},// End notEmpty
							emailAddress:{
								message: 'The value is not a valid email address'
								}// End emailAddress
						}// End validators
					},// End email
				phone:{
					validators:{
						notEmpty:{
							message: 'Please enter you phone no.',
							},// End notEmpty
							digits:{
								message: 'The mobile phone number is not valid'
								},//End gigits
								stringLength:{
									min: 10,
									max: 12,
									message: 'The phone no. must be 10 digits'
									
									}// End stringLength
						}// End validators
					},// End phone

					
					/* Validacion para el campo de usuarios*/
					/**/
					
					
			}// End fields
			
	    });//End bootstrapValidator

	});// End document ready

