<?php
include_once 'creds-dist.php';
include_once('FullContact.php');

$email = $_GET['p1'];
$fullcontact = new FullContactAPI('cf1f4194d2dee287');
$result = $fullcontact->doLookup("$email");

if ($result['status']!==200){
print_r("No information available!");
}
else{

$profiles = $result['socialProfiles'];
$personalInfo = $result['contactInfo'];
$fullname = $personalInfo['fullName'];
$photos =$result['photos']; 
$piclink = $photos[0]['url'];
$twitter = "Not available";
$aboutme = "Not available";
$linkedin = "Not available";
$aboutmepic="https://d23ikhyr5c5bpx.cloudfront.net/images/social-icons/32/default/aboutme.png";

foreach($profiles as $value) {
    foreach($value as $key => $val) {
        if($key == "typeId" && $val== "twitter") {
        $twitter = $value['url'];
        }

        elseif ($key == "typeId" && $val== "aboutme") {
        $aboutme = $value['url'];
        }

        elseif($key == "typeId" && $val== "linkedin") {
        $linkedin = $value['url'];
        }
        
        else{
        }	
    }
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>User Profile!</title>
	<link rel="stylesheet" href="sample_assets/default.css">
</head>
<body>
	<div class="contact-card">
      	<div class="contact-pic box">
        	<img src="<?=$piclink?>" />
      	</div>
      	<form class="form-search" method="GET" action="search.php"> 
  <input type="text" class="input-medium search-query" name="p1">
  <button type="submit" class="btn">Search</button>
</form>
		<div class="box">
			<div class="column">
				<ul class="identity">
					<li class="identity-fullname"><?=$fullname?></li>
				</ul><!--end .contact-info-list-->
				
				<ul class="social">
					<li class="social-profile">
					    <a target="_blank" href="<?=$aboutme?>"><img src="<?=$aboutmepic?>"/></a>
					</li>

					<li class="social-profile">
					    <a target="_blank" href="<?=$twitter?>"><img src="sample_assets/twitter.png"/></a>
					</li>
					
					<li class="social-profile">
					    <a target="_blank" href="<?=$linkedin?>"><img src="sample_assets/linkedin.png"/></a>
					</li>
				</ul>
			</div><!--end .column-->
			
		
		</div><!--end .box-->
	</div><!--end .contact-card-->
</div>
</body>
</html>
<?php
}
?>