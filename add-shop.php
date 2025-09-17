<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
$now = new DateTime();
$now->setTimezone(new DateTimeZone('Africa/Accra'));
$now = $now->format('Y-m-d H:i:s');

if(isset($_SESSION["user_level"])){
    $user_id = $_SESSION["user_id"];
    $user_level = $_SESSION["user_level"];



}else{
    die(header("Location: /login.php"));
}

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5092847457222474" crossorigin="anonymous"></script> -->
		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/add-shop.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Items - Wiki Ghana</title>
		<link rel="canonical" href="/signup.php">

		<meta property="fb:app_id" content="1114141350112517" />
		<meta property="og:url"           content="https://www.wikighana.com/signup.php" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Sign Up - Wiki Ghana" />
		<meta property="og:description"   content="Ghana News, Dating, Buy/Sell" />
		<meta property="og:image"  shopprop="image"       content="https://wikighana.com/img/icons/favicon2.jpg" />
		<meta property="og:site_name" 		content="Wiki Ghana">
		<meta property="og:updated_time" 	content="<?php echo date("Y/m/d");?>" />
		<meta property="og:image:width" content="256">
		<meta property="og:image:height" content="256">
		<meta name="description" content="Ghana News, Dating, Buy/Sell - Wiki Ghana">
		<meta name="keywords" content="ghana,news,politics,government,court,law,publish, ghanaian,africa,dating,meet,love">
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");


                    

                   
                    
                    $output = "";
                    if(isset($_POST["submit_update"])){
                        $_GET['shop_id'] = $_SESSION['shop_id'];
                        $_GET['page'] = $_SESSION['page'];
                        
                    }


                    if(isset($_GET["shop_id"], $_GET["is_approved"])){
                        if($_GET["is_approved"] == "true"){
                            $query = "UPDATE `shops` SET `is_approved` = '1' WHERE `id` = '{$_GET['shop_id']}' ";
                        }elseif($_GET["is_approved"] == "false"){
                            $query = "UPDATE `shops` SET `is_approved` = '0' WHERE `id` = '{$_GET['shop_id']}' ";
                        }

                        $run = mysqli_query($connection, $query);

                    }


                    if(isset($_GET["shop_id"])){
                        $shop_id = $_GET["shop_id"];
                    }
                    
                    // if(isset($_GET["shop_id"], $_GET["page"],$_GET["remove"])){
                    //     $shop_id = $_GET["shop_id"];
                       
                    //     $img_r = $_GET["remove"];
                        
                    //     unlink(substr($_SESSION["$img_r"],1));
                    //     $query = "UPDATE `shops` SET `$img_r` = '' WHERE `shops`.`id` = $shop_id;";
                    //     $run = mysqli_query($connection, $query);
                    //     if(mysqli_affected_rows($connection) > 0){
                    //         $output .= "<p style='color:green;'><strong>Photo Removed !!</strong></p>";
                    //     }else{$output .= "<p style='color:red;'><strong>Photo Not Removed !!</strong></p>";}
                    // }

                    if(isset($_GET["shop_id"], $_GET["page"],$_GET["del"])){
                        $item_id = $_GET["shop_id"];
                        $page = $_GET["page"];
                        unlink(substr($_SESSION["img_1"],1));
                        unlink(substr($_SESSION["img_2"],1));
                        
                        $query = "DELETE FROM `shops` WHERE `shops`.`id` = $shop_id LIMIT 1;";
                        $run = mysqli_query($connection, $query);
                        if(mysqli_affected_rows($connection) > 0){
                            //$output .= "<p style='color:green;'><strong>Photo Removed !!</strong></p>";
                            die(header("Location: /add-shop.php?page=$page"));
                        }else{$output .= "<p style='color:red;'><strong>Photo Not Removed !!</strong></p>";}
                    }








                    

                	if(isset($_POST["submit_insert"]) || isset($_POST["submit_update"])){
                       
                        $file_path_upload_1 = "";
                        $file_path_upload_2 = "";
                       
	

                       
                        $shop_full_name = mysqli_real_escape_string($connection, trim($_POST["shop_full_name"]));
                        $slogan = mysqli_real_escape_string($connection, trim($_POST["slogan"]));
                        $address = mysqli_real_escape_string($connection, trim($_POST["address"]));
                        $whatsapp_no = mysqli_real_escape_string($connection, trim($_POST["whatsapp_no"]));
                        $mobile_no = mysqli_real_escape_string($connection, trim($_POST["mobile_no"]));
                        $short_name = mysqli_real_escape_string($connection, trim($_POST["short_name"]));
                        
                        





                       
                        if(isset($_POST["submit_insert"])){
                            if(!file_exists("img/shop/{$user_id}")){

                                if (!mkdir("img/shop/{$user_id}/", 0777, true)) {
                                    die('Failed to create directories...');
                                }
                            }
                        }

						$target_dir = "img/shop/{$user_id}/";

                        if(!empty(basename($_FILES["img_1"]["name"]))){
                            $file_name = basename($_FILES["img_1"]["name"]);
                            $target_file = $target_dir . $file_name;
                            $test = explode('.', $file_name);
                            $extension = end($test);    
                            $new_name = rand(100,99999) .'.'.$extension;
                            $target_file = $target_dir . $new_name;

                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                            if(!empty($imageFileType)){
                                if (move_uploaded_file($_FILES["img_1"]["tmp_name"], $target_file)) {
                                    if($_SERVER['REMOTE_ADDR']=='::1'){
                                        $file_path_upload_1 ="/{$target_file}";
                                    }else{
                                        $file_path_upload_1 ="/{$target_file}";
                                    }
                                    
                                }
                            }
                        }

                        if(!empty(basename($_FILES["img_2"]["name"]))){
                            $file_name = basename($_FILES["img_2"]["name"]);
                            $target_file = $target_dir . $file_name;
                            $test = explode('.', $file_name);
                            $extension = end($test);    
                            $new_name = rand(100,99999) .'.'.$extension;
                            $target_file = $target_dir . $new_name;

                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                            if(!empty($imageFileType)){
                                if (move_uploaded_file($_FILES["img_2"]["tmp_name"], $target_file)) {
                                    if($_SERVER['REMOTE_ADDR']=='::1'){
                                        $file_path_upload_2 ="/{$target_file}";
                                    }else{
                                        $file_path_upload_2 ="/{$target_file}";
                                    }
                                    
                                }
                            }
                        }

                        


                        if(isset($_POST["submit_insert"])){

                            $query = "INSERT INTO `shops` (`id`, `shop_full_name`, `slogan`, `address`, `whatsapp_no`, `mobile_no`, `logo_url`, `cover_url`, `short_name`)";
                            $query .= " VALUES (NULL,  '$shop_full_name', '$slogan', '$address', '$whatsapp_no', '$mobile_no', '$file_path_upload_1', '$file_path_upload_2', '$short_name')";
                            
                            $run = mysqli_query($connection, $query);
                            if(mysqli_affected_rows($connection) > 0){
                                $output .= "<p style='color:green;'><strong>Record Successfully Saved INSERT !!</strong></p>";
                            }else{$output .= "<p style='color:red;'><strong>Record Not Saved INSERT !!</strong></p>";}


                            //$query = "INSERT INTO `shop_item` (`id`, `item_name`, `item_description`, `notes_to_customers`, `price`, `is_negotiable`, `is_instock`, `user_id`, `subcategory2_id`, `brand`, `item_condition`, `gender`, `entry_date_time`,`img_1`,`img_2`,`img_3`,`img_4`,`img_5`,`shop_id`,`subcategory1_id`,`maincategory_id`) ";
                            //$query .="VALUES (NULL, '$item_name', '$item_description', '$notes_to_customers', '$price', '$is_negotiable', '$is_instock', '$user_id', '$subcategory2_id', '$brand', '$item_condition', '$gender', '$now','$file_path_upload_1','$file_path_upload_2','$file_path_upload_3','$file_path_upload_4','$file_path_upload_5','$shop_id','$subcategory1_id','$maincategory_id');";
                        }elseif(isset($_POST["submit_update"])){
                            $update_img_1 = "";
                            $update_img_2 = "";
                           
                            if( $file_path_upload_1 != ""){
                                $update_img_1 = ", `logo_url` = '$file_path_upload_1'";
                                if(substr($_SESSION["img_1"],1) != ""){
                                    unlink(substr($_SESSION["img_1"],1));
                                }
                            }
                            if( $file_path_upload_2 != ""){
                                $update_img_2 = ", `cover_url` = '$file_path_upload_2'";
                                if(substr($_SESSION["img_2"],1) != ""){
                                    unlink(substr($_SESSION["img_2"],1));
                                }
                            }
                            
                            $query = "UPDATE `shops` SET `shop_full_name` = '$shop_full_name', `slogan` = '$slogan', `address` = '$address', `whatsapp_no` = '$whatsapp_no', `mobile_no` = '$mobile_no', `short_name` = '$short_name' {$update_img_1}{$update_img_2} WHERE `shops`.`id` = {$_GET['shop_id']}";

                            //$query = "UPDATE `shop_item` SET `item_name` = '$item_name', `item_description` = '$item_description', `notes_to_customers` = '$notes_to_customers', `price` = '$price', `is_negotiable` = '$is_negotiable', `is_instock` = '$is_instock', `user_id` = '$user_id', `shop_id` = '$shop_id', `subcategory2_id` = '$subcategory2_id', `brand` = '$brand', `item_condition` = '$item_condition', `subcategory1_id`='$subcategory1_id', `maincategory_id`='$maincategory_id', `gender` = '$gender'{$update_img_1}{$update_img_2}{$update_img_3}{$update_img_4}{$update_img_5} WHERE `shop_item`.`id` = '$item_id';";
                            

                            $run = mysqli_query($connection, $query);
                            if(mysqli_affected_rows($connection) > 0){
                                $output .= "<p style='color:green;'><strong>Record Successfully Saved UPDATE !!</strong></p>";
                            }else{$output .= "<p style='color:red;'><strong>Record Not Saved UPDATE !!</strong></p>";}

                        }
                        
                        

                    }
                

                    if(isset($_GET["shop_id"])){
                        $shop_id = $_GET["shop_id"];
                        $query = "SELECT * FROM `shops` WHERE `id` = '$shop_id'";
                        $run = mysqli_query($connection, $query);
                        if(mysqli_num_rows($run) > 0){
                            $row = mysqli_fetch_assoc($run);
                            $shop_full_name_c = $row['shop_full_name'];
                           $is_approved = $row["is_approved"];

                            $slogan_c = $row['slogan'];
                            $address_c = $row['address'];
                            $whatsapp_no_c = $row['whatsapp_no'];
                            $mobile_no_c = $row['mobile_no'];
                            $short_name_c = $row['short_name'];
                           
                            $img_1 = $row['logo_url'];
                            $img_2 = $row['cover_url'];
                          

                            $_SESSION["logo_url"] =$img_1;
                            $_SESSION["cover_url"] =$img_2;
                           
                        }

                    }
                ?>



                <div class="flexContainer">
                    <div class="menubarLeft">
                    
