<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
$user_id=2;
$user_level=2;?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/search.css">
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
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="#">Search</a></div>
					
					

					<form class="search-input" method="post" action="/search.php" style="margin:auto;max-width:300px">
						<input type="text" placeholder="Search for news, articles etc ..." name="search-input">

						<button type="submit" name="submit"><i class="fa fa-search"></i></button>
					</form>




					<div class="search-results">
						<?php
						$output_page = "";

						if(isset($_POST["submit"])){
							unset($_SESSION["search"]);
						}
							if(!empty($_POST["search-input"]) || isset($_SESSION["search"])){
							
								if(!empty($_POST["search-input"])){
									$search = mysqli_real_escape_string($connection,trim($_POST["search-input"]));
									$_SESSION["search"] = $search;
								}else{
									$search = $_SESSION["search"];
								}

								
								$criteria_for_content_id = "";
								$row_count_id = "";
								if(is_numeric($search)){
									$query = "SELECT `content_id`,`publish_date_time`,`subject`,`content` FROM `news_content` WHERE `content_id` = {$search}";
									$run = mysqli_query($connection,$query);
									$row = mysqli_fetch_assoc($run);
									$row_count_id = mysqli_affected_rows($connection);
									$subject = htmlentities($row["subject"]);
									$subject_clean = clean($row["subject"]);
									$year = date("Y",strtotime($row["publish_date_time"]));
									$content_id = $row["content_id"];
									$month = date("m",strtotime($row["publish_date_time"]));
									$file_path =$year."/".$month."/".$subject_clean."-".$content_id.".php";
									$content = htmlentities($row["content"]);
									
									if($row_count_id > 0){
										echo $output_id = "<div class='row'><ul><li><a href='./../../{$file_path}'>".substr($subject,0,80)."</a></li></ul>
										
										<div class='bottom-content'>".substr($content,0,200)."</div>
										<div class='bottom-title'><i class='bi bi-clock'></i> ".get_age_of_time($row["publish_date_time"])."</div>
										</div>";
										$criteria_for_content_id = " AND content_id != {$content_id}";
									}else{
										$criteria_for_content_id = "";
									}
								}








								if($_SERVER['REMOTE_ADDR']=='::1'){
									$perPage = 1;
								}else{
									$perPage = 25;//records
								}
								
								
								$MaxNo = 8;//the counter
								$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
								if( $page == 1){
									$rec_start = 0;
								}else{
									$rec_start = ($page-1) * $perPage;
								}
								//$query4 = "SELECT Count(*) AS `count_records` FROM `news_content`  WHERE `content_id` not in ($str_top_story_headline)  AND news_or_article = 1  AND `status`=1";// ORDER BY `publish_date_time` DESC LIMIT 102";
								$query4  = "SELECT Count(*) AS `count_records` ";
								$query4 .= " FROM `news_content` " ;
								$query4 .= " WHERE MATCH(`subject`, `content`) AGAINST('$search') {$criteria_for_content_id} ";
								
								
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
									$links .= ($i != $page ) ? "<a href='{$_SERVER['PHP_SELF']}?page={$i}#latest_news_58956' style='color:blue;text-decoration:none;border:1px solid blue;padding:1px 5px'>{$i}</a> ": "$page ";
									if($i == $MaxNo){break;}
									}
									$output_page .= $links;
									$next = $page + 1;
									
									if($page >= 1 && $page < $totalPages){ $output_page .= "<a href='{$_SERVER['PHP_SELF']}?page={$next}#latest_news_58956' style='color:blue;text-decoration:none'>Next</a>";}
									$output_page .= "</div>";
									$output_page .= "<div style='clear:both; color:white;'>.</div>";
		
								}






								$query  = "SELECT `content_id`,`publish_date_time`,`subject`,`content`, MATCH(`subject`, `content`) AGAINST('$search') AS score ";
								$query .= " FROM `news_content` " ;
								$query .= "WHERE MATCH(`subject`, `content`) AGAINST('$search') {$criteria_for_content_id} ";
								$query .= "ORDER BY score DESC, publish_date_time DESC LIMIT {$rec_start},  {$perPage}";
								
								$run = mysqli_query($connection,$query);
								$row_count = mysqli_affected_rows($connection);
								
								$output = "<ul>";
								while($row = mysqli_fetch_assoc($run)){
									$subject = htmlentities($row["subject"]);
									$content = htmlentities($row["content"]);
									$subject_clean = clean($row["subject"]);
									$year = date("Y",strtotime($row["publish_date_time"]));
									$content_id = $row["content_id"];
									$month = date("m",strtotime($row["publish_date_time"]));
									$file_path =$year."/".$month."/".$subject_clean."-".$content_id.".php";
									$output .= "<div class='row'><li><a href='./../../{$file_path}'>".substr($subject,0,80)."</a></li>
									
									 <div class='bottom-content'>".substr($content,0,200)."</div>
									<div class='bottom-title'><i class='bi bi-clock'></i> ".get_age_of_time($row["publish_date_time"])."</div></div>
									";
								}
								 $output .= "</ul>";

								if($row_count > 0){
									echo $output;
								}
								if($row_count_id == 0 && $row_count == 0){
									echo "<p>There was no search results<p>";
								}

							}else{echo "Enter search";}

							echo $output_page;
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
