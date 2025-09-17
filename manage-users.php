<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");

$user_level_edit = null;
if(isset($_GET["edit"])){
	$user_id = $_GET["id"];
	$_SESSION["user_id_edit"] = $_GET["id"];
	$query = "SELECT * FROM `wiki_users` WHERE `user_id` = {$user_id}";
	$run = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($run);
	$full_name =  $row["full_name"];
	$user_level_edit =  $row["user_level"];
	$email =  $row["email"];
	$shop_id_edit =$row["shop_id"];
}

$output_alert = null;
$output_update = null;
$user_level_update = null;
if(isset($_POST["insert_into"])){
	

	$full_name = $_POST["full_name"];
	$email = $_POST["email"];
	$user_level = $_POST["user_level"];
	$shop_id = $_POST["shop_id"];
	if(email_validation($email)){
		$query ="SELECT `user_id` FROM `wiki_users` WHERE `email` = '{$email}'";
		$run = mysqli_query($connection,$query);
		if(mysqli_num_rows($run) == 0){
			$query ="SELECT `user_id` FROM `wiki_visitors` WHERE `email` = '{$email}'";
			$run = mysqli_query($connection,$query);
			if(mysqli_num_rows($run) == 0){

				$string = "abcdefghigklmnopkrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				$shuffled_str = str_shuffle($string);
				$query = "INSERT INTO `wiki_users`(full_name,email,user_level,creation_date_time,is_active,pass_code,shop_id) VALUES('{$full_name}','{$email}',{$user_level},now(),1,'{$shuffled_str}',$shop_id)";
				$query = mysqli_query($connection,$query);
				$id = mysqli_insert_id($connection);
				if(mysqli_affected_rows($connection) > 0){
					if($_SERVER['REMOTE_ADDR']=='::1'){
						$from_external = "localhost";
					}else{
						$from_external = "wikighana.com";
					}
					$output_alert = "<span class='alert_true'>The account was successfully created</span>";
					
					
					$subject = "Wiki Ghana Account Activation";
					$to = $email;
					$from = "info@wikighana.com";
					$message = "<p>Hello {$full_name},<p>";
					$message .= "<p>Click <a href='http://{$from_external}/account_activation.php?id={$id}&pass_code={$shuffled_str}'>here</a> to activate your account.</p>";
					$message .= "<p>Thank you</p>";
					$message .= "<br><p>Wiki Ghana Team</p>";
					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					// More headers
					$headers .= 'From: <noreply@wikighana.com>' . "\r\n";
					// $headers .= 'Cc: myboss@example.com' . "\r\n";

					mail($to,$subject,$message,$headers);

				}else{$output_alert = "<span class='alert_false'>Account creationg failed!</span>";}
			}else{$output_alert = "<span class='alert_false'>Registered as visitor. Use different email address</span>";}
		}else{$output_alert = "<span class='alert_false'>Email address already exist!!</span>";}
	}else{$output_alert = "<span class='alert_false'>Invalid email address</span>";}
}elseif(isset($_POST["update_record"])){
	$full_name = $_POST["full_name"];
	$email = $_POST["email"];
	$shop_id = $_POST["shop_id"];
	$user_level_update = $_POST["user_level"];
	$user_id = $_SESSION["user_id_edit"];
	$query = "UPDATE `wiki_users` SET `full_name` = '{$full_name}', `email` = '{$email}', `user_level` = {$user_level_update},`shop_id` = $shop_id WHERE `user_id` = {$user_id}";
	$run = mysqli_query($connection, $query);
	if(mysqli_affected_rows($connection) > 0){
		$output_update = "<h3 style='color:green;'>Record Updated</h3>";
	}else{$output_update = "<h3 style='color:red;'>Update Failed!!</h3>";}
	$_SESSION["user_id_edit"] = null;
}


if(isset($_GET["is_active"])){

	if($_GET["is_active"] == 0){
		$query = "UPDATE `wiki_users` SET `is_active` = 1 WHERE `user_id`={$_GET['id']}";
		$output_alert = "<span class='alert_true'>The account was successfully activated</span>";
	}elseif($_GET["is_active"] == 1){
		$query = "UPDATE `wiki_users` SET `is_active` = 0 WHERE `user_id`={$_GET['id']}";
		$output_alert = "<span class='alert_true'>The account was successfully deactivated</span>";
	}
	$run = mysqli_query($connection, $query);
}

if(isset($_GET["delete"])){
	$query = "SELECT `content_id` FROM `news_content` WHERE `user_id`={$_GET['id']}";
	$run = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($run);
	if(mysqli_affected_rows($connection) > 0){
		$output_alert = "<span class='alert_false'>User is associated with an article so cannot be deleted!</span>";
	}else{
		$query = "DELETE FROM `wiki_users` WHERE `user_id`={$_GET['id']} LIMIT 1";
		$run = mysqli_query($connection,$query);
		$output_alert = "<span class='alert_true'>The account was successfully deleted</span>";
	}

}

