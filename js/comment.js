$(document).ready(function(){
	
	//sending form data
	$('#comment_form').on('submit',function(event){
		 event.preventDefault();
		 var form_data = $(this).serialize();
		 $.ajax({
			url:"/include/add_comment.php",
			method:"POST",
			data:form_data,
			dataType:"JSON",
			success:function(data){
				if(data.error != ''){
					// $('#comment_form')[0].reset();
					$('#comment_content').val('');
					$('#comment_message').html(data.error);
                    // $('#reply_to').html('');
					load_comment();
				}
			}
		 })
	});
	load_comment();

	function load_comment(){
		$.ajax({
			url:"/include/fetch_comment.php",
			method:"POST",
			success:function(data){
				$('#display_comment').html(data);
			}
		})
	}

	$(document).on('click','.reply', function(){
		var comment_id = $(this).attr("id");
        var reply_to = $(this).attr("value");
		$('#comment_id').val(comment_id);
        $('#reply_to').html(reply_to);
		$('#comment_content').focus();
	});










	
	function load_reaction(){
		var content_id = $("#passing_content_id_to_AJAX").attr("class");
		$.ajax({
			url:"/include/fetch_reaction.php",
			method:"POST",
			data:{"ContentID":content_id},
			dataType:"JSON",
			success:function(data){
				
				$('#like_counter').html(data.like);
				$('#dislike_counter').html(data.dislike);
				$('#thumb_up').html(data.thump_up);
				$('#thumb_down').html(data.thump_down);
				
			}
		})
	}



	$(document).on('click','#like', function(){
		var content_id = $("#passing_content_id_to_AJAX").attr("class");
		$.ajax({
			url:"/include/add_reaction.php",
			method:"POST",
			data:{"type":"like","ContentID":content_id},
			dataType:"JSON",
			success:function(data){
				$('#login_reaction').html(data.NotSignedIn);
				load_reaction();
			}
		})
	})

	$(document).on('click','#dislike', function(){
		var content_id = $("#passing_content_id_to_AJAX").attr("class");
		$.ajax({
			url:"/include/add_reaction.php",
			method:"POST",
			data:{"type":"dislike","ContentID":content_id},
			dataType:"JSON",
			success:function(data){
				$('#login_reaction').html(data.NotSignedIn);
				load_reaction();
			}
		})
	})

	load_reaction();














	
	$(document).on('click','.comment_like', function(){
		var comment_id = parseInt($(this).attr("id"));
		var content_id = $("#passing_content_id_to_AJAX").attr("class");
		$.ajax({
			url:"/include/add_reaction_comment.php",
			method:"POST",
			data:{"type":"like","CommentID":comment_id,"ContentID":content_id},
			dataType:"JSON",
			success:function(data){
				$("#" + comment_id + "login").html(data.NotSignedIn);
				$("#" + comment_id + "thumb_up").html(data.ThumbUp)
				$("#" + comment_id + "like_counter").html(data.LikeCounter)
				$("#" + comment_id + "thumb_down").html(data.ThumbDown)
				$("#" + comment_id + "dislike_counter").html(data.DislikeCounter)
			}
		})
	})



	$(document).on('click','.comment_dislike', function(){
		var comment_id = parseInt($(this).attr("id"));
		var content_id = $("#passing_content_id_to_AJAX").attr("class");
		$.ajax({
			url:"/include/add_reaction_comment.php",
			method:"POST",
			data:{"type":"dislike","CommentID":comment_id,"ContentID":content_id},
			dataType:"JSON",
			success:function(data){
				$("#" + comment_id + "login").html(data.NotSignedIn);
				$("#" + comment_id + "thumb_down").html(data.ThumbDown)
				$("#" + comment_id + "dislike_counter").html(data.DislikeCounter)
				$("#" + comment_id + "thumb_up").html(data.ThumbUp)
				$("#" + comment_id + "like_counter").html(data.LikeCounter)
			}
		})
	})

});