<?php


if($_SERVER['REMOTE_ADDR']=='::1'){
    $perPage = 10;
}else{
    $perPage = 10;
}
$output_page = "";

$MaxNo = 8;
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
if( $page == 1){
    $rec_start = 0;
}else{
    $rec_start = ($page-1) * $perPage;
}
$query4 = "SELECT Count(*) AS `count_records` FROM `shops`";
$run = mysqli_query($connection, $query4);
$row = mysqli_fetch_assoc($run);
$records = $row["count_records"];
$totalPages = ceil($records / $perPage);
if($records > $perPage){
    $previous = $page - 1;
    $output_page .= "<div style='margin-top:20px;'>";
    if($page > 1){$output_page .= "<a href='{$_SERVER['PHP_SELF']}?page={$previous}' style='color:blue;text-decoration:none;'>Previous </a>";}
    $links = "";
    if($page > $MaxNo){
        $start_i = $i + ($page - $MaxNo);
        $MaxNo = $page;
    }else{
        $start_i = 1;
    }
    for ($i = $start_i; $i <= $totalPages; $i++) {
    $links .= ($i != $page ) ? "<a href='{$_SERVER['PHP_SELF']}?page={$i}' style='color:blue;text-decoration:none;border:1px solid blue;padding:1px 5px'>{$i}</a> ": "$page ";
    if($i == $MaxNo){break;}
    }
    $output_page .= $links;
    $next = $page + 1;
    
    if($page >= 1 && $page < $totalPages){ $output_page .= "<a href='{$_SERVER['PHP_SELF']}?page={$next}' style='color:blue;text-decoration:none'>Next</a>";}
    $output_page .= "</div>";
    $output_page .= "<div style='clear:both; color:white;'>.</div>";

}














