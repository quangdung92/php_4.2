$(document).ready(function() {
	$("#form_register").validate({
		success : function(label, element) {
			label.removeClass("errorclass")
		},
		rules : {
			"name" : {
				required : true,
				minlength : 6,
			},
			"email" : {
				required : true,
				email : true,
			},
			"password" : {
				required : true,
				minlength : 6
			},
		},
		messages : {
			"name" : {
				required : "Required",

				minlength : "Min Length is 6 characters",
			},
			"email" : {
				required : "email null!",
				email : "A valid email address is required",
			},
			"password" : {
				required : "Required",
				minlength : "Min Length is 6 characters"
			},
		},
		errorPlacement : function(label, element) {
			element.css({
				"border-color" : "#f7f7f7",
				"background-color" : "#fbe1e1",
				"opacity" : "0.6"
			});
			element.after(label);
			label.addClass("errorclass");
		},
	});
});
