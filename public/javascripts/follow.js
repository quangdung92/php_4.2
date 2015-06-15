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
						location.reload();
					}
				});
			});
		});
	$('textarea').keypress(function(event) {
		if (event.which === 64) {
			$(this).keyup(function() {
				var search_str = $(this).val().match(/\B@(\w*)$/);
				if (search_str && search_str[1].length > 0) {
					AutoComplete(search_str[1]);
				}
			});
		};
	});	
	$('li.description').each(function() {
		$(this).find('#alstatus').text(function(index,text) {
			var f_match = text.match(/\B@\w+/g);
			var c_match = [];
			if (f_match) {
				for (i = 0; i < f_match.length; i++) {
					c_match[i] = f_match[i].replace('@','');
				}
			var e_match = $(this).text().replaceArray(f_match, c_match);
			$(this).html(e_match);
			};
		});
	});
	$('li#social_post').each(function() {
		$(this).on('click','.com_text',function() {
			var send_name = $(this).text();
			$("#pop_title span").text(send_name);
			$(document).find("#overlay").css({"display" : "block"});
			$(document).find("#pop_box").fadeIn();
		});
	});
	$("#pop_cancel").click(function() {
		$(document).find("#overlay").css({"display" : "none"});
		$(document).find("#pop_box").fadeOut();;
	});
	
	$("#pop_send").click(function() {
		var context = $("#pop_text").val();
		var address = $("#pop_title span").text();
		if (context != "") {
			$.ajax({
				url: "inbox/send",
				type: "post",
				data : {
					context : context,
					address : address
					},
				async: false,
				success: function(data) {
					if (data['status'] == "sended") {
						$(document).find("#overlay").css({"display" : "none"});
						$(document).find("#pop_box").fadeOut();;
					}
				}
			});
		}
	});
	
	$('div#alstatus').each(function(i, d){
		$(d).emoji();
	});
});
function AutoComplete(search) {
		var reg = new RegExp("\\B@("+search+")$");
		$('textarea').textcomplete([{
			mentions : friendList(search),
			match : reg,
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
}
function friendList(search){
	var result = "";
	$.ajax({
		url: "search/user",
		type: "get",
		async: false,
		data : {
			search : search
		},
		success: function(data) {
			result = data["search_list"];
		}
	});
	return result;
}
String.prototype.replaceArray = function(text, replace) {
  var replaceString = this;
  for (var i = 0; i < text.length; i++) {
    replaceString = replaceString.replace(text[i], '<span class="com_text">'+replace[i]+'</span>');
  }
  return replaceString;
};