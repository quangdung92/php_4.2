$(document).ready(function() {
	$('#follow_box').each(function() {
		$("input:checkbox").change(function(){
			if (this.checked) {
				var id = $(this).val();
				$.ajax ({
					url: "following",
					type: "post",
					data : {
						following_id : id
					},
					success :function(data) {
						console.log(data);
					}
				});
			}
		});
	});
	$('#following_box').each(function() {
		$("input:button").click(function() {
			var id = $(this).attr("f_id");
			$.ajax ({
					url: "unfollow",
					type: "post",
					data : {
						following_id : id
					},
					success :function(data) {
						console.log(data);
					}
				});
		});
	});
});