$shop_name = "";
$query = "SELECT * FROM `wiki_users`";
$run = mysqli_query($connection,$query);
$output_rows = "<table>";
while($row = mysqli_fetch_assoc($run)){
	

	$query2 = "SELECT `shop_full_name` FROM `shops` WHERE `id` = '{$row['shop_id']}'";
	$run2 = mysqli_query($connection, $query2);
	if(mysqli_num_rows($run2) > 0){
		while($row2 = mysqli_fetch_assoc($run2)){
			
			$shop_name = $row2["shop_full_name"];
			
		}
	}





		$PHP_SELF = $_SERVER["PHP_SELF"]."?is_active={$row['is_active']}&id={$row['user_id']}";
		$PHP_SELF_edit = $_SERVER["PHP_SELF"]."?edit=1&id={$row['user_id']}";
		$PHP_SELF_delete = $_SERVER["PHP_SELF"]."?delete=1&id={$row['user_id']}";
		$strikethrough = "";
		if($row['is_active'] == 0){
			$is_active_link = "<span class='is_active_link'><a href='{$PHP_SELF}'>Activate</a></span>";
			$strikethrough = "Style=text-decoration:line-through;text-decoration-color:red;";
		}else{
			$is_active_link = "<span class='is_active_link'><a href='{$PHP_SELF}'>Deactivate</a></span>";
			
		}
		$creation_date_time = date('jS F Y h',strtotime($row["creation_date_time"]));
		$edit = "<span><a href='{$PHP_SELF_edit}'>Edit</a></span>";
		$delete = "<span class='delete'><a href='{$PHP_SELF_delete}'>Delete</a></span>";
		if($row["user_level"] == 1){
			$user_level = "Admin";
		}elseif($row["user_level"] == 3){
			$user_level = "Author";
		}elseif($row["user_level"] == 4){
			$user_level = "Author-P";
		}else{$user_level = "Unknown";}
		if($row["is_verified"] != 0 ){
			$verified = "";
		}else{$verified = "style='color:red'";}
		$output_rows .= "<tr>
		<td style='padding:3px 5px' {$strikethrough} {$verified}>{$row["full_name"]}</td>
		<td style='padding:3px 5px'>{$user_level}</td>
		<td style='padding:3px 5px'>{$shop_name}</td>
		
		<td style='padding:3px 5px'>{$creation_date_time}</td>
		<td style='padding:3px 5px'>{$is_active_link}</td>
		<td style='padding:3px 5px'>{$edit}</td>
		<td style='padding:3px 5px'>{$delete}</td>
		</tr>";
}

$output_rows .= "</table>";
	
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5092847457222474" crossorigin="anonymous"></script> -->
		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/manage-users.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Manage Users - Wiki Ghana</title>
		<link rel="canonical" href="/manage-users.php">
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content">
					<?php echo $output_alert; ?>
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="manage-users.php">Users</a></div>
					<div class="login">
						<h2>Manage Users <span style="float:right;"><a href="/add-shop.php">Add Shop</a> | <a href="/shop-item.php"> Shop Items</a></span></h2>

						<?php echo $output_update; ?>
						

						<div class="container">
							<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
								<label for="full_name"><strong>Full Name</strong></label>
								<input type="text" placeholder="Enter Full Name" name="full_name" required <?php if(isset($_GET["edit"]) || isset($_POST["full_name"]) ){echo "value='{$full_name}'";} ?> >

								<label for="email"><strong>Email</strong></label>
								<input type="text" placeholder="Enter Email" name="email" required <?php if(isset($_GET["edit"]) || isset($_POST["email"]) ){echo "value='{$email}'";} ?> >

								<label for="user_level"><strong>User Level</strong></label>
								<select name="user_level" required>
									<option value="3" <?php if(isset($_GET["edit"])){if($user_level_edit == 3){echo "selected";}} ?>>Author</option>
									<option value="4" <?php if(isset($_GET["edit"])){if($user_level_edit == 4){echo "selected";}} ?>>Author-P</option>
									<option value="1" <?php if(isset($_GET["edit"])){if($user_level_edit  == 1){echo "selected";}} ?>>Admin</option>
								</select>


								<label for="shop_id"><strong>Shop</strong></label>
								<select name="shop_id">

								<option value="0" <?php if(isset($_GET["edit"])){if($shop_id_edit  == 0){echo "selected";}} ?>>--Select Shop--</option>
								<?php
									$query = "SELECT `id`,`shop_full_name` FROM `shops` ORDER BY `id`";
									$run = mysqli_query($connection, $query);
									if(mysqli_num_rows($run) > 0){
										while($row = mysqli_fetch_assoc($run)){
											$shop_id = $row["id"];
											$shop_name = $row["shop_full_name"];
											?>

											
											<option value='<?php echo $shop_id; ?>' <?php if(isset($_GET['edit'])){if($shop_id_edit == $shop_id){echo 'selected';}} ?>> <?php echo $shop_name; ?></option>
											<?php
										}
									}
								
								?>


								</select>

								
								

								<button type="button" class="cancelbtn"><a href="/manage-users.php">Cancel</a></button><button type="submit" class="submitbtn" <?php if(isset($_GET["edit"])){echo "name='update_record'";}else{echo "name='insert_into'";};?> Value='submit'><?php if(isset($_GET["edit"])){echo "Update Record";}else{echo "Create User";}?></button>
								<label>
							</form>
							<div>

								<?php echo $output_rows; ?>
							</div>
						</div>

						
						
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
