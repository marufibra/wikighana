<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
$now = new DateTime();
$now->setTimezone(new DateTimeZone('Africa/Accra'));
$now = $now->format('Y-m-d H:i:s');



$output_type = "<span style='display:none;' id='key_id' key_source='' key='0'></span>";
$key = 0;
$key_source = "";
$parameters = "";
$filter_criteria = "";


$meta_img = "https://wikighana.com/img/icons/favicon2.jpg";
$meta_subject = "Wiki Shop";
$meta_description = "Your true online shop";
$filter_name = "Wiki Shops";
$new_class_shop = "";
if(isset($_GET["cat1_isset"])){
    $output_type = "<span style='display:none;' id='key_id' key_source='cat1' key='{$_GET['cat']}'></span>";
    $filter_criteria = " wHERE `subcategory1_id` = {$_GET['cat']}";
    $filter_name = $_GET["catname"];
    $parameters = "?maincatid={$_GET['maincatid']}&cat={$_GET['cat']}&maincatname={$_GET['maincatname']}&maincatname={$_GET['maincatname']}&catname={$_GET['catname']}&cat1_isset={$_GET['cat1_isset']}";
}elseif(isset($_GET["shop"])){
    $output_type = "<span style='display:none;' id='key_id' key_source='shop' key='{$_GET['shop']}'></span>";
    $filter_criteria = " wHERE `shop_id` = {$_GET['shop']}";
    $parameters = "?shop={$_GET['shop']}";
    $new_class_shop="search-container-within-image";

    $shop_id = $_GET["shop"];
    $query = "SELECT `shop_full_name`,`slogan`,`logo_url` FROM `shops` WHERE `id` = $shop_id";
    $run = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($run);
    $meta_img = $row["logo_url"];
    $meta_subject = $row["shop_full_name"];
    $meta_description = $row["slogan"];
    $filter_name = $meta_subject;
}elseif(isset($_GET["cat2"])){
    $output_type = "<span style='display:none;' id='key_id' key_source='cat2' key='{$_GET['cat2']}'></span>";
    $filter_criteria = " wHERE `subcategory2_id` = {$_GET['cat2']}";
    $query = "SELECT `subcategory_name` FROM `shop_subcategory2` WHERE `id` = {$_GET['cat2']}";
    $run = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($run);
    $filter_name = $row["subcategory_name"];

    $parameters = "?maincatid={$_GET['maincatid']}&cat={$_GET['cat']}&maincatname={$_GET['maincatname']}&maincatname={$_GET['maincatname']}&catname={$_GET['catname']}&cat2={$_GET['cat2']}";
}elseif(isset($_GET["maincat_isset"])){
    $output_type = "<span style='display:none;' id='key_id' key_source='maincat' key='{$_GET['maincatid']}'></span>";
    $filter_criteria = " wHERE `maincategory_id` = {$_GET['maincatid']}";
    $filter_name = $_GET["maincatname"];
    $parameters = "?maincatid={$_GET['maincatid']}&cat={$_GET['cat']}&maincatname={$_GET['maincatname']}&catname={$_GET['catname']}&maincat_isset={$_GET['maincat_isset']}";
}

$search_form =     "<div class='search-container {$new_class_shop}'>
                        <form class='search-form' action='post'>
                            <input name='search_string' required type='text' class='search-input' placeholder='Search within {$filter_name} ...'>
                            <button style='border:none;background-color:white;cursor:pointer;' type='submit' class='search-icon2'>&#128269;</button> <!-- Unicode magnifying glass -->
                        </form>
                    </div>";


