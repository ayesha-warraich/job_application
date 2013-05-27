<?php
$first = $_GET['p1'];
$last  = $_GET['p2'];
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>User Info!</title>
	<link rel="stylesheet" href="sample_assets/default.css">
</head>
<body>
	<div class="contact-card">
      	<div class="contact-pic box">
        	<img src="<?=$piclink?>" />
      	</div>
      	<form class="form-search" method="GET" action="search.php"> 
  			<input type="text" name="p1" >
  			<button type="submit" class="btn">Search</button>
		</form>
		<div class="box">
			<div class="column">
				<ul class="identity">
					<li class="identity-fullname"><?=$first?> <?=$last?></li>
					<li class="identity-fullname"> No other information available!</li>

				</ul><!--end .contact-info-list-->		
			</div><!--end .column-->
		</div><!--end .box-->
	</div><!--end .contact-card-->
</div>
</body>
</html>
