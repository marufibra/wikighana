<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
$class_0 = "";
$class_1 = "";
$class_2 = "";
$class_3 = "";
$class_4 = "";
$class_5 = "";
$output_validation = "";
if(isset($_GET["id"]) && isset($_GET["pass-code"]) && isset($_GET["user-type"])){

	if($_GET["user-type"] == "visitor"){
		$query = "SELECT `pass_code` FROM `wiki_visitors` WHERE `user_id` = {$_GET['id']}";
	}elseif($_GET["user-type"] == "author"){
		$query = "SELECT `pass_code` FROM `wiki_users` WHERE `user_id` = {$_GET['id']}";
	}
	$run = mysqli_query($connection, $query);
	if(mysqli_num_rows($run) > 0){
		$row = mysqli_fetch_assoc($run);
		if($row["pass_code"] == $_GET["pass-code"]){
			if(isset($_POST["password"]) && isset($_POST["repeat_password"])){
				if($_POST["password"] == $_POST["repeat_password"]){
					$password = $_POST["password"];
					
					if(strong_password_validation($password) === true){
						
						$hash_password = password_hash($password, PASSWORD_DEFAULT);
						if($_GET["user-type"] == "visitor"){
							
							$query = "UPDATE `wiki_visitors` SET `password` = '{$hash_password}' WHERE `user_id` = {$_GET['id']}";
						}elseif($_GET["user-type"] == "author"){
							$query = "UPDATE `wiki_users` SET `password` = '{$hash_password}' WHERE `user_id` = {$_GET['id']}";
						}
						$run = mysqli_query($connection, $query);
						if(mysqli_affected_rows($connection) > 0){
							die(header("Location: /login.php?password-changed=true"));

															
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
			}
		}else{$output_validation = "<h3 style='color:red;'>Pass code verification failed</h3>";}
	}else{$output_validation = "<h3 style='color:red;'>Database error!!</h3>";}
}else{die();}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/change_password.css">
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
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="signup.php">Signup</a></div>
					<div class="login">
						<h2>Change Password</h2>
						<?php $path = "?id={$_GET['id']}&pass-code={$_GET['pass-code']}&user-type={$_GET['user-type']}" ?>
						<form action="<?php echo $_SERVER['PHP_SELF'].$path;?>" method="post">
						

						<div class="container">
						<?php echo $output_validation; ?>
							
							<label for="password"><b>Password</b></label>
							<input type="password" placeholder="Enter Password" name="password" required id="password" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?> >
								
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


							<button type="button" class="cancelbtn"><a href="<?php echo $_SERVER['PHP_SELF'];?>">Cancel</a></button><button type="submit">Ok</button>
							
							
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