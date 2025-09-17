<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/include/pop-up-chat.php");
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/friends.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Friends - Wiki Ghana</title>
		<link rel="canonical" href="/friends.php">
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
				

				$UpdateStatus = "";
				$current_profile_photo = "";
				$current_cover_photo = "";
				$interval_y = 0;
				$interval_m = 0;
				$interval_d = 0;
				$interval_days = 0; //show total amount of days
				$interval_h = 0;
				$interval_i = 10;

				$show_all_friends = "";
				$show_all_friends_blocked = "";
				$show_all_request_received = "";
				$show_all_request_sent = "";
				$max_record = 10;//max records to show when you first open friends.php page
				$current_profile_photo_id = 0;
				$current_cover_photo_id = 0;
				$profile_photo = 0;
				$cover_photo = 0;
				
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
				
				if(mysqli_num_rows($run)>0){ 
					$row = mysqli_fetch_assoc($run);
					$current_profile_photo = $row["img_path"];
					$current_profile_photo_id = $row["id"];
				
				}


				$query = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id} AND `is_cover` = 1 AND `updated_date_time_cover` = (SELECT Max(`updated_date_time_cover`) FROM `dating_images` WHERE `is_cover`=1)";
				$run = mysqli_query($connection,$query);
				if(mysqli_num_rows($run)>0){ 
					$row = mysqli_fetch_assoc($run);
					$current_cover_photo = $row["img_path"];
					$current_cover_photo_id = $row["id"];
				}

				?>
			<div class="content_flex">
				<div class="content">
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="#">Friends</a></div>
					


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
			
			<?php

		if(isset($_GET["cancel"]) && isset($_GET["confirm"]) && isset($_GET["id2"])){
			if($_GET["id2"] == $user_id){
				$id = $_GET["cancel"];
				if($_GET["confirm"]=="yes"){
					$query = "UPDATE `wiki_friends` SET `status` = 5, `action_by` = $user_id WHERE (`id` = $id AND (`user_id_from` = $user_id OR `user_id_to` = $user_id))";
					$run = mysqli_query($connection, $query);
					if(mysqli_affected_rows($connection)){
						$output .= "<p><span style='color:green'>You have successfully unfriended </span><span style='color:red'>" . ucwords($_GET["fname"]). "</span></p>";
					}

					
				}
			}
		}


	if(isset($_GET["cancel"]) && !isset($_GET["confirm"])  && isset($_GET["id2"])){
		if($_GET["id2"] == $user_id){
			$query = "SELECT `fname`, `mname`, `lname` FROM `wiki_dating_profile` WHERE `id` =  {$_GET['id']}";
			$run = mysqli_query($connection,$query);
			$row = mysqli_fetch_assoc($run);
			$fullname = $row["fname"] . " ". $row["mname"] . " " . $row["lname"]
		
			?>
			<div class="wrapper-confirmatin" id="cancel-confirm070225">
				<div class="title-confirmation">Unfriend Confirmation</div>
				<div class="body-confirmation"><span style="color:black">Are you sure you want to Unfriend:</span> <?php echo ucwords($fullname)." ?" ?> </div>
				<div class = "YesNo"><div class="Yes"><a href="<?php echo $_SERVER['PHP_SELF'].'?cancel='.$_GET['cancel'].'&confirm=yes'.'&id2='.$_GET['id2'].'&fname='.$fullname ?>">Yes</a></div><div class = "No"><a href="<?php echo $_SERVER['PHP_SELF'].'?confirm=no' ?>">No</a></div></div>
			</div>
			<?php
		}

	}


	if(isset($_GET["reject"]) && isset($_GET["id"]) && isset($_GET["id2"])){
		if($_GET["id2"] == $user_id){
			$id = $_GET["reject"];
				$query = "UPDATE `wiki_friends` SET `status` = 3 WHERE (`id` = $id AND (`user_id_from` = $user_id OR `user_id_to` = $user_id))";
				$run = mysqli_query($connection, $query);
				if(mysqli_affected_rows($connection)){
					$output .= "<p><span style='color:green'>You have successfully rejected friend request from </span><span style='color:red'>" . ucwords($_GET["fname"]). "</span></p>";
				}
		}
	}


	if(isset($_GET["accept"]) && isset($_GET["id"]) && isset($_GET["id2"])){
		if($_GET["id2"] == $user_id){
			$id = $_GET["accept"];
			
				$query = "UPDATE `wiki_friends` SET `status` = 2 WHERE (`id` = $id AND (`user_id_from` = $user_id OR `user_id_to` = $user_id))";
				$run = mysqli_query($connection, $query);
				if(mysqli_affected_rows($connection)){
					$output .= "<p><span style='color:green'>You have successfully accepted friend request from </span><span style='color:red'>" . ucwords($_GET["fname"]). "</span></p>";
					$user_id_friend = $_GET["id"];
					$query3 = "INSERT INTO `wiki_notification` (`notification_id`, `user_id`, `url`, `is_seen`, `is_read`, `msg_type`, `notification_date_time`, `source_id`, `sender_username`, `is_sender_user`)";
					$query3 .=" VALUES (NULL, $user_id_friend, '$user_id', '0', '0', '4', now(), 0,'N/A', '1');";
					$run3 = mysqli_query($connection, $query3);
				}

				
		}
	}

	if(isset($_GET["block"]) && isset($_GET["id"]) && isset($_GET["id2"])){
		if($_GET["id2"] == $user_id){
			$id = $_GET["block"];
			
				$query = "UPDATE `wiki_friends` SET `status` = 4, `action_by` = $user_id WHERE (`id` = $id AND (`user_id_from` = $user_id OR `user_id_to` = $user_id))";
				$run = mysqli_query($connection, $query);
				if(mysqli_affected_rows($connection)){
					$output .= "<p><span style='color:green'>You have successfully blocked </span><span style='color:red'>" . ucwords($_GET["fname"]). "</span></p>";
				}
		}
	}

	if(isset($_GET["cancel-request-sent"]) && isset($_GET["id"]) && isset($_GET["id2"])){
		if($_GET["id2"] == $user_id){
			$id = $_GET["cancel-request-sent"];
			
				$query = "UPDATE `wiki_friends` SET `status` = 7, `action_by` = $user_id WHERE (`id` = $id AND (`user_id_from` = $user_id OR `user_id_to` = $user_id))";
				$run = mysqli_query($connection, $query);
				if(mysqli_affected_rows($connection)){
					$output .= "<p><span style='color:green'>You have successfully cancelled friend request sent to </span><span style='color:red'>" . ucwords($_GET["fname"]). "</span></p>";
				}
		}
	}

	if(isset($_GET["unblock"]) && isset($_GET["id"]) && isset($_GET["id2"])){
		if($_GET["id2"] == $user_id){
			$id = $_GET["unblock"];
			
				$query = "UPDATE `wiki_friends` SET `status` = 6, `action_by` = $user_id WHERE (`id` = $id AND (`user_id_from` = $user_id OR `user_id_to` = $user_id))";
				$run = mysqli_query($connection, $query);
				if(mysqli_affected_rows($connection)){
					$output .= "<p><span style='color:green'>You have successfully unblocked </span><span style='color:red'>" . ucwords($_GET["fname"]). "</span></p>";
				}
		}
	}

