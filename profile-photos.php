<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/profile-photos.css">
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

				if(isset($_GET["delete"]) && isset($_GET["confirm"]) && isset($_GET["id2"])){
					if($_GET["id2"] == $user_id){
						$img_id = $_GET["delete"];
					
						
						if($_GET["confirm"]=="yes"){
							
							$query = "SELECT `img_path` FROM `dating_images` WHERE `id`='$img_id' AND `user_id` = '$user_id'";
							$run = mysqli_query($connection,$query);
							$row = mysqli_fetch_assoc($run);
							

							if($_SERVER['REMOTE_ADDR']=='::1'){
								$file_path = $_SERVER['DOCUMENT_ROOT'].$row["img_path"];
								
							}else{
								$file_path = substr($row["img_path"],22);
								//for unlink to work path must be absolute and no http reference and no slash / infront of path
							}

							if(file_exists($file_path)){
								unlink($file_path);
								$query = "DELETE FROM `dating_images` WHERE `id`='$img_id' AND `user_id` = '$user_id'";
								mysqli_query($connection,$query);
								$output2 = "<p class='delete_yes' style='color:green;'>Image Successfully deleted</p>";
							}else{
								$query = "DELETE FROM `dating_images` WHERE `id`='$img_id' AND `user_id` = '$user_id'";
								mysqli_query($connection,$query);
							}
							
						}
					}
				}



				if(isset($_GET["set-profile-photo"])){
					$img_id = $_GET["set-profile-photo"];
					$query = "UPDATE `dating_images` SET `is_profile` = '1', `updated_date_time_profile` = now() WHERE `id`='$img_id' AND `user_id` = '$user_id'";
					$run = mysqli_query($connection,$query);

					if(mysqli_affected_rows($connection) > 0){
						$output2 .= "<p style='color:green'>Profile photo was successfully changed !!</p>";
					}else{$output2 .= "<p style='color:red'>Profile photo was not changed !!</p>";}
					
				}
				if(isset($_GET["set-cover-photo"])){
					$img_id = $_GET["set-cover-photo"];
					$query = "UPDATE `dating_images` SET `is_cover` = '1', `updated_date_time_cover` = now() WHERE `id`='$img_id' AND `user_id` = '$user_id'";
					$run = mysqli_query($connection,$query);

					if(mysqli_affected_rows($connection) > 0){
						$output2 .= "<p style='color:green'>Cover photo was successfully changed !!</p>";
					}else{$output2 .= "<p style='color:red'>Cover photo was not changed !!</p>";}
					
				}




				if(isset($_GET["remove-profile-photo"])){
					$img_id = $_GET["remove-profile-photo"];
					$query = "UPDATE `dating_images` SET `is_profile` = '0', `updated_date_time_profile` = now() WHERE `id`='$img_id' AND `user_id` = '$user_id'";
					$run = mysqli_query($connection,$query);

					if(mysqli_affected_rows($connection) > 0){
						$output2 .= "<p style='color:green'>Profile photo was successfully removed !!</p>";
					}else{$output2 .= "<p style='color:red'>Profile photo was not removed !!</p>";}
					
				}
				if(isset($_GET["remove-cover-photo"])){
					$img_id = $_GET["remove-cover-photo"];
					$query = "UPDATE `dating_images` SET `is_cover` = '0', `updated_date_time_cover` = now() WHERE `id`='$img_id' AND `user_id` = '$user_id'";
					$run = mysqli_query($connection,$query);

					if(mysqli_affected_rows($connection) > 0){
						$output2 .= "<p style='color:green'>Cover photo was successfully removed !!</p>";
					}else{$output2 .= "<p style='color:red'>Cover photo was not removed !!</p>";}
					
				}


				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {

					$query = "SELECT Count(*) AS `count_records` FROM `dating_images` WHERE `user_id`= {$user_id} ";
					$run = mysqli_query($connection, $query);
					$row = mysqli_fetch_assoc($run);
					$records = $row["count_records"];
					if($records < 5){
						if(isset($_POST["cover_photo"])){
							$cover_photo = $_POST["cover_photo"];
						}
						if(isset($_POST["profile_photo"])){
							$profile_photo = $_POST["profile_photo"];
						}


						if(!file_exists("img/profile-photo/{$user_id}")){

							if (!mkdir("img/profile-photo/{$user_id}/", 0777, true)) {
								die('Failed to create directories...');
							}
						
						}

						$target_dir = "img/profile-photo/{$user_id}/";

						// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
						








						$file_name = basename($_FILES["fileToUpload"]["name"]);
						$target_file = $target_dir . $file_name;
						$test = explode('.', $file_name);
						$extension = end($test);    
						$new_name = rand(100,99999) .'.'.$extension;
						$target_file = $target_dir . $new_name;

						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


						
						if(!empty($imageFileType)){
							
							if(!empty($imageFileType)){
								$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
								if($check !== false) {
									//echo "File is an image - " . $check["mime"] . ".";
									$uploadOk = 1;
								} else {
									$output .= "<p class='color_red'>File is not an image.</p>";
									$uploadOk = 0;
								}


								// Check if file already exists
								if (file_exists($target_file)) {
									$output .= "<p style='color:red'>Sorry, file name already exists.</p>";
									$uploadOk = 0;
								}

								// Check file size
								if ($_FILES["fileToUpload"]["size"] > 600000) {
									$output .= "<p style='color:red'>Sorry, your file is too large.</p>";
									$uploadOk = 0;
								}

								// Allow certain file formats
								if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
										$output .= "<p style='color:red'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<p>";
									$uploadOk = 0;
								}
							}

							// Check if $uploadOk is set to 0 by an error
							if ($uploadOk == 0) {
								$output .= "<p style='color:red'>Sorry, your file was not uploaded.<p>";
								// if everything is ok, try to upload file
							} else {
								if(!empty($imageFileType)){
									if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
										if($_SERVER['REMOTE_ADDR']=='::1'){
											$file_path_upload ="/{$target_file}";
										}else{
											$file_path_upload ="https://wikighana.com/{$target_file}";
										}
										$query = "INSERT INTO `dating_images` (`id`, `user_id`, `img_path`, `is_profile`, `is_cover`, `uploaded_date_time`, `updated_date_time_profile`, `updated_date_time_cover`) ";
										$query .= "VALUES (NULL, {$user_id}, '{$file_path_upload}', {$profile_photo}, {$cover_photo}, now(), now(),now())";
										
										$run = mysqli_query($connection,$query);

										
										$output .= "<p style='color:green'>The file has been uploaded.</p>";
									} else {
										$output .= "<p style='color:red'>Sorry, there was an error uploading your file.</p>";
									}
								}
							}

						}else{
							$output .=  "<p style='color:red'>Browse for an image file</p>";
						
						}
					}else{$output .=  "<p style='color:red'>You must become a premium member to upload more images!</p>";}

				}




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
					<?php
			
			
			?>
			<div style="clear:both;margin-bottom:0;color:white;" class="hide-on-large-screen">.</div>
			<h1 style="margin:0;text-align:center;font-size:20px;clear:both" class="full-name"><?php echo $fname . " " . $mname . " " . $lname ?></h1>
			<?php echo $output2; ?>
			<div class="display_info_container">
				










			<?php
				

				echo $output;
				?>

				<form action="profile-photos.php" method="post" enctype="multipart/form-data" style="padding-top:20px;">
					
					
					
					
					<label style="margin-right:20px;"><b>Set Photo As</b><br></label>
						
					<label for="profile_photo" style="margin-right:5px;">Profile Photo</label><input type="checkbox" id="profile_photo" name="profile_photo" value="1" style="margin-right:20px;">
					<label for="cover_photo" style="margin-right:5px;">Cover Photo</label><input type="checkbox" id="cover_photo" name="cover_photo" value="1">
				
					<p><label for="fileToUpload" class="btn browse-photo" style=" font-family:san-serif;font-size:16px;cursor:pointer;"><i class="bi bi-camera-fill"></i> Browse Photo</label>
					<input type="file" name="fileToUpload" id="fileToUpload" accept="image/png, image/jpeg" style="display:none;" onchange="submitForm();" ></p>
				</p>
					
					
					<p><button type="submit" class="upload-image" style="font-family:san-serif;font-size:16px;cursor:pointer;display:none" value="Upload Image" name="submit" id="submit" style="cursor:pointer;" ><i class="bi bi-cloud-arrow-up-fill"></i> Upload Image</button></p>
					
				</form>
				























			</div><!--display_info_container -->
			
			
				
						
					</div><!--end of .login -->








