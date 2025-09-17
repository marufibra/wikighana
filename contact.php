<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");


$output_validation = "";
$isSent = false;
if(isset($_POST["fullname"]) && isset($_POST["submit"]) && isset($_POST["subject"]) && isset($_POST["email"])){
	$fullname = trim($_POST["fullname"]);
	$subject = trim($_POST["subject"]);
	$message = trim($_POST["message"]);
	$email = trim($_POST["email"]);
	if(email_validation($email)){


		$to = "info@wikighana.com";						
		// $message = "<p style ='font-family:sans-serif;font-size:13px;'>Hello {$row['username']},<p>";
		// $message .= "<h3 style ='font-family:sans-serif;font-size:20px;'><a href='http://localhost/{$file_path}'>{$subject}</a></h3>";
		// $message .= "<br><br><p style = 'font-family:sans-serif;font-size:13px;'>This e-mail was sent by Wiki Ghana Limited. If you think this is SPAM and if you no longer want to receive these messages, please click the <a href='http://localhost/unsubscribe.php?id={$row['user_id']}&pass-code={$shuffled_str}'>Unsubscribe</a>.</p>";
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// More headers
		$headers .= "From: <{$email}>" . "\r\n";
		// $headers .= 'Cc: myboss@example.com' . "\r\n";
		if(mail($to,$subject,$message,$headers)){
			$output_validation = "<h3><span style='color:green'>Mail successfully sent</h3>";
			$isSent = true;
		}else{$output_validation = "<h3><span style='color:red'>Mail not sent</h3>";};

	}else {$output_validation = "<h3><span style='color:red'>Wrong email address</h3>";}
}

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5092847457222474" crossorigin="anonymous"></script> -->
		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/contact.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Contact - Wiki Ghana</title>
		<link rel="canonical" href="/contact.php">
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content">
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="contact.php">Contact</a></div>
					<div class="login">
						<h2 class="signup-form">Contact Form</h2>

						<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
						

						<div class="container">
						<?php echo $output_validation; ?>
							<label for="fullname"><b>Full Name</b></label>
							<input type="text" placeholder="Enter Full Name" name="fullname" required <?php if(!$isSent){if(isset($_POST["fullname"])){echo "value='".$_POST["fullname"]."'";}} ?> >

							<label for="email"><b>Email</b></label>
							<input type="text" placeholder="Enter Email" name="email" required <?php if(!$isSent){if(isset($_POST["email"])){echo "value='".$_POST["email"]."'";}} ?> >

							<label for="subject"><b>Subject</b></label>
							<input type="text" placeholder="Enter Subject" name="subject" required <?php if(!$isSent){if(isset($_POST["subject"])){echo "value='".$_POST["subject"]."'";}} ?> >

							
							<label for="message"><b>Message</b></label>
							<textarea name="message" id="message"  rows="15" placeholder="Enter Message" required ><?php if(!$isSent){if(isset($_POST["message"])){echo $_POST["message"];}} ?></textarea>
							
							<div style="margin-top:30px;"><button type="button" class="cancelbtn"><a href="<?php echo $_SERVER['PHP_SELF'];?>">Cancel</a></button><button type="submit" name="submit" id="submit">Send</button></div>
							
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
