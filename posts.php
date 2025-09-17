<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
$now = new DateTime();
$now->setTimezone(new DateTimeZone('Africa/Accra'));
$now = $now->format('Y-m-d H:i:s');


?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/posts.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Posts - Wiki Ghana</title>
		<link rel="canonical" href="/posts.php">
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


				if(isset($_GET["user_id"], $_GET["id"])){
					$post_id = $_GET["id"];
					if($_GET["user_id"] == $user_id){
						$query = "DELETE FROM `wiki_posts` WHERE `id` = $post_id LIMIT 1";
						$run = mysqli_query($connection, $query);
						if(mysqli_affected_rows($connection) > 0){
							$output .= "<p style='color:green'>Post successfully deleted !!</p>";
						}
				
					}
				}



				$query = "SELECT `fname`, `mname`, `lname` FROM `wiki_dating_profile` WHERE `id` =  $user_id";
				
				$run = mysqli_query($connection,$query);
				$row = mysqli_fetch_assoc($run);
				$fname = $row["fname"];
				$mname = $row["mname"];
				$lname = $row["lname"];
				$_SESSION["fullname"] = substr($fname,0,8) . " " . substr($lname,0,8);
				
			if(isset($_POST["submit"])){
				
				if(!empty($_POST["content"])){
					// $post = mysqli_real_escape_string($connection, trim($_POST["posts"]));
					$post = addslashes(trim($_POST["content"]));

					$query = "SELECT `id` FROM `wiki_posts` WHERE `user_id` = $user_id AND `post` LIKE '$post'";
					$run = mysqli_query($connection, $query);

					if(mysqli_num_rows($run) == 0){
						$query = "INSERT INTO `wiki_posts` (`id`, `user_id`, `post`, `status`, `security`, `post_date_time`) VALUES (NULL, '$user_id', '$post', 1, 1,'$now')";
						$run = mysqli_query($connection, $query);
						if(mysqli_affected_rows($connection)){
							$output .= "<p style='color:green'>Post sent successfully</p>";
						}
					}else{$output .= "<p style='color:red'>You have already said this !!</p>";}


					

				}else{$output .= "<p style='color:red'>You have not entered anything</p>";}
			}




				$query = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
				
				$run = mysqli_query($connection,$query);
				
				if(mysqli_affected_rows($connection)>0){ 
					$row = mysqli_fetch_assoc($run);
					$current_profile_photo = $row["img_path"];
					$current_profile_photo_id = $row["id"];
				
				}

				if($current_profile_photo == ""){
					$_SESSION["current_profile_photo"] = "/img/icons/login.jpg";
				}else{
					$_SESSION["current_profile_photo"] = $current_profile_photo;
				}

				$query = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id} AND `is_cover` = 1 AND `updated_date_time_cover` = (SELECT Max(`updated_date_time_cover`) FROM `dating_images` WHERE `is_cover`=1)";
				$run = mysqli_query($connection,$query);
				
				if(mysqli_affected_rows($connection)>0){ 
					$row = mysqli_fetch_assoc($run);
					$current_cover_photo = $row["img_path"];
					$current_cover_photo_id = $row["id"];
				
				}


				$query = "SELECT * FROM `wiki_posts`  WHERE `user_id` = $user_id AND `status` = 1 AND `security` = 1 ";
				$run = mysqli_query($connection,$query);
				$num_rows = mysqli_num_rows($run);




				
				?>
			<div class="content_flex">
				<div class="content">
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="#">Posts</a></div>
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
			<h1 style="margin:0;text-align:center;font-size:20px;clear:both" class="full-name"><?php echo $fname . " " . $mname . " " . $lname ?></h1>
			<?php echo $output2; ?>
			<div class="display_info_container">
	
			<?php echo $output; ?>

				<form action="/posts.php" method="post" enctype="multipart/form-data" style="padding-top:20px;">
			<p>You can also copy and paste posts from Facebook, X, Tiktok and Youtube.
				
			</p>
					<p>
						<textarea rows="5" name="content" id="posts" style="width:98%;padding:5px;" placeholder="What's on your mind?" ></textarea>
					</p>
					
					<p>
						
						<button type="submit" class="upload-image" style="font-family:san-serif;font-size:16px;cursor:pointer;" value="Upload Image" name="submit" id="submit" style="cursor:pointer;" ><i class="bi bi-send"></i> Post</button>
					</p>
		
				</form>
				


			</div><!--display_info_container -->
			
			
				
						
					</div><!--end of .login -->
<div class="instructions">			
	<p><strong>To embed a Facebook post</strong>, locate the desired post, click the three dots at the top right corner, select "Embed Post", 
	copy the provided code, and paste it above. </p>

	<p>
	<strong>To embed an X (formerly Twitter) post</strong>, click the "More" icon (three dots) on the post, select "Embed post," customize the appearance, and then copy and paste the generated code above. 
	</p>
	<p>
	<strong>To embed a tiktok post</strong>, locate the desired post and click the Share button (right-facing arrow icon), and then click Embed.
	From the popup window, simply copy and paste the code above
	</p>
	<p>
	<strong>To embed a youtube video</strong>,locate the desired video and click SHARE. From the list of Share options, click Embed.
	Then simply copy and paste the code above
	</p>
</div>

<?php
if($num_rows > 0){
?>
	<div class="show_post" user_id_230325 = "<?php echo $user_id; ?>" style="height:100%;border-top:1px solid #ccc;margin-top:40px;"></div>
	<div id="load_data_message"></div>
<?php
}else{
	echo "<div><strong>You have no post.</strong></div>";
}
?>			


<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>


var limit = 3;
var start = 0;


var action = "inactive";

var user_id = $(".show_post").attr("user_id_230325");


function load_data(limit, start){
$.ajax({
	url: "/include/fetch_posts.php",
	method:"POST",
	data:{"limit":limit,"start":start,"user_id":user_id},
	cache:false,
	dataType:"html",
	success:function(data){
		
		$('.show_post').append(data);
		if(data == 0){
			
			$("#load_data_message").html("<p style='font-weight:bold;'>-- The End --</p>");
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
	if ($(window).scrollTop() >= $('.show_post').offset().top + $('.show_post').outerHeight() - window.innerHeight && action == "inactive") {
	
		action = "active";
		start = start + limit;
		setTimeout(function(){
			load_data(limit, start);
		},1000);
	}
}); 












// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption


var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");



$(document).ready(function(){

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







				









				</div><!--end of .content -->
				<div>
					<?php 
					
						include($_SERVER['DOCUMENT_ROOT']."/include/news_structure_sidebar.php");
					
					?>
				</div>
			</div><!--end of .content-flex -->

				<?php 
				
				
					include($_SERVER['DOCUMENT_ROOT']."/include/footer.php");
			
				
				?>
		</div>
	</body>
<html>
<script>
	$("#files").change(function() {
		filename = this.files[0].name;
		console.log(filename);
		});
</script>

<script type="text/javascript">
    function submitForm() {
        document.getElementById("submit").click(); // Or submit_button_id
    }
</script>