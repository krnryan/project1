<?php
include_once ("config/constants.php");
include_once ("config/database.php");

$sql = "SELECT * FROM" . TBL_NAV . "WHERE id=1";
$res = mysql_query($sql, $db_link) or die(mysqli_error());

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
			<li id="nav-index"><a href="index.php"><?php echo $menu1; ?></a></li>
			<li id="nav-about"><a href="about.php"><?php echo $menu2; ?></a></li>
			<li id="nav-contact"><a href="contact.php"><?php echo $menu3; ?></a></li>
		</ul>
	</div>
</div>