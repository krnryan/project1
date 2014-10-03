<?php
	include_once("config/constants.php");
	include_once("config/database.php");
	
	$sql = "SELECT * FROM" .TBL_NAV. "WHERE id=1";
	$res = mysql_query($sql, $db_link) or die (mysqli_error());
	
	while ($row = mysql_fetch_assoc($res)) {
		$menu1 = $row['menu1'];
		$menu2 = $row['menu2'];
		$menu3 = $row['menu3'];
	}
?>

<div id="opacity-avoid"></div>
<div id="navigation">
	<div class="logo"></div>
	<div class="nav">
	<ul>
		<a href="index.php"><li class="li1"><?php echo $menu1; ?></li></a>
		<a href="about.php"><li class="li2"><?php echo $menu2; ?></li></a>
		<a href="contact.php"><li class="li3"><?php echo $menu3; ?></li></a>
	</ul>
	</div>
</div>