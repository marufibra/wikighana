<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/include/pop-up-chat.php")

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/profile-public.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Profile - Public - Wiki Ghana</title>
		<link rel="canonical" href="/profile.php">
		
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");
				
				$user_id = "";
				if(isset($_SESSION["user_type"])){
					if($_SESSION["user_type"] != "visitor"){
						// die(header("Location: /"));
					}else{
						$user_id=$_SESSION["user_id"];
					}
				}else{
					// die(header("Location: /"));
				}
				

				if(isset($_GET["id"])){
					$user_id_friend = $_GET["id"];
					$_SESSION["user_id_friend"] = $user_id_friend;
				}elseif(isset($_GET["username"])){
					$query = "SELECT `user_id` FROM `wiki_visitors` WHERE `username` = '{$_GET['username']}'";
					$run = mysqli_query($connection, $query);
					if(mysqli_num_rows($run) > 0){
						$row = mysqli_fetch_assoc($run);
						$user_id_friend = $row["user_id"];
						$_SESSION["user_id_friend"] = $user_id_friend;
					}
				}elseif(isset($_GET["photos"])){
					$user_id_friend = $_GET["photos"];
				}elseif(isset($_GET["friends"])){
					$user_id_friend = $_GET["friends"];
				}

				if($user_id_friend == $user_id){
					
					die(header("Location: /profile.php"));
					
				}




				?>
			<div class="content_flex">
				<div class="content">
					
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="#">Profile</a></div>
					


					<div class="login">
						
