<?php
include_once 'creds-dist.php';
include_once('FullContact.php');

$email = $_GET['p1'];
$first = $_GET['p2'];
$last  = $_GET['p3'];

$fullcontact = new FullContactAPI('cf1f4194d2dee287');
$result = $fullcontact->doLookup("$email");

if ($result['status']!==200){
echo '<a href="/~ayeshaahmad/limitedUserInfo.php?p1=' . $first . '&p2=' .$last .'">User Profile</a>';
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
echo "<a href='/~ayeshaahmad/profile.php'> User Profile</a>";  
}
?>