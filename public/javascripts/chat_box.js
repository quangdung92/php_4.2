$(document).ready(function() {
	$("#invite").click(function(){
		$("#room").css({"display":"none"});
		$("#friend_list").css({"display":"block"});
	});
	$("#back_to_rooms").click(function(){
		$("#room").css({"display":"block"});
		$("#friend_list").css({"display":"none"});
	});
	
	$("#check_room").click(function(){
		$("#box").css({"display":"block"});
		$("#room").css({"display":"none"});
	});
	$("#send_chat").click(function(){
		var room = $("input[name=check_room]:checked").val();
		console.log(room);
		var message = $("#message").val();
		console.log(message);
		$.ajax ({
			url : "send/message",
			type : "post",
			data : {
				message : message,
				room : room
			},
			dataType : "json",
			success :function (data) {
				console.log(data['status']);
			}
		});
	});

	
	$("#check_invited").click( function() {
		var ids = $("input[name=check_user]:checked").val();
		console.log(ids);
		if ($("input[name=check_user]:checked").length > 0) {
		$.ajax({
			url : "invite/user",
			type : "post",
			data : {
				ids : ids
			},
			dataType: "json",
			success : function(data) {
				console.log(data['status'])
				if(data['status'] == "sucess") {
					location.reload();
				}
			}
		});
		} else {
			alert("Please! choose one!");
		}
	});

});