?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5092847457222474" crossorigin="anonymous"></script> -->
		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/shop.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
		<title>Wiki Shop - Ghana</title>
		<link rel="canonical" href="/shop.php">

		<meta property="fb:app_id" content="1114141350112517" />
		<meta property="og:url"           content="<?php echo 'https://www.wikighana.com'.$_SERVER['PHP_SELF']; ?>" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="<?php echo htmlentities($meta_subject);?>" />
		<meta property="og:description"   content="<?php echo substr(htmlentities($meta_description),0,250);?>" />
		<meta property="og:image"  itemprop="image"       content="<?php echo $meta_img;?>" />
		<meta property="og:site_name" 		content="<?php echo htmlentities($meta_subject);?>">
		<meta property="og:updated_time" 	content="<?php echo $now;?>" />
		<meta property="og:image:width" content="256">
		<meta property="og:image:height" content="256">

		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@wiki_ghana" />
		<meta name="twitter:title" content="<?php echo htmlentities($meta_subject);?>" />
		<meta name="twitter:description" content="<?php echo substr(htmlentities($meta_description),0,250);?>" />
		<meta name="twitter:creator" content="@wiki_ghana" />
		<meta name="twitter:image" content="<?php echo $meta_img;?>" />

		<meta name="description" content="<?php echo substr(htmlentities($meta_description),0,250);?>">


		<meta name="keywords" content="ghana,news,politics,government,court,law,publish, ghanaian,africa,dating,meet,love,buy,sell,goods,clothes,cars,sneakers,">
	</head>
	<body>
		<div class="wrap">
		
        		<?php 
                
                include($_SERVER['DOCUMENT_ROOT']."/include/header.php");
                echo $output_type;
                $subcategory_1 = [];
                function fetch_subcategory_1($category_id,$connection){
                    $query = "SELECT `category_name` FROM `shop_category` WHERE `id` = $category_id";
                    $run = mysqli_query($connection, $query);
                    if(mysqli_num_rows($run) > 0){
                        $row = mysqli_fetch_assoc($run);
                        $main_cat_name = $row['category_name'];
                    }


                    global $subcategory_1;
                    $query = "SELECT * FROM `shop_subcategory1` WHERE `category_id` = $category_id ORDER BY id";
                    $run = mysqli_query($connection, $query);
                    if(mysqli_num_rows($run) > 0){
                        while($row = mysqli_fetch_assoc($run)){
                            $id = $row["id"];
                            $category_name = $row["subcategory_name"];
                            $output_cat = "<li><a href='/shop.php?maincatid={$category_id}&cat=$id&maincatname={$main_cat_name}&catname={$category_name}&cat1_isset=true'>$category_name</a></li>";
                            
                            array_push($subcategory_1, $output_cat);
                        }

                    }
                }

                
                ?>
                <div class="flexContainer">
                    <div class="menubarLeft">

                    <?php include($_SERVER['DOCUMENT_ROOT']."/include/shop_sidebar.php"); ?>

                    </div>
                    <div class="productContainerRight">


                        <div class="abcdef">
                            

                                <?php
                            if(!isset($_GET["shop"])){

                                $selected_cat2 = "";
                                $selected_check = "";
                                $selected_maincatclicked = "";
                                $selected_cat1clicked = "";
                                if(isset($_GET['cat'])){
                                    $category_1 = $_GET["cat"];
                                    $query = "SELECT * FROM `shop_subcategory2` WHERE `subcategory1_id` = $category_1";
                                    $run = mysqli_query($connection, $query);
                                    if(mysqli_num_rows($run) > 0){
                                        if(isset($_GET["maincat_isset"])){if($_GET["maincat_isset"] == "true"){$selected_maincatclicked = "style='background:aqua'";}else{$selected_maincatclicked = "";}}
                                        if(isset($_GET["cat1_isset"])){if($_GET["cat1_isset"] == "true"){$selected_cat1clicked = "style='background:aqua'";}else{$selected_cat1clicked = "";}}
                                        echo "<div class='wrapper-breadcrumb'>
                                                <a href='/shop.php'>Wiki Shop</a> /
                                                <a {$selected_maincatclicked} href='/shop.php?maincatid={$_GET['maincatid']}&cat={$category_1}&maincatname={$_GET['maincatname']}&catname={$_GET['catname']}&maincat_isset=true'>{$_GET['maincatname']}</a> /
                                                <a {$selected_cat1clicked} href='/shop.php?maincatid={$_GET['maincatid']}&cat={$category_1}&maincatname={$_GET['maincatname']}&catname={$_GET['catname']}&cat1_isset=true'>{$_GET['catname']}</a>
                                               
                                                $search_form
                                                </div>";
                                        
                                        $subcategory_2_5 = "";
                                        if(mysqli_num_rows($run) >= 5 ){
                                            $subcategory_2_5 = "subcategory_2_5";
                                        }
                                        echo "<div class='subcategory_2 {$subcategory_2_5}'>";
                                        while($row = mysqli_fetch_assoc($run)){
                                            $id = $row["id"];
                                            $subcategory_name = $row["subcategory_name"];
                                            $img_url = $row["img_url"];
                                            
                                            if(isset($_GET["cat2"])){if($_GET["cat2"] == $id){$selected_cat2 = "selected_cat2"; $selected_check = "selected_check";}else{$selected_cat2 = "";$selected_check="";}}
                                            echo "<div class='list_item {$selected_cat2}'>
                                                    <div><a href='shop.php?maincatid={$_GET['maincatid']}&cat={$category_1}&cat2={$id}&maincatname={$_GET['maincatname']}&catname={$_GET['catname']}'><img src='/img/shop/fashion/{$img_url}'></a></div>
                                                    <div class='cat2-text'><a href='shop.php?maincatid={$_GET['maincatid']}&cat={$category_1}&cat2={$id}&maincatname={$_GET['maincatname']}&catname={$_GET['catname']}'>$subcategory_name</a></div>
                                                    <svg class='list_item_check {$selected_check}' xmlns='http://www.w3.org/2000/svg' height='34px' viewBox='0 -960 960 960' width='34px' fill='#75FB4C'><path d='M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z'/></svg>
                                                </div>";
                                        }
                                        echo '</div>';

                                    }

                                    
                                }else{

                                    echo "
                                    <div class='wrapper-breadcrumb'>
                                       <span style='font-weight:bold;font-size:30px;'>Wiki Shops</span>
                                       $search_form
                                    </div>
                                    ";

//Same code is also in item_structure.php, any change here must also be done in item_structure.php
                                    $query = "SELECT `id`,`logo_url`,`short_name` FROM `shops` WHERE `is_approved` = '1'";
                                    $run = mysqli_query($connection, $query);
                                    if(mysqli_num_rows($run) > 0){
                                        $subcategory_2_5 = "";
                                        if(mysqli_num_rows($run) >= 5 ){
                                            $subcategory_2_5 = "subcategory_2_5";
                                        }
                                        echo "<div class='subcategory_2 {$subcategory_2_5}'>";
                                        while($row = mysqli_fetch_assoc($run)){
                                            $id = $row["id"];
                                            $short_name = $row["short_name"];
                                            $logo_url = $row["logo_url"];
                                            echo "<div class='list_item' key_source='shop' key='{$id}' >
                                                    <div class='shop_logo'><a href='/shop.php?shop={$id}'><img src='{$logo_url}'></a></div>
                                                    <div class='short_name'><a href='/shop.php?shop={$id}'>$short_name</a></div>
                                                    
                                                </div>";
                                        }
                                        echo '</div>';

                                    }

                                }


                            
                            }else{
                                $shop_id = $_GET["shop"];
                                $query = "SELECT * FROM `shops` WHERE `id` = $shop_id AND `is_approved` = '1'";
                                $run = mysqli_query($connection, $query);
                                $row = mysqli_fetch_assoc($run);
                                $cover_photo = $row["cover_url"];
                                $profile_photo = $row["logo_url"];
                                $whatsapp_no = $row["whatsapp_no"];
                                $mobile_no = $row["mobile_no"];
                                $shop_full_name = $row["shop_full_name"];
                                $address = $row["address"];
                            ?>    
                                
                            
                            
                            <div class="imgcontainer" style="<?php if($cover_photo == ""){echo "background:url('/img/news/cover.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;cursor:pointer";}else{ echo "background:url('{$cover_photo}');background-position: center;background-repeat: no-repeat;background-size: cover;cursor:pointer";}  ?>" > <?php echo $search_form; ?></div>
                            <div class="profile_img"><img src="<?php if($profile_photo == ""){echo "/img/icons/login.jpg";}else{ echo $profile_photo;} ?>" alt="" class="avatar"></div>
                            <div class="wrapper_profile_img">
                               
                                <div class="banner_writings"><?php echo $shop_full_name; ?></div>
                                <div class="banner_writings2">
                                    <i class="bi bi-phone"></i> Mobile: <span class="mobile_no"><a href="tel:<?php echo $mobile_no;?>"><?php echo $mobile_no?></a> <span class="hide_for_desktop"><br></span></span><span class="location"><i class="bi bi-geo-alt"></i> Location: <?php echo $address; ?></span>
                                    <div class="share_social_media"><i class="bi bi-share-fill"></i> Share: &nbsp;

                                        
                                        <a rel="nofollow noopener" target="_blank" class="whatsapp share_icon" href="<?php echo 'whatsapp://send?text='."https://wikighana.com".$_SERVER['PHP_SELF']."?shop={$shop_id}";?>" class="whatsapp_icon" title="Whatsapp" data-action="share/whatsapp/share"><i class="bi bi-whatsapp"></i></a>
                                        <a class="share-action share-trigger icon-facebook share_icon" target="_blank" aria-label="Share on Facebook" href="<?php echo 'https://www.facebook.com/sharer.php?u=https://wikighana.com'. $_SERVER['PHP_SELF']."?shop={$shop_id}"; ?>" data-title="Facebook" data-gravity=n  rel="nofollow"><i class="bi bi-facebook" aria-hidden="true"></i></a>
                                        <a rel="nofollow noopener share_icon twitter" target="_blank" href="<?php echo 'https://twitter.com/intent/tweet?text='."https://wikighana.com".$_SERVER['PHP_SELF']."?shop={$shop_id}"; ?> "><i class="bi bi-twitter-x twitter-x" title="Twitter-X"></i></a>
                                    

                                    </div>
                                </div>
                                <div class="whatsapp_button"><a class="whatsapp_button_img" target="_blank" href="<?php echo 'https://api.whatsapp.com/send?phone=' . $whatsapp_no . '&text=Hello, how may we help you?';?>"><img width="300" src="/img/shop/whatsapp-button.png"></a><a class="whatsapp_button_img_mobile" target="_blank" href="<?php echo 'https://api.whatsapp.com/send?phone=' . $whatsapp_no . '&text=Hello, how may we help you?';?>"><img  width="300" src="/img/shop/whatsapp-click-to-chat.png"></a></div>
                            
                            
                            </div> 
                               
                    

                            
                            
                            
                            <?php
                            }   
                                
                            ?>
                            
                        </div><!-- end of .abcdef -->
                        <div style="margin-left:10px;background-color:white;margin:12px 0;padding:5px 0 5px 25px;border-radius:20px;" id="filter_set">Filtered on: <?php echo $filter_name; ?> <a href="<?php echo "/shop.php{$parameters}"; ?>"><button type="button">Clear Filter</button></a></div>
                        
                        <div class="before-container">
                            <div class="container">
                            </div><!-- end of .container -->
                        </div>
                        
                    </div>
                    <button onclick="scrollToTop()" id="scrollTopBtn" title="Go to top">⬆</button>
                </div>
                

				<?php 
				
				
				// include($_SERVER['DOCUMENT_ROOT']."/include/footer.php");
				
				
				?>
                <div style="display:none;" class="slides_container"></div><h2 style="display:none;" class="similar_items"></h2>
                <span style="display:none;" classs='breadcrumb_links'></span><div style="display:none;" class="header_item"></div>
		</div>
	</body>
<html>
<script src="/js/shop.js"></script>