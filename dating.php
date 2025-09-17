<?php ob_start();require_once($_SERVER['DOCUMENT_ROOT']."/include/db_connection.php");date_default_timezone_set("Africa/Accra");session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/include/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/include/pop-up-chat.php");
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>

		<link rel="stylesheet" href="/css/header.css">
		<link rel="stylesheet" href="/css/dating.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="icon" type="image/jpg" href="/img/icons/favicon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dating - Wiki Ghana</title>
	</head>
	<body>
		<div class="wrap">
		
        		<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php");?>
			<div class="content_flex">
				<div class="content" style="margin-bottom:60px">
					<div id="search-container" >
					<div class="site_nav"><a href="/">Home</a> <i class="bi bi-arrow-right"></i> <a href="/dating.php">Dating</a></div>
					
					
					<?php
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
							$skin_complexion_type = 0;
						

$user_id = "";
							if(isset($_SESSION["user_type"])){
								
								if($_SESSION["user_type"] != "visitor"){
									$user_id = "";
									
								}else{
									$user_id=$_SESSION["user_id"];
									
								}
							}else{$user_id = "";}









if(!empty($user_id)){

							$query = "SELECT `img_path` FROM `dating_images` WHERE `user_id` = {$user_id} AND `is_profile` = 1 AND `updated_date_time_profile` = (SELECT Max(`updated_date_time_profile`) FROM `dating_images` WHERE `is_profile`=1)";
				
							$run = mysqli_query($connection,$query);
							
							if(mysqli_affected_rows($connection)>0){ 
								$row = mysqli_fetch_assoc($run);
								$current_profile_photo = $row["img_path"];
							
							}
						
						
							$query = "SELECT `img_path` FROM `dating_images` WHERE `user_id` = {$user_id} AND `is_cover` = 1 AND `updated_date_time_cover` = (SELECT Max(`updated_date_time_cover`) FROM `dating_images` WHERE `is_cover`=1)";
							$run = mysqli_query($connection,$query);
							$current_cover_photo = "";
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
																
																
																	<a href="/profile.php" class="edit-profile"><i class="bi bi-person-circle"></i> Profile</a>
																
																<a href="profile-photos.php" class="edit-profile photos"><i class="bi bi-camera-fill"></i> Photos</a>
																
																<a href="friends.php" style="display:inline-block;" class="edit-profile friends"><i class="bi bi-people-fill"></i> Friends</a>
																<a href="stories.php" class="edit-profile stories"><i class="bi bi-hourglass-split"></i> Stories</a>
															</div>
						
													</div>
												</div>



	<?php } ?>















						<div style="clear:both;color:white">.</div>
						<p style="color:red;clear:both;padding:0 10px;">This is a new website; if you don't find your match, try agan in a few weeks. Cheers !!</p>
						<p style="color:red;clear:both;padding:0 10px;"><i class="bi bi-exclamation-triangle"></i> Do not share your contact or/and financial information with any one on this website.</p>
						
						<?php
					if(!isset($_SESSION["user_id"])){
						echo "
						<p style='padding:0 10px;'>Registration is free!! <a class='registration_is_free' href='/login.php'>Click here</a> to login and register to be part of our large community.</p>
						";
					}

					?>
						
						<div class="login">

					<form id = "search_form" method="post"autocomplete="off">
						
					

						

						<div class="container">
						
							<div style="clear:both;"></div>
							

							<p><label style="margin-right:20px;">I'm searching for a</label>


							

							<select name = "maritalstatus" style="display:inline;width:150px;margin-right:22px;">
							<option value = "0">--Select--</option>
								<option value = "1" <?php if(isset($maritalstatus)){if($maritalstatus == "1"){echo "selected = 'selected'";}} ?>>Single</option>
								<option value = "2" <?php if(isset($maritalstatus)){if($maritalstatus == "2"){echo "selected = 'selected'";}} ?>>Widow/Widower</option>
								<option value = "3" <?php if(isset($maritalstatus)){if($maritalstatus == "3"){echo "selected = 'selected'";}} ?>>Divorced</option>
								<option value = "4" <?php if(isset($maritalstatus)){if($maritalstatus == "4"){echo "selected = 'selected'";}} ?>>Separated</option>
								<option value = "5" <?php if(isset($maritalstatus)){if($maritalstatus == "5"){echo "selected = 'selected'";}} ?>>Married</option>
							</select>
							
						<span class="gender_span">
							<span><label for="male">Male</label></span><input type="radio" name="gender" value="1" id="male" style="margin-right:15px;" >		
							<span><label for="female">Female</label></span><input type="radio" value="2" name="gender" id="female" ></p>
						</span>
							<p><label>Between the ages of</label>
							
							<select name = "age_from" style="display:inline;width:60px;">
								<option value = "18" selected >18</option>
								<option value = "19">19</option>
								<option value = "20">20</option>
								<option value = "21">21</option>
								<option value = "22">22</option>
								<option value = "23">23</option>
								<option value = "24">24</option>
								<option value = "25">25</option>
								<option value = "26">26</option>
								<option value = "27">27</option>
								<option value = "28">28</option>
								<option value = "29">29</option>
								<option value = "30">30</option>
								<option value = "31">31</option>
								<option value = "32">32</option>
								<option value = "33">33</option>
								<option value = "34">34</option>
								<option value = "35">35</option>
								<option value = "36">36</option>
								<option value = "37">37</option>
								<option value = "38">38</option>
								<option value = "39">39</option>
								<option value = "40">40</option>
								<option value = "41">41</option>
								<option value = "42">42</option>
								<option value = "43">43</option>
								<option value = "44">44</option>
								<option value = "45">45</option>
								<option value = "46">46</option>
								<option value = "47">47</option>
								<option value = "48">48</option>
								<option value = "49">49</option>
								<option value = "50">50</option>
								<option value = "51">51</option>
								<option value = "52">52</option>
								<option value = "53">53</option>
								<option value = "54">54</option>
								<option value = "55">55</option>
								<option value = "56">56</option>
								<option value = "57">57</option>
								<option value = "58">58</option>
								<option value = "59">59</option>
								<option value = "60">60</option>
								<option value = "61">61</option>
								<option value = "62">62</option>
								<option value = "63">63</option>
								<option value = "64">64</option>
								<option value = "65">65</option>
								<option value = "66">66</option>
								<option value = "67">67</option>
								<option value = "68">68</option>
								<option value = "69">69</option>
								<option value = "70">70</option>
								<option value = "71">71</option>
								<option value = "72">72</option>
								<option value = "73">73</option>
								<option value = "74">74</option>
								<option value = "75">75</option>
								<option value = "76">76</option>
								<option value = "77">77</option>
								<option value = "78">78</option>
								<option value = "79">79</option>
								<option value = "80">80</option>
								<option value = "81">81</option>
								<option value = "82">82</option>
								<option value = "83">83</option>
								<option value = "84">84</option>
								<option value = "85">85</option>
								<option value = "86">86</option>
								<option value = "87">87</option>
								<option value = "88">88</option>
								<option value = "89">89</option>
								<option value = "90">90</option>
								
								
							</select>
							<label> And </label>
							
							<select name = "age_to" style="display:inline;width:65px;">
							<option value = "18">18</option>
								<option value = "19">19</option>
								<option value = "20">20</option>
								<option value = "21">21</option>
								<option value = "22">22</option>
								<option value = "23">23</option>
								<option value = "24">24</option>
								<option value = "25">25</option>
								<option value = "26">26</option>
								<option value = "27">27</option>
								<option value = "28">28</option>
								<option value = "29">29</option>
								<option value = "30">30</option>
								<option value = "31">31</option>
								<option value = "32">32</option>
								<option value = "33">33</option>
								<option value = "34">34</option>
								<option value = "35">35</option>
								<option value = "36">36</option>
								<option value = "37">37</option>
								<option value = "38">38</option>
								<option value = "39">39</option>
								<option value = "40">40</option>
								<option value = "41">41</option>
								<option value = "42">42</option>
								<option value = "43">43</option>
								<option value = "44">44</option>
								<option value = "45">45</option>
								<option value = "46">46</option>
								<option value = "47">47</option>
								<option value = "48">48</option>
								<option value = "49">49</option>
								<option value = "50">50</option>
								<option value = "51">51</option>
								<option value = "52">52</option>
								<option value = "53">53</option>
								<option value = "54">54</option>
								<option value = "55">55</option>
								<option value = "56">56</option>
								<option value = "57">57</option>
								<option value = "58">58</option>
								<option value = "59">59</option>
								<option value = "60">60</option>
								<option value = "61">61</option>
								<option value = "62">62</option>
								<option value = "63">63</option>
								<option value = "64">64</option>
								<option value = "65">65</option>
								<option value = "66">66</option>
								<option value = "67">67</option>
								<option value = "68">68</option>
								<option value = "69">69</option>
								<option value = "70">70</option>
								<option value = "71">71</option>
								<option value = "72">72</option>
								<option value = "73">73</option>
								<option value = "74">74</option>
								<option value = "75">75</option>
								<option value = "76">76</option>
								<option value = "77">77</option>
								<option value = "78">78</option>
								<option value = "79">79</option>
								<option value = "80">80</option>
								<option value = "81">81</option>
								<option value = "82">82</option>
								<option value = "83">83</option>
								<option value = "84">84</option>
								<option value = "85">85</option>
								<option value = "86">86</option>
								<option value = "87">87</option>
								<option value = "88">88</option>
								<option value = "89">89</option>
								<option value = "90" selected>90+</option>
								
							</select></p>

							<p><label for="fullname">Of the name</label>
							<input type="text" style="display:inline;width:200px;" placeholder="Enter Name" name="fullname" ></p>



						<p><label for="country" class="label">From</label>
						<select style="display:inline;width:200px" name="country" id="country">
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
					




						<!--region living in -->
						<p ><label for="region" class="label">Living in the region</label>
					<select style="display:inline;width:130px;" name="region" id="region">
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


							
							<p class="radio"><span><label>Prefered skin complexion</label></span><br>
							<label class="skin" id="skin1" for="skin_complexion_type1"><img src="/img/skin-type/type1.jpg"  alt="type1"></label>
							<label class="skin" id="skin2" for="skin_complexion_type2"><img src="/img/skin-type/type2.jpg"  alt="type2"></label>
							<label class="skin" id="skin3" for="skin_complexion_type3"><img src="/img/skin-type/type3.jpg"  alt="type3"></label>
							<label class="skin" id="skin4" for="skin_complexion_type4"><img src="/img/skin-type/type4.jpg"  alt="type4"></label>
							<label class="skin" id="skin5" for="skin_complexion_type5"><img src="/img/skin-type/type5.jpg"  alt="type5"></label>
							<label class="skin" id="skin6" for="skin_complexion_type6"><img src="/img/skin-type/type6.jpg"  alt="type6"></label>

							<input style="display:none" type="radio" value="1" name="skin_complexion_type" id="skin_complexion_type1" >
							<input style="display:none" type="radio" value="2" name="skin_complexion_type" id="skin_complexion_type2">
							<input style="display:none" type="radio" value="3" name="skin_complexion_type" id="skin_complexion_type3">
							<input style="display:none" type="radio" value="4" name="skin_complexion_type" id="skin_complexion_type4">
							<input style="display:none" type="radio" value="5" name="skin_complexion_type" id="skin_complexion_type5">
							<input style="display:none" type="radio" value="6" name="skin_complexion_type" id="skin_complexion_type6">
							</p>



							
							

							
							
							<p class="radio"><label for="no_children">With <strong>NO</strong> children</label><input type = "radio" name = "is_children" value = "1" id="no_children" style = "margin-right:15px;"/>
							<label for="yes_children">With children</label><input type = "radio" name = "is_children" value = "2" id="yes_children" /></p>


							
							<p class="radio"><label for="no">Does <strong>NOT</strong> smoke</label><input type = "radio" name = "is_smoke" value = "1" id="no" <?php if(isset($is_smoke)){if($is_smoke == "1"){echo "checked = 'checked'";}} ?> style = "margin-right:15px;"/>
							<label for="yes">Smokes</label><input type = "radio" name = "is_smoke" value = "2" id="yes" <?php if(isset($is_smoke)){if($is_smoke =="2"){echo "checked = 'checked'";}} ?> /></p>

						

							
							<p class="radio"><span><label for="no_disabled"><strong>NOT</strong> disabled</label></span><input type="radio" name="is_disabled" id="no_disabled" value="1" style="margin-right:15px;" <?php if(isset($is_disabled)){if($is_disabled == 1 ){echo "checked = 'checked'";}} ?>>		
							<span><label for="yes_disabled">Disabled</label></span><input type="radio" name="is_disabled" id="yes_disabled" value="2" <?php if(isset($is_disabled)){if($is_disabled == 2 ){echo "checked = 'checked'";}} ?>></p>


				<p><label for="height_from">Height between</label>
				<select name = "height_from" id="height_from" style="display:inline;width:85px;">
						
						<option value = "121" selected >121cm</option>
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
				</select>
			



				<label for="height_to"> And </label>
				<select style="display:inline;width:85px" name = "height_to" id="height_to">
						
						<option value = "121">121cm</option>
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
						<option value = "241" selected >241cm</option>
				</select>
			
			</p>
				
				<p><label for = "weight">Weight between</label>
				<select name = "weight_from" id="weight_from" style="display:inline;width:80px;">
					
					<option value="36" selected>36kg</option>
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
				</select>
			


				<label for = "weight_to"> And </label>
				<select name = "weight_to" id="weight_to" style="display:inline;width:80px;">
					
					<option value="36">36kg</option>
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
					<option value="135" selected>135kg</option>
				</select>
			</p>



				<p><label>Highest Education</label>
				<select style="display:inline;width:160px;" name = "highestedu" id="highestedu">
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

				<p><label for="employedin">Employed In </lable>
				<select style="display:inline;width:150px;" name = "employedin" id="employedin">
					<option value = "0">--Select--</option>
					<option value = "1" <?php if($employedin == "1"){echo "selected = 'selected'";} ?>>Government</option>
					<option value = "2" <?php if($employedin == "2"){echo "selected = 'selected'";} ?>>Private</option>
					<option value = "3" <?php if($employedin == "3"){echo "selected = 'selected'";} ?>>Self Employed</option>
					<option value = "4" <?php if($employedin == "4"){echo "selected = 'selected'";} ?>>Not Working</option>
					<!-- <option value = "5" <?php if($employedin == "5"){echo "selected = 'selected'";} ?>>Student</option> -->
					
				</select></p>

					

					<!--profession -->
					<p ><label for="profession" class="label">Profession</label>
					<select style="display:inline;width:160px;" name="profession" id="profession">
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

			
				<p style="padding-top:10px;"><label style="margin-right:20px;">Monthly income between</label>
				<select style="display:inline;width:140px;" name = "monthlyincome_from" id="monthlyincome_from">
					<option value = "10" selected>10 - 50 (USD)</option>
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

				<label> And </label>
				<select style="display:inline;width:140px;" name = "monthlyincome_to" id="monthlyincome_to">
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
					<option value = "560" selected>Above 560 (USD)</option>
				</select>



				<p><label for="religion">Religion</label>
				<select style="display:inline;width:180px;" name = "religion">
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
				
				
				<p><label>Religious Nature</label>
				<select style="display:inline;width:160px;" name = "religious_nature">
					<option value = "0">--Select--</option>
					<option value = "1" <?php if($religious_nature == "1"){echo "selected = 'selected'";} ?>>Not religious</option>
					<option value = "2" <?php if($religious_nature == "2"){echo "selected = 'selected'";} ?>>Somewhat religious</option>
					<option value = "3" <?php if($religious_nature == "3"){echo "selected = 'selected'";} ?>>Moderately religious</option>
					<option value = "4" <?php if($religious_nature == "4"){echo "selected = 'selected'";} ?>>Very religious</option>
				</select></p>


				<p>Ethnicity
				<select style="display:inline;width:160px;clear:both;" name = "ethnicity" id="ethnicity">
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
				</select></p>
				
				<input type="hidden" name="start" id="start" value="0"> <input type="hidden" name="limit" id="limit" value="15">
						<div style="color:white">.</div>

				


							<button type="button" class="cancelbtn"><a href="<?php echo "/dating.php";?>">Reset</a></button><button type="submit" name="search_profile">Search</button>
							

						</div>

						
						</form>


					</div><!--end of .form_content -->
					<p style="margin-bottom:75px;">.</p>
					<?php include($_SERVER['DOCUMENT_ROOT']."/include/slideshow.php");?>
