<?php 
ob_start();
date_default_timezone_set("Africa/Accra");
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
$now = new DateTime();
$now->setTimezone(new DateTimeZone('Africa/Accra'));
$now = $now->format('Y-m-d H:i:s');


$last_slash = strrpos($_SERVER["PHP_SELF"],"/") + 1;	
$last_dot = strrpos($_SERVER["PHP_SELF"],".");
$subject_url = substr($_SERVER["PHP_SELF"], $last_slash, $last_dot - $last_slash);


?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/workpage.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="icon" type="image/jpg" href="img/icons/favicon.jpg">
		<title><?php echo $subject_url;?></title>
		<?php

		

		?>
	</head>
	<body>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v21.0"></script>
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
			<div class="content" style="border-top:5px solid #ccc">
				<div id="action_list">
					<ul>
						<li><a href=<?php echo $_SERVER["PHP_SELF"]."?write=True"?>>Write New</a></li>
						
						<?php if(isset($_GET["preview"])){ 
						$query = "SELECT `status` FROM `news_content` WHERE `content_id` = {$_GET['preview']}";
						// $query = "SELECT `status` FROM `news_content` WHERE `content_id` = {$_GET['preview']} AND `user_id`= {$user_id}";
						$run = mysqli_query($connection, $query);
						$row = mysqli_fetch_assoc($run);
						

						if( ($row['status'] == 3)){?><li><a href=<?php echo $_SERVER["PHP_SELF"]."?edit=".$_GET["preview"]; ?>>Edit</a></li><?php } ?>
						<?php if( ($row['status'] == 3)){?><li><a href=<?php echo $_SERVER["PHP_SELF"]."?submit=".$_GET["preview"]; ?>>Submit</a></li><?php } ?>
						<?php if($user_level == 1 && $row['status'] == 2){ ?><li><a href=<?php echo $_SERVER["PHP_SELF"]."?publish=".$_GET["preview"]; ?>>Publish</a></li><?php } ?>
						<?php if( ($row['status'] == 3)){?><li><a href=<?php echo $_SERVER["PHP_SELF"]."?delete=".$_GET["preview"]; ?>>Delete</a></li><?php } ?>
						<?php if( ($row['status'] == 2)){?><li><a href="workpage.php?WithdrawSubmission=True&preview=<?php echo $_GET["preview"]; ?>" >Withdraw Submission</a></li><?php } ?>
						<?php if( ($row['status'] == 1) && ($user_level == 1)){?><li><a href="workpage.php?WithdrawPublication=True&preview=<?php echo $_GET["preview"]; ?>" >Withdraw Publication</a></li><?php } ?>

						<?php } ?>

						

						<?php if(isset($_GET["edit"])){ ?>
							
						<li><a href=<?php echo $_SERVER["PHP_SELF"]."?preview=".$_GET["edit"]; ?>>Preview</a></li>
						<?php } ?>
						<li><a href="uploaded-images.php" target="_blank">Uploaded Images</a></li>
						
					</ul>

				</div>
					<?php
						
						if (isset($_GET["InsertSuccess"]) || isset($_GET["UpdateSuccess"])){
							echo "<p class='alert_design'>Successfully Saved</p>";
						}

						if (isset($_GET["UpdateFailure"])){
							echo "<p class='alert_design'>Update Query Error... Record Not Saved</p>";
						}
						

						if(isset($_GET["edit"])){
							$edit = $_GET["edit"];
							$_SESSION["edit_update_query"] = $edit;
							$query = "SELECT * FROM `news_content` WHERE `content_id` = {$edit}";
							$run = mysqli_query($connection, $query);
							
							while($row = mysqli_fetch_assoc($run)){
							 	$_SESSION["datetime"] = $row["publish_date_time"];
								$_SESSION['datetime'] = strftime('%Y-%m-%dT%H:%M:%S', strtotime($_SESSION['datetime']));
								$_SESSION["category"] = htmlentities($row["category_id"]);
								$_SESSION["subject"] = htmlentities($row["subject"]);
								$_SESSION["author"] = htmlentities($row["author"]);
								$_SESSION["content"] = $row["content"];
								$_SESSION["source"] = htmlentities($row["source"]);
								$_SESSION["img_path"] = htmlentities($row["img_id"]);
								$_SESSION["keywords"] = htmlentities($row["keywords"]);
								
								
							}

						}
					
						
						if (isset($_POST["submit_insert"]) || isset($_POST["submit_update"])){
							
							$category = mysqli_real_escape_string($connection, trim($_POST["category"]));
							
							$subject  = str_replace("'","’",trim($_POST["subject"]));
							
							

							

							$subject = mysqli_real_escape_string($connection, $subject);
							
							$keywords = mysqli_real_escape_string($connection, trim($_POST["keywords"]));
							$content = addslashes(trim($_POST["content"]));

							$content = str_replace("<br />
<br />","<br />",$content);//don't give a tab or space on this line or the str_replace wouldn't work!! ghanaweb.com

$content = str_replace("</p>



<p>","

",$content);//don't give a tab or space on this line or the str_replace wouldn't work!!


$content = str_replace("<a target=\'_blank\' href=\'/GhanaHomePage/people/person.php?","<ab ",$content);

							$source = mysqli_real_escape_string($connection, trim($_POST["source"]));
							$img_path = mysqli_real_escape_string($connection, trim($_POST["img_path"]));
							$author = mysqli_real_escape_string($connection, trim($_POST["author"]));

						if(isset($_POST["keywords_chk"])){
							$set = "";
							$keywords_array = [];
							$keywords_string = "";
							$query_kws = "SELECT `keywords`,`subject`,`publish_date_time`,`status`,`content_id` FROM `news_content` WHERE `category_id`= 25";
							$run_kws = mysqli_query($connection, $query_kws);
							while($row_kws = mysqli_fetch_assoc($run_kws)){
									
									if($row_kws["status"] == 1){
										$subject_clean = clean($row_kws["subject"]);
										$year = date("Y",strtotime($row_kws["publish_date_time"]));
										$content_id = $row_kws["content_id"];
										$month = date("m",strtotime($row_kws["publish_date_time"]));
										$file_path ="/".$year."/".$month."/".$subject_clean."-".$content_id.".php";
									}else{
										$file_path = "#";
									}
									
									$keywords_array = explode(",", $row_kws["keywords"]);
									$index = "";
									if($set == ""){
										$haysack = explode(" ",$content);
									}
									
									$needle = $keywords_array;
									$found = [];
									foreach($needle as $key => $value){
										if(in_array(trim(strtolower($value)), array_map("strtolower",$haysack))){
											$index = array_keys($haysack,$value)[0];
											$found[$index] = "<a href=\'{$file_path}\'>".$value."</a>";
										}
									}
									$haysack = array_replace($haysack, $found);
									$set = 1;
							}
							
							$content = implode(" ",$haysack);
						}

						//run code 10x
							// $first_char = strpos($content,"~1~");
							// $last_char = strrpos($content,"~1~");
							// $diff = abs(($first_char - ($last_char - 8)));
							// $substr = substr($content,$first_char,$diff);
							// if($diff > 0){
							// 	$substr_img_id =substr($content,$first_char + 1, $diff - 2);


							// 	// $query_img = "SELECT `img_path` FROM `news_images` WHERE `img_id` = {$substr_img_id}";
							// 	// $run_img = mysqli_query($connection, $query_img);
							// 	// if(mysqli_num_rows($run_img) > 0){
									
							// 	// 		$row_img = mysqli_fetch_assoc($run_img);
							// 	// 		$img_path_replace = $row_img["img_path"];
							// 			// $content = str_replace($substr,".".. ".",$content);
							// 		$content = $content . $first_char. "|". $last_char. "|".$diff."|".$substr;
									
							// 	// }
								
							// }


							
							if(empty($img_path)){$img_path = 0;}
							if(empty($category) ||  empty($subject) ||  empty($content)){
								echo "<div class='red_color'>Unable to save because of the following reasons</div>";
								echo "<ul class='red_color'>";

								if(empty($category)){
									echo "<li>You must select category</li>";
								}else{$_SESSION["category"] = $category;}
								if(empty($subject)){
									echo "<li>You must enter subject</li>";
								}else{$_SESSION["subject"] = $subject;}
								if(empty($content)){
									echo "<li>Content is empty</li>";
								}else{$_SESSION["content"] = $content;}
								
								
								$_SESSION["author"] = $author;
								$_SESSION["source"] = $source;
								$_SESSION["img_path"] = $img_path;
								echo "</ul>";
							}else{
								
								
								if (isset($_POST["submit_insert"])){
									
									$query = "INSERT INTO `news_content` (`content_id`, `category_id`, `subject`, `content`, `status`, `user_id`, `written_date_time`, `submit_date_time`, `publish_date_time`, `last_update`, `source`, `headline`, `news_or_article`, `top_story`, `img_id`,`keywords`,`author`) ";
									$query .= "VALUES (NULL, '$category', '$subject', '$content', '3', {$user_id}, '{$now}', NULL, NULL, '{$now}', '$source', NULL, NULL, NULL, '$img_path','{$keywords}','{$author}')";
									
									$run = mysqli_query($connection,$query);

									if(mysqli_insert_id($connection)>0){
										header("Location: {$_SERVER['PHP_SELF']}?edit=".mysqli_insert_id($connection)."&InsertSuccess=Yes");
										die();
										
									}else{"<div class='red_color'>Server Error... Record Not Saved</div>";}
								
								}else{

									$content_id = $_SESSION["edit_update_query"];
									
									$query = "UPDATE `news_content` SET `category_id` = '$category', `subject` = '$subject', `content` = '$content', `last_update` = '{$now}', `source` = '$source', `img_id` = {$img_path},`keywords` = '{$keywords}', `author` = '$author' WHERE `news_content`.`content_id` = '$content_id'";

									$run = mysqli_query($connection,$query);
									mysqli_affected_rows($connection);
									if(mysqli_affected_rows($connection) >0 ) {
										header("Location: {$_SERVER['PHP_SELF']}?edit=".$content_id."&UpdateSuccess=Yes");
										die();
									}else{
										header("Location: {$_SERVER['PHP_SELF']}?edit=".$content_id."&UpdateFailure=Yes");
										die();
									
									}
									
								}

								
								
							}
						}

						
					?>
					<?php

						if(isset($_GET["WithdrawSubmitYesNo"])){
							if ($_GET["WithdrawSubmitYesNo"]=="Yes"){
								$preview_ = $_GET["preview"];
								$query = "UPDATE `news_content` SET `status` = '3' WHERE `news_content`.`content_id` = '$preview_'";
								$run = mysqli_query($connection,$query);
								if(mysqli_affected_rows($connection) > 0){
									echo "<p class='alert_design'>Submission Withdrawn Successfully !!</p>";
								}else echo "<p class='alert_design'>Server Error... content not published</p>";
							}
							if ($_GET["WithdrawSubmitYesNo"]=="No"){echo "<p class='alert_design'>Withdrawal Aborted!!</p>";}
						}



						if(isset($_GET["WithdrawSubmission"]) && !isset($_GET["WithdrawSubmitYesNo"])){
							
							$preview_ = $_GET["preview"];
						?>

						<div class="wrapper-confirmatin">
							<div class="title-confirmation">Withdraw Submit</div>
							<div class="body-confirmation">Withdraw submission of this content...?</div>
							<div class = "YesNo"><div class="Yes"><a href="<?php echo $_SERVER['PHP_SELF'].'?preview='.$preview_.'&WithdrawSubmitYesNo=Yes' ?>">Yes</a></div><div class = "No"><a href="<?php echo $_SERVER['PHP_SELF'].'?preview='.$preview_.'&WithdrawSubmitYesNo=No' ?>">No</a></div></div>
						</div>

						<?php
						}

						if(isset($_GET["WithdrawPublishYesNo"])){

							if ($user_level == 1) {
								if ($_GET["WithdrawPublishYesNo"]=="Yes"){
									$preview_ = $_GET["preview"];
									$query = "UPDATE `news_content` SET `status` = '2' WHERE `news_content`.`content_id` = '$preview_'";
									$run = mysqli_query($connection,$query);
									if(mysqli_affected_rows($connection) > 0){

										
										$query = "SELECT `news_content`.`publish_date_time`,`news_content`.`subject` FROM `news_content` WHERE `news_content`.`content_id` = {$preview_}";
										$run = mysqli_query($connection,$query);
										$row = mysqli_fetch_assoc($run);
										$year = date("Y",strtotime($row["publish_date_time"]));
										$month = date("m",strtotime($row["publish_date_time"]));
										$subject = $row["subject"];
										$folder = $year."/".$month."/";
										$newfile =$folder.clean($subject)."-{$preview_}.php";
										unlink($newfile);

										echo "<p class='alert_design'>Publication Withdrawn Successfully !!</p>";
									}else echo "<p class='alert_design'>Server Error... content not published</p>";
								}
								if ($_GET["WithdrawPublishYesNo"]=="No"){echo "<p class='alert_design'>Withdrawal Aborted!!</p>";}
							}else{echo "<p class='alert_design'>You cannot perform this action !!</p>";}
						}

						if(isset($_GET["WithdrawPublication"]) && !isset($_GET["WithdrawPublishYesNo"])){
							
							$preview_ = $_GET["preview"];
						?>
						<div class="wrapper-confirmatin">
							<div class="title-confirmation">Withdraw Publication</div>
							<div class="body-confirmation">Withdraw publication of this content...?</div>
							<div class = "YesNo"><div class="Yes"><a href="<?php echo $_SERVER['PHP_SELF'].'?preview='.$preview_.'&WithdrawPublishYesNo=Yes' ?>">Yes</a></div><div class = "No"><a href="<?php echo $_SERVER['PHP_SELF'].'?preview='.$preview_.'&WithdrawSubmitYesNo=No' ?>">No</a></div></div>
						</div>

						<?php
						}

						if(isset($_GET["submit"]) && !isset($_GET["SubmitYesNo"])){
							$_GET["preview"]=$_GET["submit"];
							$preview_ = $_GET["preview"];

						?>
						<div class="wrapper-confirmatin">
							<div class="title-confirmation">Submit Confirmation</div>
							<div class="body-confirmation">Are you sure you want to submit this content...?</div>
							<div class = "YesNo"><div class="Yes"><a href="<?php echo $_SERVER['PHP_SELF'].'?preview='.$preview_.'&SubmitYesNo=Yes' ?>">Yes</a></div><div class = "No"><a href="<?php echo $_SERVER['PHP_SELF'].'?preview='.$preview_.'&SubmitYesNo=No' ?>">No</a></div></div>
						</div>

						<?php
						}
						if(isset($_GET["SubmitYesNo"])){
							if ($_GET["SubmitYesNo"]=="Yes"){
								$preview_ = $_GET["preview"];
								$query = "UPDATE `news_content` SET `status` = '2', `submit_date_time` = '{$now}' WHERE `news_content`.`content_id` = '$preview_'";
								$run = mysqli_query($connection,$query);
								if(mysqli_affected_rows($connection) > 0){
									echo "<p class='alert_design'>Successfully Submitted!!</p>";
								}else echo "<p class='alert_design'>Server Error... content not published</p>";
							}
							if ($_GET["SubmitYesNo"]=="No"){echo "<p class='alert_design'>Submission Aborted!!</p>";}
						}


						if(isset($_GET["publish"]) && !isset($_GET["PublishYesNo"])){
							$_GET["preview"]=$_GET["publish"];
							$preview_ = $_GET["preview"];
						?>

						<div class="wrapper-confirmatin">
							<div class="title-confirmation">Publish Confirmation</div>
							<div class="body-confirmation">Are you sure you want to publish this content...?</div>
							
								<div>
									<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
										<input type="hidden" name="publish_id" value="<?php echo $preview_; ?>">
										<div class="publish_date_time_update" style="position:relative;margin-bottom:25px;">
											<lable for="publish_date_time_update">Publish date and time</lable><br><input type="datetime-local" value="<?php echo strftime('%Y-%m-%dT%H:%M:%S', time()); ?>" id="publish_date_time_update" name="publish_date_time_update">
										
											<fieldset id="news_or_article" style="margin-top:8px;right:60px;border:green solid 2px;">
												<label for="news" style="display:inline">News</label><input type="radio" name="news_or_article" value="1" id="news" checked style="display:inline">&nbsp;&nbsp;&nbsp;&nbsp;
												<label for="article" style="display:inline">Article</label><input type="radio" name="news_or_article" value="0" id="article" style="display:inline">
											</fieldset>
											
											<fieldset style="margin-top:8px;right:60px;border:green solid 2px;">
												<label for="headline" style="display:inline;">Main Headline</label><input type="checkbox" name="headline" value="1" id="headline" style="display:inline;">
												&nbsp;&nbsp;&nbsp;&nbsp;<label for="top_story" style="display:inline;">Main Top Story</label><input type="checkbox" name="top_story" value="1" id="top_story" style="display:inline;">
												<br><label for="subscribers" style="display:inline;">Send Copy to subscribers?</label><input type="checkbox" name="subscribers" value="1" id="subscribers" style="display:inline;" checked >
											
											
											
											</fieldset>
											<fieldset style="margin-top:8px;right:60px;border:green solid 2px;">
												<label for="category_headline" style="display:inline;">Category Headline</label><input type="checkbox" name="category_headline" value="1" id="category_headline" style="display:inline;">
												&nbsp;&nbsp;&nbsp;&nbsp;<label for="category_top_story" style="display:inline;">Category Top Story</label><input type="checkbox" name="category_top_story" value="1" id="category_top_story" style="display:inline;">
											</fieldset>
											<fieldset id="video_attached" style="margin-top:8px;right:60px;border:green solid 2px;">
												<label for="video_attached" style="display:inline" >Video Attached</label><input type="radio" name="is_video_attached" value="1" id="video_attached" style="display:inline">&nbsp;&nbsp;&nbsp;&nbsp;
												<label for="no_video_attached" style="display:inline">No Video Attached</label><input type="radio" name="is_video_attached" value="0" id="no_video_attached" checked style="display:inline">
											</fieldset>											
											
											
										</div>
										
										<div class = "yesno_publish">
											<input type="submit" name="yes" value="Yes" class="Yes_publish">
											
											<div class = "no_publish"><a href="<?php echo $_SERVER['PHP_SELF'].'?preview='.$preview_.'&PublishYesNo=No' ?>">No</a></div>
										</div>
									</form>
								</div>		
						</div>
						<?php
						}
						if(isset($_GET["published"])){
							if($_GET["published"]=="true"){
								echo "<p class='alert_design'>Successfully Published!!</p>";
							}elseif($_GET["published"]=="false"){
								echo "<p class='alert_design'>File already exist... change subject!!</p>";
							}
						}
						
						if(isset($_POST["yes"])){
							
								$preview_ = $_POST["publish_id"];
								$publish_date_time = $_POST["publish_date_time_update"];
								$news_or_article = $_POST["news_or_article"];
								$is_video_attached = $_POST["is_video_attached"];
								if(!isset($_POST["top_story"])){$top_story = 0;}else{$top_story = $_POST["top_story"];}
								if(!isset($_POST["headline"])){$headline = 0;}else{$headline = $_POST["headline"];}

								if(!isset($_POST["category_top_story"])){$category_top_story = 0;}else{$category_top_story = $_POST["category_top_story"];}
								if(!isset($_POST["category_headline"])){$category_headline = 0;}else{$category_headline = $_POST["category_headline"];}
								$query = "UPDATE `news_content` SET `status` = '1', `publish_date_time` = '$publish_date_time', `news_or_article`={$news_or_article}, `top_story`={$top_story}, `headline`={$headline}, `category_top_story`={$category_top_story}, `category_headline`={$category_headline}, `is_video_attached`={$is_video_attached} WHERE `news_content`.`content_id` = '$preview_'";
								$run = mysqli_query($connection,$query);
								
								if(mysqli_affected_rows($connection) > 0){
									
									$query = "SELECT `news_content`.`publish_date_time`,`news_content`.`subject`,`news_content`.`content` FROM `news_content` WHERE `news_content`.`content_id` = {$preview_}";
									$run = mysqli_query($connection,$query);
									$row = mysqli_fetch_assoc($run);
									$year = date("Y",strtotime($row["publish_date_time"]));
									$month = date("m",strtotime($row["publish_date_time"]));
									$subject = $row["subject"];
									$folder = $year."/".$month."/";
									if(!file_exists($folder)){
										if (!mkdir($folder, 0777, true)) {
											die('Failed to create directories...');
										}
									}
									$file = "news_structure.php";
									$newfile =$folder.clean($subject)."-{$preview_}.php";

									if(!file_exists($newfile)){
										if (!copy($file, $newfile)) {//copies file

											die(header("Location: ".$_SERVER["PHP_SELF"]."?preview={$preview_}&published=false"));	
										}else{


											if(isset($_POST["subscribers"])){
												if($top_story == 1 || $headline == 1){
													if($_SERVER['REMOTE_ADDR']=='::1'){
														$from_external = "localhost";
													}else{
														$from_external = "wikighana.com";
													}
													$file_path =$year."/".$month."/".clean($subject)."-".$preview_.".php";
													$subject = $subject;
													
			
													$query = "SELECT `username`, `email`,`user_id` FROM `wiki_visitors` WHERE `is_subscribed` = 1";
													$run = mysqli_query($connection, $query);
													$to_array = [];
													while($row = mysqli_fetch_assoc($run)){
													
														// array_push($to_array,$row["email"]);

														$to =$row["email"];
														$string = "abcdefghigklmnopkrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
														$shuffled_str = str_shuffle($string);
														
														
														$message = "<p style ='font-family:sans-serif;font-size:13px;'>Hello {$row['username']},<p>";
														$message .= "<h3 style ='font-family:sans-serif;font-size:20px;'><a href='http://{$from_external}/{$file_path}'>{$subject}</a></h3>";
														
														$message .= "<br><br><p style = 'font-family:sans-serif;font-size:13px;'>This e-mail was sent by Wiki Ghana Limited. If you think this is SPAM and if you no longer want to receive these messages, please click the <a href='http://{$from_external}/unsubscribe.php?id={$row['user_id']}&pass-code={$shuffled_str}'>Unsubscribe</a>.</p>";
														// Always set content-type when sending HTML email
														$headers = "MIME-Version: 1.0" . "\r\n";
														$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
											
														// More headers
														$headers .= 'From: Wiki Ghana <noreply@wikighana.com>' . "\r\n";
														// $headers .= 'Cc: myboss@example.com' . "\r\n";
														// $headers .= 'BCC: '. implode(",", $to_array) . "\r\n";
														mail($to,$subject,$message,$headers);
														
														$query = "UPDATE `wiki_visitors` SET `pass_code`= '{$shuffled_str}' WHERE `user_id`={$row['user_id']}";
														mysqli_query($connection, $query);
													}
													
									
												}
											}




											die(header("Location: ".$_SERVER["PHP_SELF"]."?preview={$preview_}&published=true"));	
										}
									}else{die(header("Location: ".$_SERVER["PHP_SELF"]."?preview={$preview_}&published=false"));	}
									

								}else echo "<p class='alert_design'>Server Error... content not published</p>";
							
						}elseif(isset($_GET["PublishYesNo"])){ if($_GET["PublishYesNo"]=="No"){echo "<p class='alert_design'>Publish Aborted!!</p>";}}
						if(isset($_GET["delete"]) && !isset($_GET["DeleteYesNo"])){
							$_GET["preview"]=$_GET["delete"];
							$preview_ = $_GET["preview"];
							?>
							<div class="wrapper-confirmatin">
								<div class="title-confirmation">Delete Confirmation</div>
								<div class="body-confirmation">Are you sure you want to delete this content...?</div>
								<div class = "YesNo"><div class="Yes"><a href="<?php echo $_SERVER['PHP_SELF'].'?preview='.$preview_.'&DeleteYesNo=Yes' ?>">Yes</a></div><div class = "No"><a href="<?php echo $_SERVER['PHP_SELF'].'?preview='.$preview_.'&DeleteYesNo=No' ?>">No</a></div></div>
							</div>
						<?php
						}

						if(isset($_GET["deleted"])){
							if($_GET["deleted"]="yes"){
								echo "<p class='alert_design'>Successfully Deleted!!</p>";
							}
						}
						if(isset($_GET["DeleteYesNo"])){

							$query = "SELECT `news_content`.`status`,`news_content`.`user_id` FROM `news_content` WHERE `news_content`.`content_id` = {$_GET['preview']}";
							$run = mysqli_query($connection,$query);
							$row = mysqli_fetch_assoc($run);

							if($row['status'] == 3){
								if($row['user_id'] == $user_id || $user_level == 1){
									if ($_GET["DeleteYesNo"]=="Yes"){

										$preview_ = $_GET["preview"];
										$query = "DELETE FROM  `news_content` WHERE `news_content`.`content_id` = '$preview_'";
										$run = mysqli_query($connection,$query);
										if(mysqli_affected_rows($connection) > 0){
											
											$query = "SELECT content_id FROM `news_content` WHERE (last_update=(SELECT MAX(last_update) FROM news_content WHERE `user_id`='$user_id'))";
											$run = mysqli_query($connection,$query);
											$row = mysqli_fetch_assoc($run);
											echo $content_id = $row["content_id"];
											if($content_id > 0){
												header("Location: ".$_SERVER["PHP_SERVER"]."?preview={$content_id}&deleted=yes");
												die();
											}else{
												header("Location: ".$_SERVER["PHP_SERVER"]);
												die();
											}
											
										}else echo "<p class='alert_design'>Server Error... content not deleted</p>";
									}
									if ($_GET["DeleteYesNo"]=="No"){echo "<p class='alert_design'>Deletion Aborted!!</p>";}
								}else{echo "<p class='alert_design'>This action is not allowed</p>";}
							}else{echo "<p class='alert_design'>This action is not allowed</p>";}
						}
						if(isset($_GET["preview"])){
							$preview = $_GET["preview"];
							$query = "SELECT news_content.*,category_name FROM `news_content` INNER JOIN news_category ON news_content.category_id = news_category.category_id WHERE `news_content`.`content_id` = {$preview}";
							$run = mysqli_query($connection, $query);
							if(mysqli_num_rows($run) > 0){
								while($row = mysqli_fetch_assoc($run)){
									$preview_datetime = $row["publish_date_time"];
									$submit_datetime = $row["submit_date_time"];
									$submit_datetime_format = date(' jS F Y h:i A',strtotime($row["submit_date_time"]));
									$preview_category_name = $row["category_name"];
									$preview_subject = htmlentities($row["subject"]);
									$preview_content = nl2br($row["content"]);
									$preview_source = htmlentities($row["source"]);
									
									$img_id = htmlentities($row["img_id"]);
									
									$preview_publish_date_time = date(' jS F Y h:i A',strtotime($row["publish_date_time"]));
									$status = $row["status"];
									$last_update = date(' jS F Y h:i A',strtotime($row["last_update"]));
								}
								$query = "SELECT `img_path` FROM `news_images` WHERE `img_id` = {$img_id}";
								$run = mysqli_query($connection, $query);
								if(mysqli_num_rows($run) > 0){
									$row = mysqli_fetch_assoc($run);
									$preview_img_path = $row["img_path"];
								}
							}
					?>
				<div id="preview"><!-- PREVIEW -->
					
					<div>Category: <?php echo $preview_category_name;?></div>
					<div style="margin:10px 0;">Topic/Subject: <?php echo $preview_subject;?></div>
					
					<div style="margin-bottom:10px;position:relative;" > <?php if(isset($preview_img_path)){echo "<img src='{$preview_img_path}' width='100px'>";}?> <div style="position:absolute;top:0;right:0"><?php if($status == 2){echo "<span class='yellow_color_bold'>&#10004</span>";}elseif($status == 1){echo "<span class='red_color_bold'>&#10004</span>";}?> </div></div>
					<hr>
					<div style="text-align:justify;" id="preview_content"><?php echo $preview_content;?></div>
					<hr>
					<p>Last Update: <?php echo $last_update; ?></p>
					<p>Submit Date:<?php if(empty($submit_datetime)){echo "Not submitted";}else{echo $submit_datetime_format;} ?></p>
					<p>Published Date:<?php if(empty($preview_datetime)){echo "Not published";}else{echo $preview_publish_date_time;} ?></p>
				</div>	
					<?php
						}
					?>
				<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" id="form_content"  <?php if(isset($_GET["preview"])){ echo "class='hide_form'";}?>>
					<select name = "category" id="category" style="padding:5px 10px;border-radius:10px;" title="Category">
						<option value="0">-- Select Category --</option>
					<?php
					$query = "SELECT  category_id, category_name FROM news_category WHERE category_id IN(3,4,5,6,7,10,24,25,26,28,29) ORDER BY category_name";
					$run = mysqli_query($connection, $query);
					while($row = mysqli_fetch_assoc($run)){
						$category_id =$row['category_id'];
						$category_name = $row['category_name'];
					?>
						<option value=<?php echo $category_id;  if(isset($_SESSION["category"])){if($category_id == $_SESSION["category"]){echo " selected";}} ?>><?php echo $category_name;?></option>
					<?php
					}
					?>
					</select>
					<ul>
						<li><label for="subject" style="margin-left:10px;">Subject</label><input type="text" id="subject" title="Subject" name="subject" value="<?php if(isset($_SESSION["subject"])){echo $_SESSION['subject'];}?>" style="padding:5px 10px;border-radius:10px;" required></li>
						<li><label for="content" style="margin-left:10px;">Content</label><textarea id="content" name="content" rows="50"  style="padding:10px;border-radius:10px;"  placeholder="&lt;strong&gt;Make text bold&lt;/strong&gt;&#13;&#10;&#13;&#10;&lt;em&gt;Make text italics&lt;/em&gt;&#13;&#10;&#13;&#10;&lt;img href=&quot;enter_full_image_path_here&quot; /&gt;&#13;&#10;Insert an image&#13;&#10;&#13;&#10;embedded &lt;iframe&gt; settings for Youtube only&#13;&#10;width=100%&#13;&#10;height=500px&#13;&#10;" reuired ><?php if(isset($_SESSION["content"])){echo $_SESSION["content"];}?></textarea></li>
						<li><label for="keywords" style="margin-left:10px;">Keywords</label><input type="text" title="Keywords" placeholder="Separate keywords with comma(,) eg mango,fruits like mangoes,mangoes. Make sure there is NO leading spaces before and after." name="keywords" id="keywords" value="<?php if(isset($_SESSION["keywords"])){echo $_SESSION['keywords'];}?>" style="padding:5px 10px;border-radius:10px;"></li>
						<li><label for="author" style="margin-left:10px;">Source</label><input type="text" title="Author" name="author" id="author" value="<?php if(isset($_SESSION["author"])){echo $_SESSION["author"];}?>" style="padding:5px 10px;border-radius:10px;" required ></li>
						
						<li><label for="source" style="margin-left:10px;"></label><input type="hidden" title="Sources" name="source" id="source" value="" style="padding:5px 10px;border-radius:10px;"></li>
						<li><label for="img_path" style="margin-left:10px;">Enter Image ID</label><input type="text" title="Image ID" name="img_path" id="img_path" value="<?php if(isset($_SESSION["img_path"])){echo $_SESSION["img_path"];}?>" style="padding:5px 10px;border-radius:10px;" required></li>
					</ul>
					<input type="submit"  name=<?php if (isset($_GET["edit"])){echo "submit_update";}else{echo "submit_insert";} ?> value="Save As Draft" id = "submit" >
					<label for="keywords_chk" style="display:inline;margin-left:30px;">Pass through Keywords</label><input type="checkbox" value="1" id="keywords_chk" name="keywords_chk">
					<br><br>
				</form>

			
			</div>
			
			<?php include($_SERVER['DOCUMENT_ROOT']."/include/workpage_sidebar.php");
			
            include($_SERVER['DOCUMENT_ROOT']."/include/footer.php");

			
			//unset all forms global variables
			unset($_SESSION["datetime"]);
			unset($_SESSION["category"]);
			unset($_SESSION["subject"]);
			unset($_SESSION["content"]);
			unset($_SESSION["source"]);
			unset($_SESSION["img_path"]);
			unset($_SESSION["keywords"]);
			unset($_SESSION["author"]);
			
			mysqli_close($connection);
			?>
		</div>
	</body>
<html>