// $query = "SELECT `id`,`item_name`,`img_1` FROM `shop_item` WHERE `shop_id` = '$shop_id' ORDER BY `id` LIMIT {$rec_start}, 1";
// $run = mysqli_query($connection, $query);
// if(mysqli_num_rows($run) > 0){
//     while($row = mysqli_fetch_assoc($run)){
//         echo $item_id = $row["id"];
       
//     }

// }


$query = "SELECT `id`,`shop_full_name`,`logo_url`,`is_approved` FROM `shops`  ORDER BY `id` DESC LIMIT {$rec_start},  {$perPage}";
$run = mysqli_query($connection, $query);
if(mysqli_num_rows($run) > 0){
    echo "<table class='item_list'>";
    while($row = mysqli_fetch_assoc($run)){
        $shop_id = $row["id"];
        $shop_full_name = $row["shop_full_name"];
        $shop_img = $row["logo_url"];

        $is_approved2 = $row["is_approved"];
        if($is_approved2 == 1){
            $how_tick_mark = "<span style='color:green;'>&#10004;</span></td>";
        }else{$how_tick_mark = "";}
       
?>
        <tr>
            <td style="border-left:5px solid white" <?php if(isset($_GET["shop_id"])){if($_GET["shop_id"] == $shop_id){echo "class='selected'";}} ?> ><a style="color:black;text-decoration:none;" href="/add-shop.php?shop_id=<?php echo $shop_id.'&page='.$page; ?>"><?php echo $shop_id; ?></a></td>
            <td><a style="color:blue;text-decoration:none;" href="/add-shop.php?shop_id=<?php echo $shop_id.'&page='.$page; ?>"><?php echo $shop_full_name; ?></a></td>
            <td><a style="text-decoration:none;" href="/add-shop.php?shop_id=<?php echo $shop_id.'&page='.$page; ?>"><img style="width:50px; height:50px;vertical-align:middle;" src="<?php echo $shop_img; ?>"></a><?php echo $how_tick_mark; ?></td>
        </tr>
<?php

    }
echo "</table>";
echo $output_page;
}