<div class="display_image_container">
					<?php


					if($_SERVER['REMOTE_ADDR']=='::1'){
						$perPage = 10;
					}else{
						$perPage = 10;
					}
					$output_page = "";

					$MaxNo = 10;
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					if( $page == 1){
						$rec_start = 0;
					}else{
						$rec_start = ($page-1) * $perPage;
					}
					$query4 = "SELECT Count(*) AS `count_records` FROM `dating_images` WHERE `user_id`= {$user_id} ";
					$run = mysqli_query($connection, $query4);
					$row = mysqli_fetch_assoc($run);
					$records = $row["count_records"];
					$totalPages = ceil($records / $perPage);
					if($records > $perPage){
						$previous = $page - 1;
						$output_page .= "<div style='margin-top:20px;'>";
						if($page > 1){$output_page .= "<a href='{$_SERVER['PHP_SELF']}?page={$previous}#latest_news_58956' style='color:blue;text-decoration:none;'>Previous </a>";}
						$links = "";
						if($page > $MaxNo){
							$start_i = $i + ($page - $MaxNo);
							$MaxNo = $page;
						}else{
							$start_i = 1;
						}
						for ($i = $start_i; $i <= $totalPages; $i++) {
						$links .= ($i != $page ) ? "<a href='{$_SERVER['PHP_SELF']}?page={$i}#latest_news_58956' style='color:blue;text-decoration:none;'>{$i}</a> ": "$page ";
						if($i == $MaxNo){break;}
						}
						$output_page .= $links;
						$next = $page + 1;
						
						if($page >= 1 && $page < $totalPages){ $output_page .= "<a href='{$_SERVER['PHP_SELF']}?page={$next}#latest_news_58956' style='color:blue;text-decoration:none'>Next</a>";}
						$output_page .= "</div>";
						$output_page .= "<div style='clear:both; color:white;'>.</div>";

					}








					if(isset($_GET["delete"]) && !isset($_GET["confirm"])){

						$img_id = $_GET["delete"];
						$query = "SELECT `id` FROM `dating_images` WHERE `id`={$img_id}";
						$run = mysqli_query($connection,$query);
						if(mysqli_num_rows($run) > 0){	
					?>
					<div class="wrapper-confirmatin" id="delete-confirm070225">
						<div class="title-confirmation">Delete Confirmation</div>
						<div class="body-confirmation">Are you sure you want to delete the Photo ID: <?php echo $img_id."?" ?> </div>
						<div class = "YesNo"><div class="Yes"><a href="<?php echo $_SERVER['PHP_SELF'].'?delete='.$_GET['delete'].'&confirm=yes'.'&id2='.$user_id ?>">Yes</a></div><div class = "No"><a href="<?php echo $_SERVER['PHP_SELF'].'?confirm=no' ?>">No</a></div></div>
					</div>
					<?php
						}else{echo "<h3 style='color:red'>Image used for content so cannot be deleted<h3>";}
					
					}
	
	

	


					$query = "SELECT * FROM `dating_images` WHERE `user_id` = {$user_id} ORDER BY `id` DESC";
					$run = mysqli_query($connection,$query);
					
					if(mysqli_affected_rows($connection)>0){ 
						
						while($row = mysqli_fetch_assoc($run)){
							$img_id = $row["id"];
							$img_path = $row["img_path"];
							$is_profile = $row["is_profile"];
							$is_cover = $row["is_cover"];
							
						?>
						
						<div class="img_display">
							<img alt="<?php echo "Photo ID: ".$img_id; ?>" src="<?php echo htmlentities($img_path) ?>" class="img_class" id="<?php echo $img_id; ?>" style="width:100%;max-width:300px">
							
							<?php if($current_cover_photo_id == $img_id ){ ?>
								<a class="img-action" id="set-cover-photo" href="<?php echo "profile-photos.php?remove-cover-photo={$img_id}"; ?>" title="Remove Cover Photo"><i  class="bi bi-image-alt red green"></i></a>
							<?php }else{ ?>
								<a class="img-action" id="set-cover-photo" href="<?php echo "profile-photos.php?set-cover-photo={$img_id}"; ?>" title="Use As Cover Photo"><i class="bi bi-image-alt green"></i></a>
							
							<?php 
							}
							if($current_profile_photo_id == $img_id ){
							?>
								<a class="img-action" id="set-profile-photo" href="<?php echo "profile-photos.php?remove-profile-photo={$img_id}"; ?>" title="Remove Profile Photo"><i class="bi bi-person-circle red green"></i></a>
							<?php }else{ ?>
								<a class="img-action" id="set-profile-photo" href="<?php echo "profile-photos.php?set-profile-photo={$img_id}"; ?>" title="Use As Profile Photo"><i class="bi bi-person-circle green"></i></a>
							
							<?php } ?>
							<a id="delete-photo" class="img-action" href="<?php echo "profile-photos.php?delete={$img_id}#delete-confirm070225"; ?>" title="Delete"><i class="bi bi-trash3 green"></i></a>
							
						</div>


						<?php
						}
					
					}else{echo "<p>There is no image to show</p>";}
					
					?>


				<div style="clear:both;"></div>
				<?php echo $output_page;  ?>








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







				</div><!-- end of .display_image_container -->
				









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