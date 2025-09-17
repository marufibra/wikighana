<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
$user_id=2;
$user_level=2;
$class_0 = "";
$class_1 = "";
$class_2 = "";
$class_3 = "";
$class_4 = "";
$class_5 = "";
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/account_activation.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ghana News - Top Local News In Ghana - Wiki Ghana</title>
	</head>
	<body>
		
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content">
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="#">Email Verification</a></div>
					<div class="login">
						<h2>Email Verification</h2>
						<?php
						if(isset($_GET["id"]) && isset($_GET["pass_code"])){
							$output_password = "";
							$output_strong_password="";
							$id = $_GET["id"];
							$pass_code = $_GET["pass_code"];
							$query = "SELECT * FROM `wiki_users` WHERE `user_id`={$id}";
							
							$run = mysqli_query($connection,$query);

							if(mysqli_num_rows($run) > 0){
								$row = mysqli_fetch_assoc($run);
								$email = $row["email"];
								if($row["pass_code"] == $pass_code){
									if($row['is_verified'] != 1){
										if($row['is_active'] == 1){
											if(isset($_POST["password"]) && isset($_POST["repeat_password"])){
												if($_POST["password"] == $_POST["repeat_password"]){
													$password = $_POST["password"];
													
													if(strong_password_validation($password) === true){
														echo "hello";
														$hash_password = password_hash($password, PASSWORD_DEFAULT);
														$query = "UPDATE `wiki_users` SET `password` = '{$hash_password}', `is_verified` = 1 WHERE `user_id` = {$id}";
														$run = mysqli_query($connection, $query);
														if(mysqli_affected_rows($connection) > 0){
															die(header("Location: /login.php"));
														}else{$output_password = "<p style='color:red;'>Database Error !!</p>";}
													}else{
														if (in_array(0, strong_password_validation($password))){$class_0 = "style=color:red";}else{$class_0 = "style=text-decoration:line-through;";}
														if (in_array(1, strong_password_validation($password))){$class_1 = "style=color:red";}else{$class_1 = "style=text-decoration:line-through;";}
														if (in_array(2, strong_password_validation($password))){$class_2 = "style=color:red";}else{$class_2 = "style=text-decoration:line-through;";}
														if (in_array(3, strong_password_validation($password))){$class_3 = "style=color:red";}else{$class_3 = "style=text-decoration:line-through;";}
														if (in_array(4, strong_password_validation($password))){$class_4 = "style=color:red";}else{$class_4 = "style=text-decoration:line-through;";}
														if (in_array(5, strong_password_validation($password))){$class_5 = "style=color:red";}else{$class_5 = "style=text-decoration:line-through;";}
													
													
													}
												}else{$output_password = "<p style='color:red;'>Passwords do not match</p>";}
											}
							
							
						?>
						<form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$id.'&pass_code='.$pass_code;?>" method="post">
						
						<div class="container">
						<?php echo $output_password; ?>
							<h3 class='alert_true'>Your email account: <?php echo $email; ?> has been verified<h3>
							<h3 class='alert_true'>Enter your password to complete the signup process<h3>
							<label for="password"><b>Password</b></label>
							<input type="password" placeholder="Enter Password" name="password" required id="password" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?> >
							<input type="hidden" name="user_id" value = "<?php echo $id;?>">
							<label for="repeat_password"><b>Repeat Password</b></label>
							<input type="password" placeholder="Enter Password" name="repeat_password" required id="repeat_password" <?php if(isset($_POST["repeat_password"])){echo "value=".$_POST["repeat_password"];} ?> >
							<input type="checkbox" onclick="myFunction()" id="show_password" name="show_password" value="1" ><label for="show_password" style="font-size:13px;font-weight:lighter;">Show Password</label>
							
							<ul style="font-size:14px;font-weight:lighter;">
								<li <?php echo $class_0; ?> >Password should be min 5 characters and max 16 characters
								<li <?php echo $class_1; ?> >Password should contain at least one digit</li>
								<li <?php echo $class_2; ?> >Password should contain at least one Capital Letter</li>
								<li <?php echo $class_3; ?> >Password should contain at least one small Letter</li>
								<li <?php echo $class_4; ?> >Password should contain at least one special character</li>
								<li <?php echo $class_5; ?> >Password should not contain any white space</li>
								
							</ul>
							<button type="button" class="cancelbtn"><a href="#">Cancel</a></button><button type="submit">Signup</button>
							
							
							<p style="margin-top:30px;">By creating an account you agree to our <a href="#">Terms &amp; Privacy</a></p>
						</div>

						
						</form>
						<?php 
								}else{echo "<h1 style='color:white;background:red;text-align:center'>Account has been disabled!!<h1>";}
								}else{echo "<h1 style='color:white;background:red;text-align:center'>Account already verified!!<h1>";}
						
								}else{echo "<h1 style='color:white;background:red;text-align:center'>Sorry something went wrong!!<h1>";}
								}else{echo "<h1 style='color:white;background:red;text-align:center'>Sorry something went wrong!!<h1>";}
								}else{echo "<h1 style='color:white;background:red;text-align:center'>Sorry something went wrong!!<h1>";}
							?>
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