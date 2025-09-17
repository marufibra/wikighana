<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/category.css">
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
					<!-- <div class="site_nav"><a href="/">Home</a></div> -->
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="/others.php">Others</a></div>
					<?php
					$news_page_or_category_page = "";//set index or news page to "" and other category pages to the category no
					$others = "1";//set others to 1
					$article = "";//set article to 1
					
					if($news_page_or_category_page != ""){
						$others = "";
						$article = "";
					}
					if($others != ""){
						$article = "";
						$news_page_or_category_page = "";
					}
					if($article != ""){
						$others = "";
						$news_page_or_category_page = "";
					}
					
					if($news_page_or_category_page == ""){
						$criteria = "";
						$headline = "headline";
						$top_story = "top_story";
					}else{
						$criteria = " AND category_id = ".$news_page_or_category_page;
						$headline = "category_headline";
						$top_story = "top_story";
					}
					
					if($others == "" && $article == ""){
						$query = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE (publish_date_time = (SELECT MAX(`publish_date_time`) AS publish_date FROM `news_content` WHERE {$headline} = 1 AND news_or_article = 1 {$criteria} AND `status`=1))";
					}elseif($article == 1){
						$query = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE (publish_date_time = (SELECT MAX(`publish_date_time`) AS publish_date FROM `news_content` WHERE category_headline = 1 AND news_or_article != 1 AND `status`=1))";
					}elseif($others == 1){
						$query = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE (publish_date_time = (SELECT MAX(`publish_date_time`) AS publish_date FROM `news_content` WHERE category_headline = 1 AND category_id Not In(1,2,3,4,5,6,7,8,9) AND `status`=1))";
					}
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
					
					<div class="category_name" style="margin:30px 0 10px 0;padding-left:10px;">Top Stories (Others)</span></div>
					<?php
					if($others == "" & $article == ""){
						$query = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `category_top_story` = 1 AND `content_id` != {$content_id_headline} AND news_or_article = 1 {$criteria} AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT 4";
					}elseif($article == 1){
						$query = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `category_top_story` = 1 AND `content_id` != {$content_id_headline} AND news_or_article != 1 AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT 4";
					}elseif($others == 1){
						$query = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `category_top_story` = 1 AND `content_id` != {$content_id_headline} AND category_id not in(1,2,3,4,5,6,7,8,9) AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT 4";
					}
					
					$run = mysqli_query($connection, $query);
					
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

					?>
						
						<div class="top_story" title="<?php echo $subject;?>">
							<a href="<?php echo  $file_path; ?>"><img src="<?php echo $img_path; ?>" class="top_story_image" title="<?php echo $subject; ?>"><?php if($is_video_attached == 1){echo "<img src='{$video_icon_path}' class='top_story_video_icon'>";}   ?><span class="clock_time_top_story"><i class="bi bi-clock"></i> <?php echo get_age_of_time($row["publish_date_time"]);?></span></a>
							<a href="<?php echo  $file_path; ?>" class="top_story_subject"><?php echo $subject; ?></a>
						</div>
					
					
					<?php
					
					}
					echo "</div>";

					function news_category($connection,$content_id_headline,$category_id,$in_or_not_in){
						if($in_or_not_in == "in"){
						$query3 = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `top_story` != 1 AND `content_id` != {$content_id_headline} AND `category_id` in ({$category_id}) AND news_or_article = 1 AND category_top_story = 1 AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT 6";
						}elseif($in_or_not_in == "not_in"){
							$query3 = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `top_story` != 1 AND `content_id` != {$content_id_headline} AND `category_id` not in (1,2,3,4,5,6,7,8,9) AND news_or_article = 1 AND category_top_story = 1 AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT 6";
						
						}elseif($in_or_not_in == "article"){
							$query3 = "SELECT `news_content`.`content_id`,`news_content`.`subject`,`news_content`.`publish_date_time`,`img_id`,`is_video_attached` FROM `news_content`  WHERE `top_story` != 1 AND `content_id` != {$content_id_headline} AND news_or_article = 2 AND category_top_story = 1 AND `status`=1 ORDER BY `publish_date_time` DESC LIMIT 6";
						
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
						return $output_array;
					}
					
					
					if($article == "" && $others =="" && $news_page_or_category_page == "" ){
						echo "<div style='color:white;clear:both;'>.</div>";
						echo '<div class="category_name" style="margin-top:20px;" ><a href="/politics">Politics</a><span><a href="/politics">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
						foreach(news_category($connection,$content_id_headline,3,"in") as $i){
							echo  $i;
						}

						echo '<div class="category_name"><a href="/entertainment.php"><i class="bi bi-music-note-beamed"></i>Entertainment</a><span><a href="/entertainment.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
						foreach(news_category($connection,$content_id_headline,6,"in") as $i){
							echo  $i;
						}

						echo '<div class="category_name"><a href="/sports.php"><i class="fa fa-futbol-o" aria-hidden="true"></i>Sports</a><span><a href="/sports.php">Read More <img src="/img/icons/right_arrow.png"></a></sapn></div>';
						foreach(news_category($connection,$content_id_headline,7,"in") as $i){
							echo  $i;
						}

						echo '<div class="category_name"><a href="/trending-videos"><i class="bi bi-play-circle"></i>Trending Videos</a><span><a href="/trending-videos">Watch More <img src="/img/icons/right_arrow.png"></a></sapn></div>';
						foreach(news_category($connection,$content_id_headline,5,"in") as $i){
							echo  $i;
						}
						echo '<div class="category_name"><a href="/others.php">Others</a><span><a href="/others.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
						foreach(news_category($connection,$content_id_headline,99,"not_in") as $i){
							echo  $i;
						}
						echo '<div class="category_name"><a href="/article.php">Article/Opinion</a><span><a href="/article.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
						foreach(news_category($connection,$content_id_headline,99,"article") as $i){
							echo  $i;
						}
						echo '<div class="category_name"><a href="/world.php"><i class="bi bi-globe"></i>World</a><span><a href="/world.php">Read More <img src="/img/icons/right_arrow.png"></a></span></div>';
						foreach(news_category($connection,$content_id_headline,4,"in") as $i){
							echo  $i;
						}
					}

					if($news_page_or_category_page == 3){
						echo '<div class="category_name" ><div style="color:white">.</div></div>';//Politics
						foreach(news_category($connection,$content_id_headline,3,"in") as $i){
							echo  $i;
						}
					}elseif($news_page_or_category_page == 6){
						echo '<div class="category_name"><div style="color:white">.</div></div>';//Entertainment
						foreach(news_category($connection,$content_id_headline,6,"in") as $i){
							echo  $i;
						}

					}elseif($news_page_or_category_page == 7){
						echo '<div class="category_name"><div style="color:white">.</div></div>';//Sports
						foreach(news_category($connection,$content_id_headline,7,"in") as $i){
							echo  $i;
						}

					}elseif($news_page_or_category_page == 5){
						echo '<div class="category_name"><div style="color:white">.</div></div>';//Videos
						foreach(news_category($connection,$content_id_headline,5,"in") as $i){
							echo  $i;
						}

					}elseif($news_page_or_category_page == 4){
						echo '<div class="category_name"><div style="color:white">.</div></div>';//World
						foreach(news_category($connection,$content_id_headline,4,"in") as $i){
							echo  $i;
						}

					}elseif($others != ""){
						echo '<div class="category_name" style="padding-left:10px;">Latest Stories (Others)</div>';
						foreach(news_category($connection,$content_id_headline,99,"not_in") as $i){
							echo  $i;
						}
					}elseif($article != ""){
						echo '<div class="category_name"><div style="color:white">.</div></div>';
						foreach(news_category($connection,$content_id_headline,99,"article") as $i){
							echo  $i;
						}
					}
					

					

					
					
					
					
					?>
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
