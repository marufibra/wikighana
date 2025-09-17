<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
$output_validation = "";

if(isset($_POST["submit"])){
	if($_SERVER['REMOTE_ADDR']=='::1'){
		$from_external = "localhost";
	}else{
		$from_external = "wikighana.com";
	}
	$email = $_POST["email"];
	$query = "SELECT * FROM `wiki_visitors` WHERE `username`='{$email}' OR `email` = '{$email}'";	
					
	$run = mysqli_query($connection,$query);
	if(mysqli_num_rows($run) > 0){
		$row = mysqli_fetch_assoc($run);
		$user_id = $row["user_id"];
		$email = $row["email"];
		$username = $row["username"];


		$string = "abcdefghigklmnopkrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$shuffled_str = str_shuffle($string);
	
		 $query = "UPDATE `wiki_visitors` SET `pass_code` = '{$shuffled_str}' WHERE `user_id`={$user_id}";
		$run = mysqli_query($connection, $query);
		
		if(mysqli_affected_rows($connection) > 0){
			
			$subject = "Wiki Ghana Account Activation";
			$to = $email;
			$from = "info@wikighana.com";
			$message = "<p>Hello {$username},<p>";
			$message .= "<p>Click <a href='http://{$from_external}/change-password.php?id={$user_id}&pass-code={$shuffled_str}&user-type=visitor'>here</a> to change your password.</p>";
			$message .= "<p>Thank you</p>";
			$message .= "<br><p>Wiki Ghana Team</p>";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <noreply@wikighana.com>' . "\r\n";
			// $headers .= 'Cc: myboss@example.com' . "\r\n";

			if (mail($to,$subject,$message,$headers)){
				$output_validation = "<h3><span style='color:green'>A verification link has been sent to your mail.</h3>";
			}

			
		}else{$output_validation = "<p style='color:red;'>Database Error !!</p>";}



	}else{
		$query = "SELECT * FROM `wiki_users` WHERE `email` = '{$email}'";						
		$run = mysqli_query($connection,$query);
		if(mysqli_num_rows($run) > 0){

			$row = mysqli_fetch_assoc($run);
			$user_id = $row["user_id"];
			$email = $row["email"];
			$full_name = $row["full_name"];
	
	
			$string = "abcdefghigklmnopkrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$shuffled_str = str_shuffle($string);
		
			$query = "UPDATE `wiki_users` SET `pass_code` = '{$shuffled_str}' WHERE `user_id`={$user_id}";
			$run = mysqli_query($connection, $query);
			
			if(mysqli_affected_rows($connection) > 0){
				
				$subject = "Wiki Ghana Account Activation";
				$to = $email;
				$from = "info@wikighana.com";
				$message = "<p>Hello {$full_name},<p>";
				$message .= "<p>Click <a href='http://{$from_external}/change-password.php?id={$user_id}&pass-code={$shuffled_str}&user-type=author'>here</a> to change your password.</p>";
				$message .= "<p>Thank you</p>";
				$message .= "<br><p>Wiki Ghana Team</p>";
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	
				// More headers
				$headers .= 'From: <noreply@wikighana.com>' . "\r\n";
				// $headers .= 'Cc: myboss@example.com' . "\r\n";
	
				if (mail($to,$subject,$message,$headers)){
					$output_validation = "<h3><span style='color:green'>A verification link has been sent to your mail.</h3>";
				}

			}else{$output_validation = "<p style='color:red;'>Database Error !!</p>";}

		}else{$output_validation = "<p style='color:red;'>Email address not found</p>";}
	}
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5092847457222474" crossorigin="anonymous"></script> -->
		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/forgot_password.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Forgot Password - Wiki Ghana</title>
		<link rel="canonical" href="/forgot-password.php">
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content">
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="login.php">Login</a></div>
					<div class="login">
						
						<h2 class="forgot-password">Forgot Password</h2>

						<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
						<div class="imgcontainer">
							<img src="/img/icons/login.jpg" alt="Avatar" class="avatar">
						</div>

						<div class="container">
							<?php echo $output_validation;?>
							<label for="email"><b>Email or Username</b></label>
							<input type="text" placeholder="Enter Email or Username" name="email" required>
	
							<button type="submit" name="submit" value="submit">Send</button>
							<label>
							
						</div>

						
						</form>
							
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
