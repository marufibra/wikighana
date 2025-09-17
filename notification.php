<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/include/pop-up-chat.php");
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/notification.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ghana News - Top Local News In Ghana - Wiki Ghana</title>
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content" style="margin-bottom:60px">
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="notification.php">Notification</a></div>
					
					<div style="height:2500px !important;overflow:auto;">
						<div  class ="notification" id="notification_id"></div>
						<div id="load_data_message"></div>
					</div>

				</div><!--end of .content -->
				<div>
					<?php include($_SERVER['DOCUMENT_ROOT']."/include/news_structure_sidebar.php");?>
				</div>
			</div><!--end of .content-flex -->

				<?php 
				
				
				include($_SERVER['DOCUMENT_ROOT']."/include/footer.php");
				
				
				?>
		</div>
	</body>
<html>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>







<script>
$(document).ready(function(){
	var limit = 20;
  var start = 0;
  var action = "inactive";
  function load_data(limit, start){

    $.ajax({
        url: "/include/fetch_notification_page.php",
        method:"POST",
        data:{"limit":limit,"start":start},
        cache:false,
        dataType:"html",
        success:function(data){
         
            $('#notification_id').append(data);
            if(data == ""){
               $("#load_data_message").html("You have no notification");
              action = "active";
            }else{
              $("#load_data_message").html("<p style='font-weight:bold'>Scroll Up To Load More ....</p>");
              action = "inactive";
            }
        }
    })

  }



  if(action == "inactive"){
    action = "active";
    load_data(limit, start);
  }

//   $(window).scroll(function(){
//     if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == "inactive"){
//       action = "active";
//       start = start + limit;
//       setTimeout(function(){
//         load_data(limit, start);
//       },1000);
//     }

//   });


  $(window).on('scroll', function () {
        if ($(window).scrollTop() >= $('#notification_id').offset().top + $('#notification_id').outerHeight() - window.innerHeight && action == "inactive") {

            
			action = "active";
			start = start + limit;
			setTimeout(function(){
				load_data(limit, start);
			},1000);
        }
    }); 



	
	$(document).on('click','.notification', function(){
        var notification_id = $(this).attr("notification_id");
		var action_type = $(this).attr("action_type");
		var source_id = $(this).attr("source_id");
		var msg_type = $(this).attr("msg_type");
		
        $.ajax({
            url: "/include/update_notification.php",
            method:"POST",
            data:{"notification_id":notification_id,"action_type":action_type,"source_id":source_id,"msg_type":msg_type},
            dataType:"html", //means receiving data in html format, when "json" is used means you are going to receive json data format
            success:function(data){
				
              
				$.ajax({
						url: "/include/fetch_notification_page.php",
						method:"POST",
						data:{"limit":limit,"start":start},
						cache:false,
						dataType:"html",
						success:function(data){
							$('#notification_id').html(data);
						}
					})

				





            }
        })
	
    });



});
</script>
<script src="/js/chat.js"></script>