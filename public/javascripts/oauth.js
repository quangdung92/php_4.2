$(document).ready(function() {
	$("#btn_feed").click(function() {
	 
		$.ajax({
			type : "GET",
			url : "/get_token",
			datatype : 'json',
			success : function(data) {
				console.log(data['token']);
			}
		});
	});
});
