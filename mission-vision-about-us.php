<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!-- <script type='text/javascript' src='//pl25658673.profitablecpmrate.com/41/12/e1/4112e13b18e7daf62cd2e25606869b76.js'></script> -->
		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/account_activation.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>About Us - Wiki Ghana</title>
	</head>
	<body>
		
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content">
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="#">About Us</a></div>
					<div class="login">
						<h2>Our Mission and Vision</h2>
			<p style="color:green;">To serve the people of Ghana, living within and outside the country well</p>
<h3>Our Mission</h3>
<p>Our mission at Wiki Ghana is to produce timely experiences incorporating news and information from around the world with a particular emphasis on things that impact the people of Ghana. These digital publications combine digital print media, online photography and electronic graphics to provide our readers with outstanding news. From breaking news and information to each day’s feature stories we will always work hard to ensure our readers receive an excellent news and information experience. An essential part of our mission is to cover the good things that happen in the country. We hope to influence our readers for good.</p>
<p>
Another important part of our mission is to educate and train people of all ages in the skills of digital communication. We do this through shadowing programs, college and university internships, and teaching volunteers who want to explore a career in digital communications.</p>

<h3>Our Vision</h3>

<p>Our vision at Wiki Ghana is to continue to grow by opening up new markets for our products and services. Our core staff remains dedicated to staying current with technology to be able to provide our users with a modern experience. We will continue to incorporate news and information in Ghana and from around the world with a particular emphasis on things that impact the people of Ghana. We are committed to covering mostly good and positive things that take place in the country. We hope to be an encouragement to the people we serve by influencing Ghanaians in and outside the country for good.</p>

						






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