?>
                    </div>
                    <div class="productContainerRight">
                        <div class="container">

                            <div class="top_heading">
                                <?php
                                if(isset($_GET["shop_id"])){
                                    if($is_approved == 0){
                                        echo "<a href='/add-shop.php?shop_id={$_GET['shop_id']}&is_approved=true&page={$page}'>Approve</a>";
                                    }elseif($is_approved == 1){
                                        echo "<a href='/add-shop.php?shop_id={$_GET['shop_id']}&is_approved=false&page={$page}'>Revoke</a>";
                                    }
                                }
                                ?>   
                            </div> 

                            <form action="add-shop.php" enctype="multipart/form-data"  method="post">
                                <?php echo $output; ?>
                                <table>
                                 

                               


                               
                                    <tr>
                                        <td>
                                            <label for="shop_full_name"><b>Shop Full Name <span style="color:red">*</span></b></label>
                                        </td>
                                        <td>
                                            <input required type="text" maxlength="100" name="shop_full_name" id="shop_full_name" <?php if(isset($shop_full_name_c)){echo "value='{$shop_full_name_c}'";} ?> >
                                        </td>
                                    </tr>
                                 

                                    <tr>
                                        <td>
                                            <label for="short_name"><b>Shop Short Name <span style="color:red">*</span></b></label>
                                        </td>
                                        <td>
                                            <input required type="text" maxlength="7" name="short_name" id="short_name" <?php if(isset($short_name_c)){echo "value='{$short_name_c}'";} ?> >
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <label for="slogan"><b>Shop Slogan <span style="color:red">*</span></b></label>
                                        </td>
                                        <td>
                                            <input required type="text" maxlength="200" name="slogan" id="slogan" <?php if(isset($slogan_c)){echo "value='{$slogan_c}'";} ?> >
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="address"><b>Shop Address</b></label>
                                        </td>
                                        <td>
                                            <input type="text" maxlength="500" name="address" id="address" <?php if(isset($address_c)){echo "value='{$address_c}'";} ?> >
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="whatsapp_no"><b>WhatsApp Number</b></label>
                                        </td>
                                        <td>
                                            <input placeholder="Format: 2330246331520" required type="text" maxlength="100" name="whatsapp_no" id="whatsapp_no" <?php if(isset($whatsapp_no_c)){echo "value='{$whatsapp_no_c}'";} ?> >
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="mobile_no"><b>Mobile Number</b></label>
                                        </td>
                                        <td>
                                            <input placeholder="Format: +2330246331520" required type="text" maxlength="100" name="mobile_no" id="mobile_no" <?php if(isset($mobile_no_c)){echo "value='{$mobile_no_c}'";} ?> >
                                        </td>
                                    </tr>



                                    <tr>
                                        <td><label for="img_1" class="browse-photo"><strong>Photo 1<?php if(!isset($_GET["shop_id"])){echo '<span style="color:red;">*</span>';} ?></strong></label></td>
                                        <td><input <?php if(!isset($_GET["shop_id"])){echo 'required';} ?> type="file" name="img_1" id="img_1" accept="image/png, image/jpeg, image/jpg" ><?php if(isset($_GET["shop_id"])){if($img_1 != ""){echo "<span class='span_img' style='background-color:white;display:inline-block;width:50px;height:50px;'><img class='img_class' alt='$shop_full_name_c' style='width:50px; height:50px;vertical-align:middle;' src='{$img_1}'></span>";}} ?></td>
                                    </tr>

                                    <tr>
                                        <td><label for="img_2" class="browse-photo"><strong>Photo 2<?php if(!isset($_GET["shop_id"])){echo '<span style="color:red;">*</span>';} ?></strong></label></td>
                                        <td><input <?php if(!isset($_GET["shop_id"])){echo 'required';} ?> type="file" name="img_2" id="img_2" accept="image/png, image/jpeg, image/jpg" ><?php if(isset($_GET["shop_id"])){if($img_2 != ""){echo "<span class='span_img' style='background-color:white;display:inline-block;width:50px;height:50px;'><img alt='$shop_full_name_c' class='img_class' style='width:50px; height:50px;vertical-align:middle;' src='{$img_2}'></span>";}} ?> </td>
                                    </tr>

                                   
                                        
                                </table>
                              
                    <br>
                                <a href="/add-shop.php?page=<?php echo $page;?>"><button type="button">Add New</button></a>
                               
                                
                                    <button class="btnSubmit" type="submit" name="<?php if(isset($_GET['shop_id'])){echo 'submit_update';}else{echo 'submit_insert';} ?>" id="submit_insert">Save</button>

                                    <?php
                                    if(isset($_GET["shop_id"])){
                                      
                                        echo "<a style='float:right' href='/add-shop.php?shop_id={$_GET['shop_id']}&page={$page}&del=true'><button type='button'>Delete</button></a>";
                                    }
                                    
                                    ?>
                               
                               
                                

                            </form>
                        
                        </div><!-- end of .container -->
                    </div>
                </div>
			

				<?php 
				 if(isset($_GET['shop_id'], $_GET['page'])){
                    $_SESSION['shop_id'] = $_GET['shop_id'];
                    $_SESSION['page'] = $_GET['page'];
                }
				
				// include($_SERVER['DOCUMENT_ROOT']."/include/footer.php");
				
				
				?>
		</div>
	</body>
<html>






<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption


var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");



$(document).ready(function(){

	$(document).on('click','.img_class', function(){
		var img = $(this).attr("id");
		var src2 = $(this).attr("src");
		var alt2 = $(this).attr("alt");
		modal.style.display = "block";
		modalImg.src = src2;
		captionText.innerHTML = alt2;
		
	})

	$(document).on('click','.avatar', function(){
		
		var img = $(this).attr("id");
		
		var src2 = $(this).attr("src");
		var alt2 = $(this).attr("alt");
		modal.style.display = "block";
		modalImg.src = src2;
		captionText.innerHTML = alt2;
		
	})

	$(document).on('click','.imgcontainer', function(){
		var img = $(this).attr("id");
		var src2 = img;
		// var src2 = $(this).attr("src");
		var alt2 = "";
		modal.style.display = "block";
		modalImg.src = src2;
		captionText.innerHTML = alt2;
		
	})
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>


