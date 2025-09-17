<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/uploaded_images.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Uploaded Images</title>
	</head>
	<body>
		<div class="wrap">
        <?php 
		include($_SERVER['DOCUMENT_ROOT']."/include/header.php");
		if(isset($_SESSION["user_level"])){
			$user_id=$_SESSION["user_id"];
			$user_level=$_SESSION["user_level"];

		}else{
			die(header("Location: /login.php"));
		}
		
		?>
			<div class="content">
				
				<p><a href="workpage.php" style="color:blue;text-decoration:none;">Work Page</a></p>
				<?php
				if(isset($_GET["delete"]) && !isset($_GET["confirm"])){

					$img_id = $_GET["delete"];
					$query = "SELECT `img_id` FROM `news_content` WHERE `img_id`={$img_id}";
					$run = mysqli_query($connection,$query);
					if(mysqli_num_rows($run) == 0){	
				?>
				<div class="wrapper-confirmatin">
					<div class="title-confirmation">Delete Confirmation</div>
					<div class="body-confirmation">Are you sure you want to delete the image id: <?php echo $img_id."?" ?> </div>
					<div class = "YesNo"><div class="Yes"><a href="<?php echo $_SERVER['PHP_SELF'].'?delete='.$_GET['delete'].'&confirm=yes' ?>">Yes</a></div><div class = "No"><a href="<?php echo $_SERVER['PHP_SELF'].'?confirm=no' ?>">No</a></div></div>
				</div>
				<?php
					}else{echo "<h3 style='color:red'>Image used for content so cannot be deleted<h3>";}
				
				}
				if(isset($_GET["delete"]) && isset($_GET["confirm"])){
					$img_id = $_GET["delete"];
					
						
						if($_GET["confirm"]="yes"){
							
							$query = "SELECT `img_path` FROM `news_images` WHERE `img_id`='$img_id' AND `user_id` = '$user_id'";
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
								$query = "DELETE FROM `news_images` WHERE `img_id`='$img_id' AND `user_id` = '$user_id'";
								mysqli_query($connection,$query);
								echo "<p class='delete_yes'>Image Successfully deleted</p>";
							}else{
								$query = "DELETE FROM `news_images` WHERE `img_id`='$img_id' AND `user_id` = '$user_id'";
								mysqli_query($connection,$query);
							}
							
						}
					
				}

				$uploadOk = 1;
				$target_dir="";
				$target_file="";
				$imageFileType="";

				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					if(!file_exists("img/{$user_id}")){

						if (!mkdir("img/{$user_id}/", 0777, true)) {
							die('Failed to create directories...');
						}
					
					}

					$target_dir = "img/{$user_id}/";

					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

					$img_caption = htmlentities(trim($_POST["img_caption"]));
					$file_path = htmlentities(trim($_POST["file_path"]));
					if((!empty($imageFileType) || !empty($file_path)) && !empty($img_caption)){
						
						if(!empty($imageFileType)){
							$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
							if($check !== false) {
								//echo "File is an image - " . $check["mime"] . ".";
								$uploadOk = 1;
							} else {
								echo "<p class='color_red'>File is not an image.</p>";
								$uploadOk = 0;
							}


							// Check if file already exists
							if (file_exists($target_file)) {
								echo "<p class='color_red'>Sorry, file already exists.</p>";
								$uploadOk = 0;
							}

							// Check file size
							if ($_FILES["fileToUpload"]["size"] > 600000) {
								echo "<p class='color_red'>Sorry, your file is too large.</p>";
								$uploadOk = 0;
							}

							// Allow certain file formats
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
								&& $imageFileType != "gif" ) {
								echo "<p class='color_red'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<p>";
								$uploadOk = 0;
							}
						}

						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "<p class='color_red'>Sorry, your file was not uploaded.<p>";
							// if everything is ok, try to upload file
						} else {
							if(!empty($imageFileType)){
								if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
									if($_SERVER['REMOTE_ADDR']=='::1'){
										$file_path_upload ="/{$target_file}";
									}else{
										$file_path_upload ="https://wikighana.com/{$target_file}";
									}
									$query = "INSERT INTO `news_images`(user_id,img_path,caption) VALUES('$user_id','$file_path_upload','$img_caption')";
									$run = mysqli_query($connection,$query);

									
									echo "<p class='alert_design'>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.</p>";
								} else {
									echo "<p class='color_red'>Sorry, there was an error uploading your file.</p>";
								}
							}elseif(!empty($file_path)){
								$query = "INSERT INTO `news_images`(user_id,img_path,caption) VALUES('$user_id','$file_path','$img_caption')";
									$run = mysqli_query($connection,$query);
									echo "<p class='alert_design'>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.</p>";
							}
						}

					}else{
						if(empty($imageFileType) || empty($file_path)){echo"<p class='color_red'>- Select an image file or enter file path</p>";$_SESSION["file_path"] = $file_path;}
						if(empty($img_caption)){echo"<p class='color_red'>- Enter caption</p>";}
						$_SESSION["img_caption"] = $img_caption;
						
						
					
					}

				}
				?>

				<form action="uploaded-images.php" method="post" enctype="multipart/form-data">
					
					<p><label for="img_caption">Image Caption: </label><input type="text" id="img_caption" name="img_caption" style="width:50%;padding:5px 10px;border-radius:10px" <?php if(isset($_SESSION["img_caption"])){echo "value={$_SESSION['img_caption']}";} ?> >
					<input type="file" name="fileToUpload" id="fileToUpload" accept="image/png, image/jpeg" ></p>
					<p><label for="file_path" style="margin-right:22px">Image Path: </label><input type="text" name="file_path" id="file_path" style="width:50%;padding:5px 10px;border-radius:10px" placeholder="You can also enter full image path on the cloud" <?php if(isset($_SESSION["file_path"])){echo "value={$_SESSION['file_path']}";} ?>></p>
					<p><input type="submit" value="Upload Image" name="submit" id="submit"></p>
					
				</form>
				
				<div>
					<?php




					if($_SERVER['REMOTE_ADDR']=='::1'){
						$perPage = 8;
					}else{
						$perPage = 12;
					}
					$output_page = "";

					$MaxNo = 10;
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					if( $page == 1){
						$rec_start = 0;
					}else{
						$rec_start = ($page-1) * $perPage;
					}
					$query4 = "SELECT Count(*) AS `count_records` FROM `news_images` ";
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










					$query = "SELECT * FROM `news_images` ORDER BY img_id DESC LIMIT {$rec_start},  {$perPage}";
					$run = mysqli_query($connection,$query);
					
					if(mysqli_affected_rows($connection)>0){ 
						echo "<p id='right_click'></p>";
						while($row = mysqli_fetch_assoc($run)){
							$img_id = $row["img_id"];
							$img_path = $row["img_path"];
							$img_caption = $row["caption"];
						?>
						<div class="img_display">
							<a href="<?php echo htmlentities($img_path); ?>" <?php if(isset($_GET["delete"])){if($_GET["delete"] == $img_id){echo "class='a_img_display'";}};?>><img src="<?php echo htmlentities($img_path) ?>"  title="<?php echo 'ID: '.$img_id; ?>"></a>
							<div style="font-size:12px"><?php echo $img_caption;?></div>
							<a href="<?php echo $_SERVER['PHP_SELF'].'?delete='.$img_id;?>" id="delete_red_cross" title="Delete"><img src="img/icons/delete_red_cross.jpg"></a>
							<div class="img_id"><?php echo $img_id; ?></div>
						</div>


						<?php
						}
					
					}else{echo "<p>There is no image to show</p>";}
					
					?>
				</div>
				<div style="clear:both;"></div>
				<?php echo $output_page;  ?>
			</div>

			<?php 
			include("include/uploaded_images_sidebar.php");
            include($_SERVER['DOCUMENT_ROOT']."/include/footer.php");
			unset($_SESSION['img_caption']);
			
			
			?>
		</div>
	</body>
<html>