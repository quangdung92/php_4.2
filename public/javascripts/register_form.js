function postUpdate(post_id, up_text) {
	var result = "";
	$.ajax ({
		url : "post/update",
		type: "post",
		async: false,
	    data: {
		    post_id : post_id,
		    up_text : up_text
		},
	    dataType: "json",
	    success :function(data) {
	       if (data['status'] == "success") {
	       			result = data['status'];
	       		}
			}
	});
	return result;
}
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
	
	$(".description").each(function() {
		$(this).find('#update_post').click(function() {
			$(this).next().fadeToggle("slow");
		});
		$(this).find("#update_box").keypress(function(event) {
			if (event.which === 13) {
				if (event.shiftKey) {
					$(this).val($(this).val());
				} else {
					event.preventDefault();
					if (!$.trim($(this).val())) {
						$(this).fadeOut("slow");
					} else {
						var post_id = $(this).parent().find('div').attr('post_id');
						var up_text = $(this).val();
						var request = postUpdate(post_id, up_text);
							if (request == "success") {
								$(this).parent().find('div').text(up_text);
								$(this).fadeOut("fast");
								location.reload();
							}
					}
				}
			}
		});
	}); 	
	$('#selecctall').click(function() {
		if (this.checked) {
			$('.kid_box').each(function() {
				this.checked = true;
			});
		} else {
			$('.kid_box').each(function() {
				this.checked = false;
			});
		}
	});	
	
	$('#dl_post').click(function() {
		var post_ids = $('.kid_box:checked').map(function(){
			return this.value;
		}).get();
		$.ajax ({
			url: 'post/delete',
			type: 'post',
			data: {
				post_ids : post_ids
			},
			dataType: 'json',
			success: function(data) {
				$('.kid_box:checked').each(function() {
					$(this).parent().parent().remove();
				});
				$('#selecctall').attr('checked', false);
			}
		});
	});
});
