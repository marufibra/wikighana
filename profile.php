<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5092847457222474" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/profile.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Profile - Wiki Ghana</title>
		<link rel="canonical" href="/profile.php">
		
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");
				
				
				if(isset($_SESSION["user_type"])){
					if($_SESSION["user_type"] != "visitor"){
						die(header("Location: /"));
					}else{
						$user_id=$_SESSION["user_id"];
					}
				}else{die(header("Location: /"));}
				
				
				?>
			<div class="content_flex">
				<div class="content">
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="#">Profile</a></div>
					


					<div class="login">
						
<?php
//initialize variables
	// $user_id = 45;
	$is_registered = "";
	$UpdateStatus = "";
	$current_profile_photo = "";
	$current_cover_photo = "";

	
	$fname = "";
	$lname = "";
	$mname = "";
	$gender = 0;
	$date_of_birth = "";
	$maritalstatus = 0;
	$no_of_children = 0;
	$is_smoke = 0;
	$languages = "";
	$country = 0;
	$region = 0;
	$mobile_no = "";
	$aboutme = "";
	$aboutmypartner = "";
	$height = 0;
	$weight = 0;
	$is_disabled = 0;
	$describe_disability = "";
	$highestedu = 0;
	$profession = 0;
	$monthlyincome = 0;
	$religion = 0;
	$religious_nature = 0;
	$ethnicity = "";
	$specifyother = "";
	$hometown = "";
	$employedin = 0;
	$skin_complexion_type = 0;


	$query = "SELECT `id` FROM `wiki_dating_profile` WHERE `id` = '$user_id'";
	$run = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($run) > 0){

		$is_registered = "yes";
	}else{
		$is_registered = "no";
	}








	if(isset($_POST["save_profile"])){
	
		$fname = mysqli_real_escape_string($connection, trim($_POST["fname"]));
		$lname = mysqli_real_escape_string($connection, trim($_POST["lname"]));
		if(isset($_POST["mname"])){
			$mname = mysqli_real_escape_string($connection, trim($_POST["mname"]));}
		if(isset($_POST["gender"])){
			$gender = mysqli_real_escape_string($connection, trim($_POST["gender"]));}else{$gender = "0";}
		if(isset($_POST["is_disabled"])){
			$is_disabled = mysqli_real_escape_string($connection, trim($_POST["is_disabled"]));}else{$is_disabled = 0;}
		if(isset($_POST["describe_disability"])){
			$describe_disability = mysqli_real_escape_string($connection, trim($_POST["describe_disability"]));}
		if(isset($_POST["aboutme"])){
			$aboutme = mysqli_real_escape_string($connection, trim($_POST["aboutme"]));}
		if(isset($_POST["aboutmypartner"])){
			$aboutmypartner = mysqli_real_escape_string($connection, trim($_POST["aboutmypartner"]));}
		if(isset($_POST["highestedu"])){
			$highestedu = mysqli_real_escape_string($connection, trim($_POST["highestedu"]));}
		if(isset($_POST["employedin"])){
			$employedin = mysqli_real_escape_string($connection, trim($_POST["employedin"]));}
		if(isset($_POST["monthlyincome"])){
			$monthlyincome = mysqli_real_escape_string($connection, trim($_POST["monthlyincome"]));}
		if(isset($_POST["religion"])){
			$religion = mysqli_real_escape_string($connection, trim($_POST["religion"]));}
		if(isset($_POST["religious_nature"])){
			$religious_nature = mysqli_real_escape_string($connection, trim($_POST["religious_nature"]));}
		if(isset($_POST["ethnicity"])){
			$ethnicity = mysqli_real_escape_string($connection, trim($_POST["ethnicity"]));}
		if(isset($_POST["specifyother"])){
			
			$specifyother = mysqli_real_escape_string($connection, trim($_POST["specifyother"]));}
		if(isset($_POST["height"])){
			$height = mysqli_real_escape_string($connection, trim($_POST["height"]));}
		if(isset($_POST["weight"])){
			$weight = mysqli_real_escape_string($connection, trim($_POST["weight"]));}
		if($_POST["date_of_birth"] !="" ){
			$date_of_birth = mysqli_real_escape_string($connection, $_POST["date_of_birth"]);}else{$date_of_birth = "1900-01-01";}
		if(isset($_POST["maritalstatus"])){
			$maritalstatus = mysqli_real_escape_string($connection, trim($_POST["maritalstatus"]));}
		if(isset($_POST["no_of_children"])){
			$no_of_children = mysqli_real_escape_string($connection, trim($_POST["no_of_children"]));}
		if(isset($_POST["is_smoke"])){
			$is_smoke = mysqli_real_escape_string($connection, trim($_POST["is_smoke"]));}else{$is_smoke = 0;}
		if(isset($_POST["languages"])){
			$languages = mysqli_real_escape_string($connection, trim($_POST["languages"]));}
		if(isset($_POST["mobile_no"])){
			$mobile_no = mysqli_real_escape_string($connection, trim($_POST["mobile_no"]));}
		if(isset($_POST["country"])){
			$country = mysqli_real_escape_string($connection, trim($_POST["country"]));}
		if(isset($_POST["state"])){
			$state = mysqli_real_escape_string($connection, trim($_POST["state"]));}
		if(isset($_POST["region"])){
			$region = mysqli_real_escape_string($connection, trim($_POST["region"]));}
		if(isset($_POST["profession"])){
			$profession = mysqli_real_escape_string($connection, trim($_POST["profession"]));}
		if(isset($_POST["hometown"])){
			$hometown = mysqli_real_escape_string($connection, trim($_POST["hometown"]));}
		if(isset($_POST["skin_complexion_type"])){
			$skin_complexion_type = mysqli_real_escape_string($connection, trim($_POST["skin_complexion_type"]));}else{$skin_complexion_type = 0;}
		
			
			if($is_registered == "yes"){
				$query = "UPDATE `wiki_dating_profile` SET `fname` = '$fname', `lname` = '{$lname}', `mname`='{$mname}', `gender`= $gender, `date_of_birth` = '$date_of_birth', `marital_status` = '{$maritalstatus}', `no_of_children` = '{$no_of_children}', `is_smoke` = '{$is_smoke}', `languages` =  '{$languages}', `country` = '{$country}', `region` = '{$region}', `mobile_no` = '{$mobile_no}', `about_me` = '{$aboutme}', `about_my_partner` = '{$aboutmypartner}', `height` = '{$height}', `weight` = '{$weight}', `is_disabled` = '{$is_disabled}', `describe_disability` = '{$describe_disability}', `highestedu` = '{$highestedu}', `profession` = '{$profession}', `monthly_net_income` = '{$monthlyincome}', `religion` = '{$religion}', `religious_nature` = '{$religious_nature}', `ethnicity` = $ethnicity, `specify_other` = '{$specifyother}', `hometown` = '{$hometown}', `employedin` = '{$employedin}', `skin_complexion_type` = '{$skin_complexion_type}' WHERE `id` = $user_id";
			}elseif($is_registered == "no"){
	
				$query = 	"INSERT INTO `wiki_dating_profile` (`id`, `reg_date`, `fname`, `lname`, `mname`, `gender`, `date_of_birth`, `marital_status`, `no_of_children`, `is_smoke`, `languages`, `country`, `region`, `mobile_no`, `about_me`, `about_my_partner`, `height`, `weight`, `is_disabled`, `describe_disability`, `highestedu`, `profession`, `monthly_net_income`, `religion`, `religious_nature`, `ethnicity`, `specify_other`, `hometown`,`employedin`,`skin_complexion_type`)";
				$query .= 	" VALUES ($user_id, now(), '{$fname}', '{$lname}', '{$mname}',{$gender}, '$date_of_birth', '{$maritalstatus}', '{$no_of_children}', '{$is_smoke}',  '{$languages}', '{$country}', '{$region}', '{$mobile_no}', '{$aboutme}', '{$aboutmypartner}',  '{$height}', '{$weight}', '{$is_disabled}', '{$describe_disability}', '{$highestedu}', '{$profession}', '{$monthlyincome}',  '{$religion}', '{$religious_nature}', $ethnicity, '{$specifyother}', '{$hometown}', '{$employedin}','{$skin_complexion_type}')";
	
			}
		
		
	
		$run = mysqli_query($connection, $query);
		if(mysqli_affected_rows($connection) > 0){
			$UpdateStatus = "<div style='color:green;font-weight:bold;text-align:center;'>Record successfully saved !!</div>"; 
		}else{
			$UpdateStatus = "<div style='color:red;font-weight:bold;text-align:centre'>Record not saved !!</div>"; 
		}
	}
	






	if($is_registered == "yes"){

		$query = "SELECT * FROM `wiki_dating_profile` WHERE `id` = '$user_id'";
		$run = mysqli_query($connection, $query);
		
		



		$row = mysqli_fetch_assoc($run);
		$fname = $row["fname"];
		$lname = $row["lname"];
		$mname = $row["mname"];
		$gender = $row["gender"];
		$date_of_birth = $row["date_of_birth"];
		$maritalstatus = $row["marital_status"];
		$no_of_children = $row["no_of_children"];
		$is_smoke = $row["is_smoke"];
		$languages = $row["languages"];
		$country = $row["country"];
		$region = $row["region"];
		$mobile_no = $row["mobile_no"];
		$aboutme = $row["about_me"];
		$aboutmypartner = $row["about_my_partner"];
		$height = $row["height"];
		$weight = $row["weight"];
		$is_disabled = $row["is_disabled"];
		$describe_disability = $row["describe_disability"];
		$highestedu = $row["highestedu"];
		$profession = $row["profession"];
		$monthlyincome = $row["monthly_net_income"];
		$religion = $row["religion"];
		$religious_nature = $row["religious_nature"];
		$ethnicity = $row["ethnicity"];
		$specifyother = $row["specify_other"];
		$hometown = $row["hometown"];
		$employedin = $row["employedin"];
		$skin_complexion_type = $row["skin_complexion_type"];

		if($gender == "1"){
			$gender_c = "Male";
		}elseif($gender == "2"){
			$gender_c = "Female";
		}else{$gender_c = "";}

		if($skin_complexion_type == "1"){
			$skin_complexion_type_c = "<img src='/img/skin-type/type1.jpg'  alt='type1'>";
		}elseif($skin_complexion_type == "2"){
			$skin_complexion_type_c = "<img src='/img/skin-type/type2.jpg'  alt='type2'>";
		}elseif($skin_complexion_type == "3"){
			$skin_complexion_type_c = "<img src='/img/skin-type/type3.jpg'  alt='type3'>";
		}elseif($skin_complexion_type == "4"){
			$skin_complexion_type_c = "<img src='/img/skin-type/type4.jpg'  alt='type4'>";
		}elseif($skin_complexion_type == "5"){
			$skin_complexion_type_c = "<img src='/img/skin-type/type5.jpg'  alt='type5'>";
		}elseif($skin_complexion_type == "6"){
			$skin_complexion_type_c = "<img src='/img/skin-type/type6.jpg'  alt='type6'>";
		}else{$skin_complexion_type_c = "";}





		if($date_of_birth == "1900-01-01"){
			$date_of_birth_c = "";
		}else{
			$date_of_birth_c = date("jS F Y",strtotime($date_of_birth));
		}
		if($maritalstatus == 0){
			$maritalstatus_c = "";
		}elseif($maritalstatus == 1){
			$maritalstatus_c = "Single";
		}elseif($maritalstatus == 2){
			$maritalstatus_c = "Widow/Widower";
		}elseif($maritalstatus == 3){
			$maritalstatus_c = "Divorced";
		}elseif($maritalstatus == 4){
			$maritalstatus_c = "Separated";
		}elseif($maritalstatus == 5){
			$maritalstatus_c = "Married";
		}


		if($no_of_children == 0){
			$no_of_children_c = "No Children";
		}elseif($no_of_children == 1){
			$no_of_children_c = "One (1)";
		}elseif($no_of_children == 2){
			$no_of_children_c = "Two (2)";
		}elseif($no_of_children == 3){
			$no_of_children_c = "Three (3)";
		}elseif($no_of_children == 4){
			$no_of_children_c = "Four (4)";
		}elseif($no_of_children == 5){
			$no_of_children_c = "Five (5)";
		}elseif($no_of_children == 5){
			$no_of_children_c = "Six (6) or more";
		}
		
		if($is_smoke == 0){
			$is_smoke_c = "";
		}elseif($is_smoke == 1){
			$is_smoke_c = "No";
		}elseif($is_smoke == 2){
			$is_smoke_c = "Yes";
		}
		

		if($region == 0){
			$region_c = "";
		}elseif($region == 1){
			$region_c = "Ashanti";
		}elseif($region == 2){
			$region_c = "Brong Ahafo";
		}elseif($region == 3){
			$region_c = "Central";
		}elseif($region == 4){
			$region_c = "Eastern";
		}elseif($region == 5){
			$region_c = "Greater Accra";
		}elseif($region == 6){
			$region_c = "Northern";
		}elseif($region == 7){
			$region_c = "Upper East";
		}elseif($region == 8){
			$region_c = "Upper West";
		}elseif($region == 9){
			$region_c = "Volta";
		}elseif($region == 10){
			$region_c = "Western";
		}
		
		
		
		if($height == 0){
			$height_c = "";
		}else{
			$height_c = $height . " cm";
		}
		
		if($weight == 0){
			$weight_c = "";
		}else{
			$weight_c = $weight . " kg";
		}

		if($is_disabled == 0){
			$is_disabled_c = "";
		}elseif($is_disabled == 1){
			$is_disabled_c = "No";
		}elseif($is_disabled == 2){
			$is_disabled_c = "Yes";
		}
		
		
		if($highestedu == 0){
			$highestedu_c = "";
		}elseif($highestedu == 1){
			$highestedu_c = "PhD";
		}elseif($highestedu == 2){
			$highestedu_c = "Master Degree";
		}elseif($highestedu == 3){
			$highestedu_c = "Bachelor Degree";
		}elseif($highestedu == 4){
			$highestedu_c = "Higher National Diploma";
		}elseif($highestedu == 5){
			$highestedu_c = "Diploma";
		}elseif($highestedu == 6){
			$highestedu_c = "SSCE/WASCE";
		}elseif($highestedu == 7){
			$highestedu_c = "BECE";
		}elseif($highestedu == 8){
			$highestedu_c = "Drop Out";
		}elseif($highestedu == 9){
			$highestedu_c = "Never being to school";
		}

		if($employedin == 0){
			$employedin_c = "";
		}elseif($employedin == 1){
			$employedin_c = "Government";
		}elseif($employedin == 2){
			$employedin_c = "Private Company";
		}elseif($employedin == 3){
			$employedin_c = "Self Employed";
		}elseif($employedin == 4){
			$employedin_c = "Not Working";
		}elseif($employedin == 5){
			$employedin_c = "Student";
		}


		if($monthlyincome == 0){
			$monthlyincome_c = "";
		}elseif($monthlyincome == 560){
			$monthlyincome_c = "Above 560 (USD)" ;
		}elseif($monthlyincome == 10){
			$monthlyincome_c = "Between 10 - 50 (USD)" ;
		}elseif($monthlyincome == 51){
			$monthlyincome_c = "Between 51 - 100 (USD)" ;
		}else{
			$monthlyincome_c =  "Between {$monthlyincome} to " . ((int)$monthlyincome + 40) . "  (USD)";
			
		}
			

		if($religion == 0){
			$religion_c = "";
		}elseif($religion == 1){
			$religion_c = "Islam";
		}elseif($religion == 2){
			$religion_c = "Islam (Sunni)";
		}elseif($religion == 3){
			$religion_c = "Islam (Tijaniya)";
		}elseif($religion == 4){
			$religion_c = "Islam (Ahmadiya)";
		}elseif($religion == 5){
			$religion_c = "Islam (Shia)";
		}elseif($religion == 6){
			$religion_c = "Islam (Suffi)";
		}elseif($religion == 7){
			$religion_c = "Christian";
		}elseif($religion == 8){
			$religion_c = "Christian (Catholic)";
		}elseif($religion == 9){
			$religion_c = "Christian (Methodis)";
		}elseif($religion == 10){
			$religion_c = "Christian (Presbyterian)";
		}elseif($religion == 11){
			$religion_c = "Christian (S.D.A)";
		}elseif($religion == 12){
			$religion_c = "Budist";
		}elseif($religion == 13){
			$religion_c = "Hindu";
		}elseif($religion == 14){
			$religion_c = "Atheist";
		}elseif($religion == 15){
			$religion_c = "Traditionalist/Africanist";
		}elseif($religion == 16){
			$religion_c = "Judaism";
		}
		
		if($religious_nature == 0){
			$religious_nature_c = "";
		}elseif($religious_nature == 1){
			$religious_nature_c = "Not Religious";
		}elseif($religious_nature == 2){
			$religious_nature_c = "Somewhat Religious";
		}elseif($religious_nature == 3){
			$religious_nature_c = "Moderately Religious";
		}elseif($religious_nature == 4){
			$religious_nature_c = "Very Religious";
		}


		if($ethnicity == 0){
			$ethnicity_c = "";
		}elseif($ethnicity == 1){
			$ethnicity_c = "Asante";
		}elseif($ethnicity == 2){
			$ethnicity_c = "Chamanaa";
		}elseif($ethnicity == 3){
			$ethnicity_c = "Dagomba";
		}elseif($ethnicity == 4){
			$ethnicity_c = "Ewe";
		}elseif($ethnicity == 5){
			$ethnicity_c = "Fante";
		}elseif($ethnicity == 6){
			$ethnicity_c = "Frafra";
		}elseif($ethnicity == 7){
			$ethnicity_c = "Fulani";
		}elseif($ethnicity == 8){
			$ethnicity_c = "Kotokoli";
		}elseif($ethnicity == 9){
			$ethnicity_c = "Ga";
		}elseif($ethnicity == 10){
			$ethnicity_c = "Gonja";
		}elseif($ethnicity == 11){
			$ethnicity_c = "Gurunsi";
		}elseif($ethnicity == 12){
			$ethnicity_c = "Hausa";
		}elseif($ethnicity == 13){
			$ethnicity_c = "Mamprusi";
		}elseif($ethnicity == 14){
			$ethnicity_c = "Mossi";
		}elseif($ethnicity == 15){
			$ethnicity_c = "Sisala";
		}elseif($ethnicity == 16){
			$ethnicity_c = "Waala";
		}elseif($ethnicity == 17){
			$ethnicity_c = "Other";
		}

		
		if($profession == 0){
			$profession_c = "";
		}elseif($profession == 1){
			$profession_c = "Nurse";
		}elseif($profession == 2){
			$profession_c = "Teacher";
		}elseif($profession == 3){
			$profession_c = "Business Man/Woman";
		}elseif($profession == 4){
			$profession_c = "Doctor";
		}elseif($profession == 5){
			$profession_c = "Trader";
		}elseif($profession == 6){
			$profession_c = "Engineer";
		}elseif($profession == 7){
			$profession_c = "Police Officer";
		}elseif($profession == 8){
			$profession_c = "Immigration Officer";
		}elseif($profession == 9){
			$profession_c = "Fire Service Officer";
		}elseif($profession == 10){
			$profession_c = "Prisons Officer";
		}elseif($profession == 11){
			$profession_c = "Trader";
		}elseif($profession == 12){
			$profession_c = "Student";
		}elseif($profession == 13){
			$profession_c = "Lawyer";
		}elseif($profession == 14){
			$profession_c = "Journalist";
		}elseif($profession == 99){
			$profession_c = "Other";
		}
		
		
		if($country=="1"){$country_c="Afghanistan";}elseif($country=="2"){$country_c="Albania";}elseif($country=="3"){$country_c="Algeria";}elseif($country=="4"){$country_c="Andorra";}elseif($country=="5"){$country_c="Angola";}elseif($country=="6"){$country_c="Antigua and arbuda";}elseif($country=="7"){$country_c="Argentina";}elseif($country=="8"){$country_c="Armenia";}elseif($country=="9"){$country_c="Australia";}elseif($country=="10"){$country_c="Austria";}elseif($country=="11"){$country_c="Azerbaijan";}elseif($country=="12"){$country_c="Bahamas";}elseif($country=="13"){$country_c="Bahrain";}elseif($country=="14"){$country_c="Bangladesh";}elseif($country=="15"){$country_c="Barbados";}elseif($country=="16"){$country_c="Belarus";}elseif($country=="17"){$country_c="Belgium";}elseif($country=="18"){$country_c="Belize";}elseif($country=="19"){$country_c="Benin";}elseif($country=="20"){$country_c="Bhutan";}elseif($country=="21"){$country_c="Bolivia";}elseif($country=="22"){$country_c="Bosnia and Herzegovina";}elseif($country=="23"){$country_c="Botswana";}elseif($country=="24"){$country_c="Brazil";}elseif($country=="25"){$country_c="Brunei";}elseif($country=="26"){$country_c="Bulgaria";}elseif($country=="27"){$country_c="Burkina Faso";}elseif($country=="28"){$country_c="Burma";}elseif($country=="29"){$country_c="Burundi";}elseif($country=="183"){$country_c="Cabo Verde";}elseif($country=="30"){$country_c="Cambodia";}elseif($country=="31"){$country_c="Cameroon";}elseif($country=="32"){$country_c="Canada";}elseif($country=="33"){$country_c="Central African Republic";}elseif($country=="34"){$country_c="Chad";}elseif($country=="35"){$country_c="Chile";}elseif($country=="36"){$country_c="China";}elseif($country=="37"){$country_c="Colombia";}elseif($country=="38"){$country_c="Comoros";}elseif($country=="39"){$country_c="Congo";}elseif($country=="40"){$country_c="Costa Rica";}elseif($country=="41"){$country_c="Croatia";}elseif($country=="42"){$country_c="Cuba";}elseif($country=="43"){$country_c="Cyprus";}elseif($country=="44"){$country_c="Czech Republic";}elseif($country=="45"){$country_c="Dem Rep of Congo";}elseif($country=="46"){$country_c="";}elseif($country=="47"){$country_c="Denmark";}elseif($country=="48"){$country_c="Dominican Republic";}elseif($country=="49"){$country_c="Ecuador";}elseif($country=="50"){$country_c="Egypt";}elseif($country=="51"){$country_c="El Salvador";}elseif($country=="52"){$country_c="Equatorial Guinea";}elseif($country=="53"){$country_c="Eritrea";}elseif($country=="54"){$country_c="Estonia";}elseif($country=="55"){$country_c="Ethiopia";}elseif($country=="56"){$country_c="Fiji";}elseif($country=="57"){$country_c="Finland";}elseif($country=="58"){$country_c="France";}elseif($country=="59"){$country_c="Gabon";}elseif($country=="60"){$country_c="Gambia";}elseif($country=="61"){$country_c="Georgia";}elseif($country=="62"){$country_c="Germany";}elseif($country=="63"){$country_c="Ghana";}elseif($country=="64"){$country_c="Greece";}elseif($country=="65"){$country_c="Greenland";}elseif($country=="66"){$country_c="Grenada";}elseif($country=="67"){$country_c="Guatemala";}elseif($country=="68"){$country_c="Guinea-Bissau";}elseif($country=="69"){$country_c="Guinea";}elseif($country=="70"){$country_c="Guyana";}elseif($country=="71"){$country_c="Haiti";}elseif($country=="72"){$country_c="Honduras";}elseif($country=="73"){$country_c="Hong Kong";}elseif($country=="74"){$country_c="Hungary";}elseif($country=="75"){$country_c="Iceland";}elseif($country=="76"){$country_c="India";}elseif($country=="77"){$country_c="Indonesia";}elseif($country=="78"){$country_c="Iran";}elseif($country=="79"){$country_c="Iraq";}elseif($country=="80"){$country_c="Ireland";}elseif($country=="81"){$country_c="Israel";}elseif($country=="82"){$country_c="Italy";}elseif($country=="83"){$country_c="Ivory Coast";}elseif($country=="84"){$country_c="Jamaica";}elseif($country=="85"){$country_c="Japan";}elseif($country=="86"){$country_c="Jordan";}elseif($country=="87"){$country_c="Kazakhstan";}elseif($country=="88"){$country_c="Kenya";}elseif($country=="89"){$country_c="Kuwait";}elseif($country=="90"){$country_c="Kyrgyzstan";}elseif($country=="91"){$country_c="Laos";}elseif($country=="92"){$country_c="Latvia";}elseif($country=="93"){$country_c="Lebanon";}elseif($country=="94"){$country_c="Liberia";}elseif($country=="95"){$country_c="Libya";}elseif($country=="96"){$country_c="Liechtenstein";}elseif($country=="97"){$country_c="Lithuania";}elseif($country=="98"){$country_c="Luxembourg";}elseif($country=="99"){$country_c="Macau";}elseif($country=="100"){$country_c="Macedonia";}elseif($country=="101"){$country_c="Madagascar";}elseif($country=="102"){$country_c="Malawi";}elseif($country=="103"){$country_c="Malaysia";}elseif($country=="104"){$country_c="Maldives";}elseif($country=="105"){$country_c="Mali";}elseif($country=="106"){$country_c="Malta";}elseif($country=="107"){$country_c="Mauritania";}elseif($country=="108"){$country_c="Mauritius";}elseif($country=="109"){$country_c="Mexico";}elseif($country=="110"){$country_c="Micronesia";}elseif($country=="111"){$country_c="Moldova";}elseif($country=="112"){$country_c="Monaco";}elseif($country=="113"){$country_c="Mongolia";}elseif($country=="114"){$country_c="Morocco";}elseif($country=="115"){$country_c="Mozambique";}elseif($country=="116"){$country_c="Namibia";}elseif($country=="117"){$country_c="Nepal";}elseif($country=="118"){$country_c="Netherlands";}elseif($country=="119"){$country_c="New Zealand";}elseif($country=="120"){$country_c="Nicaragua";}elseif($country=="121"){$country_c="Niger";}elseif($country=="122"){$country_c="Nigeria";}elseif($country=="123"){$country_c="North Korea";}elseif($country=="124"){$country_c="Norway";}elseif($country=="125"){$country_c="Oman";}elseif($country=="126"){$country_c="Pakistan";}elseif($country=="182"){$country_c="Palestine";}elseif($country=="127"){$country_c="Panama";}elseif($country=="128"){$country_c="Papua New Guinea";}elseif($country=="129"){$country_c="Paraguay";}elseif($country=="130"){$country_c="Peru";}elseif($country=="131"){$country_c="Philippines";}elseif($country=="132"){$country_c="Poland";}elseif($country=="133"){$country_c="Portugal";}elseif($country=="134"){$country_c="Puerto Rico";}elseif($country=="135"){$country_c="Qatar";}elseif($country=="136"){$country_c="Romania";}elseif($country=="137"){$country_c="Russian Federation</";}elseif($country=="138"){$country_c="Rwanda";}elseif($country=="139"){$country_c="Sao Tome";}elseif($country=="140"){$country_c="Saudi Arabia";}elseif($country=="141"){$country_c="Senegal";}elseif($country=="142"){$country_c="Serbia";}elseif($country=="143"){$country_c="Sierra Leone";}elseif($country=="144"){$country_c="Singapore";}elseif($country=="145"){$country_c="Slovak Republic";}elseif($country=="146"){$country_c="Slovenia";}elseif($country=="147"){$country_c="Solomon Islands";}elseif($country=="148"){$country_c="Somalia";}elseif($country=="149"){$country_c="South Africa";}elseif($country=="150"){$country_c="South Korea";}elseif($country=="151"){$country_c="Spain";}elseif($country=="152"){$country_c="Sri Lanka";}elseif($country=="153"){$country_c="Sudan";}elseif($country=="154"){$country_c="Suriname";}elseif($country=="155"){$country_c="Swaziland";}elseif($country=="156"){$country_c="Sweden";}elseif($country=="157"){$country_c="Switzerland";}elseif($country=="158"){$country_c="Syria";}elseif($country=="159"){$country_c="Taiwan";}elseif($country=="160"){$country_c="Tajikistan";}elseif($country=="161"){$country_c="Tanzania";}elseif($country=="162"){$country_c="Thailand";}elseif($country=="163"){$country_c="Togo";}elseif($country=="164"){$country_c="";}elseif($country=="165"){$country_c="Turkey";}elseif($country=="166"){$country_c="Turkmenistan";}elseif($country=="167"){$country_c="Uganda";}elseif($country=="168"){$country_c="Ukraine";}elseif($country=="169"){$country_c="United Arab Emirates";}elseif($country=="170"){$country_c="United Kingdom";}elseif($country=="171"){$country_c="United States";}elseif($country=="172"){$country_c="Uruguay";}elseif($country=="173"){$country_c="Uzbekistan";}elseif($country=="174"){$country_c="Venezuela";}elseif($country=="175"){$country_c="Vietnam";}elseif($country=="176"){$country_c="Western Samoa";}elseif($country=="177"){$country_c="Yemen";}elseif($country=="178"){$country_c="Yugoslavia";}elseif($country=="179"){$country_c="Zaire";}elseif($country=="180"){$country_c="Zambia";}elseif($country=="181"){$country_c="Zimbabwe";}
	
	}





	$query = "SELECT `img_path` FROM `dating_images` WHERE `user_id` = {$user_id} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
				
	$run = mysqli_query($connection,$query);
	
	if(mysqli_affected_rows($connection)>0){ 
		$row = mysqli_fetch_assoc($run);
		$current_profile_photo = $row["img_path"];
	
	}


	$query = "SELECT `img_path` FROM `dating_images` WHERE `user_id` = {$user_id} AND `is_cover` = 1 AND `updated_date_time_cover` = (SELECT Max(`updated_date_time_cover`) FROM `dating_images` WHERE `is_cover`=1)";
	$run = mysqli_query($connection,$query);
	
	if(mysqli_affected_rows($connection)>0){ 
		$row = mysqli_fetch_assoc($run);
		$current_cover_photo = $row["img_path"];
	
	}
	




