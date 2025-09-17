
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption

var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");



$(document).ready(function(){
	
	var user_id;
	user_id = 0;
	interval = null;
	var reply_id = 0;
	var is_append = 0;

	function fetch_chat() {
        $.ajax({
            url: "/include/fetch_chat.php",
            method:"POST",
            data:{"user_id_friend":user_id,"is_append":is_append},
            dataType:"html", //means receiving data in html format, when "json" is used means you are going to receive json data format
            success:function(data){
				if(is_append == 0){
					$('#display_chat').html(data);
					
				}else{
					$('#display_chat').append(data);
				}
				$('#display_chat').scrollTop($('#display_chat')[0].scrollHeight);//scrolls to the bottom
            }
        })
	}

	
	function chat_status() {
		is_append = 1;// setting this to 1 will append incoming chat messages 
        $.ajax({
            url: "/include/fetch_chat_status.php",
            method:"POST",
            data:{"user_id_friend":user_id},
            dataType:"html", //means receiving data in html format, when "json" is used means you are going to receive json data format
            success:function(data){
				
				if(data == 1){
					fetch_chat();
				}else{
					
				}
            }
        })
	}





	$(document).on('click','.chat', function(){
		user_id = $(this).attr("user_id_friend");
		$("#myForm").css({"display":"block"});
		$("#send_msg").attr("user_id_friend",user_id);
		$("#user_id_hidden").attr("value",user_id);
		


		$.ajax({
            url: "/include/fetch_chat_header.php",
            method:"POST",
            data:{"user_id_friend":user_id},
            dataType:"html", //means receiving data in html format, when "json" is used means you are going to receive json data format
            success:function(data){
				$("#chat_header").html(data);
            }
        })





		// chat_status();
		fetch_chat()
		
		interval = setInterval(chat_status,3000);
	})
	
	
    $(window).on('scroll', function () {
        if ($(window).scrollTop() >= $('#display_chat').offset().top + $('#display_chat').outerHeight() - window.innerHeight) {
            // fetch_chat();
        }
    }); 


	$(document).on('click','#emoji-toggle', function(){
		$("#emojis-container").toggle();
	}); 

	$(document).on('click','.emoji', function(){
		var emoji_id = $(this).attr("id");
		var emoji_content = $(this).html();
		var msg = $("#msg").val();
		
		$("#msg").focus().val(msg + emoji_content);
		
	}); 





	function fetch_reply() {
		
        $.ajax({
            url: "/include/fetch_reply.php",
            method:"POST",
            data:{"reply_id":reply_id},
            dataType:"html", //means receiving data in html format, when "json" is used means you are going to receive json data format
            success:function(data){
				
				$('.reply_content').html(data);
			
            }
        })
	}

	$(document).on('click','.reply', function(){
		reply_id = $(this).attr("id");
		$("#reply_id").attr("value",reply_id);
		$("#msg").focus();
		$(".reply_container").css({"display":"block"});
		fetch_reply();
		
	}); 
	$(document).on('click','.close_reply', function(){
		$(".reply_container").css({"display":"none"});
		reply_id = 0;
		$("#reply_id").attr("value",0);
	}); 


	$(document).on('click','.btncancel', function(){
		clearInterval(interval);
		$("#myForm").css({"display":"none"});
	})



	$(document).on('change','#upload_img', function(){

        





		var file_data = $('#upload_img').prop('files')[0]; 
		// var property = document.getElementById('photo').files[0];
        var image_name = file_data.name;
        var image_extension = image_name.split('.').pop().toLowerCase();

        if(jQuery.inArray(image_extension,['gif','jpg','jpeg','']) == -1){
          alert("Invalid image file");
		  return;
        }
		


		var form_data = new FormData();                  
		form_data.append('file', file_data);

		reply_id = $("#reply_id").attr("value");
		user_id_friend = $("#user_id_hidden").attr("value");
		form_data.append('reply_id', reply_id);
		form_data.append('user_id_hidden', user_id_friend);
		
		//two arrays are sent $_POST[] and $_FILES[];
		$.ajax({
			url:"/include/update_chat.php",
			dataType: 'html',  // <-- what to expect back from the PHP script, if anything
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,                         
			type: 'post',
			success: function(data){
				 
			
				fetch_chat();
				$('#display_chat').scrollTop($('#display_chat')[0].scrollHeight);//scrolls to the bottom
				$(".reply_container").css({"display":"none"});
				reply_id = 0;
				$("#reply_id").attr("value",0);

				
			}
		 });


		
		// var file = $('#upload_img')[0].files[0]
		// file_name = file.name;
		// // file_tmp_name = file.tmp_name;
		// user_id_friend = $("#user_id_hidden").attr("value");
		// $.ajax({
		// 	url:"/include/update_chat.php",
		// 	method:"POST",
		// 	data:{"user_id_friend":user_id,"file_name":file_name,"reply_id":reply_id,"user_id_hidden":user_id_friend},
		// 	dataType:"html",
		// 	success:function(data){
		// 			$("#msg").val("");
		// 			fetch_chat();
		// 			$('#display_chat').scrollTop($('#display_chat')[0].scrollHeight);//scrolls to the bottom

		// 			$(".reply_container").css({"display":"none"});
		// 			reply_id = 0;
		// 			$("#reply_id").attr("value",0);
		// 			alert(data);
		// 	}
		// })
	});



		//sending form data
		$('#chat_form').on('submit',function(event){
			event.preventDefault();
			var form_data = $(this).serialize();
			$.ajax({
				url:"/include/update_chat.php",
				method:"POST",
				data:form_data,
				dataType:"html",
				success:function(data){
						$("#msg").val("");
						fetch_chat();
						$('#display_chat').scrollTop($('#display_chat')[0].scrollHeight);//scrolls to the bottom

						$(".reply_container").css({"display":"none"});
						reply_id = 0;
						$("#reply_id").attr("value",0);
				}
			})
		});











	$(document).on('click','.avatar', function(){
		
		var img = $(this).attr("id");
		
		var src2 = $(this).attr("src");
		var alt2 = $(this).attr("alt");
		modal.style.display = "block";
		modalImg.src = src2;
		captionText.innerHTML = alt2;
		
	})

	$(document).on('click','.imgcontainer', function(){
		var img = $(this).attr("id");
		var src2 = img;
		// var src2 = $(this).attr("src");
		var alt2 = "";
		modal.style.display = "block";
		modalImg.src = src2;
		captionText.innerHTML = alt2;
		
	})
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

