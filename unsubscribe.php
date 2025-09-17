<?php
require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");

if(isset($_GET["id"]) && isset($_GET["pass-code"])){
    
    $pass_code = $_GET["pass-code"];
    $query = "SELECT * FROM `wiki_visitors` WHERE `user_id`={$_GET["id"]}";
    $run = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($run);
    if($pass_code == $row["pass_code"]){
        $query = "UPDATE `wiki_visitors` SET `is_subscribed`= 0 WHERE `user_id`={$row['user_id']}";
		mysqli_query($connection, $query);
        
        if(mysqli_affected_rows($connection) > 0){
            $output = "<h3 style='font-family:sans-serif;color:green;'>{$row['email']} is successfully unsubscribed</h3>";
        }else{$output = "<h3 style='font-family:sans-serif;color:green;'>{$row['email']}  is no more subscribed</h3>";}
    }

}

?>






<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5092847457222474" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/manage-users.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Unsubscribe - Wiki Ghana</title>
		<link rel="canonical" href="/unsubscribe.php">
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content">
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="manage-users.php">Users</a></div>
					<div class="login">
						

						
						

						<div class="container">
                        <?php echo $output; ?>
						</div>

						
						
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
