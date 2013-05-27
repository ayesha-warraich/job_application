<?php
include_once 'main.php';
include_once 'search.php';
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