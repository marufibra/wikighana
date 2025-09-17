<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!-- <script type='text/javascript' src='//pl25658673.profitablecpmrate.com/41/12/e1/4112e13b18e7daf62cd2e25606869b76.js'></script> -->
		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/category.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Social Issues - Wiki Ghana</title>
		<link rel="canonical" href="/social-issues.php">
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content">
					<!-- <div class="site_nav"><a href="/">Home</a></div> -->
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="/social-issues.php">Social Issues</a></div>
					
					
					<?php
					include($_SERVER['DOCUMENT_ROOT']."/include/advert_top.php");
					$category_page_id = "10";
					
						$query = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE (publish_date_time = (SELECT MAX(`publish_date_time`) AS publish_date FROM `news_content` WHERE category_headline = 1 AND news_or_article = 1 AND category_id = {$category_page_id} AND `status`=1))";
					
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
					
						
						
				
					<div class="headline" title="<?php echo $subject;?>">
						
						<a href="<?php echo  $file_path; ?>"><img src="<?php echo $img_path; ?>" title="<?php echo $subject; ?> " class="img_headline"> <?php if($is_video_attached == 1){echo "<img src='{$video_icon_path}' class='video_icon' >";}   ?> <span class="clock_time"><i class="bi bi-clock"></i> <?php echo get_age_of_time($publish_date_time);?></span><?php if(!empty($img_caption)){ echo "<span class='img_caption mobile'>".substr($img_caption,0,100)."</span>"."<span class='img_caption non_mobile'>".substr($img_caption,0,100)."</span>";} ?></a>
					
					</div>
					<a href="<?php echo  $file_path; ?>" class="headline_link"><?php echo $subject; ?></a>
					
					<div class="category_name" style="margin:30px 0 10px 0;padding-left:10px">Top Stories (Social Issues)</a></span></div>
					<?php
					
						$query = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `category_top_story` = 1 AND `content_id` != {$content_id_headline} AND news_or_article = 1 AND category_id = {$category_page_id} AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT 4";
					
					
					$run = mysqli_query($connection, $query);
					$array_top_strory = [];
					echo '<div class="wrapper_top_story">';
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
					echo "</div>";
					$str_top_story_headline = implode(",",$array_top_strory).",".$content_id_headline;
					
					?>
					<p style="color:white;" class="hide_mobile_ad">
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

					<div class="hide_non_mobile_ad" style="margin:0 auto;width:300px">
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
					</div>
					<?php






					if($_SERVER['REMOTE_ADDR']=='::1'){
						$perPage = 3;
					}else{
						$perPage = 60;
					}
					$output_page = "";
					
					$MaxNo = 10;
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					if( $page == 1){
						$rec_start = 0;
					}else{
						$rec_start = ($page-1) * $perPage;
					}
					
					$query4 = "SELECT Count(*) AS `count_records` FROM `news_content`  WHERE `content_id` not in ($str_top_story_headline) AND category_id = {$category_page_id} AND news_or_article = 1 AND category_top_story = 1 AND `status`=1";// ORDER BY `publish_date_time` DESC LIMIT 102";
					$run = mysqli_query($connection, $query4);
					$row = mysqli_fetch_assoc($run);
					$records = $row["count_records"];
					$totalPages = ceil($records / $perPage);
					if($records > $perPage){
						$previous = $page - 1;
						$output_page .= "<div style='margin-top:20px;'>";
						if($page > 1){$output_page .= "<a href='{$_SERVER['PHP_SELF']}?page={$previous}#latest_news_58956' style='color:blue;text-decoration:none;'>Previous </a>";}
						$links = "";
						if($page > $MaxNo){
							$start_i = $i + ($page - $MaxNo);
							$MaxNo = $page;
						}else{
							$start_i = 1;
						}
						for ($i = $start_i; $i <= $totalPages; $i++) {
						$links .= ($i != $page ) ? "<a href='{$_SERVER['PHP_SELF']}?page={$i}#latest_news_58956' style='color:blue;text-decoration:none;'>{$i}</a> ": "$page ";
						if($i == $MaxNo){break;}
						}
						$output_page .= $links;
						$next = $page + 1;
						
						if($page >= 1 && $page < $totalPages){ $output_page .= "<a href='{$_SERVER['PHP_SELF']}?page={$next}#latest_news_58956' style='color:blue;text-decoration:none'>Next</a>";}
						$output_page .= "</div>";
						$output_page .= "<div style='clear:both; color:white;'>.</div>";

					}













						
						$query3 = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `content_id` not in ($str_top_story_headline) AND category_id = {$category_page_id} AND news_or_article = 1 AND category_top_story = 1 AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT {$rec_start},  {$perPage}";
						
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
								$row2 = mysqli_fetch_assoc($run2);
								$img_path = $row2["img_path"];
								if(empty($img_path)){$img_path = "./../../img/news/news_headline_default.jpg";}
								$img_caption = $row2["caption"];
								$file_path = "./../../".$year."/".$month."/".clean($subject)."-".$content_id.".php";

								
								$output = ("<div class='wrapper_news_category' title='{$subject}'>
									<div class='news_category'>
									<a href='{$file_path}'><img src='{$img_path}' title='{$subject}' class='category_img'>{$output_img_icon}</a>
									
									<a href='{$file_path}' class='news_category_subject' >{$subject}</a>
										
											
									</div>
								</div>");

								array_push($output_array, $output);
						
						}
					
					
					
					
						echo "<div style='color:white;clear:both;'>.</div>";

						?>
						<div class="container_category" style="width:100%;">
							<div class="container_category_left">
							
							
						<?php
						
						echo '<div class="category_name" style="margin-top:0px;padding-left:10px" id="latest_news_58956">Latest Stories (Social Issues)</div>';
						foreach($output_array as $i){
							echo  $i;
						}

						
				
echo "<div style='clear:both'></div>";
					

						echo $output_page;
					
					
						
						
						

				
					

					

					
					
					
					
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
