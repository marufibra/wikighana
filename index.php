<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");



$query = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached`,`news_content`.`content` FROM `news_content`  WHERE (publish_date_time = (SELECT MAX(`publish_date_time`) AS publish_date FROM `news_content` WHERE headline = 1 AND news_or_article = 1 AND `status`=1))";

$run = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($run);
$img_id = $row["img_id"];
$is_video_attached = $row["is_video_attached"];
if($is_video_attached == 1){$video_icon_path = "/img/icons/video.png";}
if(empty($img_id)){$img_id = 0;}
$row["publish_date_time"];
$subject = $row["subject"];
$content_id = $row["content_id"];
$publish_date_time = $row["publish_date_time"];
$content_id_headline = $row["content_id"];
$year = date("Y",strtotime($row["publish_date_time"]));
$month = date("m",strtotime($row["publish_date_time"]));
$query = "SELECT * FROM news_images WHERE `img_id`={$img_id}";
$run = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($run);
$img_path = $row["img_path"];
if(empty($img_path)){$img_path = "./../../img/news/news_headline_default.jpg";}
$img_caption = $row["caption"];
$file_path = "./../../".$year."/".$month."/".clean($subject)."-".$content_id.".php";

					

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!-- <script type='text/javascript' src='//pl25658673.profitablecpmrate.com/41/12/e1/4112e13b18e7daf62cd2e25606869b76.js'></script> -->
		<meta name="facebook-domain-verification" content="tyoan3e9tftj4yk6xyfbel75jseri8" />

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/index.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ghana News - Top Local News In Ghana - Wiki Ghana</title>
		<link rel="canonical" href="/index.php">
		<meta property="fb:app_id" content="1114141350112517" />
		<meta property="og:url"           content="https://www.wikighana.com" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Ghana News, Dating, Buy/Sell etc - Wiki Ghana" />
		<meta property="og:description"   content="Ghana News, Dating, Buy/Sell etc - Wiki Ghana" />
		<meta property="og:image"  itemprop="image"       content="https://wikighana.com/img/icons/favicon2.jpg" />
		<meta property="og:site_name" 		content="Wiki Ghana">
		<meta property="og:updated_time" 	content="<?php echo date("Y/m/d");?>" />
		<meta property="og:image:width" content="256">
		<meta property="og:image:height" content="256">
		<meta name="description" content="Ghana News, Dating, Buy/Sell etc - Wiki Ghana">
		<meta name="keywords" content="ghana,news,politics,government,court,law,publish, ghanaian,africa">
	</head>
	<body>







	<script src="/js/jquery-3.7.1.min.js"></script>

<script type="module">
	// Import the functions you need from the SDKs you need
	import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-app.js";
	import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-messaging.js";
	// TODO: Add SDKs for Firebase products that you want to use
	// https://firebase.google.com/docs/web/setup#available-libraries

	// Your web app's Firebase configuration
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
	const firebaseConfig = {
		apiKey: "AIzaSyDu3J0pv7YOPIyl4W84S8B535qhzvBSjA4",
		authDomain: "wikighana-bf951.firebaseapp.com",
		projectId: "wikighana-bf951",
		storageBucket: "wikighana-bf951.firebasestorage.app",
		messagingSenderId: "975081349591",
		appId: "1:975081349591:web:4d64921509ac4ea9abab92",
		measurementId: "G-CV6CVSFR09"
	};

	// Initialize Firebase
	const app = initializeApp(firebaseConfig);
	const messaging = getMessaging(app);
	navigator.serviceWorker.register("/firebase-messaging-sw.js").then(registration => {
		getToken(messaging, { 
			ServiceWorkerRegistration: registration,
			vapidKey: 'BG-sWX3-waiKOG9MH8RmavbRBii6XMwLrFvUSqpWgJdg0btt0tOEe3ntyytqZPwhAWYtGzO2JKQ8-Hl-J4g-LWY' }).then((currentToken) => {
			if (currentToken) {
				console.log("The token is: " + currentToken);
					$.ajax({
						
						url:"/include/fcm.php",
						method:"POST",
						data:{"token": currentToken},
						success:function(data){
							//alert(data);
						}
					})
				// Send the token to your server and update the UI if necessary
				// ...
			} else {
				// Show permission request UI
				console.log('No registration token available. Request permission to generate one.');
				// ...
			}
		}).catch((err) => {
			console.log('An error occurred while retrieving token. ', err);
			// ...
		});
	});
</script>


		<div class="wrap">
	
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content">
					<div class="site_nav"><a href="/">Home</a></div>
				
					
					<?php include($_SERVER['DOCUMENT_ROOT']."/include/advert_top.php");?>
						
					
			<div class="wiki_shop">
				<p class="wiki_shop_text"><a href="/shop.php">Wiki Shops</a></p>
				<div class="container2">

<?php
$query = "SELECT `shop_item`.`id`,`item_name`,`price`,`img_1`,`file_path` FROM `shop_item` INNER JOIN `shops` ON `shop_item`.`shop_id`=`shops`.`id` WHERE  `is_published` = '1' AND `shops`.`is_approved` = '1' ORDER BY RAND() LIMIT 0,8";

$run = mysqli_query($connection, $query);
if(mysqli_num_rows($run) > 0){
$first_record = 1;
	while($row = mysqli_fetch_assoc($run)){
		$id = $row["id"];
		$price = $row["price"];
		$item_name = $row["item_name"];
		$img_1 = $row["img_1"];
		$file_path = $row["file_path"];
		$img_width = "w-1";
		$img_height = "h-2";
		
		list($width, $height) = getimagesize($_SERVER['DOCUMENT_ROOT'].$img_1);
		$size_diff = $width."-".$height."=";
		$img_diff = (int)$width - (int)$height.";";
		if($img_diff >= 0){
			//landscape
			if($img_diff >= 400){
				$img_width = "w-2";
			}

		}else{
			//portrait
			$img_diff = (int)$img_diff * -1;

			if($img_diff >= 100 && $img_diff <= 300){
				$img_height = "h-3";
				
			}elseif($img_diff >= 301 && $img_diff <= 1000){
				$img_height = "h-4";
				
			}elseif($img_diff >= 301 && $img_diff <= 1000){
				$img_height = "h-4";
				
			}
		}
		if($first_record == 1){
			// $img_height = "h-3";
			// $first_record = 2;
		}

		echo    "<div class='gallery-container {$img_width} {$img_height}'>
					<div class='gallery-item'>
						<div class='image'>
						<a href='$file_path'><img src='{$img_1}' alt='{$item_name}'></a>
						</div>
						<div class='text'>GHC ".number_format($price)."</div>
					</div>
				</div>";
	}
}


?>



				</div>

			</div>
					
			<p class="wiki_dating_text"><a href="/dating.php">Wiki Dating</a></p>

			<div class="top_writings" style="padding:10px 10px 0 10px;">
					<?php include($_SERVER['DOCUMENT_ROOT']."/include/slideshow.php");?>

					<p style="margin-top:20px;text-align:justify;line-height:25px;"><span style='color:red'><span style="float: left; color: #903; font-size: 75px; line-height: 60px; padding-top: 0px; padding-right: 8px; font-family: Georgia;">P</span>lease be aware!</span> It has come to our attention that there are external users 
						who may join our community with fraudulent intentions. Although we constantly monitor our site 
						for such activities, it is strongly advised not to accept any request of financial nature from any 
						other member of this site. For any Reason Please notify us immediately the name/id of the member who approaches
						 you with such request.</p>
					<p><a class="click_here" href="/dating.php">Click here</a> to search for your soul mate.</p>
					

					<?php
					if(!isset($_SESSION["user_id"])){
						echo "
						<p>Registration is free!! <a class='registration_is_free' href='/login.php'>Click here</a> to login and register to be part of our large community.</p>
						";
					}

					?>
			</div>


					<div class="category_name" style="margin:30px 0 10px 0;"><a href="/news.php#latest_news_58956">Top Stories</a><span><a href="/news.php#latest_news_58956">Read More <img src="/img/icons/right_arrow.png"></a></span></div>
					
					
					<?php
					
					//Top Story
					$query = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `top_story` = 1 AND `content_id` != {$content_id_headline} AND news_or_article = 1 AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT 4";
					
					
					$run = mysqli_query($connection, $query);
					
					echo '<div class="wrapper_top_story">';
					$array_top_strory = [];
					while($row = mysqli_fetch_assoc($run)){
						
						$img_id = $row["img_id"];
						if(empty($img_id)){$img_id = 0;}
						$is_video_attached = $row["is_video_attached"];
						if($is_video_attached == 1){$video_icon_path = "/img/icons/video.png";}
						$row["publish_date_time"];
						
						$subject = $row["subject"];
						$content_id = $row["content_id"];
						$year = date("Y",strtotime($row["publish_date_time"]));
						$month = date("m",strtotime($row["publish_date_time"]));
						$query2 = "SELECT * FROM news_images WHERE `img_id`={$img_id}";
						$run2 = mysqli_query($connection,$query2);
						$row2 = mysqli_fetch_assoc($run2);
						$img_path = $row2["img_path"];
						if(empty($img_path)){$img_path = "./../../img/news/news_headline_default.jpg";}
						$img_caption = $row2["caption"];
						$file_path = "./../../".$year."/".$month."/".clean($subject)."-".$content_id.".php";
						array_push($array_top_strory,$row["content_id"]);
					?>
						
						<div class="top_story" title="<?php echo $subject;?>">
							<a href="<?php echo  $file_path; ?>"><img src="<?php echo $img_path; ?>" class="top_story_image" title="<?php echo $subject; ?>"><?php if($is_video_attached == 1){echo "<img src='{$video_icon_path}' class='top_story_video_icon'>";}   ?><span class="clock_time_top_story"><i class="bi bi-clock"></i> <?php echo get_age_of_time($row["publish_date_time"]);?></span></a>
							<a href="<?php echo  $file_path; ?>" class="top_story_subject"><?php echo $subject; ?></a>
						</div>
					
					
					<?php
					
					}
					
					$str_top_story_headline = implode(",",$array_top_strory).",".$content_id_headline;
					echo "</div>";

					?>
					<!-- Ads start here -->
					<!-- <p style="color:white;" class="hide_mobile_ad">
						...................................................
					</p>
					<div class="hide_mobile_ad" style="width:728px; margin:0 auto;">
						<script type="text/javascript">
							atOptions = {
								'key' : 'f1a2fefbf183ef30ad1ce3b34fd3b371',
								'format' : 'iframe',
								'height' : 90,
								'width' : 728,
								'params' : {}
							};
						</script>
						<script type="text/javascript" src="//www.highperformanceformat.com/f1a2fefbf183ef30ad1ce3b34fd3b371/invoke.js"></script>
					</div>

					<div class="hide_non_mobile_ad" style="margin:0 auto; width:300px;">
						<script type="text/javascript">
							atOptions = {
							'key' : 'f41bb31abc326ba6bef3fd974480043e',
							'format' : 'iframe',
							'height' : 250,
							'width' : 300,
							'params' : {}
							};
						</script>
						<script type="text/javascript" src="//www.highperformanceformat.com/f41bb31abc326ba6bef3fd974480043e/invoke.js"></script>
					</div> -->
					<?php

					
					function news_category($connection,$content_id_headline,$category_id,$in_or_not_in,$str_top_story_headline){
						if($in_or_not_in == "in"){
							$query3 = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `content_id` not in ($str_top_story_headline) AND `category_id` in ({$category_id}) AND news_or_article = 1 AND category_top_story = 1 AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT 4";
							}elseif($in_or_not_in == "videos"){
								$query3 = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `content_id` not in ($str_top_story_headline) AND (`is_video_attached`=1 OR `category_id`=5) AND news_or_article = 1 AND category_top_story = 1 AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT 4";
							
							}elseif($in_or_not_in == "article"){
								$query3 = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `content_id` not in ($str_top_story_headline) AND `category_id` in ({$category_id}) AND category_top_story = 1 AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT 4";
							
							}
						$run3 = mysqli_query($connection, $query3);
						$output_array = [];
						while($row = mysqli_fetch_assoc($run3)){
								$content_id ="<br>". $row["content_id"];
								$img_id = $row["img_id"];
								$is_video_attached = $row["is_video_attached"];
								if($is_video_attached == 1){
									$video_icon_path = "/img/icons/video.png";
									$output_img_icon = "<img src='{$video_icon_path}' class='category_video_icon'>";
								}else{$output_img_icon="";}
								if(empty($img_id)){$img_id = 0;}
								$row["publish_date_time"];
								$subject = $row["subject"];
								$content_id = $row["content_id"];
								$year = date("Y",strtotime($row["publish_date_time"]));
								$month = date("m",strtotime($row["publish_date_time"]));
								$query2 = "SELECT * FROM news_images WHERE `img_id`={$img_id}";
								$run2 = mysqli_query($connection,$query2);
								
								if(mysqli_num_rows($run2) > 0){
									$row2 = mysqli_fetch_assoc($run2);
									$img_path = $row2["img_path"];
									$img_caption = $row2["caption"];
								}
								if(empty($img_path)){$img_path = "./../../img/news/news_headline_default.jpg";}
								
								$file_path = "./../../".$year."/".$month."/".clean($subject)."-".$content_id.".php";

								
								$output = ("<div class='wrapper_news_category' title='{$subject}'>
									<div class='news_category'>
									<a href='{$file_path}'><img src='{$img_path}' title='{$subject}' class='category_img'>{$output_img_icon}</a>
									
									<a href='{$file_path}' class='news_category_subject' >{$subject}</a>
										
											
									</div>
								</div>");

								array_push($output_array, $output);
						
						}
						return $output_array;
					}
					
					
					
						echo "<div style='color:white;clear:both;'>.</div>";
						
							?>
						<div class="container_category" style="width:100%;">
							<div class="container_category_left">
							
							
								<?php

								echo '<div class="category_name" style="margin-top:0px;" ><a href="/politics.php"><i class="bi bi-bank"></i>Politics</a><span><a href="/politics.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
								foreach(news_category($connection,$content_id_headline,3,"in",$str_top_story_headline) as $i){
									echo  $i;
								}
								echo '<div class="category_name" " ><a href="/crime.php"><i class="bi bi-emoji-tear"></i>Crime</a><span><a href="/crime.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
								foreach(news_category($connection,$content_id_headline,28,"in",$str_top_story_headline) as $i){
									echo  $i;
								}
								echo '<div class="category_name"><a href="/social-issues.php"><i class="bi bi-hospital"></i>Social Issues</a><span><a href="/social-issues.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
								foreach(news_category($connection,$content_id_headline,10,"in",$str_top_story_headline) as $i){
									echo  $i;
								}
								?>


							<div class="hide_non_mobile_ad" style="margin:0 auto; width:315px;margin-top:20px;margin-bottom:10px;">
								<a href="/img/ads/advert1.jpg"><img src="/img/ads/advert1.jpg"></a>
							</div>

								<?php
								echo '<div class="category_name"><a href="/trending-videos.php"><i class="bi bi-play-circle"></i>Trending Videos</a><span><a href="/trending-videos.php">Watch More <img src="/img/icons/right_arrow.png"></a></sapn></div>';
								foreach(news_category($connection,$content_id_headline,99,"videos",$str_top_story_headline) as $i){
									echo  $i;
								}

								echo '<div class="category_name" " ><a href="/business.php"><i class="bi bi-building"></i>Business</a><span><a href="/business.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
								foreach(news_category($connection,$content_id_headline,24,"in",$str_top_story_headline) as $i){
									echo  $i;
								}

								

								echo '<div class="category_name"><a href="/entertainment.php"><i class="bi bi-music-note-beamed"></i>Entertainment</a><span><a href="/entertainment.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
								foreach(news_category($connection,$content_id_headline,6,"in",$str_top_story_headline) as $i){
									echo  $i;
								}

								

								echo '<div class="category_name"><a href="/sports.php"><i class="fa fa-futbol-o" aria-hidden="true"></i>Sports</a><span><a href="/sports.php">Read More <img src="/img/icons/right_arrow.png"></a></sapn></div>';
								foreach(news_category($connection,$content_id_headline,7,"in",$str_top_story_headline) as $i){
									echo  $i;
								}

								echo '<div class="category_name"><a href="/science-technology.php"><i class="bi bi-airplane"></i>Science/Technology</a><span><a href="/science-technology.php">Read More <img src="/img/icons/right_arrow.png"></a></sapn></div>';
								foreach(news_category($connection,$content_id_headline,29,"in",$str_top_story_headline) as $i){
									echo  $i;
								}

								
								// echo '<div class="category_name"><a href="/others.php">Others</a><span><a href="/others.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
								// foreach(news_category($connection,$content_id_headline,99,"not_in") as $i){
								// 	echo  $i;
								// }

								echo '<div class="category_name"><a href="/world.php"><i class="bi bi-globe"></i>World</a><span><a href="/world.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
								foreach(news_category($connection,$content_id_headline,4,"in",$str_top_story_headline) as $i){
									echo  $i;
								}

								echo '<div class="category_name"><a href="/opinion.php"><i class="bi bi-tropical-storm"></i>Opinion</a><span><a href="/opinion.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
								foreach(news_category($connection,$content_id_headline,26,"article",$str_top_story_headline) as $i){
									echo  $i;
								}
								?>
							
							
							</div>
							<div class="container_category_right" style="width:35%;float:right">
								<a href="/img/ads/advert1.jpg"><img src="/img/ads/advert1.jpg"></a>
								<br><br>
								<a href="/img/ads/advert2.jpg"><img src="/img/ads/advert2.jpg"></a>
								<h3 style="text-align:center;border:5px solid #ccc;padding:20px;5px;">
									Axex Books is an accounting software, inventory,POS and payroll management system. It's developed by QuantumIT in Ghana, so it's highly customizable to meet business needs
									<br><br>
									Suitable For:
									<br>
									
										Manufacturing Companies<br>
										Pharmacies<br>
										Provision Shops<br>
										Schools<br>
										Hospitals/Clinics<br>
										Barbershops<br>
										Etc.
									
									<br><br>
									Contact<br>
									0246331520/0537767521
								</h3>
							</div>
						</div>




					<div style="color:white;margin-bottom:20px;clear:both;">.</div>
				</div>
				<div>
					<?php include($_SERVER['DOCUMENT_ROOT']."/include/news_structure_sidebar.php");?>
				</div>
			</div>

				<?php 
				
				
				include($_SERVER['DOCUMENT_ROOT']."/include/footer.php");
				
				
				?>
		</div>
	</body>
<html>
