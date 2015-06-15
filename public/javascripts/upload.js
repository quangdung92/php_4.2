$(document).ready(function() {
	$('figure.cap-bot').each(function() {
		$(this).find("input:button").click(function() {
			var image_id = $(this).attr("image_id");
			var btn = $(this).val();
			if (btn == "Delete") {
				var status_delete = ImageDel(image_id);
				if (status_delete == "deleted") {
					$(this).parent().parent().find('img').remove();
				}
			} else if (btn == "Avatar") {
				var status_avatar = ImageAva(image_id);
				if (status_avatar == "success") {
					location.reload();
				}
			}
		});
	});
	$("li#social_post").each(function () {
		var user_id = $(this).attr("urs_id");
		var avatar = CheckAva(user_id);
		if (avatar) {
			var url = '/uploads/'+avatar.dir+'/'+user_id+'/'+avatar.image.origilnal_filename;
			$(this).find("img").attr("src", url);
		}
	});
});
function ImageDel(image_id) {
	var result = '';
		$.ajax({
			url: "image/delete",
			type: "post",
			async: false,
			data: {image : image_id},
			success: function(data) {
				result = data["status"];
			}
		});
	return result;
}
function ImageAva (image_id) {
	var result = '';
		$.ajax({
			url: "image/avatar",
			type: "post",
			async: false,
			data: {image : image_id},
			success: function(data) {
				result = data["status"];
			}
		});
	return result;
}
function CheckAva(user_id) {
	var result = "";
		$.ajax({
			url: "check/avatar",
			type: "post",
			async: false,
			data: {
				user_id : user_id
			},
			success: function(data) {
				if (data["status"] == "success") {
					result = data["dat"];
				}
			}
		});
	return result;
}
