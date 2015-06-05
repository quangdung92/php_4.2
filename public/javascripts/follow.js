$(document).ready(function() {
	$('#follow_box').each(function() {
		$("input:checkbox").change(function(){
			if (this.checked) {
				var id = $(this).val();
				var a = $(this).parent();
				$.ajax ({
					url: "following",
					type: "post",
					data : {
						following_id : id
					},
					success :function(data) {
						console.log(data['status']);
						location.reload();
					}
				});
			}
		});
	});
	$('#following_box').each(function() {
		$("input:button").click(function() {
			var id = $(this).prev().attr("f_id");
			$.ajax ({
					url: "unfollow",
					type: "post",
					data : {
						following_id : id
					},
					success :function(data) {
						console.log(data);
						location.reload();
					}
				});
			});
		});
	$('textarea').textcomplete([{
		mentions : friendList(),
		match : /\B@(\w*)$/,
		search : function(term, callback) {
			callback($.map(this.mentions, function(mention) {
				return mention.indexOf(term) === 0 ? mention : null;
			}));
		},
		index : 1,
		replace : function(mention) {
			return '@' + mention + ' ';
		}
	}]); 

});
function friendList(){
	var result = "";
	$.ajax({
		url: "search/user",
		type: "get",
		async: false,
		success: function(data) {
			result = data["search_list"];
		}
	});
	return result;
}
