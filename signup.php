<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
if(isset($_SESSION["user_id"])){
	die(header("Location: /profile.php"));
}
$class_0 = "";
$class_1 = "";
$class_2 = "";
$class_3 = "";
$class_4 = "";
$class_5 = "";
$output_validation = "";

if(isset($_POST["submit"])){
	if(isset($_POST["g-recaptcha-response"])){
		if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["repeat_password"]) && isset($_POST["email"])){

			$secret = '6Ldh-fIqAAAAAODUn3L1mlYJEMukmUucA4XWCPqX';
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);


			$username = mysqli_real_escape_string($connection,trim($_POST["username"]));
			$password = mysqli_real_escape_string($connection,trim($_POST["password"]));
			$repeat_password = mysqli_real_escape_string($connection,trim($_POST["repeat_password"]));
			$email = mysqli_real_escape_string($connection,trim($_POST["email"]));
			if ($responseData->success) {
				if(email_validation($email)){
					$query = "SELECT * FROM `wiki_visitors` WHERE `email`='{$email}'";						
					$run = mysqli_query($connection,$query);
					if(mysqli_num_rows($run) == 0){
						
						$query = "SELECT * FROM `wiki_visitors` WHERE `username`='{$username}'";						
						$run = mysqli_query($connection,$query);
						if(mysqli_num_rows($run) == 0){
							if(username_validation($_POST["username"]) === true){
								$query = "SELECT * FROM `wiki_users` WHERE `email`='{$email}'";						
								$run = mysqli_query($connection,$query);
								if(mysqli_num_rows($run) == 0){



									if($_POST["password"] == $_POST["repeat_password"]){
										$password = $_POST["password"];
										if(strong_password_validation($password) === true){
											$string = "abcdefghigklmnopkrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
											$shuffled_str = str_shuffle($string);
											$hash_password = password_hash($password, PASSWORD_DEFAULT);
											$query = "INSERT INTO `wiki_visitors`(`email`,`password`,`username`,`is_verified`,`is_active`,`pass_code`,`creation_date_time`,`is_subscribed`) VALUES('{$email}','{$hash_password}','{$username}',0,1,'{$shuffled_str}',now(),0)";
											$run = mysqli_query($connection, $query);
											if(mysqli_affected_rows($connection) > 0){
												if($_SERVER['REMOTE_ADDR']=='::1'){
													$from_external = "localhost";
												}else{
													$from_external = "wikighana.com";
												}
												$user_id = mysqli_insert_id($connection);

												$subject = "Wiki Ghana Account Activation";
												$to = $email;
												$from = "info@wikighana.com";
												$message = "<p>Hello,<p>";
												$message .= "<p>Click <a href='http://{$from_external}/login.php?id={$user_id}&pass_code={$shuffled_str}'>here</a> to activate your account or copy and paste the link below into your address bar.</p>";
												$message .= "<p>http://{$from_external}/login.php?id={$user_id}&pass_code={$shuffled_str}</p>";
												$message .= "<p>Thank you</p>";
												$message .= "<br><p>Wiki Ghana Team</p>";
												// Always set content-type when sending HTML email
												$headers = "MIME-Version: 1.0" . "\r\n";
												$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
												// More headers
												$headers .= 'From: <noreply@wikighana.com>' . "\r\n";
												// $headers .= 'Cc: myboss@example.com' . "\r\n";
								
												if (mail($to,$subject,$message,$headers)){
													$output_validation = "<h3><span style='color:green'>An activation code has been sent to your mail. Check your spam folder too for the mail.</h3>";
												}

												
											}else{$output_validation = "<p style='color:red;'>Database Error !!</p>";}
										}else{
											if (in_array(0, strong_password_validation($password))){$class_0 = "style=color:red";}else{$class_0 = "style=text-decoration:line-through;";}
											if (in_array(1, strong_password_validation($password))){$class_1 = "style=color:red";}else{$class_1 = "style=text-decoration:line-through;";}
											if (in_array(2, strong_password_validation($password))){$class_2 = "style=color:red";}else{$class_2 = "style=text-decoration:line-through;";}
											if (in_array(3, strong_password_validation($password))){$class_3 = "style=color:red";}else{$class_3 = "style=text-decoration:line-through;";}
											if (in_array(4, strong_password_validation($password))){$class_4 = "style=color:red";}else{$class_4 = "style=text-decoration:line-through;";}
											if (in_array(5, strong_password_validation($password))){$class_5 = "style=color:red";}else{$class_5 = "style=text-decoration:line-through;";}
										}
										
									}else{$output_validation = "<h3 style='color:red;'>Passwords do not match</h3>";}
							
								}else{$output_validation = "<h3><span style='color:red'>". "You are an author; use different email address"."</span></h3>";}
							}else {$output_validation = "<h3><span style='color:red'>".username_validation($_POST["username"])."</span></h3>";}

							}else {$output_validation = "<h3><span style='color:red'>Username exist</span> <a href='/login.php'>Login</a></h3>";}
					}else {$output_validation = "<h3><span style='color:red'>Email exist</span> <a href='/login.php'>Login</a></h3>";}
				}else {$output_validation = "<h3><span style='color:red'>Wrong email address</h3>";}
			}
		}else{$output_validation = "<h3><span style='color:red'>All fields are required</h3>";}
	}else{$output_validation = "<h3><span style='color:red'>Verify you're not a robot</h3>";}
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5092847457222474" crossorigin="anonymous"></script> -->
		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/signup.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sign Up - Wiki Ghana</title>
		<link rel="canonical" href="/signup.php">

		<meta property="fb:app_id" content="1114141350112517" />
		<meta property="og:url"           content="https://www.wikighana.com/signup.php" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Sign Up - Wiki Ghana" />
		<meta property="og:description"   content="Ghana News, Dating, Buy/Sell" />
		<meta property="og:image"  itemprop="image"       content="https://wikighana.com/img/icons/favicon2.jpg" />
		<meta property="og:site_name" 		content="Wiki Ghana">
		<meta property="og:updated_time" 	content="<?php echo date("Y/m/d");?>" />
		<meta property="og:image:width" content="256">
		<meta property="og:image:height" content="256">
		<meta name="description" content="Ghana News, Dating, Buy/Sell - Wiki Ghana">
		<meta name="keywords" content="ghana,news,politics,government,court,law,publish, ghanaian,africa,dating,meet,love">
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content">
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="signup.php">Signup</a></div>
					<div class="login">
						<h2 class="signup-form">Signup Form</h2>

						<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
						

						<div class="container">
						<?php echo $output_validation; ?>
							<label for="username"><b>Username</b></label>
							<input type="text" placeholder="Enter Username" name="username" required <?php if(isset($_POST["username"])){echo "value='".$_POST["username"]."'";} ?> >

							<label for="email"><b>Email</b></label>
							<input type="text" placeholder="Enter Email" name="email" required <?php if(isset($_POST["email"])){echo "value='".$_POST["email"]."'";} ?> >

							<label for="password"><b>Password</b></label>
							<input type="password" placeholder="Enter Password" name="password" required id="password" <?php if(isset($_POST["password"])){echo "value='".$_POST["password"]."'";} ?> >
								
							<label for="repeat_password"><b>Repeat Password</b></label>
							<input type="password" placeholder="Enter Password" name="repeat_password" required id="repeat_password" <?php if(isset($_POST["repeat_password"])){echo "value='".$_POST["repeat_password"]."'";} ?> >
							<input type="checkbox" onclick="myFunction()" id="show_password" name="show_password" value="1" ><label for="show_password" style="font-size:13px;font-weight:lighter;">Show Password</label>
							
							<ul style="font-size:14px;font-weight:lighter;">
								<li <?php echo $class_0; ?> >Password should be min 5 characters and max 16 characters
								<li <?php echo $class_1; ?> >Password should contain at least one digit</li>
								<li <?php echo $class_2; ?> >Password should contain at least one Capital Letter</li>
								<li <?php echo $class_3; ?> >Password should contain at least one small Letter</li>
								<li <?php echo $class_4; ?> >Password should contain at least one special character</li>
								<li <?php echo $class_5; ?> >Password should not contain any white space</li>
								
							</ul>

							<div class="g-recaptcha" data-sitekey="6Ldh-fIqAAAAAMuDsRhAHljRMOYDOSlxpcz4dtcE"></div>

							<button type="button" class="cancelbtn"><a href="<?php echo $_SERVER['PHP_SELF'];?>">Cancel</a></button><button type="submit" name="submit">Signup</button>
							
							<p style="margin-top:30px;">By creating an account you agree to our <a href="privacy-policy.php">Terms &amp; Privacy</a></p>
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
<script>
	function myFunction() {
	var x = document.getElementById("password");
	var y = document.getElementById("repeat_password");
	if (x.type === "password") {
		x.type = "text";
		y.type = "text";
	} else {
		x.type = "password";
		y.type = "password";
	}
	}
</script>