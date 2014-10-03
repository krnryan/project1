<?php
	include_once("config/constants.php");
	include_once("config/database.php");
	
	$sql = "SELECT * FROM" .TBL_PAGES. "WHERE id=1";
	$res = mysql_query($sql, $db_link) or die (mysqli_error());
	
	while ($row = mysql_fetch_assoc($res)) {
		$phrase1 = $row['phrase1'];
		$phrase2 = $row['phrase2'];
		$phrase3 = $row['phrase3'];
		$title = $row['title'];
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Titillium Web">
	</head>
	<body>
		<div id="mega-container">
			<?php include("nav.php"); ?>
			<div id="phrase-container">
				<div id="catchy">
						<p id="phrase"><?php echo $phrase1; ?><br>
						<span id="phrase2"><?php echo $phrase2; ?></span>
						<span id="phrase3"><?php echo $phrase3; ?></span></p>
				</div>				
			</div>
			<?php include("header.php"); ?>
			<?php include("footer.php"); ?>
		</div>
	</body>
</html>