</div><!-- end of #search-container -->
<div id="show_search"></div>




<div id="load_data_message" style="clear:both"></div>
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
$(document).ready(function(){
var button_clicked = 0;
var scrolled_down = 0;
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
	});

	//sending form data
	$('#search_form').on('submit',function(event){
		window.scrollTo(0, 0);
		button_clicked = 1;
		event.preventDefault();
		var form_data = $(this).serialize();
		$("#search-container").css({
			// "background":"blue",
			"display":"none",
			
			
		});
		$.ajax({
			url:"/include/fetch_dating_search.php",
			method:"POST",
			data:form_data,
			dataType:"html",
			success:function(data){	
					$("#show_search").html(data);
					
			}
		})
	});








	var limit = parseInt($("#limit").attr("value"));
	var start = 0;


  var action = "inactive";
  function load_data(limit, start){

    $.ajax({
        url: "/include/fetch_dating_search2.php",
        method:"POST",
        data:{"limit":limit,"start":start},
        cache:false,
        dataType:"html",
        success:function(data){
         
            $('#show_search').append(data);
            if(data == ""){
               $("#load_data_message").html("<p>-- The End --</p><p><a style='color:blue;text-decoration:none;' href='/dating.php'>Try another criteria</a></p>");
              action = "active";
            }else{
              $("#load_data_message").html("<p style='font-weight:bold'>Scroll Up To Load More ....</p>");
              action = "inactive";
            }
        }
    })

  }



  if(action == "inactive" && button_clicked == 1 && scrolled_down == 1){
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
        if ($(window).scrollTop() >= $('#show_search').offset().top + $('#show_search').outerHeight() - window.innerHeight && action == "inactive" && button_clicked == 1) {
			scrolled_down = 1;
            
			action = "active";
			start = start + limit;
			setTimeout(function(){
				load_data(limit, start);
			},1000);
        }
    }); 






// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");



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



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}




});
</script>
<!-- <script src="/js/chat.js"></script> -->