<?php
//initialize variables
	
	
	$UpdateStatus = "";
	$current_profile_photo = "";
	$current_cover_photo = "";
	$interval_y = 0;
	$interval_m = 0;
	$interval_d = 0;
	$interval_days = 0; //show total amount of days
	$interval_h = 0;
	$interval_i = 10;

	
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
	$profession = "";
	$monthlyincome = 0;
	$religion = 0;
	$religious_nature = 0;
	$ethnicity = "";
	$specifyother = "";
	$hometown = "";
	$employedin = 0;
	$update = "";
	$insert = "";








	$query = "SELECT * FROM `wiki_dating_profile` WHERE `id` = '$user_id_friend'";
	$run = mysqli_query($connection, $query);
	if(mysqli_num_rows($run) > 0){

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
		
		if($country=="1"){$country_c="Afghanistan";}elseif($country=="2"){$country_c="Albania";}elseif($country=="3"){$country_c="Algeria";}elseif($country=="4"){$country_c="Andorra";}elseif($country=="5"){$country_c="Angola";}elseif($country=="6"){$country_c="Antigua and arbuda";}elseif($country=="7"){$country_c="Argentina";}elseif($country=="8"){$country_c="Armenia";}elseif($country=="9"){$country_c="Australia";}elseif($country=="10"){$country_c="Austria";}elseif($country=="11"){$country_c="Azerbaijan";}elseif($country=="12"){$country_c="Bahamas";}elseif($country=="13"){$country_c="Bahrain";}elseif($country=="14"){$country_c="Bangladesh";}elseif($country=="15"){$country_c="Barbados";}elseif($country=="16"){$country_c="Belarus";}elseif($country=="17"){$country_c="Belgium";}elseif($country=="18"){$country_c="Belize";}elseif($country=="19"){$country_c="Benin";}elseif($country=="20"){$country_c="Bhutan";}elseif($country=="21"){$country_c="Bolivia";}elseif($country=="22"){$country_c="Bosnia and Herzegovina";}elseif($country=="23"){$country_c="Botswana";}elseif($country=="24"){$country_c="Brazil";}elseif($country=="25"){$country_c="Brunei";}elseif($country=="26"){$country_c="Bulgaria";}elseif($country=="27"){$country_c="Burkina Faso";}elseif($country=="28"){$country_c="Burma";}elseif($country=="29"){$country_c="Burundi";}elseif($country=="183"){$country_c="Cabo Verde";}elseif($country=="30"){$country_c="Cambodia";}elseif($country=="31"){$country_c="Cameroon";}elseif($country=="32"){$country_c="Canada";}elseif($country=="33"){$country_c="Central African Republic";}elseif($country=="34"){$country_c="Chad";}elseif($country=="35"){$country_c="Chile";}elseif($country=="36"){$country_c="China";}elseif($country=="37"){$country_c="Colombia";}elseif($country=="38"){$country_c="Comoros";}elseif($country=="39"){$country_c="Congo";}elseif($country=="40"){$country_c="Costa Rica";}elseif($country=="41"){$country_c="Croatia";}elseif($country=="42"){$country_c="Cuba";}elseif($country=="43"){$country_c="Cyprus";}elseif($country=="44"){$country_c="Czech Republic";}elseif($country=="45"){$country_c="Dem Rep of Congo";}elseif($country=="46"){$country_c="";}elseif($country=="47"){$country_c="Denmark";}elseif($country=="48"){$country_c="Dominican Republic";}elseif($country=="49"){$country_c="Ecuador";}elseif($country=="50"){$country_c="Egypt";}elseif($country=="51"){$country_c="El Salvador";}elseif($country=="52"){$country_c="Equatorial Guinea";}elseif($country=="53"){$country_c="Eritrea";}elseif($country=="54"){$country_c="Estonia";}elseif($country=="55"){$country_c="Ethiopia";}elseif($country=="56"){$country_c="Fiji";}elseif($country=="57"){$country_c="Finland";}elseif($country=="58"){$country_c="France";}elseif($country=="59"){$country_c="Gabon";}elseif($country=="60"){$country_c="Gambia";}elseif($country=="61"){$country_c="Georgia";}elseif($country=="62"){$country_c="Germany";}elseif($country=="63"){$country_c="Ghana";}elseif($country=="64"){$country_c="Greece";}elseif($country=="65"){$country_c="Greenland";}elseif($country=="66"){$country_c="Grenada";}elseif($country=="67"){$country_c="Guatemala";}elseif($country=="68"){$country_c="Guinea-Bissau";}elseif($country=="69"){$country_c="Guinea";}elseif($country=="70"){$country_c="Guyana";}elseif($country=="71"){$country_c="Haiti";}elseif($country=="72"){$country_c="Honduras";}elseif($country=="73"){$country_c="Hong Kong";}elseif($country=="74"){$country_c="Hungary";}elseif($country=="75"){$country_c="Iceland";}elseif($country=="76"){$country_c="India";}elseif($country=="77"){$country_c="Indonesia";}elseif($country=="78"){$country_c="Iran";}elseif($country=="79"){$country_c="Iraq";}elseif($country=="80"){$country_c="Ireland";}elseif($country=="81"){$country_c="Israel";}elseif($country=="82"){$country_c="Italy";}elseif($country=="83"){$country_c="Ivory Coast";}elseif($country=="84"){$country_c="Jamaica";}elseif($country=="85"){$country_c="Japan";}elseif($country=="86"){$country_c="Jordan";}elseif($country=="87"){$country_c="Kazakhstan";}elseif($country=="88"){$country_c="Kenya";}elseif($country=="89"){$country_c="Kuwait";}elseif($country=="90"){$country_c="Kyrgyzstan";}elseif($country=="91"){$country_c="Laos";}elseif($country=="92"){$country_c="Latvia";}elseif($country=="93"){$country_c="Lebanon";}elseif($country=="94"){$country_c="Liberia";}elseif($country=="95"){$country_c="Libya";}elseif($country=="96"){$country_c="Liechtenstein";}elseif($country=="97"){$country_c="Lithuania";}elseif($country=="98"){$country_c="Luxembourg";}elseif($country=="99"){$country_c="Macau";}elseif($country=="100"){$country_c="Macedonia";}elseif($country=="101"){$country_c="Madagascar";}elseif($country=="102"){$country_c="Malawi";}elseif($country=="103"){$country_c="Malaysia";}elseif($country=="104"){$country_c="Maldives";}elseif($country=="105"){$country_c="Mali";}elseif($country=="106"){$country_c="Malta";}elseif($country=="107"){$country_c="Mauritania";}elseif($country=="108"){$country_c="Mauritius";}elseif($country=="109"){$country_c="Mexico";}elseif($country=="110"){$country_c="Micronesia";}elseif($country=="111"){$country_c="Moldova";}elseif($country=="112"){$country_c="Monaco";}elseif($country=="113"){$country_c="Mongolia";}elseif($country=="114"){$country_c="Morocco";}elseif($country=="115"){$country_c="Mozambique";}elseif($country=="116"){$country_c="Namibia";}elseif($country=="117"){$country_c="Nepal";}elseif($country=="118"){$country_c="Netherlands";}elseif($country=="119"){$country_c="New Zealand";}elseif($country=="120"){$country_c="Nicaragua";}elseif($country=="121"){$country_c="Niger";}elseif($country=="122"){$country_c="Nigeria";}elseif($country=="123"){$country_c="North Korea";}elseif($country=="124"){$country_c="Norway";}elseif($country=="125"){$country_c="Oman";}elseif($country=="126"){$country_c="Pakistan";}elseif($country=="182"){$country_c="Palestine";}elseif($country=="127"){$country_c="Panama";}elseif($country=="128"){$country_c="Papua New Guinea";}elseif($country=="129"){$country_c="Paraguay";}elseif($country=="130"){$country_c="Peru";}elseif($country=="131"){$country_c="Philippines";}elseif($country=="132"){$country_c="Poland";}elseif($country=="133"){$country_c="Portugal";}elseif($country=="134"){$country_c="Puerto Rico";}elseif($country=="135"){$country_c="Qatar";}elseif($country=="136"){$country_c="Romania";}elseif($country=="137"){$country_c="Russian Federation</";}elseif($country=="138"){$country_c="Rwanda";}elseif($country=="139"){$country_c="Sao Tome";}elseif($country=="140"){$country_c="Saudi Arabia";}elseif($country=="141"){$country_c="Senegal";}elseif($country=="142"){$country_c="Serbia";}elseif($country=="143"){$country_c="Sierra Leone";}elseif($country=="144"){$country_c="Singapore";}elseif($country=="145"){$country_c="Slovak Republic";}elseif($country=="146"){$country_c="Slovenia";}elseif($country=="147"){$country_c="Solomon Islands";}elseif($country=="148"){$country_c="Somalia";}elseif($country=="149"){$country_c="South Africa";}elseif($country=="150"){$country_c="South Korea";}elseif($country=="151"){$country_c="Spain";}elseif($country=="152"){$country_c="Sri Lanka";}elseif($country=="153"){$country_c="Sudan";}elseif($country=="154"){$country_c="Suriname";}elseif($country=="155"){$country_c="Swaziland";}elseif($country=="156"){$country_c="Sweden";}elseif($country=="157"){$country_c="Switzerland";}elseif($country=="158"){$country_c="Syria";}elseif($country=="159"){$country_c="Taiwan";}elseif($country=="160"){$country_c="Tajikistan";}elseif($country=="161"){$country_c="Tanzania";}elseif($country=="162"){$country_c="Thailand";}elseif($country=="163"){$country_c="Togo";}elseif($country=="164"){$country_c="";}elseif($country=="165"){$country_c="Turkey";}elseif($country=="166"){$country_c="Turkmenistan";}elseif($country=="167"){$country_c="Uganda";}elseif($country=="168"){$country_c="Ukraine";}elseif($country=="169"){$country_c="United Arab Emirates";}elseif($country=="170"){$country_c="United Kingdom";}elseif($country=="171"){$country_c="United States";}elseif($country=="172"){$country_c="Uruguay";}elseif($country=="173"){$country_c="Uzbekistan";}elseif($country=="174"){$country_c="Venezuela";}elseif($country=="175"){$country_c="Vietnam";}elseif($country=="176"){$country_c="Western Samoa";}elseif($country=="177"){$country_c="Yemen";}elseif($country=="178"){$country_c="Yugoslavia";}elseif($country=="179"){$country_c="Zaire";}elseif($country=="180"){$country_c="Zambia";}elseif($country=="181"){$country_c="Zimbabwe";}else{$country_c="Ghana";}
	
	}else{
		if(isset($_SESSION["user_id"])){
			die(header("Location: profile.php"));
		}else{
			die(header("Location: /"));
		}
	}


	$query4 = "SELECT `last_activity` FROM `login_details` WHERE `user_id` = {$user_id_friend} ";
	$run4 = mysqli_query($connection,$query4);
	if(mysqli_num_rows($run4)>0){ 
		while($row4 = mysqli_fetch_assoc($run4)){
			
			$datetime = $row4["last_activity"];

			$datetime = strtotime($datetime);
			$datetime1 = date('m/d/Y H:i', $datetime);
			$datetime2 = date('m/d/Y H:i', time());
			
			$date1 = new DateTime($datetime2);
			$date2 = new DateTime($datetime1);
			$interval = $date1->diff($date2);
			$interval_y = $interval->y;
			$interval_m = $interval->m;
			$interval_d = $interval->d;
			$interval_days = $interval->days; //show total amount of days
			$interval_h = $interval->h;
			$interval_i = $interval->i;
			
		}
	}




	$query = "SELECT `img_path` FROM `dating_images` WHERE `user_id` = {$user_id_friend} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
				
	$run = mysqli_query($connection,$query);
	
	if(mysqli_num_rows($run)>0){ 
		$row = mysqli_fetch_assoc($run);
		$current_profile_photo = $row["img_path"];
	
	}

	if($current_profile_photo == ""){
		$_SESSION["current_profile_photo"] = "/img/icons/login.jpg";
	}else{
		$_SESSION["current_profile_photo"] = $current_profile_photo;
	}

	$query = "SELECT `img_path` FROM `dating_images` WHERE `user_id` = {$user_id_friend} AND `is_cover` = 1 AND `updated_date_time_cover` = (SELECT Max(`updated_date_time_cover`) FROM `dating_images` WHERE `is_cover`=1)";
	$run = mysqli_query($connection,$query);
	
	if(mysqli_num_rows($run)>0){ 
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
										
										
										<a href="<?php echo "profile-public.php?id={$user_id_friend}"; ?>" class="edit-profile"><i class="bi bi-person-circle"></i> Profile</a>	
										<a href="<?php echo "profile-public.php?photos={$user_id_friend}#photosdiv"; ?>" class="edit-profile photos"><i class="bi bi-camera-fill"></i> Photos</a>
										
										<a href="<?php echo "profile-public.php?friends={$user_id_friend}#friendsdiv"; ?>" style="display:inline-block;" class="edit-profile friends"><i class="bi bi-people-fill"></i> Friends</a>
										<a href="#posts" class="edit-profile posts"><i class="bi bi-mailbox"></i> Posts</a>

										<!-- <a href="stories.php" class="edit-profile stories"><i class="bi bi-hourglass-split"></i> Posts</a> -->







									</div>

							</div>
						</div>
				
			<div style="clear:both;margin-bottom:0;color:white;" class="hide-on-large-screen">.</div>
			<h1 style="margin-top:0;margin-bottom:20px;text-align:center;font-size:20px;clear:both" class="full-name"><?php echo ucwords($fname) . " " . ucwords($mname) . " " . ucwords($lname) ?>
		
			<?php if($interval_i <= 3 && $interval_d == 0 && $interval_h == 0 && $interval_m == 0 && $interval_y == 0){ ?>
			<img src="/img/icons/online.png" style="width:24px;height:24px;border-radius:12px;text-align:center;margin-left:3px;margin-top:3px;">
			<?php }else{ ?>

			<img src="/img/icons/offline.png" style="width:24px;height:24px;border-radius:12px;text-align:center;margin-left:3px;margin-top:3px;">
			
			<?php 
			} 
			if(!empty($user_id)){
				echo mutual_friends($user_id,$user_id_friend,$connection);
			}
			?>
			
		</h1>
			
			<?php
			$prof_full_name = $fname . " " . $mname . " " . $lname ;
			$_SESSION["fullname"] = substr($fname,0,8) . " " . substr($lname,0,8);
			//checking friendship status
			$user_id_from = "";
			$user_id_to = "";
			$status = "";
			$action_by = "";
			$query = "SELECT * FROM `wiki_friends` WHERE (`user_id_from` = '$user_id_friend' AND `user_id_to` = '$user_id') OR (`user_id_from` = '$user_id' AND `user_id_to` = '$user_id_friend')";
			$run = mysqli_query($connection, $query);
			if(mysqli_num_rows($run) > 0){
				$row = mysqli_fetch_assoc($run);
				$status = $row["status"];
				$action_by = $row["action_by"];
				$user_id_from = $row["user_id_from"];
				$user_id_to = $row["user_id_to"];
				// if($status == 6 AND $action_by == $user_id){
				// 	echo $update = "update";
				// }else{echo $update = $status;}
			}else{
				$insert = "insert";
			}

			if($user_id != ""){
				if($insert == "insert"){//send friend request
					echo "<div class='action' id='insert' style='margin:15px 20px;color:blue;cursor:pointer'>Send Friend Request</div>";
				}elseif($user_id == $user_id_from && $user_id_friend == $user_id_to && $status == 1){
					echo "<div class='action' id='cancelfriendrequest' style='margin:15px 20px;color:blue;cursor:pointer'>Cancel Friend Request</div>";
				}elseif($user_id == $user_id_from && $user_id_friend == $user_id_to && $status == 7){// send friend request
					echo "<div class='action' id='sendfriendrequestagain' style='margin:15px 20px;color:blue;cursor:pointer'>Send Friend Request</div>";
				}elseif($user_id == $user_id_to && $user_id_friend == $user_id_from && $status == 1){
					echo "<div class='action' id='acceptfriendrequest' style='margin:15px 20px;color:blue;cursor:pointer'>Accept Friend Request</div>";
				}elseif((($user_id == $user_id_to && $user_id_friend == $user_id_from) || ($user_id == $user_id_from && $user_id_friend == $user_id_to)) && $status == 2){
					echo "<span user_id_friend='{$user_id_friend}' class='sendmessage chat' id='sendmessage' style='margin:15px 20px;color:blue;cursor:pointer;text-decoration:none;'>Send Message</span>";
				}
			}else{
				echo "<div style='margin:15px 20px;'><a style='color:blue; text-decoration:none;' href='/login.php'>Login here</a> to send friend request</div>";
			}
			?>
			
			
			<div class="display_info_container" style="clear:both;">
				
		
					<p><strong><i class="bi bi-gender-ambiguous"></i> Gender</strong><span class="data_c"><?php echo $gender_c; ?></span></p>
					<p><strong>Date Of Birth</strong><span class="data_c"><?php echo $date_of_birth_c; ?></span></p>
					<!-- <p><strong>Mobile No.</strong><span class="data_c"><?php echo $mobile_no; ?></span></p> -->
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
					
				
			</div> <!-- end of .display_info_container -->
			

<?php
$max_records_photos = 10;//photos to show when page loads for the first time
		$query = "SELECT COUNT(*) AS count_records FROM `dating_images` WHERE  `user_id` = {$user_id_friend}";
		$run = mysqli_query($connection, $query);
		if(mysqli_num_rows($run)>0){ 
			$row = mysqli_fetch_assoc($run);
			$count_records_photos = $row["count_records"];
			if ($count_records_photos > $max_records_photos ){
				if(!isset($_GET["showallphotos"])){
					$show_all_friends = "<div style='clear:both;color:white'>.</div><div style='clear:both;text-align:center;'><a style='color:blue;text-decoration:none;' href='friends.php?showallphotos={$count_records}#friendsdiv'>Show All</a></div>";
				}
			}
		}
		if(isset($_GET["showallphotos"])){
			$max_records_photos = $_GET["showallphotos"];
		}

		echo "<div id='photosdiv' style='background:#ccc;margin:20px 0;padding:5px 10px;'>Photos ({$count_records_photos})</div>";
			$query = "SELECT * FROM `dating_images` WHERE `user_id` = {$user_id_friend} ORDER BY `id` DESC LIMIT $max_records_photos";
					$run = mysqli_query($connection,$query);
					
					if(mysqli_num_rows($run)>0){ 
						
						while($row = mysqli_fetch_assoc($run)){
							$img_id = $row["id"];
							$img_path = $row["img_path"];
							$is_profile = $row["is_profile"];
							$is_cover = $row["is_cover"];
							
						?>
						
						<div class="img_display">
							<img alt="<?php echo "" ?>" src="<?php echo htmlentities($img_path) ?>" class="img_class" id="<?php echo $img_id; ?>" style="width:100%;max-width:300px">
							
						</div>


						<?php
						}
					
					}else{echo "<p>There is no image to show</p>";}
					


			
					

//Friends requested accepted
$show_all_friends = "";
$max_record_friends = 10;
$query = "SELECT COUNT(*) AS count_records FROM `wiki_friends` WHERE (`user_id_from` = {$user_id_friend} OR `user_id_to` = {$user_id_friend}) AND `status` = 2";
$run = mysqli_query($connection, $query);
if(mysqli_num_rows($run)>0){ 
	$row = mysqli_fetch_assoc($run);
	$count_records = $row["count_records"];
	if ($count_records > $max_record_friends ){
		if(!isset($_GET["showallfriends"])){
			$show_all_friends = "<div style='clear:both;color:white'>.</div><div style='clear:both;text-align:center;'><a style='color:blue;text-decoration:none;' href='friends.php?showallfriends={$count_records}#friendsdiv'>Show All</a></div>";
		}
	}
}
if(isset($_GET["showallfriends"])){
	$max_record_friends = $_GET["showallfriends"];
}
echo "<div style='clear:both;color:white;'>.</div><div id='friendsdiv' style='background:#ccc;margin:20px 0;padding:5px 10px;'>Friends ({$count_records})</div>";
				$query = "SELECT * FROM `wiki_friends` WHERE (`user_id_from` = {$user_id_friend} OR `user_id_to` = {$user_id_friend}) AND `status` = 2 LIMIT $max_record_friends";
				$run = mysqli_query($connection,$query);
				if(mysqli_num_rows($run)>0){ 
					while($row = mysqli_fetch_assoc($run)){
						if($row["user_id_from"] != $user_id_friend){
							$user_id_friend = $row["user_id_from"];
						}else{
							$user_id_friend = $row["user_id_to"];
						}
						$id = $row["id"];
						// $query = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
						
						$query2 = "SELECT `fname`,`mname`,`lname` FROM `wiki_dating_profile` WHERE `id` = {$user_id_friend} ";
						$run2 = mysqli_query($connection,$query2);
						if(mysqli_num_rows($run2)>0){ 
							while($row2 = mysqli_fetch_assoc($run2)){
								
								$full_name = $row2["fname"] . " " . $row2["mname"] . " " . $row2["lname"];

								$query3 = "SELECT `img_path`,`id` FROM `dating_images` WHERE `user_id` = {$user_id_friend} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
								$run3 = mysqli_query($connection,$query3);
								if(mysqli_num_rows($run3)>0){ 
									$row3 = mysqli_fetch_assoc($run3);
									$img_path = $row3["img_path"];
								}else{$img_path = "/img/icons/login.jpg";}

?>

					<div class="img_display_friends">
						<a href="<?php echo "profile-public.php?id={$user_id_friend}" ?>" style="text-decoration:none;color:blue;"><img alt="<?php echo $full_name; ?>" src="<?php echo htmlentities($img_path) ?>" class="img_class" id="<?php echo $id; ?>" style="width:100%;max-width:300px"><span style="text-align:center;display:block;"><?php echo substr(ucwords($full_name),0,15); ?></span></a>
						<?php echo "<div style='text-align:center'>";
						if($user_id_friend != $user_id){
							echo mutual_friends($user_id,$user_id_friend,$connection);
						}
						echo "</div>";?>
					</div>

<?php


							}
						}
					}
				}else{echo "<p><strong>". ucwords($prof_full_name) . "</strong> has no friends</p>";}
				echo $show_all_friends;









					?>


				<div style="clear:both;"><p class="hide_for_non_mobile" style="color:white;margin-top:50px;border-top:5px solid #ccc;">.</p></div>
				

					</div>

<?php
if(isset($_GET["id"])){
	$user_id_get = $_GET["id"];
}elseif(isset($_GET["friends"])){
	$user_id_get = $_GET["friends"];
}if(isset($_GET["photos"])){
	$user_id_get = $_GET["photos"];
}




				$query = "SELECT * FROM `wiki_posts`  WHERE `user_id` = $user_id_get AND `status` = 1 AND `security` = 1 ";
				$run = mysqli_query($connection,$query);
				$num_rows = mysqli_num_rows($run);
?>
			<div id="posts" style='background:#ccc;margin:20px 0;padding:5px 10px;'>Posts</div>
<?php
if($num_rows < 1){
	echo "There is no post to show";
}
?>
	<div class="show_post" user_id_230325 = "<?php echo $user_id_get; ?>" style="height:100%;margin-top:40px;"></div>
	<div id="load_data_message"></div>





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

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}






