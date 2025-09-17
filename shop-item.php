<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
$now = new DateTime();
$now->setTimezone(new DateTimeZone('Africa/Accra'));
$now = $now->format('Y-m-d H:i:s');

if(isset($_SESSION["user_level"])){
    $user_id = $_SESSION["user_id"];
    $user_level = $_SESSION["user_level"];

    $query = "SELECT `shop_id` FROM `wiki_users` WHERE `user_id` = '$user_id'";
    $run = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($run);
    $shop_id = $row["shop_id"];

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
		<link rel="stylesheet" href="/css/shop-item.css">
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
		<meta property="og:image"  itemprop="image"       content="https://wikighana.com/img/icons/favicon2.jpg" />
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


                    

                    $item_name_c = "";
                    $item_description_c = "";
                    $notes_to_customers_c = "";
                    $price_c = 1;
                    $cost_price_c = 0;
                    $op_stock_quantity_c = 0;
                    $is_negotiable_c = 2;
                    $is_instock_c = 1;
                    $brand_c = 1;
                    $item_condition_c = 0;
                    $gender_c = 0;
                    $subcategory2_id_c = 1;
                    
                    $output = "";
                    if(isset($_POST["submit_update"])){
                        $_GET['item_id'] = $_SESSION['item_id'];
                        $_GET['page'] = $_SESSION['page'];
                        
                    }



                    if(isset($_GET["item_id"], $_GET["publish"],$_GET["user_id"])){



                            
                        if($_GET["user_id"] == $user_id){
                            $query = "SELECT `maincategory_id`,`subcategory1_id`,`subcategory2_id`, `item_name` FROM `shop_item` WHERE `id` = '{$_GET['item_id']}'";
                            $run = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($run);
                            $maincategory_id = $row["maincategory_id"];
                            $subcategory1_id = $row["subcategory1_id"];
                            $subcategory2_id = $row["subcategory2_id"];


                            
                            $item_name = $row["item_name"];

                            $query = "SELECT `category_name` FROM `shop_category` WHERE `id` = '{$maincategory_id}'";
                            $run = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($run);
                            $category_name = strtolower($row["category_name"]);

                            $query = "SELECT `subcategory_name` FROM `shop_subcategory1` WHERE `id` = '{$subcategory1_id}'";
                            $run = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($run);
                            $subcategory1_name = strtolower($row["subcategory_name"]);

                            $query = "SELECT `subcategory_name` FROM `shop_subcategory2` WHERE `id` = '{$subcategory2_id}'";
                            $run = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($run);
                            $subcategory2_name = strtolower($row["subcategory_name"]);

                            $query = "SELECT `subcategory_name` FROM `shop_subcategory2` WHERE `id` = '{$subcategory2_id}'";
                            $run = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($run);
                            $subcategory2_name = strtolower($row["subcategory_name"]);

                            // $subject = $row["subject"];
                            $folder = "wiki-shops/".$category_name."/".$subcategory1_name."/".$subcategory2_name."/";
                            $folder = str_replace(" ","-",$folder);
                            if(!file_exists($folder)){
                                if (!mkdir($folder, 0777, true)) {
                                    die('Failed to create directories...');
                                }
                            }
                            $file = "item_structure.php";
                            $newfile =$folder.clean(strtolower($item_name))."-{$_GET['item_id']}.php";





                            if($_GET["publish"] == "true"){
                                $query = "UPDATE `shop_item` SET `is_published` = '1', `file_path`='{$newfile}' WHERE `id` = '{$_GET['item_id']}' ";
                                mysqli_query($connection, $query);

                                if(!file_exists($newfile)){
                                    if (!copy($file, $newfile)) {//copies file
                                        //failed to copy here ...
                                        die(header("Location: ".$_SERVER["PHP_SELF"]."?item_id={$_GET['item_id']}&page={$page}"));	
                                    }
                                }



                            }elseif($_GET["publish"] == "false"){
                                $query = "UPDATE `shop_item` SET `is_published` = '0', `file_path`='' WHERE `id` = '{$_GET['item_id']}' ";
                                $run = mysqli_query($connection, $query);

                                if(file_exists($newfile)){
                                    unlink($newfile);
                                }
                                
                            
                            }
                        }
                        

                    }


                    if(isset($_GET["item_id"])){
                        $item_id = $_GET["item_id"];
                    }
                    
                    if(isset($_GET["item_id"], $_GET["page"],$_GET["remove"],$_GET["user_id"])){
                        if($_GET["user_id"] == $user_id){
                            $item_id = $_GET["item_id"];
                        
                            $img_r = $_GET["remove"];
                            



                            unlink(substr($_SESSION["$img_r"],1));
                            $query = "UPDATE `shop_item` SET `$img_r` = '' WHERE `shop_item`.`id` = $item_id;";
                            $run = mysqli_query($connection, $query);
                            if(mysqli_affected_rows($connection) > 0){
                                $output .= "<p style='color:green;'><strong>Photo Removed !!</strong></p>";
                            }else{$output .= "<p style='color:red;'><strong>Photo Not Removed !!</strong></p>";}
                        }
                    }

                    if(isset($_GET["item_id"], $_GET["page"],$_GET["del"],$_GET["user_id"])){
                        if($_GET["user_id"] == $user_id){
                            $item_id = $_GET["item_id"];
                            $page = $_GET["page"];
                            unlink(substr($_SESSION["img_1"],1));
                            unlink(substr($_SESSION["img_2"],1));
                            unlink(substr($_SESSION["img_3"],1));
                            unlink(substr($_SESSION["img_4"],1));
                            unlink(substr($_SESSION["img_5"],1));
                            $query = "DELETE FROM `shop_item` WHERE `shop_item`.`id` = $item_id LIMIT 1;";
                            $run = mysqli_query($connection, $query);
                            if(mysqli_affected_rows($connection) > 0){
                                //$output .= "<p style='color:green;'><strong>Photo Removed !!</strong></p>";
                                die(header("Location: /shop-item.php?page=$page"));
                            }else{$output .= "<p style='color:red;'><strong>Photo Not Removed !!</strong></p>";}
                        }
                    }








                    

                	if(isset($_POST["submit_insert"]) || isset($_POST["submit_update"])){
                       
                        $file_path_upload_1 = "";
                        $file_path_upload_2 = mysqli_real_escape_string($connection, trim($_POST["txt_img_2"]));
                        $file_path_upload_3 = mysqli_real_escape_string($connection, trim($_POST["txt_img_3"]));
                        $file_path_upload_4 = mysqli_real_escape_string($connection, trim($_POST["txt_img_4"]));
                        $file_path_upload_5 = mysqli_real_escape_string($connection, trim($_POST["txt_img_5"]));

	                    if(isset($_POST["item_name"])){$item_name = mysqli_real_escape_string($connection, trim($_POST["item_name"]));}
                        
                        $item_description = mysqli_real_escape_string($connection, trim($_POST["item_description"]));
                        $notes_to_customers = mysqli_real_escape_string($connection, trim($_POST["notes_to_customers"]));
                        $price = mysqli_real_escape_string($connection, trim($_POST["price"]));

                        $uom = mysqli_real_escape_string($connection, trim($_POST["uom"]));
                        $cost_price = mysqli_real_escape_string($connection, trim($_POST["cost_price"]));
                        $op_stock_quantity = mysqli_real_escape_string($connection, trim($_POST["op_stock_quantity"]));


                        $is_negotiable = mysqli_real_escape_string($connection, trim($_POST["is_negotiable"]));
                        $is_instock = mysqli_real_escape_string($connection, trim($_POST["is_instock"]));
                        $brand = mysqli_real_escape_string($connection, trim($_POST["brand"]));
                        $item_condition = mysqli_real_escape_string($connection, trim($_POST["item_condition"]));
                        $gender = mysqli_real_escape_string($connection, trim($_POST["gender"]));

                        if(isset($_POST["subcategory2_id"])){
                            $subcategory2_id = mysqli_real_escape_string($connection, trim($_POST["subcategory2_id"]));
                        
                        
                            $query = "SELECT `subcategory1_id` FROM `shop_subcategory2` WHERE `id` = {$subcategory2_id}";
                            $run = mysqli_query($connection,$query);
                            $row = mysqli_fetch_assoc($run);
                            $subcategory1_id = $row["subcategory1_id"];

                            $query = "SELECT `category_id` FROM `shop_subcategory1` WHERE `id` = {$subcategory1_id}";
                            $run = mysqli_query($connection,$query);
                            $row = mysqli_fetch_assoc($run);
                            $maincategory_id = $row["category_id"];
                        
                        }
                        
                        
                       
                        if(isset($_POST["submit_insert"])){
                            if(!file_exists("img/shop/{$user_id}")){

                                if (!mkdir("img/shop/{$user_id}/", 0777, true)) {
                                    die('Failed to create directories...');
                                }
                            }
                        }

						$target_dir = "img/shop/{$user_id}/";


                        if(isset($_FILES["img_1"])){
                            
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
                        }

                        if(isset($_FILES["img_2"])){
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
                        }

                        if(isset($_FILES["img_3"])){
                            if(!empty(basename($_FILES["img_3"]["name"]))){
                                $file_name = basename($_FILES["img_3"]["name"]);
                                $target_file = $target_dir . $file_name;
                                $test = explode('.', $file_name);
                                $extension = end($test);    
                                $new_name = rand(100,99999) .'.'.$extension;
                                $target_file = $target_dir . $new_name;

                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                if(!empty($imageFileType)){
                                    if (move_uploaded_file($_FILES["img_3"]["tmp_name"], $target_file)) {
                                        if($_SERVER['REMOTE_ADDR']=='::1'){
                                            $file_path_upload_3 ="/{$target_file}";
                                        }else{
                                            $file_path_upload_3 ="/{$target_file}";
                                        }
                                        
                                    }
                                }
                            }
                        }

                        if(isset($_FILES["img_4"])){
                            if(!empty(basename($_FILES["img_4"]["name"]))){
                                $file_name = basename($_FILES["img_4"]["name"]);
                                $target_file = $target_dir . $file_name;
                                $test = explode('.', $file_name);
                                $extension = end($test);    
                                $new_name = rand(100,99999) .'.'.$extension;
                                $target_file = $target_dir . $new_name;

                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                if(!empty($imageFileType)){
                                    if (move_uploaded_file($_FILES["img_4"]["tmp_name"], $target_file)) {
                                        if($_SERVER['REMOTE_ADDR']=='::1'){
                                            $file_path_upload_4 ="/{$target_file}";
                                        }else{
                                            $file_path_upload_4 ="/{$target_file}";
                                        }
                                        
                                    }
                                }
                            }
                        }

                        if(isset($_FILES["img_5"])){
                            if(!empty(basename($_FILES["img_5"]["name"]))){
                                $file_name = basename($_FILES["img_5"]["name"]);
                                $target_file = $target_dir . $file_name;
                                $test = explode('.', $file_name);
                                $extension = end($test);    
                                $new_name = rand(100,99999) .'.'.$extension;
                                $target_file = $target_dir . $new_name;

                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                if(!empty($imageFileType)){
                                    if (move_uploaded_file($_FILES["img_5"]["tmp_name"], $target_file)) {
                                        if($_SERVER['REMOTE_ADDR']=='::1'){
                                            $file_path_upload_5 ="/{$target_file}";
                                        }else{
                                            $file_path_upload_5 ="/{$target_file}";
                                        }
                                        
                                    }
                                }
                            }
                        }



                        if(isset($_POST["submit_insert"])){
                            $query = "INSERT INTO `shop_item` (`id`, `item_name`, `item_description`, `notes_to_customers`, `price`, `is_negotiable`, `is_instock`, `user_id`, `subcategory2_id`, `brand`, `item_condition`, `gender`, `entry_date_time`,`img_1`,`img_2`,`img_3`,`img_4`,`img_5`,`shop_id`,`subcategory1_id`,`maincategory_id`,`uom`,`op_stock_quantity`,`cost_price`) ";
                            $query .="VALUES (NULL, '$item_name', '$item_description', '$notes_to_customers', '$price', '$is_negotiable', '$is_instock', '$user_id', '$subcategory2_id', '$brand', '$item_condition', '$gender', '$now','$file_path_upload_1','$file_path_upload_2','$file_path_upload_3','$file_path_upload_4','$file_path_upload_5','$shop_id','$subcategory1_id','$maincategory_id','$uom','$op_stock_quantity','$cost_price');";
                            $run = mysqli_query($connection, $query);
                            $item_id_inserted = mysqli_insert_id($connection);


                            $query_stock_ledger = "INSERT INTO `shop_stock_ledger` (`id`, `item_id`, `item_out`, `item_in`, `document_date`, `document_source`, `document_no`, `selling_price`, `cost_price`)";
                            $query_stock_ledger .=" VALUES (NULL, '$item_id_inserted', '0', '$op_stock_quantity', '$now', '1', '$item_id_inserted', '$price', '$cost_price')";
                            mysqli_query($connection,$query_stock_ledger);

                        }elseif(isset($_POST["submit_update"])){
                            $update_img_1 = "";
                            $update_img_2 = "";
                            $update_img_3 = "";
                            $update_img_4 = "";
                            $update_img_5 = "";
                            if( $file_path_upload_1 != ""){
                                $update_img_1 = ", `img_1` = '$file_path_upload_1'";
                                if(substr($_SESSION["img_1"],1) != ""){
                                    unlink(substr($_SESSION["img_1"],1));
                                }
                            }
                            if( $file_path_upload_2 != ""){
                                $update_img_2 = ", `img_2` = '$file_path_upload_2'";
                                if(substr($_SESSION["img_2"],1) != ""){
                                    unlink(substr($_SESSION["img_2"],1));
                                }
                            }
                            if( $file_path_upload_3 != ""){
                                $update_img_3 = ", `img_3` = '$file_path_upload_3'";
                                if(substr($_SESSION["img_3"],1) != ""){
                                    unlink(substr($_SESSION["img_3"],1));
                                }
                            }
                            if( $file_path_upload_4 != ""){
                                $update_img_4 = ", `img_4` = '$file_path_upload_4'";
                                if(substr($_SESSION["img_4"],1) != ""){
                                    unlink(substr($_SESSION["img_4"],1));
                                }
                            }
                            if( $file_path_upload_5 != ""){
                                $update_img_5 = ", `img_5` = '$file_path_upload_5'";
                                if(substr($_SESSION["img_5"],1) != ""){
                                    unlink(substr($_SESSION["img_5"],1));
                                }
                            }
                            
                                if($_SESSION["is_published"] == 0){
                                    
                                    
                                    
                                    $query = "UPDATE `shop_item` SET `item_name` = '$item_name', `item_description` = '$item_description', `notes_to_customers` = '$notes_to_customers', `price` = '$price', `is_negotiable` = '$is_negotiable', `is_instock` = '$is_instock', `user_id` = '$user_id', `shop_id` = '$shop_id', `subcategory2_id` = '{$_POST['subcategory2_id']}', `brand` = '$brand', `item_condition` = '$item_condition', `subcategory1_id`='$subcategory1_id', `maincategory_id`='$maincategory_id', `gender` = '$gender',`uom`='$uom',`op_stock_quantity`='$op_stock_quantity',`cost_price`='$cost_price' {$update_img_1}{$update_img_2}{$update_img_3}{$update_img_4}{$update_img_5} WHERE `shop_item`.`id` = '$item_id';";
                                    

                                }else{
                                    $query = "UPDATE `shop_item` SET `item_description` = '$item_description', `notes_to_customers` = '$notes_to_customers', `price` = '$price', `is_negotiable` = '$is_negotiable', `is_instock` = '$is_instock', `user_id` = '$user_id', `shop_id` = '$shop_id', `brand` = '$brand', `item_condition` = '$item_condition', `gender` = '$gender',`uom`='$uom',`op_stock_quantity`='$op_stock_quantity',`cost_price`='$cost_price'  {$update_img_1}{$update_img_2}{$update_img_3}{$update_img_4}{$update_img_5} WHERE `shop_item`.`id` = '$item_id';";
                           
                                }
                                unset($_SESSION["is_published"]);
                                $run = mysqli_query($connection, $query);

                                $query = "UPDATE `shop_stock_ledger` SET `item_in` = '$op_stock_quantity' WHERE `shop_stock_ledger`.`item_id` = '$item_id' AND `document_source` = '1'";
                                $run = mysqli_query($connection, $query);
                        }
                        
                        
                        if(mysqli_affected_rows($connection) > 0){
                            $output .= "<p style='color:green;'><strong>Record Successfully Saved !!</strong></p>";
                        }else{$output .= "<p style='color:red;'><strong>Record Not Saved !!</strong></p>";}

                    }
                
                    $disabled = "";
                    if(isset($_GET["item_id"])){
                        $item_id = $_GET["item_id"];
                        $query = "SELECT * FROM `shop_item` WHERE `id` = '$item_id'";
                        $run = mysqli_query($connection, $query);
                        if(mysqli_num_rows($run) > 0){
                            $row = mysqli_fetch_assoc($run);
                            $item_name_c = $row['item_name'];
                            $item_description_c = $row['item_description'];
                            $notes_to_customers_c = $row['notes_to_customers'];
                            $price_c = $row['price'];

                            $uom_c = $row['uom'];
                            $op_stock_quantity_c = $row['op_stock_quantity'];
                            $cost_price_c = $row['cost_price'];

                            $is_negotiable_c = $row['is_negotiable'];
                            $is_instock_c = $row['is_instock'];
                            $brand_c = $row['brand'];
                            $item_condition_c = $row['item_condition'];
                            $gender_c = $row['gender'];
                            $subcategory2_id_c = $row['subcategory2_id'];
                            $is_published = $row["is_published"];
                            $_SESSION["is_published"] = $is_published;

                            

                            if($is_published == 1){
                                $disabled = "disabled";
                            }

                            $img_1 = $row['img_1'];
                            $img_2 = $row['img_2'];
                            $img_3 = $row['img_3'];
                            $img_4 = $row['img_4'];
                            $img_5 = $row['img_5'];

                            $_SESSION["img_1"] =$img_1;
                            $_SESSION["img_2"] =$img_2;
                            $_SESSION["img_3"] =$img_3;
                            $_SESSION["img_4"] =$img_4;
                            $_SESSION["img_5"] =$img_5;
                        }

                    }
                ?>

            <?php include($_SERVER['DOCUMENT_ROOT']."/include/shop-menu.php"); ?>

                <div class="flexContainer">
                    
                    <div class="menubarLeft">
                    <div>
                        
                    <div class="container_search" style="">
                        <form id="comment_form">
                            <p><label for="search">Search: </label><input type="text" name="search" id="search" placeholder="Enter item name/id"><button type="button" id="btn_191224" ><i class="bi bi-search"></i></button> <a href="/shop-item.php" class="clear_search" style="float:right;margin-right:10px" >Clear</a></p>
                                <input type="hidden" name="page" id="page_211224" value="1" />
                        </form>
                        <div id="img_191224"></div>

                    </div>


                    </div>
                    
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
$query4 = "SELECT Count(*) AS `count_records` FROM `shop_item` WHERE `shop_id` = '$shop_id'";
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


$query = "SELECT `id`,`item_name`,`img_1`,`is_published`,`file_path` FROM `shop_item` WHERE `shop_id` = '$shop_id' ORDER BY `id` DESC LIMIT {$rec_start},  {$perPage}";
$run = mysqli_query($connection, $query);
if(mysqli_num_rows($run) > 0){
    echo "<div class='search_results'>";
    echo "<table class='item_list'>";
    while($row = mysqli_fetch_assoc($run)){
        $item_id = $row["id"];
        $item_name = $row["item_name"];
        $item_img = $row["img_1"];
        $file_path = $row["file_path"];
        $is_published2 = $row["is_published"];
        if($is_published2 == 1){
            $how_tick_mark = "<span><a title='View' style='color:blue;' href='{$file_path}'><i class='bi bi-eye'></i></a></span></td>";
        }else{$how_tick_mark = "";}
       
?>
        <tr style="border-bottom:1px solid #ccc;">
            <td style="border-left:5px solid white; width:9%" <?php if(isset($_GET["item_id"])){if($_GET["item_id"] == $item_id){echo "class='selected'";}} ?> ><a style="color:black;text-decoration:none;" href="/shop-item.php?item_id=<?php echo $item_id.'&page='.$page; ?>"><?php echo $item_id; ?></a></td>
            <td style="width:69%"><a style="color:blue;text-decoration:none;" href="/shop-item.php?item_id=<?php echo $item_id.'&page='.$page; ?>"><?php echo $item_name; ?></a></td>
            <td style="width:22%"><a style="text-decoration:none;" href="/shop-item.php?item_id=<?php echo $item_id.'&page='.$page; ?>"><img style="width:50px;vertical-align:middle; height:50px" src="<?php echo $item_img; ?>"></a>
            
            <?php echo $how_tick_mark; ?>
        </tr>

<?php

    }
echo "</table>";
echo $output_page;
echo "</div>";
}

?>
                    </div>
                    <div class="productContainerRight">
                        
                           
                        
                        <div class="container">


                            <div class="top_heading">
                                <?php
                                if(isset($_GET["item_id"])){
                                    if($is_published == 0){
                                        echo "<a href='/shop-item.php?item_id={$_GET['item_id']}&publish=true&page={$page}&user_id={$user_id}'>Publish</a>";
                                    }elseif($is_published == 1){
                                        echo "<a href='/shop-item.php?item_id={$_GET['item_id']}&publish=false&page={$page}&user_id={$user_id}'>Withdraw</a>";
                                    }
                                }
                                ?>   
                            </div> 





                            <form action="shop-item.php" enctype="multipart/form-data"  method="post">
                                <?php echo $output; ?>
                                <table>
                                 
                               
                                 

                                    <tr>
                                        <td>
                                            <label for="subcategory2_id"><b>Category <span style="color:red">*</span></b></label>
                                        </td>
                                        <td>
                                            <select <?php echo $disabled; ?> name = "subcategory2_id">
            <?php

$query2 =  "SELECT * FROM `shop_subcategory1` ORDER BY category_id,`id` ";
    $run2 = mysqli_query($connection,$query2);
    if(mysqli_num_rows($run2) > 0){
        while($row2 = mysqli_fetch_assoc($run2)){
            $id2 = $row2["id"];
            $category_name2 = $row2["subcategory_name"];


            $query =  "SELECT * FROM `shop_subcategory2` WHERE `subcategory1_id`= '{$id2}' ORDER BY subcategory1_id,`id` ";
            $run = mysqli_query($connection,$query);

            if(mysqli_num_rows($run) > 0){
                echo "<optgroup label='$category_name2'>";
                while($row = mysqli_fetch_assoc($run)){
                    $id = $row["id"];
                    $category_name = $row["subcategory_name"]
            ?>
                    <option value = "<?php echo $id;?>" <?php if(isset($subcategory2_id_c)){if($subcategory2_id_c == $id){echo "selected = 'selected'";}} ?>><?php echo $category_name;?></option>  
            <?php
                }
echo "</optgroup>";
            }

        }
    }
        ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><label for="item_name" ><b>Name <span style="color:red">*</span></b></label></td>
                                        <td><input <?php echo $disabled; ?> maxlength="100" type="text" placeholder="Enter Name" name="item_name" required <?php if(isset($item_name_c)){echo "value='{$item_name_c}'";} ?> ></td>
                                    </tr>

                                    <tr>
                                        <td><label for="item_description"><b>Description </b></label></td>
                                        <td><input maxlength="1000" type="text" placeholder="Enter Description" name="item_description" <?php if(isset($item_description_c)){echo "value='{$item_description_c}'";} ?> ></td>
                                    </tr>

                                    <tr>
                                        <td><label for="notes_to_customers"><b>Foot Note </b></label></td>
                                        <td><textarea maxlength="5000" name = "notes_to_customers" id="notes_to_customers" style="width:100%;" rows = "7" maxlength="1000" placeholder="Enter notes to potential customers"><?php if(isset($notes_to_customers_c)){echo "{$notes_to_customers_c}";} ?></textarea></td>
                                    </tr>

                                    
                                    <tr>
                                        <td><label for="price"><b>Selling Price (Ghc) <span style="color:red;">*</span></b></label></td>
                                        <td>
                                            <input required type="number" min="0" name="price" id="price" <?php if(isset($price_c)){echo "value='{$price_c}'";} ?> >

                                            <span><label for="negotiable_yes">Negotiable</label></span><input type="radio" required name="is_negotiable" value="1" id="negotiable_yes" style="margin-right:15px;" <?php if($is_negotiable_c == 1 ){echo "checked = 'checked'";} ?>>		
                                            <span><label for="negotiable_no">Not Negotiable</label></span><input type="radio" value="2" name="is_negotiable" id="negotiable_no" <?php if($is_negotiable_c == 2 ){echo "checked = 'checked'";} ?>>
                                        
                                        </td>
                                    <tr>
                                        <td><label for="cost_price"><b>Cost Price (Ghc)</b></label></td>
                                        <td>
                                            <input type="number" min="0" name="cost_price" id="cost_price" <?php if(isset($cost_price_c)){echo "value='{$cost_price_c}'";} ?> >
                                        </td>

                                    </tr>

                                    <tr>
                                        <td><label for="uom"><b>UOM</b></label></td>
              <td>
                 <select name="uom">
                                          
        <?php
            $query =  "SELECT * FROM `shop_item_uom` ORDER BY `id` ";
            $run = mysqli_query($connection,$query);

            if(mysqli_num_rows($run) > 0){
               
                while($row = mysqli_fetch_assoc($run)){
                    $id = $row["id"];
                    $uom = $row["uom"]
            ?>
                    <option value = "<?php echo $id;?>" <?php if(isset($uom_c)){if($uom_c == $id){echo "selected = 'selected'";}} ?>><?php echo $uom;?></option>  
            <?php
                }

            }

    
        ?>
                                            </select>
                                        </td>




<tr>
    <td>
        <label for="op_stock_quantity"><b>OP Stock Qty</b></label>
    </td>

    <td>
        <input type="number" min="0" name="op_stock_quantity" id="op_stock_quantity" <?php if(isset($op_stock_quantity_c)){echo "value='{$op_stock_quantity_c}'";} ?> >
    </td>

</tr>







                                    </tr>

                                    <tr>
                                        <td><label><b>In Stock <span style="color:red">*</span></b></label></td>
                                        <td>

                                            <span><label for="instock_yes">Yes</label></span><input type="radio" required name="is_instock" value="1" id="instock_yes" style="margin-right:15px;" <?php if($is_instock_c == 1 ){echo "checked = 'checked'";} ?>>		
                                            <span><label for="instock_no">No</label></span><input type="radio" value="2" name="is_instock" id="instock_no" <?php if($is_instock_c == 2 ){echo "checked = 'checked'";} ?>>
                                        </td>
                                    </tr>

                                    <tr>
                                        
                                    </tr>

                                    <tr>
                                        <td><label class="label"><strong>Brand <span style="color:red;">*</span></strong></label></td>
                                        <td>

                                            <select name = "brand">
<?php
    $query2 =  "SELECT * FROM `shop_category` ORDER BY `id` ";
    $run2 = mysqli_query($connection,$query2);
    if(mysqli_num_rows($run2) > 0){
        while($row2 = mysqli_fetch_assoc($run2)){
            $id2 = $row2["id"];
            $category_name2 = $row2["category_name"];

            $query =  "SELECT * FROM `shop_brand` WHERE `category_id` = '{$id2}' ORDER BY `brand` ";
            $run = mysqli_query($connection,$query);
            if(mysqli_num_rows($run) > 0){
                echo "<optgroup label='$category_name2'>";
                while($row = mysqli_fetch_assoc($run)){
                    $id = $row["id"];
                    $brand = $row["brand"]

    ?>

<option value = "<?php echo $id;?>" <?php if(isset($brand_c)){if($brand_c == "<?php echo $id;?>"){echo "selected = 'selected'";}} ?>><?php echo $brand;?></option>  
    <?php
                }
                echo "</optgroup>";
            }
        }
    }
?>


                        
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="label"><strong>Condition <span style="color:red;">*</span></strong></label>
                                        </td>
                                        <td>
                                            <select name = "item_condition">
                                                <option value = "0" <?php if(isset($item_condition_c)){if($item_condition_c == "0"){echo "selected = 'selected'";}} ?>>New</option>   
                                                <option value = "1" <?php if(isset($item_condition_c)){if($item_condition_c == "1"){echo "selected = 'selected'";}} ?>>Local Used</option>
                                                <option value = "2" <?php if(isset($item_condition_c)){if($item_condition_c == "2"){echo "selected = 'selected'";}} ?>>Foreign Used</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="label"><strong>Gender <span style="color:red;">*</span></strong></label>
                                        </td>
                                        <td>
                                            <select name = "gender">
                                                <option value = "0" <?php if(isset($gender_c)){if($gender_c == "0"){echo "selected = 'selected'";}} ?>>Unisex</option>   
                                                <option value = "1" <?php if(isset($gender_c)){if($gender_c == "1"){echo "selected = 'selected'";}} ?>>Men</option>
                                                <option value = "2" <?php if(isset($gender_c)){if($gender_c == "2"){echo "selected = 'selected'";}} ?>>Women</option>
                                            </select>
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <td><label for="img_1" class="browse-photo"><strong>Photo 1<?php if(!isset($_GET["item_id"])){echo '<span style="color:red;">*</span>';} ?></strong></label></td>
                                        <td><input <?php if(!isset($_GET["item_id"])){echo 'required';} ?> type="file" name="img_1" id="img_1" accept="image/png, image/jpeg, image/jpg" ><input style="margin:0 15px;visibility:hidden" type="text" placeholder="Enter image path" name="txt_img_1" id="txt_img_1"><?php if(isset($_GET["item_id"])){if($img_1 != ""){echo "<span class='span_img' style='background-color:white;display:inline-block;width:50px;height:50px;'><img class='img_class' alt='$item_name_c' style='width:50px; height:50px;vertical-align:middle;' src='{$img_1}'></span>";}} ?></td>
                                    </tr>

                                    <tr>
                                        <td><label for="img_2" class="browse-photo"><strong>Photo 2 </strong></label></td>
                                        <td><input type="file" name="img_2" id="img_2" accept="image/png, image/jpeg, image/jpg" ><input style="margin:0 15px" type="text" placeholder="Enter image path" name="txt_img_2" id="txt_img_2"><?php if(isset($_GET["item_id"])){if($img_2 != ""){echo "<span class='span_img' style='background-color:white;display:inline-block;width:50px;height:50px;'><img alt='$item_name_c' class='img_class' style='width:50px; height:50px;vertical-align:middle;' src='{$img_2}'></span> <a href='/shop-item.php?item_id={$_GET['item_id']}&page={$page}&remove=img_2&user_id={$user_id}'>Remove</a>";}} ?> </td>
                                    </tr>

                                    <tr>
                                        <td><label for="img_3" class="browse-photo"><strong>Photo 3 </strong></label></td>
                                        <td><input type="file" name="img_3" id="img_3" accept="image/png, image/jpeg, image/jpg" ><input style="margin:0 15px" type="text" placeholder="Enter image path" name="txt_img_3" id="txt_img_3"><?php if(isset($_GET["item_id"])){if($img_3 != ""){echo "<span class='span_img' style='background-color:white;display:inline-block;width:50px;height:50px;'><img alt='$item_name_c' class='img_class' style='width:50px; height:50px;vertical-align:middle;' src='{$img_3}'></span> <a href='/shop-item.php?item_id={$_GET['item_id']}&page={$page}&remove=img_3&user_id={$user_id}'>Remove</a>";}} ?></td>
                                    </tr>

                                    <tr>
                                        <td><label for="img_4" class="browse-photo"><strong>Photo 4 </strong></label></td>
                                        <td><input type="file" name="img_4" id="img_4" accept="image/png, image/jpeg, image/jpg" ><input style="margin:0 15px" type="text" placeholder="Enter image path" name="txt_img_4" id="txt_img_4"><?php if(isset($_GET["item_id"])){if($img_4 != ""){echo "<span class='span_img' style='background-color:white;display:inline-block;width:50px;height:50px;'><img alt='$item_name_c' class='img_class' style='width:50px; height:50px;vertical-align:middle;' src='{$img_4}'></span> <a href='/shop-item.php?item_id={$_GET['item_id']}&page={$page}&remove=img_4&user_id={$user_id}'>Remove</a>";}} ?></td>
                                    </tr>

                                    <tr>
                                        <td><label for="img_5" class="browse-photo"><strong>Photo 5 </strong></label></td>
                                        <td><input type="file" name="img_5" id="img_5" accept="image/png, image/jpeg, image/jpg" ><input style="margin:0 15px" type="text" placeholder="Enter image path" name="txt_img_5" id="txt_img_5"><?php if(isset($_GET["item_id"])){if($img_5 != ""){echo "<span class='span_img' style='background-color:white;display:inline-block;width:50px;height:50px;'><img alt='$item_name_c' class='img_class' style='width:50px; height:50px;vertical-align:middle;' src='{$img_5}'></span> <a href='/shop-item.php?item_id={$_GET['item_id']}&page={$page}&remove=img_5&user_id={$user_id}'>Remove</a>";}} ?></td>
                                    </tr>

                                        
                                </table>
                              
                    <br>
                                <a href="/shop-item.php?page=<?php echo $page;?>"><button type="button">Add New</button></a>
                               
                                
                                    <button class="btnSubmit" type="submit" name="<?php if(isset($_GET['item_id'])){echo 'submit_update';}else{echo 'submit_insert';} ?>" id="submit_insert">Save</button>

                                    <?php
                                    if(isset($_GET["item_id"])){
                                      
                                        echo "<a style='float:right' href='/shop-item.php?item_id={$_GET['item_id']}&page={$page}&del=true&user_id={$user_id}'><button type='button'>Delete</button></a>";
                                    }
                                    
                                    ?>
                               
                               
                                

                            </form>
                        
                        </div><!-- end of .container -->
                    </div>
                </div>
			

				<?php 
				 if(isset($_GET['item_id'], $_GET['page'])){
                    $_SESSION['item_id'] = $_GET['item_id'];
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














$(document).ready(function(){
	$(document).on('click','.navigation_links', function(){
        
		var link_id = parseInt($(this).attr("id"));
        $.ajax({
			url: "/include/search_shop_item.php",
			method:"POST",
			data:{"page":link_id},
			dataType:"html", //means receiving data is html format, when "json" is used means you are going to receive json data format
			success:function(data){
                //$('#like_counter').html(data.like); //this is how to receive json data format
				$('.search_results').html(data);
			}
		})
	});




    $('#btn_191224').on('click',function(event){
       
    let myform = document.getElementById("comment_form");
    let fd = new FormData(myform );
        $.ajax({
            url: "/include/search_shop_item.php",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                
                $('.search_results').html(data);
            }
        });

    });



});




</script>