?>
						<div class="imgcontainer" id="<?php if($current_cover_photo == ""){echo "/img/news/cover.jpg";}else{echo "{$current_cover_photo}";} ?>" style="<?php if($current_cover_photo == ""){echo "background:url('/img/news/cover.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;cursor:pointer";}else{ echo "background:url('{$current_cover_photo}');background-position: center;background-repeat: no-repeat;background-size: cover;cursor:pointer";}  ?>" >
							
							
							
							
						</div>
						<div>
						<div class="cover_img"><img src="<?php if($current_profile_photo == ""){echo "/img/icons/login.jpg";}else{ echo $current_profile_photo;} ?>" alt="" class="avatar"></div>
							
							<div class="top_right">
								
								
									<div class="right-links">
										
										<?php if(!isset($_GET["edit"])){ ?>
											<a href="<?php echo $_SERVER['PHP_SELF'].'?edit=true' ?>" class="edit-profile edit-profile2"><i class="bi bi-pencil-fill"></i> Edit Profile</a>
										<?php }else{ ?>
											<a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="edit-profile"><i class="bi bi-x-circle-fill"></i> Cancel</a>
										<?php } ?>
										<a href="profile-photos.php" class="edit-profile photos"><i class="bi bi-camera-fill"></i> Photos</a>
										
										<a href="friends.php" style="display:inline-block;" class="edit-profile friends"><i class="bi bi-people-fill"></i> Friends</a>
										<a href="stories.php" class="edit-profile stories"><i class="bi bi-hourglass-split"></i> Stories</a>
										<a href="posts.php" class="edit-profile posts"><i class="bi bi-mailbox"></i> Posts</a>
									</div>

							</div>
						</div>
					<?php
			
			if($is_registered == "yes" && !isset($_GET["edit"])){
			?>
			<div style="clear:both;margin-bottom:0;color:white;" class="hide-on-large-screen">.</div>
			<h1 style="margin:0;text-align:center;font-size:20px;clear:both" class="full-name"><?php echo $fname . " " . $mname . " " . $lname ?></h1>
			<div class="display_info_container" style="clear:both;">
				
				<?php echo $UpdateStatus; ?>
			
					<p><strong><i class="bi bi-gender-ambiguous"></i> Gender</strong><span class="data_c"><?php echo $gender_c; ?></span></p>
					<p><strong>Date Of Birth</strong><span class="data_c"><?php echo $date_of_birth_c; ?></span></p>
					<p><strong>Mobile No.</strong><span class="data_c"><?php echo $mobile_no; ?></span> <span style="color:red">Private</span></p>
					<p><strong>Skin Complexion</strong><span class="data_c" style="vertical-align:middle;"><?php echo $skin_complexion_type_c; ?></span></p>
					<p><strong>Marital Status</strong><span class="data_c"><?php echo $maritalstatus_c; ?></span></p>
					<p><strong>Number Of Children</strong><span class="data_c"><?php echo $no_of_children_c; ?></span></p> 
					<p><strong>Do you smoke?</strong><span class="data_c"><?php echo $is_smoke_c; ?></span></p>
					<p><strong>Hometown</strong><span class="data_c"><?php echo $hometown; ?></span></p>
					<p><strong>Languages spoken</strong><span class="data_c"><?php echo $languages; ?></span></p>
					<p><strong>Citizenship</strong><span class="data_c"><?php echo$country_c; ?></span></p>
					<p><strong>Region</strong><span class="data_c"><?php echo $region_c; ?></span></p>
					<p><strong>About Me</strong><br><span class="data_c_about"><?php echo $aboutme; ?></span></p>
					<p><strong>About My Partner</strong><br><span class="data_c_about"><?php echo $aboutmypartner; ?></span></p>
					<p><strong>Height</strong><span class="data_c"><?php echo $height_c; ?></span></p>
					<p><strong>Weight</strong><span class="data_c"><?php echo $weight_c; ?></span></p>
					<p><strong>Are you disabled?</strong><span class="data_c"><?php echo $is_disabled_c; ?></span></p>
					<p><strong>Describe Disability</strong><span class="data_c"><?php echo $describe_disability; ?></span></p>
					<p><strong>Highest Education</strong><span class="data_c"><?php echo $highestedu_c; ?></span></p>
					<p><strong>Profession</strong><span class="data_c"><?php echo $profession_c; ?></span></p>
					<p><strong>Employed In</strong><span class="data_c"><?php echo $employedin_c; ?></span></p>
					<p><strong>Net Monthly income</strong><span class="data_c"><?php echo $monthlyincome_c; ?></span></p>
					<p><strong>Religion</strong><span class="data_c"><?php echo $religion_c; ?></span></p>
					<p><strong>Religious Nature</strong><span class="data_c"><?php echo $religious_nature_c; ?></span></p>
					<p><strong>Ethinicity</strong><span class="data_c"><?php echo $ethnicity_c; ?></span></p>
					<p><strong>Specify Other</strong><br><span class="data_c"><?php echo $specifyother; ?></span></p>
					
				
			</div>
			
			<?php
			}elseif($is_registered == "no" || isset($_GET["edit"])){
					?>
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
						


						

						<div class="container">
						
							<div style="clear:both;"></div>
							<p><label for="fname" style="clear:both;"><b>First Name <span style="color:red">*</span></b></label>
							<input type="text" placeholder="Enter First Name" name="fname" required <?php if(isset($fname)){echo "value='{$fname}'";} ?> ></p>

							<p><label for="lname"><b>Last Name <span style="color:red;">*</span></b></label>
							<input type="text" placeholder="Enter Last Name" name="lname" required <?php if(isset($lname)){echo "value='{$lname}'";} ?> ></p>

							<p><label for="mname"><b>Middle Name</b></label>
							<input type="text" placeholder="Enter Middle Name" name="mname" <?php if(isset($mname)){echo "value='{$mname}'";} ?> ></p>


							<p><label style="margin-right:20px;"><b>Gender <span style="color:red">*</span></b></label>
							<span><label for="male">Male</label></span><input type="radio" required name="gender" value="1" id="male" style="margin-right:15px;" <?php if($gender == 1 ){echo "checked = 'checked'";} ?>>		
							<span><label for="female">Female</label></span><input type="radio" value="2" name="gender" id="female" <?php if($gender == 2 ){echo "checked = 'checked'";} ?>></p>

							<p><label for="date_of_birth"><b>Date Of Birth</b></label>
							<input type="date" name="date_of_birth" id="date_of_birth" value="<?php echo "$date_of_birth"; ?>" ></p>
							<?php
							$style_skin = "style='border:5px solid red'";
							?>
							<p><span><label><strong>Skin Complexion</strong></label></span><br>
							<label class="skin" id="skin1" for="skin_complexion_type1" <?php if($skin_complexion_type == 1 ){echo $style_skin;} ?>><img src="/img/skin-type/type1.jpg"  alt="type1"></label>
							<label class="skin" id="skin2" for="skin_complexion_type2" <?php if($skin_complexion_type == 2 ){echo $style_skin;} ?>><img src="/img/skin-type/type2.jpg"  alt="type2"></label>
							<label class="skin" id="skin3" for="skin_complexion_type3" <?php if($skin_complexion_type == 3 ){echo $style_skin;} ?>><img src="/img/skin-type/type3.jpg"  alt="type3"></label>
							<label class="skin" id="skin4" for="skin_complexion_type4" <?php if($skin_complexion_type == 4 ){echo $style_skin;} ?>><img src="/img/skin-type/type4.jpg"  alt="type4"></label>
							<label class="skin" id="skin5" for="skin_complexion_type5" <?php if($skin_complexion_type == 5 ){echo $style_skin;} ?>><img src="/img/skin-type/type5.jpg"  alt="type5"></label>
							<label class="skin" id="skin6" for="skin_complexion_type6" <?php if($skin_complexion_type == 6 ){echo $style_skin;} ?>><img src="/img/skin-type/type6.jpg"  alt="type6"></label>

							<input style="display:none" type="radio" value="1" name="skin_complexion_type" id="skin_complexion_type1" <?php if($skin_complexion_type == 1 ){echo "checked = 'checked'";} ?>>
							<input style="display:none" type="radio" value="2" name="skin_complexion_type" id="skin_complexion_type2" <?php if($skin_complexion_type == 2 ){echo "checked = 'checked'";} ?>>
							<input style="display:none" type="radio" value="3" name="skin_complexion_type" id="skin_complexion_type3" <?php if($skin_complexion_type == 3 ){echo "checked = 'checked'";} ?>>
							<input style="display:none" type="radio" value="4" name="skin_complexion_type" id="skin_complexion_type4" <?php if($skin_complexion_type == 4 ){echo "checked = 'checked'";} ?>>
							<input style="display:none" type="radio" value="5" name="skin_complexion_type" id="skin_complexion_type5" <?php if($skin_complexion_type == 5 ){echo "checked = 'checked'";} ?>>
							<input style="display:none" type="radio" value="6" name="skin_complexion_type" id="skin_complexion_type6" <?php if($skin_complexion_type == 6 ){echo "checked = 'checked'";} ?>>
							</p>







							<p><label for="mobile_no" class="label"><strong>Mobile Number</strong></label>
							<input type = "text" name = "mobile_no"  maxlength= "30" id="mobile_no" value="<?php echo $mobile_no  ?>"/></p>
							
							<p><label class="label"><strong>Marital Status</strong></label><br>

							<select name = "maritalstatus">
								<option value = "0" <?php if(isset($maritalstatus)){if($maritalstatus == "0"){echo "selected = 'selected'";}} ?>>--Select--</option>
								<option value = "1" <?php if(isset($maritalstatus)){if($maritalstatus == "1"){echo "selected = 'selected'";}} ?>>Single</option>
								<option value = "2" <?php if(isset($maritalstatus)){if($maritalstatus == "2"){echo "selected = 'selected'";}} ?>>Widow/Widower</option>
								<option value = "3" <?php if(isset($maritalstatus)){if($maritalstatus == "3"){echo "selected = 'selected'";}} ?>>Divorced</option>
								<option value = "4" <?php if(isset($maritalstatus)){if($maritalstatus == "4"){echo "selected = 'selected'";}} ?>>Separated</option>
								<option value = "5" <?php if(isset($maritalstatus)){if($maritalstatus == "5"){echo "selected = 'selected'";}} ?>>Married</option>
							</select></p>

							
							<p><label for="no_of_children" class="label"><strong>Do you have any children?</strong></label><br>
								<select name = "no_of_children" id="anyChildren">
								<option value = "0" <?php if(isset($no_of_children)){if($no_of_children == "0"){echo "selected = 'selected'";}} ?>>No Children</option>
								<option value = "1" <?php if(isset($no_of_children)){if($no_of_children == "1"){echo "selected = 'selected'";}} ?>>1</option>
								<option value = "2" <?php if(isset($no_of_children)){if($no_of_children == "2"){echo "selected = 'selected'";}} ?>>2</option>
								<option value = "3" <?php if(isset($no_of_children)){if($no_of_children == "3"){echo "selected = 'selected'";}} ?>>3</option>
								<option value = "4" <?php if(isset($no_of_children)){if($no_of_children == "4"){echo "selected = 'selected'";}} ?>>4</option>
								<option value = "5" <?php if(isset($no_of_children)){if($no_of_children == "5"){echo "selected = 'selected'";}} ?>>5</option>
								<option value = "6" <?php if(isset($no_of_children)){if($no_of_children == "6"){echo "selected = 'selected'";}} ?>>6 or more</option>
							</select></p>

							<p><label class="label"><strong>Do you smoke?</strong></label><br>
							<label for="no">No</label><input type = "radio" name = "is_smoke" value = "1" id="no" <?php if(isset($is_smoke)){if($is_smoke == "1"){echo "checked = 'checked'";}} ?> style = "margin-right:15px;"/>
							<label for="yes">Yes</label><input type = "radio" name = "is_smoke" value = "2" id="yes" <?php if(isset($is_smoke)){if($is_smoke =="2"){echo "checked = 'checked'";}} ?> /></p>

							<p><label for="languages spoken" class="label"><strong>Languages spoken</strong></label>
							<input type = "text" name = "languages" maxlength = "100" id="languages" value="<?php echo "$languages"; ?>"/></p>



							<p><label style="margin-right:20px;"><b>Are you disabled?</b></label>
							<span><label for="no_disabled">No</label></span><input type="radio" name="is_disabled" id="no_disabled" value="1" style="margin-right:15px;" <?php if(isset($is_disabled)){if($is_disabled == 1 ){echo "checked = 'checked'";}} ?>>		
							<span><label for="yes_disabled">Yes</label></span><input type="radio" name="is_disabled" id="yes_disabled" value="2" <?php if(isset($is_disabled)){if($is_disabled == 2 ){echo "checked = 'checked'";}} ?>></p>

							<p><label for="describe_disability"><b>If yes, describe disability</b></label>
							<input type="text" placeholder="Describe disability" name="describe_disability" value="<?php echo $describe_disability;  ?>" ></p>




							<p><label for="hometown"><strong>Hometown</strong></label><br>
				<input type = "text" name = "hometown" maxlength = "50" id="hometown" value="<?php if(isset($hometown)){echo $hometown;}?>"/></p>
				

				<p><label for="height"><strong>Height</strong></label>
				<select name = "height" id="height">
						<option value = "0">--Cms--</option>
						<option value = "121" <?php if(isset($height)){if($height == "121"){echo "selected = 'selected'";}} ?>>121cm</option>
						<option value = "124" <?php if(isset($height)){if($height == "124"){echo "selected = 'selected'";}} ?>>124cm</option>
						<option value = "124" <?php if(isset($height)){if($height == "124"){echo "selected = 'selected'";}} ?>>124cm</option>
						<option value = "127" <?php if(isset($height)){if($height == "127"){echo "selected = 'selected'";}} ?>>127cm</option>	
						<option value = "130" <?php if(isset($height)){if($height == "130"){echo "selected = 'selected'";}} ?>>130cm</option>
						<option value = "133" <?php if(isset($height)){if($height == "133"){echo "selected = 'selected'";}} ?>>133cm</option>
						<option value = "136" <?php if(isset($height)){if($height == "136"){echo "selected = 'selected'";}} ?>>136cm</option>
						<option value = "139" <?php if(isset($height)){if($height == "139"){echo "selected = 'selected'";}} ?>>139cm</option>
						<option value = "142" <?php if(isset($height)){if($height == "142"){echo "selected = 'selected'";}} ?>>142cm</option>
						<option value = "145" <?php if(isset($height)){if($height == "145"){echo "selected = 'selected'";}} ?>>145cm</option>
						<option value = "148" <?php if(isset($height)){if($height == "148"){echo "selected = 'selected'";}} ?>>148cm</option>
						<option value = "151" <?php if(isset($height)){if($height == "151"){echo "selected = 'selected'";}} ?>>151cm</option>
						<option value = "154" <?php if(isset($height)){if($height == "154"){echo "selected = 'selected'";}} ?>>154cm</option>
						<option value = "157" <?php if(isset($height)){if($height == "157"){echo "selected = 'selected'";}} ?>>157cm</option>
						<option value = "160" <?php if(isset($height)){if($height == "160"){echo "selected = 'selected'";}} ?>>160cm</option>
						<option value = "163" <?php if(isset($height)){if($height == "163"){echo "selected = 'selected'";}} ?>>163cm</option>
						<option value = "166" <?php if(isset($height)){if($height == "166"){echo "selected = 'selected'";}} ?>>166cm</option>
						<option value = "169" <?php if(isset($height)){if($height == "169"){echo "selected = 'selected'";}} ?>>169cm</option>
						<option value = "172" <?php if(isset($height)){if($height == "172"){echo "selected = 'selected'";}} ?>>172cm</option>
						<option value = "175" <?php if(isset($height)){if($height == "175"){echo "selected = 'selected'";}} ?>>175cm</option>
						<option value = "178" <?php if(isset($height)){if($height == "178"){echo "selected = 'selected'";}} ?>>178cm</option>
						<option value = "181" <?php if(isset($height)){if($height == "181"){echo "selected = 'selected'";}} ?>>181cm</option>
						<option value = "184" <?php if(isset($height)){if($height == "184"){echo "selected = 'selected'";}} ?>>184cm</option>
						<option value = "187" <?php if(isset($height)){if($height == "187"){echo "selected = 'selected'";}} ?>>187cm</option>
						<option value = "190" <?php if(isset($height)){if($height == "190"){echo "selected = 'selected'";}} ?>>190cm</option>
						<option value = "193" <?php if(isset($height)){if($height == "193"){echo "selected = 'selected'";}} ?>>193cm</option>
						<option value = "196" <?php if(isset($height)){if($height == "196"){echo "selected = 'selected'";}} ?>>196cm</option>
						<option value = "199" <?php if(isset($height)){if($height == "199"){echo "selected = 'selected'";}} ?>>199cm</option>
						<option value = "202" <?php if(isset($height)){if($height == "202"){echo "selected = 'selected'";}} ?>>202cm</option>
						<option value = "205" <?php if(isset($height)){if($height == "205"){echo "selected = 'selected'";}} ?>>205cm</option>
						<option value = "208" <?php if(isset($height)){if($height == "208"){echo "selected = 'selected'";}} ?>>208cm</option>
						<option value = "211" <?php if(isset($height)){if($height == "211"){echo "selected = 'selected'";}} ?>>211cm</option>
						<option value = "214" <?php if(isset($height)){if($height == "214"){echo "selected = 'selected'";}} ?>>214cm</option>
						<option value = "217" <?php if(isset($height)){if($height == "217"){echo "selected = 'selected'";}} ?>>217cm</option>
						<option value = "220"<?php if(isset($height)){if($height == "220"){echo "selected = 'selected'";}} ?>>220cm</option>
						<option value = "223"  <?php if(isset($height)){if($height == "223"){echo "selected = 'selected'";}} ?>>223cm</option>
						<option value = "226" <?php if(isset($height)){if($height == "226"){echo "selected = 'selected'";}} ?>>226cm</option>
						<option value = "229" <?php if(isset($height)){if($height == "229"){echo "selected = 'selected'";}} ?>>229cm</option>
						<option value = "232" <?php if(isset($height)){if($height == "232"){echo "selected = 'selected'";}} ?>>232cm</option>
						<option value = "235" <?php if(isset($height)){if($height == "235"){echo "selected = 'selected'";}} ?>>235cm</option>
						<option value = "238" <?php if(isset($height)){if($height == "238"){echo "selected = 'selected'";}} ?>>238cm</option>
						<option value = "241" <?php if(isset($height)){if($height == "241"){echo "selected = 'selected'";}} ?>>241cm</option>
				</select></p>
				
				<p><label for = "weight"><strong>Weight</strong></label>
				<select name = "weight" id="weight">
					<option value = "0">--Kg--</option>
					<option value="36" <?php if(isset($weight)){if($weight == "36"){echo "selected = 'selected'";}} ?>>36kg</option>
					<option value="39" <?php if(isset($weight)){if($weight == "39"){echo "selected = 'selected'";}} ?>>39kg</option>
					<option value="42" <?php if(isset($weight)){if($weight == "42"){echo "selected = 'selected'";}} ?>>42kg</option>
					<option value="45" <?php if(isset($weight)){if($weight == "45"){echo "selected = 'selected'";}} ?>>45kg</option>
					<option value="48" <?php if(isset($weight)){if($weight == "48"){echo "selected = 'selected'";}} ?>>48kg</option>
					<option value="51" <?php if(isset($weight)){if($weight == "51"){echo "selected = 'selected'";}} ?>>51kg</option>
					<option value="54" <?php if(isset($weight)){if($weight == "54"){echo "selected = 'selected'";}} ?>>54kg</option>
					<option value="57" <?php if(isset($weight)){if($weight == "57"){echo "selected = 'selected'";}} ?>>57kg</option>
					<option value="60" <?php if(isset($weight)){if($weight == "60"){echo "selected = 'selected'";}} ?>>60kg</option>
					<option value="63" <?php if(isset($weight)){if($weight == "63"){echo "selected = 'selected'";}} ?>>63kg</option>
					<option value="66" <?php if(isset($weight)){if($weight == "66"){echo "selected = 'selected'";}} ?>>66kg</option>
					<option value="69" <?php if(isset($weight)){if($weight == "69"){echo "selected = 'selected'";}} ?>>69kg</option>
					<option value="72" <?php if(isset($weight)){if($weight == "72"){echo "selected = 'selected'";}} ?>>72kg</option>
					<option value="75" <?php if(isset($weight)){if($weight == "75"){echo "selected = 'selected'";}} ?>>75kg</option>
					<option value="78" <?php if(isset($weight)){if($weight == "78"){echo "selected = 'selected'";}} ?>>78kg</option>
					<option value="81" <?php if(isset($weight)){if($weight == "81"){echo "selected = 'selected'";}} ?>>81kg</option>
					<option value="84" <?php if(isset($weight)){if($weight == "84"){echo "selected = 'selected'";}} ?>>84kg</option>
					<option value="87" <?php if(isset($weight)){if($weight == "87"){echo "selected = 'selected'";}} ?>>87kg</option>
					<option value="90" <?php if(isset($weight)){if($weight == "90"){echo "selected = 'selected'";}} ?>>90kg</option>
					<option value="93" <?php if(isset($weight)){if($weight == "93"){echo "selected = 'selected'";}} ?>>93kg</option>
					<option value="96" <?php if(isset($weight)){if($weight == "96"){echo "selected = 'selected'";}} ?>>96kg</option>
					<option value="99" <?php if(isset($weight)){if($weight == "99"){echo "selected = 'selected'";}} ?>>99kg</option>
					<option value="102" <?php if(isset($weight)){if($weight == "102"){echo "selected = 'selected'";}} ?>>102kg</option>
					<option value="105" <?php if(isset($weight)){if($weight == "105"){echo "selected = 'selected'";}} ?>>105kg</option>
					<option value="108" <?php if(isset($weight)){if($weight == "108"){echo "selected = 'selected'";}} ?>>108kg</option>
					<option value="111" <?php if(isset($weight)){if($weight == "111"){echo "selected = 'selected'";}} ?>>111kg</option>
					<option value="114" <?php if(isset($weight)){if($weight == "114"){echo "selected = 'selected'";}} ?>>114kg</option>
					<option value="117" <?php if(isset($weight)){if($weight == "117"){echo "selected = 'selected'";}} ?>>117kg</option>
					<option value="120" <?php if(isset($weight)){if($weight == "120"){echo "selected = 'selected'";}} ?>>120kg</option>
					<option value="123" <?php if(isset($weight)){if($weight == "123"){echo "selected = 'selected'";}} ?>>123kg</option>
					<option value="126" <?php if(isset($weight)){if($weight == "126"){echo "selected = 'selected'";}} ?>>126kg</option>
					<option value="129" <?php if(isset($weight)){if($weight == "129"){echo "selected = 'selected'";}} ?>>129kg</option>
					<option value="132" <?php if(isset($weight)){if($weight == "132"){echo "selected = 'selected'";}} ?>>132kg</option>
					<option value="135" <?php if(isset($weight)){if($weight == "135"){echo "selected = 'selected'";}} ?>>135kg</option>
				</select></p>



							
							




				<p><label class="mepartnerlabel"><strong>About Me</strong></label><br>
				<textarea name = "aboutme" id="aboutMe" style="width:100%" rows = "7" maxlength="1000" placeholder="Sample description to help you write out yourself
				
I am simple, responsible, down to earth and extrovert in nature working with a private company in Accra. I believe in spending equal time for both work and personal life which let me involve in active sports, work outs and travelling. I am keen about religion and offer namaaz 5 times a day. I love spending time with family and friends. I love my career and wish to be a successful architect in future. I am looking for a partner who can support me in reachng this goal. "><?php echo $aboutme; ?></textarea></p>
		
				
				<p><label class="mepartnerlabel"><strong>About My Partner</strong></label><br>
				<textarea name = "aboutmypartner" id="aboutmypartner" style="width:100%" rows = "7" maxlength="1000" placeholder="Sample description to help you write about your partner preference

I am looking for an educated, God fearing girl who respects elders and family members. She should believe in Almighty Allah and offer namaaz. Preferably someone who shares same insight and belief as mine."><?php echo $aboutmypartner; ?></textarea></p>
				

				<p><label><strong>Highest Education</strong></label><br>
				<select name = "highestedu" id="highestedu">
					<option value = "0">--Select--</option>
					<option value = "1" <?php if($highestedu == "1"){echo "selected = 'selected'";} ?>>PhD</option>
					<option value = "2" <?php if($highestedu == "2"){echo "selected = 'selected'";} ?>>Master Degree</option>
					<option value = "3" <?php if($highestedu == "3"){echo "selected = 'selected'";} ?>>Bachelor Degree</option>
					<option value = "4" <?php if($highestedu == "4"){echo "selected = 'selected'";} ?>>Higher National Diploma</option>
					<option value = "5" <?php if($highestedu == "5"){echo "selected = 'selected'";} ?>>Diploma</option>
					<option value = "6" <?php if($highestedu == "6"){echo "selected = 'selected'";} ?>>Senior High School</option>
					<option value = "7" <?php if($highestedu == "7"){echo "selected = 'selected'";} ?>>Junior High School</option>
					<option value = "8" <?php if($highestedu == "8"){echo "selected = 'selected'";} ?>>Drop Out</option>
					<option value = "9" <?php if($highestedu == "9"){echo "selected = 'selected'";} ?>>Never being to School</option>
				</select></p>

				<p><strong>Employed In</strong><br>
				<select name = "employedin" id="employedin">
					<option value = "0">--Select--</option>
					<option value = "1" <?php if($employedin == "1"){echo "selected = 'selected'";} ?>>Government</option>
					<option value = "2" <?php if($employedin == "2"){echo "selected = 'selected'";} ?>>Private</option>
					<option value = "3" <?php if($employedin == "3"){echo "selected = 'selected'";} ?>>Self Employed</option>
					<option value = "4" <?php if($employedin == "4"){echo "selected = 'selected'";} ?>>Not Working</option>
					<!-- <option value = "5" <?php if($employedin == "5"){echo "selected = 'selected'";} ?>>Student</option> -->
					
				</select></p>

					
				<p ><label for="profession" class="label"><strong>Profession</strong></label>
					<select name="profession" id="profession">
						<option value = "0">--Select--</option>					
						<option value = "1" <?php if($profession == "1"){echo "selected = 'selected'";} ?>>Nurse</option>
						<option value = "2" <?php if($profession == "2"){echo "selected = 'selected'";} ?>>Teacher</option>
						<option value = "3" <?php if($profession == "3"){echo "selected = 'selected'";} ?>>Business Man/Woman</option>
						<option value = "4" <?php if($profession == "4"){echo "selected = 'selected'";} ?>>Doctor</option>
						<option value = "5" <?php if($profession == "5"){echo "selected = 'selected'";} ?>>Trader</option>
						<option value = "6" <?php if($profession == "6"){echo "selected = 'selected'";} ?>>Engineer</option>
						<option value = "7" <?php if($profession == "7"){echo "selected = 'selected'";} ?>>Police Officer</option>
						<option value = "8" <?php if($profession == "8"){echo "selected = 'selected'";} ?>>Immigration Officer</option>
						<option value = "9" <?php if($profession == "9"){echo "selected = 'selected'";} ?>>Fire Service Offiicer</option>
						<option value = "10" <?php if($profession == "10"){echo "selected = 'selected'";} ?>>Prisons Officer</option>
						<option value = "11" <?php if($profession == "11"){echo "selected = 'selected'";} ?>>Trader</option>
						<option value = "12" <?php if($profession == "12"){echo "selected = 'selected'";} ?>>Student</option>
						<option value = "13" <?php if($profession == "13"){echo "selected = 'selected'";} ?>>Lawyer</option>
						<option value = "14" <?php if($profession == "14"){echo "selected = 'selected'";} ?>>Journalist/Media</option>
						<option value = "99" <?php if($profession == "99"){echo "selected = 'selected'";} ?>>Others</option>
					</select></p>
			
				<p><strong>Monthly Income</strong><br>
				<select name = "monthlyincome" id="monthlyincome">
					<option value = "0">--Select--</option>
					<option value = "10" <?php if($monthlyincome == "10"){echo "selected = 'selected'";} ?>>10 - 50 (USD)</option>
					<option value = "51" <?php if($monthlyincome == "51"){echo "selected = 'selected'";} ?>>51 - 100 (USD)</option>
					<option value = "110" <?php if($monthlyincome == "110"){echo "selected = 'selected'";} ?>>110 - 150 (USD)</option>
					<option value = "160" <?php if($monthlyincome == "160"){echo "selected = 'selected'";} ?>>160 - 200 (USD)</option>
					<option value = "210" <?php if($monthlyincome == "210"){echo "selected = 'selected'";} ?>>210 - 250 (USD)</option>
					<option value = "260" <?php if($monthlyincome == "260"){echo "selected = 'selected'";} ?>>260 - 300 (USD)</option>
					<option value = "310" <?php if($monthlyincome == "310"){echo "selected = 'selected'";} ?>>310 - 350 (USD)</option>
					<option value = "360" <?php if($monthlyincome == "360"){echo "selected = 'selected'";} ?>>360 - 400 (USD)</option>
					<option value = "410" <?php if($monthlyincome == "410"){echo "selected = 'selected'";} ?>>410 - 450 (USD)</option>
					<option value = "460" <?php if($monthlyincome == "460"){echo "selected = 'selected'";} ?>>460 - 500 (USD)</option>
					<option value = "510" <?php if($monthlyincome == "510"){echo "selected = 'selected'";} ?>>510 - 550 (USD)</option>
					<option value = "560" <?php if($monthlyincome == "560"){echo "selected = 'selected'";} ?>>Above 560 (USD)</option>
				</select>



				<p><label for="religion"><strong>Religion</strong></label>
				<select name = "religion">
				<option value ="0">--Select--</option>
				<optgroup label="Islam">
					
					<option value = "1" <?php if($religion == "1"){echo "selected = 'selected'";} ?>>Islam</option>
					<option value = "2" <?php if($religion == "2"){echo "selected = 'selected'";} ?>>Islam =>Sunni</option>
					<option value = "3" <?php if($religion == "3"){echo "selected = 'selected'";} ?>>Islam =>Tijaniya</option>
					<option value = "4" <?php if($religion == "4"){echo "selected = 'selected'";} ?>>Islam =>Ahmadiya</option>	
					<option value = "5" <?php if($religion == "5"){echo "selected = 'selected'";} ?>>Islam =>Shia</option>
					<option value = "6" <?php if($religion == "6"){echo "selected = 'selected'";} ?>>Islam =>Suffi</option>
					
				</optgroup>
				<optgroup label="Christianity">
					<option value = "7" <?php if($religion == "7"){echo "selected = 'selected'";} ?>>Christian</option>
					<option value = "8" <?php if($religion == "8"){echo "selected = 'selected'";} ?>>Christian =>Catholic</option>
					<option value = "9" <?php if($religion == "9"){echo "selected = 'selected'";} ?>>Christian =>Methodist</option>	
					<option value = "10" <?php if($religion == "10"){echo "selected = 'selected'";} ?>>Christian =>Presby</option>
					<option value = "11" <?php if($religion == "11"){echo "selected = 'selected'";} ?>>Christian =>S.D.A.</option>
				</optgroup>
				<optgroup label="Others">
					<option value = "12" <?php if($religion == "12"){echo "selected = 'selected'";} ?>>Budhist</option>
					<option value = "13" <?php if($religion == "13"){echo "selected = 'selected'";} ?>>Hindu</option>
					<option value = "14" <?php if($religion == "14"){echo "selected = 'selected'";} ?>>Atheist</option>	
					<option value = "15" <?php if($religion == "15"){echo "selected = 'selected'";} ?>>Traditionalist/Africanist</option>
					<option value = "16" <?php if($religion == "16"){echo "selected = 'selected'";} ?>>Judaism</option>
				</optgroup>
				</select></p>
				
				
				<p><label><strong>Religious Nature</strong></label><br>
				<select name = "religious_nature">
					<option value = "0">--Select--</option>
					<option value = "1" <?php if($religious_nature == "1"){echo "selected = 'selected'";} ?>>Not religious</option>
					<option value = "2" <?php if($religious_nature == "2"){echo "selected = 'selected'";} ?>>Somewhat religious</option>
					<option value = "3" <?php if($religious_nature == "3"){echo "selected = 'selected'";} ?>>Moderately religious</option>
					<option value = "4" <?php if($religious_nature == "4"){echo "selected = 'selected'";} ?>>Very religious</option>
				</select></p>


				<p><strong>Ethnicity</strong>
				<select name = "ethnicity" id="ethnicity">
					<option value = "0">--Select--</option>
					<option value = "1" <?php if($ethnicity == "1"){echo "selected = 'selected'";} ?>>Asante</option>
					<option value = "2" <?php if($ethnicity == "2"){echo "selected = 'selected'";} ?>>Chamanaa</option>
					<option value = "3" <?php if($ethnicity == "3"){echo "selected = 'selected'";} ?>>Dagomba</option>
					<option value = "4" <?php if($ethnicity == "4"){echo "selected = 'selected'";} ?>>Ewe</option>				
					<option value = "5" <?php if($ethnicity == "5"){echo "selected = 'selected'";} ?>>Fante</option>	
					<option value = "6" <?php if($ethnicity == "6"){echo "selected = 'selected'";} ?>>Frafra</option>
					<option value = "7" <?php if($ethnicity == "7"){echo "selected = 'selected'";} ?>>Fulani</option>
					<option value = "8" <?php if($ethnicity == "8"){echo "selected = 'selected'";} ?>>Kotokoli</option>
					<option value = "9" <?php if($ethnicity == "9"){echo "selected = 'selected'";} ?>>Ga</option>				
					<option value = "10" <?php if($ethnicity == "10"){echo "selected = 'selected'";} ?>>Gonja</option>				
					<option value = "11" <?php if($ethnicity == "11"){echo "selected = 'selected'";} ?>>Gurunsi</option>				
					<option value = "12" <?php if($ethnicity == "12"){echo "selected = 'selected'";} ?>>Hausa</option>
					<option value = "13" <?php if($ethnicity == "13"){echo "selected = 'selected'";} ?>>Mamprusi</option>			
					<option value = "14" <?php if($ethnicity == "14"){echo "selected = 'selected'";} ?>>Mossi</option>
					<option value = "15" <?php if($ethnicity == "15"){echo "selected = 'selected'";} ?>>Sisala</option>
					<option value = "16" <?php if($ethnicity == "16"){echo "selected = 'selected'";} ?>>Waala</option>			
					<option value = "17" <?php if($ethnicity == "17"){echo "selected = 'selected'";} ?>>Other</option>
				</select>
				
				<p><label for="specifyother"><strong>Specify Other</strong></label><br>
				<input type = "text" name = "specifyother" maxlength = "50" id="specifyOther" value="<?php if(isset($specifyother)){echo $specifyother;}?>"/></p>
				

														
							
					

						<p><label for="country" class="label"><strong>Country Living In</strong></label>
						<select name="country" id="country">
						<option value="63" <?php if($country == "63"){echo "selected = 'selected'";} ?>>Ghana</option>
						<option value="1" <?php if($country == "1"){echo "selected = 'selected'";} ?>>Afghanistan</option>
						<option value="2" <?php if($country == "2"){echo "selected = 'selected'";} ?>>Albania</option>
						<option value="3" <?php if($country == "3"){echo "selected = 'selected'";} ?>>Algeria</option>
						<option value="4" <?php if($country == "4"){echo "selected = 'selected'";} ?>>Andorra</option>
						<option value="5" <?php if($country == "5"){echo "selected = 'selected'";} ?>>Angola</option>
						<option value="6" <?php if($country == "6"){echo "selected = 'selected'";} ?>>Antigua and arbuda</option>
						<option value="7" <?php if($country == "7"){echo "selected = 'selected'";} ?>>Argentina</option>
						<option value="8" <?php if($country == "8"){echo "selected = 'selected'";} ?>>Armenia</option>
						<option value="9" <?php if($country == "9"){echo "selected = 'selected'";} ?>>Australia</option>
						<option value="10" <?php if($country == "10"){echo "selected = 'selected'";} ?>>Austria</option>
						<option value="11" <?php if($country == "11"){echo "selected = 'selected'";} ?>>Azerbaijan</option>
						<option value="12" <?php if($country == "12"){echo "selected = 'selected'";} ?>>Bahamas</option>
						<option value="13" <?php if($country == "13"){echo "selected = 'selected'";} ?>>Bahrain</option>
						<option value="14" <?php if($country == "14"){echo "selected = 'selected'";} ?>>Bangladesh</option>
						<option value="15" <?php if($country == "15"){echo "selected = 'selected'";} ?>>Barbados</option>
						<option value="16" <?php if($country == "16"){echo "selected = 'selected'";} ?>>Belarus</option>
						<option value="17" <?php if($country == "17"){echo "selected = 'selected'";} ?>>Belgium</option>
						<option value="18" <?php if($country == "18"){echo "selected = 'selected'";} ?>>Belize</option>
						<option value="19" <?php if($country == "19"){echo "selected = 'selected'";} ?>>Benin</option>
						<option value="20" <?php if($country == "20"){echo "selected = 'selected'";} ?>>Bhutan</option>
						<option value="21" <?php if($country == "21"){echo "selected = 'selected'";} ?>>Bolivia</option>
						<option value="22" <?php if($country == "22"){echo "selected = 'selected'";} ?>>Bosnia and Herzegovina</option>
						<option value="23" <?php if($country == "23"){echo "selected = 'selected'";} ?>>Botswana</option>
						<option value="24" <?php if($country == "24"){echo "selected = 'selected'";} ?>>Brazil</option>
						<option value="25" <?php if($country == "25"){echo "selected = 'selected'";} ?>>Brunei</option>
						<option value="26" <?php if($country == "26"){echo "selected = 'selected'";} ?>>Bulgaria</option>
						<option value="27" <?php if($country == "27"){echo "selected = 'selected'";} ?>>Burkina Faso</option>
						<option value="28" <?php if($country == "28"){echo "selected = 'selected'";} ?>>Burma</option>
						<option value="29" <?php if($country == "29"){echo "selected = 'selected'";} ?>>Burundi</option>
						<option value="183" <?php if($country == "183"){echo "selected = 'selected'";} ?>>Cabo Verde</option>
						<option value="30" <?php if($country == "30"){echo "selected = 'selected'";} ?>>Cambodia</option>
						<option value="31" <?php if($country == "31"){echo "selected = 'selected'";} ?>>Cameroon</option>
						<option value="32" <?php if($country == "32"){echo "selected = 'selected'";} ?>>Canada</option>
						<option value="33" <?php if($country == "33"){echo "selected = 'selected'";} ?>>Central African Republic</option>
						<option value="34" <?php if($country == "34"){echo "selected = 'selected'";} ?>>Chad</option>
						<option value="35"<?php if($country == "35"){echo "selected = 'selected'";} ?>>Chile</option>
						<option value="36" <?php if($country == "36"){echo "selected = 'selected'";} ?>>China</option>
						<option value="37" <?php if($country == "37"){echo "selected = 'selected'";} ?>>Colombia</option>
						<option value="38" <?php if($country == "38"){echo "selected = 'selected'";} ?>>Comoros</option>
						<option value="39" <?php if($country == "39"){echo "selected = 'selected'";} ?>>Congo</option>
						<option value="40" <?php if($country == "40"){echo "selected = 'selected'";} ?>>Costa Rica</option>
						<option value="41" <?php if($country == "41"){echo "selected = 'selected'";} ?>>Croatia</option>
						<option value="42" <?php if($country == "42"){echo "selected = 'selected'";} ?>>Cuba</option>
						<option value="43" <?php if($country == "43"){echo "selected = 'selected'";} ?>>Cyprus</option>
						<option value="44" <?php if($country == "44"){echo "selected = 'selected'";} ?>>Czech Republic</option>
						<option value="45" <?php if($country == "45"){echo "selected = 'selected'";} ?>>Dem Rep of Congo</option>
						<option value="46" <?php if($country == "46"){echo "selected = 'selected'";} ?>>Denmark</option>
						<option value="47" <?php if($country == "47"){echo "selected = 'selected'";} ?>>Djibouti</option>
						<option value="48" <?php if($country == "48"){echo "selected = 'selected'";} ?>>Dominican Republic</option>
						<option value="49" <?php if($country == "49"){echo "selected = 'selected'";} ?>>Ecuador</option>
						<option value="50" <?php if($country == "50"){echo "selected = 'selected'";} ?>>Egypt</option>
						<option value="51" <?php if($country == "51"){echo "selected = 'selected'";} ?>>El Salvador</option>
						<option value="52" <?php if($country == "52"){echo "selected = 'selected'";} ?>>Equatorial Guinea</option>
						<option value="53" <?php if($country == "53"){echo "selected = 'selected'";} ?>>Eritrea</option>
						<option value="54" <?php if($country == "54"){echo "selected = 'selected'";} ?>>Estonia</option>
						<option value="55" <?php if($country == "55"){echo "selected = 'selected'";} ?>>Ethiopia</option>
						<option value="56" <?php if($country == "56"){echo "selected = 'selected'";} ?>>Fiji</option>
						<option value="57" <?php if($country == "57"){echo "selected = 'selected'";} ?>>Finland</option>
						<option value="58" <?php if($country == "58"){echo "selected = 'selected'";} ?>>France</option>
						<option value="59" <?php if($country == "59"){echo "selected = 'selected'";} ?>>Gabon</option>
						<option value="60" <?php if($country == "60"){echo "selected = 'selected'";} ?>>Gambia</option>
						<option value="61" <?php if($country == "61"){echo "selected = 'selected'";} ?>>Georgia</option>
						<option value="62" <?php if($country == "62"){echo "selected = 'selected'";} ?>>Germany</option>

						<option value="64" <?php if($country == "64"){echo "selected = 'selected'";} ?>>Greece</option>
						<option value="65" <?php if($country == "65"){echo "selected = 'selected'";} ?>>Greenland</option>
						<option value="66" <?php if($country == "66"){echo "selected = 'selected'";} ?>>Grenada</option>
						<option value="67" <?php if($country == "67"){echo "selected = 'selected'";} ?>>Guatemala</option>
						<option value="69" <?php if($country == "69"){echo "selected = 'selected'";} ?>>Guinea</option>
						<option value="68" <?php if($country == "68"){echo "selected = 'selected'";} ?>>Guinea-Bissau</option>
						<option value="70" <?php if($country == "70"){echo "selected = 'selected'";} ?>>Guyana</option>
						<option value="71" <?php if($country == "71"){echo "selected = 'selected'";} ?>>Haiti</option>
						<option value="72" <?php if($country == "72"){echo "selected = 'selected'";} ?>>Honduras</option>
						<option value="73" <?php if($country == "73"){echo "selected = 'selected'";} ?>>Hong Kong</option>
						<option value="74" <?php if($country == "74"){echo "selected = 'selected'";} ?>>Hungary</option>
						<option value="75" <?php if($country == "75"){echo "selected = 'selected'";} ?>>Iceland</option>
						<option value="76" <?php if($country == "76"){echo "selected = 'selected'";} ?>>India</option>
						<option value="77" <?php if($country == "77"){echo "selected = 'selected'";} ?>>Indonesia</option>
						<option value="78" <?php if($country == "78"){echo "selected = 'selected'";} ?>>Iran</option>
						<option value="79" <?php if($country == "79"){echo "selected = 'selected'";} ?>>Iraq</option>
						<option value="80" <?php if($country == "80"){echo "selected = 'selected'";} ?>>Ireland</option>
						<option value="81" <?php if($country == "81"){echo "selected = 'selected'";} ?>>Israel</option>
						<option value="82" <?php if($country == "82"){echo "selected = 'selected'";} ?>>Italy</option>
						<option value="83" <?php if($country == "83"){echo "selected = 'selected'";} ?>>Ivory Coast</option>
						<option value="84" <?php if($country == "84"){echo "selected = 'selected'";} ?>>Jamaica</option>
						<option value="85" <?php if($country == "85"){echo "selected = 'selected'";} ?>>Japan</option>
						<option value="86" <?php if($country == "86"){echo "selected = 'selected'";} ?>>Jordan</option>
						<option value="87" <?php if($country == "87"){echo "selected = 'selected'";} ?>>Kazakhstan</option>
						<option value="88" <?php if($country == "88"){echo "selected = 'selected'";} ?>>Kenya</option>
						<option value="89" <?php if($country == "89"){echo "selected = 'selected'";} ?>>Kuwait</option>
						<option value="90" <?php if($country == "90"){echo "selected = 'selected'";} ?>>Kyrgyzstan</option>
						<option value="91" <?php if($country == "91"){echo "selected = 'selected'";} ?>>Laos</option>
						<option value="92" <?php if($country == "92"){echo "selected = 'selected'";} ?>>Latvia</option>
						<option value="93" <?php if($country == "93"){echo "selected = 'selected'";} ?>>Lebanon</option>
						<option value="94" <?php if($country == "94"){echo "selected = 'selected'";} ?>>Liberia</option>
						<option value="95" <?php if($country == "95"){echo "selected = 'selected'";} ?>>Libya</option>
						<option value="96" <?php if($country == "96"){echo "selected = 'selected'";} ?>>Liechtenstein</option>
						<option value="97" <?php if($country == "97"){echo "selected = 'selected'";} ?>>Lithuania</option>
						<option value="98" <?php if($country == "98"){echo "selected = 'selected'";} ?>>Luxembourg</option>
						<option value="99" <?php if($country == "99"){echo "selected = 'selected'";} ?>>Macau</option>
						<option value="100" <?php if($country == "100"){echo "selected = 'selected'";} ?>>Macedonia</option>
						<option value="101" <?php if($country == "101"){echo "selected = 'selected'";} ?>>Madagascar</option>
						<option value="102" <?php if($country == "102"){echo "selected = 'selected'";} ?>>Malawi</option>
						<option value="103" <?php if($country == "103"){echo "selected = 'selected'";} ?>>Malaysia</option>
						<option value="104" <?php if($country == "104"){echo "selected = 'selected'";} ?>>Maldives</option>
						<option value="105" <?php if($country == "105"){echo "selected = 'selected'";} ?>>Mali</option>
						<option value="106" <?php if($country == "106"){echo "selected = 'selected'";} ?>>Malta</option>
						<option value="107" <?php if($country == "107"){echo "selected = 'selected'";} ?>>Mauritania</option>
						<option value="108" <?php if($country == "108"){echo "selected = 'selected'";} ?>>Mauritius</option>
						<option value="109" <?php if($country == "109"){echo "selected = 'selected'";} ?>>Mexico</option>
						<option value="110" <?php if($country == "110"){echo "selected = 'selected'";} ?>>Micronesia</option>
						<option value="111" <?php if($country == "111"){echo "selected = 'selected'";} ?>>Moldova</option>
						<option value="112" <?php if($country == "112"){echo "selected = 'selected'";} ?>>Monaco</option>
						<option value="113" <?php if($country == "113"){echo "selected = 'selected'";} ?>>Mongolia</option>
						<option value="114" <?php if($country == "114"){echo "selected = 'selected'";} ?>>Morocco</option>
						<option value="115" <?php if($country == "115"){echo "selected = 'selected'";} ?>>Mozambique</option>
						<option value="116" <?php if($country == "116"){echo "selected = 'selected'";} ?>>Namibia</option>
						<option value="117" <?php if($country == "117"){echo "selected = 'selected'";} ?>>Nepal</option>
						<option value="118" <?php if($country == "118"){echo "selected = 'selected'";} ?>>Netherlands</option>
						<option value="119" <?php if($country == "119"){echo "selected = 'selected'";} ?>>New Zealand</option>
						<option value="120" <?php if($country == "120"){echo "selected = 'selected'";} ?>>Nicaragua</option>
						<option value="121" <?php if($country == "121"){echo "selected = 'selected'";} ?>>Niger</option>
						<option value="122" <?php if($country == "122"){echo "selected = 'selected'";} ?>>Nigeria</option>
						<option value="123" <?php if($country == "123"){echo "selected = 'selected'";} ?>>North Korea</option>
						<option value="124" <?php if($country == "124"){echo "selected = 'selected'";} ?>>Norway</option>
						<option value="125" <?php if($country == "125"){echo "selected = 'selected'";} ?>>Oman</option>
						<option value="126" <?php if($country == "126"){echo "selected = 'selected'";} ?>>Pakistan</option>
						<option value="182" <?php if($country == "182"){echo "selected = 'selected'";} ?>>Palestine</option>
						<option value="127" <?php if($country == "127"){echo "selected = 'selected'";} ?>>Panama</option>
						<option value="128" <?php if($country == "128"){echo "selected = 'selected'";} ?>>Papua New Guinea</option>
						<option value="129" <?php if($country == "129"){echo "selected = 'selected'";} ?>>Paraguay</option>
						<option value="130" <?php if($country == "130"){echo "selected = 'selected'";} ?>>Peru</option>
						<option value="131" <?php if($country == "131"){echo "selected = 'selected'";} ?>>Philippines</option>
						<option value="132" <?php if($country == "132"){echo "selected = 'selected'";} ?>>Poland</option>
						<option value="133" <?php if($country == "133"){echo "selected = 'selected'";} ?>>Portugal</option>
						<option value="134" <?php if($country == "134"){echo "selected = 'selected'";} ?>>Puerto Rico</option>
						<option value="135" <?php if($country == "135"){echo "selected = 'selected'";} ?>>Qatar</option>
						<option value="136" <?php if($country == "136"){echo "selected = 'selected'";} ?>>Romania</option>
						<option value="137" <?php if($country == "137"){echo "selected = 'selected'";} ?>>Russian Federation</option>
						<option value="138" <?php if($country == "138"){echo "selected = 'selected'";} ?>>Rwanda</option>
						<option value="139" <?php if($country == "139"){echo "selected = 'selected'";} ?>>Sao Tome</option>
						<option value="140" <?php if($country == "140"){echo "selected = 'selected'";} ?>>Saudi Arabia</option>
						<option value="141" <?php if($country == "141"){echo "selected = 'selected'";} ?>>Senegal</option>
						<option value="142" <?php if($country == "142"){echo "selected = 'selected'";} ?>>Serbia</option>
						<option value="143" <?php if($country == "143"){echo "selected = 'selected'";} ?>>Sierra Leone</option>
						<option value="144" <?php if($country == "144"){echo "selected = 'selected'";} ?>>Singapore</option>
						<option value="145" <?php if($country == "145"){echo "selected = 'selected'";} ?>>Slovak Republic</option>
						<option value="146" <?php if($country == "146"){echo "selected = 'selected'";} ?>>Slovenia</option>
						<option value="147" <?php if($country == "147"){echo "selected = 'selected'";} ?>>Solomon Islands</option>
						<option value="148" <?php if($country == "148"){echo "selected = 'selected'";} ?>>Somalia</option>
						<option value="149" <?php if($country == "149"){echo "selected = 'selected'";} ?>>South Africa</option>
						<option value="150" <?php if($country == "150"){echo "selected = 'selected'";} ?>>South Korea</option>
						<option value="151" <?php if($country == "151"){echo "selected = 'selected'";} ?>>Spain</option>
						<option value="152" <?php if($country == "152"){echo "selected = 'selected'";} ?>>Sri Lanka</option>
						<option value="153" <?php if($country == "153"){echo "selected = 'selected'";} ?>>Sudan</option>
						<option value="154" <?php if($country == "154"){echo "selected = 'selected'";} ?>>Suriname</option>
						<option value="155" <?php if($country == "155"){echo "selected = 'selected'";} ?>>Swaziland</option>
						<option value="156" <?php if($country == "156"){echo "selected = 'selected'";} ?>>Sweden</option>
						<option value="157" <?php if($country == "157"){echo "selected = 'selected'";} ?>>Switzerland</option>
						<option value="158" <?php if($country == "158"){echo "selected = 'selected'";} ?>>Syria</option>
						<option value="159" <?php if($country == "159"){echo "selected = 'selected'";} ?>>Taiwan</option>
						<option value="160" <?php if($country == "160"){echo "selected = 'selected'";} ?>>Tajikistan</option>
						<option value="161" <?php if($country == "161"){echo "selected = 'selected'";} ?>>Tanzania</option>
						<option value="162" <?php if($country == "162"){echo "selected = 'selected'";} ?>>Thailand</option>
						<option value="163" <?php if($country == "163"){echo "selected = 'selected'";} ?>>Togo</option>
						<option value="164" <?php if($country == "164"){echo "selected = 'selected'";} ?>>Tunisia</option>
						<option value="165" <?php if($country == "165"){echo "selected = 'selected'";} ?>>Turkey</option>
						<option value="166" <?php if($country == "166"){echo "selected = 'selected'";} ?>>Turkmenistan</option>
						<option value="167" <?php if($country == "167"){echo "selected = 'selected'";} ?>>Uganda</option>
						<option value="168" <?php if($country == "168"){echo "selected = 'selected'";} ?>>Ukraine</option>
						<option value="169" <?php if($country == "169"){echo "selected = 'selected'";} ?>>United Arab Emirates</option>
						<option value="170" <?php if($country == "170"){echo "selected = 'selected'";} ?>>United Kingdom</option>
						<option value="171" <?php if($country == "171"){echo "selected = 'selected'";} ?>>United States</option>
						<option value="172" <?php if($country == "172"){echo "selected = 'selected'";} ?>>Uruguay</option>
						<option value="173" <?php if($country == "173"){echo "selected = 'selected'";} ?>>Uzbekistan</option>
						<option value="174" <?php if($country == "174"){echo "selected = 'selected'";} ?>>Venezuela</option>
						<option value="175" <?php if($country == "175"){echo "selected = 'selected'";} ?>>Vietnam</option>
						<option value="176" <?php if($country == "176"){echo "selected = 'selected'";} ?>>Western Samoa</option>
						<option value="177" <?php if($country == "177"){echo "selected = 'selected'";} ?>>Yemen</option>
						<option value="178" <?php if($country == "178"){echo "selected = 'selected'";} ?>>Yugoslavia</option>
						<option value="179" <?php if($country == "179"){echo "selected = 'selected'";} ?>>Zaire</option>
						<option value="180" <?php if($country == "180"){echo "selected = 'selected'";} ?>>Zambia</option>
						<option value="181" <?php if($country == "181"){echo "selected = 'selected'";} ?>>Zimbabwe</option>
					</select></p>
					
					<p><label for="state"><strong>State</strong></label><input type="text" name="state" id="state" maxlength="15" value="<?php ?>"/></p>
					<!--region living in -->
					<p ><label for="region" class="label"><strong>Region Living In</strong></label>
					<select name="region" id="region">
						<option value = "0">--Select--</option>					
						<option value = "1" <?php if($region == "1"){echo "selected = 'selected'";} ?>>Ashanti</option>
						<option value = "2" <?php if($region == "2"){echo "selected = 'selected'";} ?>>Brong Ahafo</option>
						<option value = "3" <?php if($region == "3"){echo "selected = 'selected'";} ?>>Central</option>
						<option value = "4" <?php if($region == "4"){echo "selected = 'selected'";} ?>>Eastern</option>
						<option value = "5" <?php if($region == "5"){echo "selected = 'selected'";} ?>>Greater Accra</option>
						<option value = "6" <?php if($region == "6"){echo "selected = 'selected'";} ?>>Northern</option>
						<option value = "7" <?php if($region == "7"){echo "selected = 'selected'";} ?>>Upper East</option>
						<option value = "8" <?php if($region == "8"){echo "selected = 'selected'";} ?>>Upper West</option>
						<option value = "9" <?php if($region == "9"){echo "selected = 'selected'";} ?>>Volta</option>
						<option value = "10" <?php if($region == "10"){echo "selected = 'selected'";} ?>>Western</option>
					</select></p>


							<button type="button" class="cancelbtn"><a href="<?php echo $_SERVER['PHP_SELF'];?>">Cancel</a></button><button type="submit" name="save_profile">Save</button>
							

						</div>

						
						</form>
						<?php } ?>
					</div>







					<p class="hide_for_non_mobile" style="color:white;margin-top:50px;border-top:5px solid #ccc;">.</p>
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

	$(document).on('click','.skin', function(){
		var skin = $(this).attr("id");
		
		if(skin == "skin1"){
			$("#skin1").css({"border":"5px solid red"});
			$("#skin2").css({"border":"0 solid red"});
			$("#skin3").css({"border":"0 solid red"});
			$("#skin4").css({"border":"0 solid red"});
			$("#skin5").css({"border":"0 solid red"});
			$("#skin6").css({"border":"0 solid red"});
		}else if(skin == "skin2"){
			$("#skin1").css({"border":"0px solid red"});
			$("#skin2").css({"border":"5px solid red"});
			$("#skin3").css({"border":"0 solid red"});
			$("#skin4").css({"border":"0 solid red"});
			$("#skin5").css({"border":"0 solid red"});
			$("#skin6").css({"border":"0 solid red"});
			
		}else if(skin == "skin3"){
			$("#skin1").css({"border":"0px solid red"});
			$("#skin2").css({"border":"0px solid red"});
			$("#skin3").css({"border":"3px solid red"});
			$("#skin4").css({"border":"0 solid red"});
			$("#skin5").css({"border":"0 solid red"});
			$("#skin6").css({"border":"0 solid red"});
			
		}else if(skin == "skin4"){
			$("#skin1").css({"border":"0px solid red"});
			$("#skin2").css({"border":"0px solid red"});
			$("#skin3").css({"border":"0 solid red"});
			$("#skin4").css({"border":"5px solid red"});
			$("#skin5").css({"border":"0 solid red"});
			$("#skin6").css({"border":"0 solid red"});
			
		}else if(skin == "skin5"){
			$("#skin1").css({"border":"0px solid red"});
			$("#skin2").css({"border":"0px solid red"});
			$("#skin3").css({"border":"0 solid red"});
			$("#skin4").css({"border":"0 solid red"});
			$("#skin5").css({"border":"5px solid red"});
			$("#skin6").css({"border":"0 solid red"});
			
		}else if(skin == "skin6"){
			$("#skin1").css({"border":"0px solid red"});
			$("#skin2").css({"border":"0px solid red"});
			$("#skin3").css({"border":"0 solid red"});
			$("#skin4").css({"border":"0 solid red"});
			$("#skin5").css({"border":"0 solid red"});
			$("#skin6").css({"border":"6px solid red"});
			
		}
		
		
		
		
		
		
	})
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
