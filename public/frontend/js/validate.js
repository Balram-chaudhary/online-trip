$(function(){
	$("#travellerDetail_form").validate({
		rules:{
			emailCompleteBooking:{
				required : true,
				email : true,
			},
			countryCodeCompleteBooking :{
				required : true,
				postcodeUK : true,
			},
			phoneNoCompleteBooking : {
				required : true,
				digits: true,
				phonesUK: true
			}
		},

		messages:{
			emailCompleteBooking:{
				required : "Please Enter an email address",
				email : "Please enter a <em>valid</em> email address"
			},
			countryCodeCompleteBooking:{
				required : "Please enter a countryCode"
				postcodeUK : "Please enter a <em>valid</em> country code"
			}	,
			phoneNoCompleteBooking : {
				required : "Please enter a phone number",
				digits : "Please enter numbers only",
				phonesUK : "Please enter a <em> Valid </em> phone number",
			}
		}
	});
	$("#travellerForm").validate({
		rules :{
			id : {
				required : true,
				digits : true,
			},
			firstName : {
				required : true,
				nowhitespace : true,
				lettersonly : true,
			},
			lastName : {
				required : true,
				nowhitespace : true,
				lettersonly : true
			}
		},
		messages : {
			id :{
				required : "Please enter an id",
				digits : "please enter an <em>valid </em> id"
			},
			firstName : {
				required : "please enter your first Name",
				nowhitespace : "No white spaces",
				lettersonly : "Please enter letters only"
			},
			lastName :{
				required : "please enter your last name",
				nowhitespace : "No white spaces ",
				lettersonly : "please enter a valid lastName" 
			}
		}
	})
});
