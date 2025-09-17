<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/stories.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Photos - Wiki Ghana</title>
		<link rel="canonical" href="/profile-photos.php">
		<script src="/js/jquery-3.7.1.min.js"></script>
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");
				
				
				if(isset($_SESSION["user_type"])){
					if($_SESSION["user_type"] != "visitor"){
						die(header("Location: /"));
					}else{
						$user_id=$_SESSION["user_id"];
					}
				}else{die(header("Location: /"));}
				



				$current_profile_photo_id = 0;
				$current_cover_photo_id = 0;
				$profile_photo = 0;
				$cover_photo = 0;
				$uploadOk = 1;
				$target_dir="";
				$target_file="";
				$imageFileType="";
				$output = "";
				$output2 = "";
				$current_profile_photo = "";
				$current_cover_photo = "";

				$query = "SELECT `fname`, `mname`, `lname` FROM `wiki_dating_profile` WHERE `id` =  $user_id";
				
				$run = mysqli_query($connection,$query);
				$row = mysqli_fetch_assoc($run);
				$fname = $row["fname"];
				$mname = $row["mname"];
				$lname = $row["lname"];


				$query = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
				$run = mysqli_query($connection,$query);
				if(mysqli_affected_rows($connection)>0){ 
					$row = mysqli_fetch_assoc($run);
					$current_profile_photo = $row["img_path"];
					$current_profile_photo_id = $row["id"];
				
				}
				$query = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id} AND `is_cover` = 1 AND `updated_date_time_cover` = (SELECT Max(`updated_date_time_cover`) FROM `dating_images` WHERE `is_cover`=1)";
				$run = mysqli_query($connection,$query);
				
				if(mysqli_affected_rows($connection)>0){ 
					$row = mysqli_fetch_assoc($run);
					$current_cover_photo = $row["img_path"];
					$current_cover_photo_id = $row["id"];
				
				}


				?>
			<div class="content_flex">
				<div class="content">
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="#">Photos</a></div>
					<div class="login">
						<div class="imgcontainer" id="<?php if($current_cover_photo == ""){echo "/img/news/cover.jpg";}else{echo "{$current_cover_photo}";} ?>" style="<?php if($current_cover_photo == ""){echo "background:url('/img/news/cover.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;cursor:pointer";}else{ echo "background:url('{$current_cover_photo}');background-position: center;background-repeat: no-repeat;background-size: cover;cursor:pointer";}  ?>" >	
						</div>
						<div>
							<div class="cover_img"><img src="<?php if($current_profile_photo == ""){echo "/img/icons/login.jpg";}else{ echo $current_profile_photo;} ?>" alt="" class="avatar" id="profile_img_090225"></div>
							<div class="top_right">
								<div class="right-links">
									<a href="profile.php" class="edit-profile"><i class="bi bi-person-circle"></i> Profile</a>
									<a href="profile-photos.php" class="edit-profile photos"><i class="bi bi-camera-fill"></i> Photos</a>
									<a href="friends.php" style="display:inline-block;" class="edit-profile friends"><i class="bi bi-people-fill"></i> Friends</a>
									<a href="stories.php" class="edit-profile stories"><i class="bi bi-hourglass-split"></i> Stories</a>
									<a href="posts.php" class="edit-profile posts"><i class="bi bi-mailbox"></i> Posts</a>
								</div>	
							</div>
						</div>

			<div style="clear:both;margin-bottom:0;color:white;" class="hide-on-large-screen">.</div>
			<h1 style="text-align:center;font-size:20px;clear:both;color:white;" class="full-name"><?php
			// echo $fname . " " . $mname . " " . $lname ;
			echo ".";
			?></h1>
			
			
			
			
				
						
		


<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

				</div><!-- end of .login -->
				<div id="fetch_data"></div>
				<div id="load_data_message"></div>
				</div><!--end of .content -->
				
				<div>
					<?php include($_SERVER['DOCUMENT_ROOT']."/include/news_structure_sidebar.php");?>
				</div>
			</div><!--end of .content-flex -->

				<?php 
				
				
				// include($_SERVER['DOCUMENT_ROOT']."/include/footer.php");
				
				
				?>
		</div>
	</body>
<html>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption


var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");



$(document).ready(function(){



	var limit = 3
	var start = 0;


  var action = "inactive";

  function load_data(limit, start){
    $.ajax({
        url: "/include/fetch_stories.php",
        method:"POST",
        data:{"limit":limit,"start":start},
        cache:false,
        dataType:"html",
        success:function(data){
         
            $('#fetch_data').append(data);
            if(data == ""){
               $("#load_data_message").html("-- The End --");
              action = "active";
            }else{
              $("#load_data_message").html("<p style='font-weight:bold;'>Scroll Up To Load More ....</p>");
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
        if ($(window).scrollTop() >= $('#fetch_data').offset().top + $('#fetch_data').outerHeight() - window.innerHeight && action == "inactive") {
			
            
			action = "active";
			start = start + limit;
			setTimeout(function(){
				load_data(limit, start);
			},1000);
        }
    }); 













	$(document).on('click','.img_class', function(){
		var img = $(this).attr("id");
		var src2 = $(this).attr("src");
		var alt2 = $(this).attr("alt");
		modal.style.display = "block";
		modalImg.src = src2;
		captionText.innerHTML = alt2;
		
	})

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
</script>