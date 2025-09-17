<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/structure.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
	<input type="text" id="fname" name="fname">
		<div class="wrap">
        <?php include("include/header.php");?>
			<div class="content">
				<h2>Main Content Heading</h2>
				<form action="" method="post">
					<ul>
						<li><label for="fname">Full Name</label><input type="text" id="fname" name="fname"></li>
						<li><label for="comments">comments</label><textarea id="comments" name="comments" rows="15" cols="40"></textarea></li>
						<li><label>Gendar</label><span>Male</span><input type="radio" name="gendar" value="male"><span>Female</span><input type="radio" name="gendar" value="female"> </input></li>
						<li><input type="checkbox" name="agree" value="yes"><span>I agree to the terms and conditions</span></li>
						<li><input type="submit" name="Submit" value="Go!"></li>
						
					</ul>
				</form>
			</div>

			<?php include("include/structure_sidebar.php");?>
            <?php include("include/footer.php");?>
		</div>
	</body>
<html>