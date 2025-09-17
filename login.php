<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
$output_verification = "";
if(isset($_GET["logout"])){
	
	$_SESSION["user_id"] = NULL;
	$_SESSION["username"] = NULL;
	$_SESSION["user_level"] = NULL;
	$_SESSION["user_type"] = NULL;

	setcookie("wikighana_id",NULL,time() + (-60*60*24*365*10));//expires in -10yrs.
	setcookie("wikighana_username",NULL,time() + (-60*60*24*365*10));
	setcookie("wikighana_user_level",NULL,time() + (-60*60*24*365*10));
	setcookie("wikighana_user_type",NULL,time() + (-60*60*24*365*10));

	$_SESSION["output_verification"] = "<p style='color:green;'>You are logged out successfully</p>";
	die(header("Location: /login.php"));	
}


if(isset($_SESSION["user_id"])){
	die(header("Location: /profile.php"));
}


if(isset($_GET["id"]) && isset($_GET["pass_code"])){
	$id = $_GET["id"];
	$pass_code = $_GET["pass_code"];
	$query = "SELECT * FROM `wiki_visitors` WHERE `user_id`={$id}";
	$run = mysqli_query($connection,$query);
	if(mysqli_num_rows($run) > 0){
		$row = mysqli_fetch_assoc($run);
		if($row["pass_code"] == $pass_code){
			if($row['is_verified'] != 1){
				if($row['is_active'] == 1){
				
					$query = "UPDATE `wiki_visitors` SET `is_verified` = 1 WHERE `user_id` = {$id}";
					$run = mysqli_query($connection, $query);
					if(mysqli_affected_rows($connection) > 0){
						$output_verification = "<p style='color:green;'>Account verified. Login below</p>";
					}else{$output_verification = "<p style='color:red;'>Database Error !!</p>";}

				}else{$output_verification = "<p style='color:red;'>Account disabled!!</p>";}
			}else{$output_verification = "<p style='color:red;'>Account already verified!!</p>";}
		}else{$output_verification = "<p style='color:red;'>Wrong pass code!!</p>";}
	}
}

if(isset($_GET["password-changed"])){
	$output_verification = "<p style='color:green;'>Password changed. Login below</p>";
}


if(isset($_POST["password"]) && isset($_POST["email"])){
	$password = $_POST["password"];
	$email = $_POST["email"];
	$user_type = "";
	$user_level = NULL;
	$query = "SELECT * FROM `wiki_users` WHERE `email` = '{$email}'";
	$run = mysqli_query($connection, $query);
	if(mysqli_num_rows($run) > 0){
		$row = mysqli_fetch_assoc($run);
		$user_type = "author";
		$user_level = $row["user_level"];
	}else{
		$query = "SELECT * FROM `wiki_visitors` WHERE `email` = '{$email}' OR `username` = '{$email}'";
		$run = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($run);
		if(mysqli_num_rows($run) > 0){
			$user_type = "visitor";
		}
	}
	
	if($user_type != ""){
		
		if(password_verify($_POST["password"], $row["password"])){
			if($user_type == "visitor"){
				$username = $row["username"];
			}elseif($user_type == "author"){
				$username = $row["full_name"];
			}
			if(isset($_POST["remember_me"])){
				setcookie("wikighana_id",$row["user_id"],time() + (60*60*24*365*10));//expires in 10yrs.
				setcookie("wikighana_username",$username,time() + (60*60*24*365*10));
				setcookie("wikighana_user_level",$user_level,time() + (60*60*24*365*10));
				setcookie("wikighana_user_type",$user_type,time() + (60*60*24*365*10));
			}
			$_SESSION["user_id"] = $row["user_id"];
			$_SESSION["username"] = $username;
			$_SESSION["user_level"] = $user_level;
			$_SESSION["user_type"] = $user_type;

			if($user_type == "visitor"){
				die(header("Location: /profile.php"));
			}elseif($user_type == "author"){
				die(header("Location: /workpage.php"));
			}
		}else{$output_verification = "<p style='color:red;'>Incorrect Password !!</p>";}
	}else{$output_verification = "<p style='color:red;'>email/username not found !!</p>";}
}



?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5092847457222474" crossorigin="anonymous"></script> -->
		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/login.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login - Wiki Ghana</title>
		<link rel="canonical" href="/login.php">
	</head>
	<body>

		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content">
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="login.php">Login</a></div>
					<div class="login">
						
						<h2 class="login-form">Login Form<span class="not-a-member">Not a member? <a href="signup.php">Signup</a></span></h2>

						<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
						<div class="imgcontainer">
							<img src="/img/icons/login.jpg" alt="Avatar" class="avatar">
						</div>

						<div class="container">
							<?php echo $output_verification;
							if(isset($_SESSION["output_verification"])){
								echo $_SESSION["output_verification"];
							}
							$_SESSION["output_verification"] = NULL;
							?>
							<label for="email"><b>Email or Username</b></label>
							<input type="text" placeholder="Enter Email or Username" name="email" required>

							<label for="psw"><b>Password</b></label>
							<input type="password" placeholder="Enter Password" name="password" required>
							
							

							<button type="submit">Login</button>
							<label>
							<input type="checkbox" checked="checked" name="remember_me"> Remember me
							</label>
						</div>

						<div class="container" style="background-color:#f1f1f1">
							<button type="button" class="cancelbtn">Cancel</button>
							<span class="psw">Forgot <a href="/forgot-password.php">password?</a></span>
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