//Friends requested accepted
	$query = "SELECT COUNT(*) AS count_records FROM `wiki_friends` WHERE (`user_id_from` = {$user_id} OR `user_id_to` = {$user_id}) AND `status` = 2";
	$run = mysqli_query($connection, $query);
	if(mysqli_num_rows($run)>0){ 
		$row = mysqli_fetch_assoc($run);
		$count_records = $row["count_records"];
		if ($count_records > $max_record ){
			if(!isset($_GET["showallfriends"])){
				$show_all_friends = "<div style='clear:both;color:white'>.</div><div style='clear:both;text-align:center;'><a style='color:blue;text-decoration:none;' href='friends.php?showallfriends={$count_records}#friendsdiv'>Show All</a></div>";
			}
		}
	}
	if(isset($_GET["showallfriends"])){
		$max_record = $_GET["showallfriends"];
	}
echo $output."<div id='friendsdiv' style='background:#ccc;margin:20px 0;padding:5px 10px;'>Friends ({$count_records})</div>";
					$query = "SELECT * FROM `wiki_friends` WHERE (`user_id_from` = {$user_id} OR `user_id_to` = {$user_id}) AND `status` = 2 LIMIT $max_record";
					$run = mysqli_query($connection,$query);
					if(mysqli_num_rows($run)>0){ 
						while($row = mysqli_fetch_assoc($run)){
							if($row["user_id_from"] != $user_id){
								$user_id_friend = $row["user_id_from"];
							}else{
								$user_id_friend = $row["user_id_to"];
							}
							$id = $row["id"];
							// $query = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
							

							$query4 = "SELECT `last_activity` FROM `login_details` WHERE `user_id` = {$user_id_friend} ";
							$run4 = mysqli_query($connection,$query4);
							if(mysqli_num_rows($run4)>0){ 
								while($row4 = mysqli_fetch_assoc($run4)){
									
									$datetime = $row4["last_activity"];

									$datetime = strtotime($datetime);
									$datetime1 = date('m/d/Y H:i', $datetime);
									$datetime2 = date('m/d/Y H:i', time());
									
									$date1 = new DateTime($datetime2);
									$date2 = new DateTime($datetime1);
									$interval = $date1->diff($date2);
									$interval_y = $interval->y;
									$interval_m = $interval->m;
									$interval_d = $interval->d;
									$interval_days = $interval->days; //show total amount of days
									$interval_h = $interval->h;
									$interval_i = $interval->i;
									
								}
							}




							$query2 = "SELECT `fname`,`mname`,`lname` FROM `wiki_dating_profile` WHERE `id` = {$user_id_friend} ";
							$run2 = mysqli_query($connection,$query2);
							if(mysqli_num_rows($run2)>0){ 
								while($row2 = mysqli_fetch_assoc($run2)){
									
									$full_name = $row2["fname"] . " " . $row2["mname"] . " " . $row2["lname"];

									$query3 = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id_friend} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
									$run3 = mysqli_query($connection,$query3);
									if(mysqli_num_rows($run3)>0){ 
										$row3 = mysqli_fetch_assoc($run3);
										$img_path = $row3["img_path"];
									}else{$img_path = "/img/icons/login.jpg";}

?>

						<div class="img_display">
							<a href="<?php echo "profile-public.php?id={$user_id_friend}" ?>" style="text-decoration:none;color:blue;"><img alt="<?php echo $full_name; ?>" src="<?php echo htmlentities($img_path) ?>" class="img_class" id="<?php echo $id; ?>" style="width:100%;max-width:300px"><span style="text-align:center;display:block;"><?php echo substr(ucwords($full_name),0,15); ?></span></a>
							<a class="img-action chat" id="set-profile-photo" user_id_friend="<?php echo $user_id_friend; ?>" title="Chat"><i class="bi bi-chat-dots-fill green"></i></a>
							
							<?php if($interval_i <= 3 && $interval_d == 0 && $interval_h == 0 && $interval_m == 0 && $interval_y == 0){ ?>
								<a class="img-action" id="online" style="border-radius:15px;display:block;width:30px;height:30px;" href="<?php echo "profile-public.php?id={$user_id_friend}";  ?>" title="online"><img src="/img/icons/online.png" style="width:24px;height:24px;border-radius:12px;text-align:center;margin-left:3px;margin-top:3px;"></a>
							<?php }else{ ?>
								<a class="img-action" id="online" style="border-radius:15px;display:block;width:30px;height:30px;" href="<?php echo "profile-public.php?id={$user_id_friend}";  ?>" title="online"><img src="/img/icons/offline.png" style="width:24px;height:24px;border-radius:12px;text-align:center;margin-left:3px;margin-top:3px;"></a>
							<?php } ?>
							<a id="delete-photo" class="img-action" href="<?php echo "friends.php?cancel={$id}&id={$user_id_friend}&id2={$user_id}#cancel-confirm070225"; ?>" title="Unfriend"><i class="bi bi-x-circle-fill green"></i></a>
							<?php echo "<div style='text-align:center'>".mutual_friends($user_id,$user_id_friend,$connection)."</div>";?>
						</div>

<?php


								}
							}
						}
					}else{echo "<p> You have no friends</p>";}
					echo $show_all_friends;


				//Friends request received	
				$query = "SELECT COUNT(*) AS count_records FROM `wiki_friends` WHERE (`user_id_to` = {$user_id}) AND `status` = 1";
				$run = mysqli_query($connection, $query);
				if(mysqli_num_rows($run)>0){ 
					$row = mysqli_fetch_assoc($run);
					$count_records = $row["count_records"];
					if ($count_records > $max_record ){
						if(!isset($_GET["showallfriendsrequestreceived"])){
							$show_all_request_received = "<div style='clear:both;color:white'>.</div><div style='clear:both;text-align:center;'><a style='color:blue;text-decoration:none;' href='friends.php?showallfriendsrequestreceived={$count_records}#friendsrequestreceived'>Show All</a></div>";
						}
					}
				}
				if(isset($_GET["showallfriendsrequestreceived"])){
					$max_record = $_GET["showallfriendsrequestreceived"];
				}

				echo "<div style='clear:both'></div><div id='friendsrequestreceived' style='background:#ccc;margin:20px 0;padding:5px 10px;'>Friends Request Received ({$count_records})</div>";
				$query = "SELECT * FROM `wiki_friends` WHERE (`user_id_to` = {$user_id}) AND `status` = 1 LIMIT $max_record";
				$run = mysqli_query($connection,$query);
				if(mysqli_num_rows($run)>0){ 
					while($row = mysqli_fetch_assoc($run)){
						
							$user_id_friend = $row["user_id_from"];
					
						$id = $row["id"];
						
						$query2 = "SELECT `fname`,`mname`,`lname` FROM `wiki_dating_profile` WHERE `id` = {$user_id_friend} ";
						$run2 = mysqli_query($connection,$query2);
						if(mysqli_num_rows($run2)>0){ 
							while($row2 = mysqli_fetch_assoc($run2)){
								
								$full_name = $row2["fname"] . " " . $row2["mname"] . " " . $row2["lname"];

								$query3 = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id_friend} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
								$run3 = mysqli_query($connection,$query3);
								if(mysqli_num_rows($run3)>0){ 
									$row3 = mysqli_fetch_assoc($run3);
									$img_path = $row3["img_path"];
								}else{$img_path = "/img/icons/login.jpg";}

?>

					<div class="img_display">
						<a href="<?php echo "profile-public.php?id={$user_id_friend}" ?>" style="text-decoration:none;color:blue;"><img alt="<?php echo $full_name; ?>" src="<?php echo htmlentities($img_path) ?>" class="img_class" id="<?php echo $id; ?>" style="width:100%;max-width:300px"><span style="text-align:center;display:block;"><?php echo substr(ucwords($full_name),0,15); ?></span></a>
						
						<a class="img-action" id="set-profile-photo" href="<?php echo "friends.php?accept={$id}&id={$user_id_friend}&id2={$user_id}&fname={$full_name}";  ?>" title="Accept"><i class="bi bi-person-plus-fill green"></i></a>									
						<a class="img-action" id="set-cover-photo" href="<?php echo "friends.php?block={$id}&id={$user_id_friend}&id2={$user_id}&fname={$full_name}";  ?>" title="Block"><i  class="bi bi-dash-circle-fill green"></i></a>
						<a id="delete-photo" class="img-action" href="<?php echo  "friends.php?reject={$id}&id={$user_id_friend}&id2={$user_id}&fname={$full_name}";  ?>" title="Reject"><i class="bi bi-x-circle-fill green"></i></a>
						<?php echo "<div style='text-align:center'>".mutual_friends($user_id,$user_id_friend,$connection)."</div>";?>
					</div>

<?php

							}
						}
					}
				}else{echo "<p> No Request Received</p>";}
				echo $show_all_request_received;



				


					//Friends request sent
					$query = "SELECT COUNT(*) AS count_records FROM `wiki_friends` WHERE (`user_id_from` = {$user_id}) AND `status` = 1";
					$run = mysqli_query($connection, $query);
					if(mysqli_num_rows($run)>0){ 
						$row = mysqli_fetch_assoc($run);
						$count_records = $row["count_records"];
						if ($count_records > $max_record ){
							if(!isset($_GET["showallfriendsrequestsent"])){
								$show_all_request_sent = "<div style='clear:both;color:white'>.</div><div style='clear:both;text-align:center;'><a style='color:blue;text-decoration:none;' href='friends.php?showallfriendsrequestsent={$count_records}#friendsrequestsent'>Show All</a></div>";
							}
						}
					}
					if(isset($_GET["showallfriendsrequestsent"])){
						$max_record = $_GET["showallfriendsrequestsent"];
					}
					

					echo "<div style='clear:both'></div><div id='friendsrequestsent' style='background:#ccc;margin:20px 0;padding:5px 10px;'>Friends Request Sent ({$count_records})</div>";
					$query = "SELECT * FROM `wiki_friends` WHERE (`user_id_from` = {$user_id}) AND `status` = 1 LIMIT $max_record";
					$run = mysqli_query($connection,$query);
					if(mysqli_num_rows($run)>0){ 
						while($row = mysqli_fetch_assoc($run)){
							
								$user_id_friend = $row["user_id_to"];
						
							$id = $row["id"];
							
							$query2 = "SELECT `fname`,`mname`,`lname` FROM `wiki_dating_profile` WHERE `id` = {$user_id_friend} ";
							$run2 = mysqli_query($connection,$query2);
							if(mysqli_num_rows($run2)>0){ 
								while($row2 = mysqli_fetch_assoc($run2)){
									
									$full_name = $row2["fname"] . " " . $row2["mname"] . " " . $row2["lname"];
	
									$query3 = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id_friend} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
									$run3 = mysqli_query($connection,$query3);
									if(mysqli_num_rows($run3)>0){ 
										$row3 = mysqli_fetch_assoc($run3);
										$img_path = $row3["img_path"];
									}else{$img_path = "/img/icons/login.jpg";}
	
	?>
	
						<div class="img_display">
							<a href="<?php echo "profile-public.php?id={$user_id_friend}" ?>" style="text-decoration:none;color:blue;"><img alt="<?php echo $full_name; ?>" src="<?php echo htmlentities($img_path) ?>" class="img_class" id="<?php echo $id; ?>" style="width:100%;max-width:300px"><span style="text-align:center;display:block;"><?php echo substr(ucwords($full_name),0,15); ?></span></a>
							<a class="img-action" id="set-cover-photo" href="<?php echo "friends.php?block={$id}&id={$user_id_friend}&id2={$user_id}&fname={$full_name}" ?>" title="Block"><i  class="bi bi-dash-circle-fill green"></i></a>
							<a id="delete-photo" class="img-action" href="<?php echo "friends.php?cancel-request-sent={$id}&id={$user_id_friend}&id2={$user_id}&fname={$full_name}" ?>" title="Cancel Sent Request"><i class="bi bi-x-circle-fill green"></i></a>
							<?php echo "<div style='text-align:center'>".mutual_friends($user_id,$user_id_friend,$connection)."</div>";?>
							
						</div>
	
	<?php
	
								}
							}
						}
					}else{echo "<p> No Request Sent</p>";}
					echo $show_all_request_sent;


					//Blocked
					$query = "SELECT COUNT(*) AS count_records FROM `wiki_friends` WHERE (`user_id_from` = {$user_id} OR `user_id_to` = {$user_id}) AND `status` = 4  AND `action_by`= $user_id";
					$run = mysqli_query($connection, $query);
					if(mysqli_num_rows($run)>0){ 
						$row = mysqli_fetch_assoc($run);
						$count_records = $row["count_records"];
						if ($count_records > $max_record ){
							if(!isset($_GET["showallfriendsblocked"])){
								$show_all_friends_blocked = "<div style='clear:both;color:white'>.</div><div style='clear:both;text-align:center;'><a style='color:blue;text-decoration:none;' href='friends.php?showallfriendsblocked={$count_records}#friendsblocked'>Show All</a></div>";
							}
						}
					}
					if(isset($_GET["showallfriendsblocked"])){
						$max_record = $_GET["showallfriendsblocked"];
					}


					echo "<div style='clear:both'></div><div id='friendsblocked' style='background:#ccc;margin:20px 0;padding:5px 10px;'>Blocked ({$count_records})</div>";
					$query = "SELECT * FROM `wiki_friends` WHERE (`user_id_from` = {$user_id} OR `user_id_to` = {$user_id}) AND `status` = 4  AND `action_by`= $user_id LIMIT $max_record";
					$run = mysqli_query($connection,$query);
					if(mysqli_num_rows($run)>0){ 
						while($row = mysqli_fetch_assoc($run)){
							
							if($row["user_id_from"] != $user_id){
								$user_id_friend = $row["user_id_from"];
							}else{
								$user_id_friend = $row["user_id_to"];
							}
							
							$id = $row["id"];
							
							$query2 = "SELECT `fname`,`mname`,`lname` FROM `wiki_dating_profile` WHERE `id` = {$user_id_friend} ";
							$run2 = mysqli_query($connection,$query2);
							if(mysqli_num_rows($run2)>0){ 
								while($row2 = mysqli_fetch_assoc($run2)){
									
									$full_name = $row2["fname"] . " " . $row2["mname"] . " " . $row2["lname"];
	
									$query3 = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id_friend} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
									$run3 = mysqli_query($connection,$query3);
									if(mysqli_num_rows($run3)>0){ 
										$row3 = mysqli_fetch_assoc($run3);
										$img_path = $row3["img_path"];
									}else{$img_path = "/img/icons/login.jpg";}
	
	?>
	
						<div class="img_display">
							<a href="<?php echo "profile-public.php?id={$user_id_friend}" ?>" style="text-decoration:none;color:blue;"><img alt="<?php echo $full_name; ?>" src="<?php echo htmlentities($img_path) ?>" class="img_class" id="<?php echo $id; ?>" style="width:100%;max-width:300px"><span style="text-align:center;display:block;"><?php echo substr(ucwords($full_name),0,15); ?></span></a>
							<a class="img-action" id="set-cover-photo" href="<?php echo "friends.php?unblock={$id}&id={$user_id_friend}&id2={$user_id}&fname={$full_name}" ?>" title="Unblock"><i  class="bi bi-plus-circle-fill green"></i></a>
									
							<?php echo "<div style='text-align:center'>".mutual_friends($user_id,$user_id_friend,$connection)."</div>";?>
						</div>
	
	<?php
	
								}
							}
						}
					}else{echo "<p> No Blocked Friends</p>";}
					echo $show_all_friends_blocked;

					?>
				<p style="margin-top:30px;color:white;">.</p>
					</div><!--end of .login -->


				<div style="clear:both;"></div>
				













<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  
  <div id="caption"></div>

</div>








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
<script src="/js/chat.js"></script>
<script>
	$("#files").change(function() {
		filename = this.files[0].name;
		console.log(filename);
		});
</script>