$(document).ready(function(){

var limit = 3;
var start = 0;


var action = "inactive";

var user_id = $(".show_post").attr("user_id_230325");

function load_data(limit, start){
$.ajax({
	url: "/include/fetch_posts.php",
	method:"POST",
	data:{"limit":limit,"start":start,"user_id":user_id,"source":"public"},
	cache:false,
	dataType:"html",
	success:function(data){
		
		$('.show_post').append(data);
		if(data == 0){
			
			$("#load_data_message").html("<p style='font-weight:bold;'>-- The End --</p>");
			action = "active";
		}else{
			$("#load_data_message").html("<p style='font-weight:bold;'>Scroll Up To Load More ....</p>");
			action = "inactive";
		}
	}
})

}



if(action == "inactive"){
action = "active";
load_data(limit, start);
}

//   $(window).scroll(function(){
//     if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == "inactive"){
//       action = "active";
//       start = start + limit;
//       setTimeout(function(){
//         load_data(limit, start);
//       },1000);
//     }

//   });


$(window).on('scroll', function () {
	if ($(window).scrollTop() >= $('.show_post').offset().top + $('.show_post').outerHeight() - window.innerHeight && action == "inactive") {
	
		action = "active";
		start = start + limit;
		setTimeout(function(){
			load_data(limit, start);
		},1000);
	}
}); 












    $(document).on('click','.action', function(){
        
        var link_id = $(this).attr("id");
        $.ajax({
            url: "/include/friends.php",
            method:"POST",
            data:{"page":link_id},
            dataType:"html", //means receiving data in html format, when "json" is used means you are going to receive json data format
            success:function(data){
                //$('#like_counter').html(data.like); //this is how to receive json data format
                $('#'+link_id).html(data);
            }
        })
    });
});










</script>

<script src="/js/chat.js"></script>
