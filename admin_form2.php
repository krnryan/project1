<?php
	include_once("config/constants.php");
	include_once("config/database.php");
	
	$list = $_GET['id'];
	
	if(isset($_POST['menu1'])) {
	$update_query_format = 'UPDATE `navigation`
								SET `menu1`="%s",
								`menu2`="%s",
								`menu3`="%s"
								WHERE `id`=%d';
								
	$update_query = sprintf($update_query_format, addslashes($_POST['menu1']), addslashes($_POST['menu2']), addslashes($_POST['menu3']), $list);
	
	mysql_query($update_query);
	}
	
	$sql = "SELECT * FROM " .TBL_NAV. " WHERE id=" .$list;
	$res = mysql_query($sql, $db_link) or die (mysqli_error());
	$info = [];
	while ($row = mysql_fetch_assoc($res)) {
		$info = $row;
	}
	
?>

<html>
	<head>
		<Title>Admin Form</Title>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Titillium Web">
		<link rel="stylesheet" href="css/style_form.css" />
	</head>
	<body>
		<h1>Admin Form for <?php echo $info['name']?></h1>
		<div id="mega">
			<form method="post">
				<label for="menu1">1st menu</label>
				<input name="menu1" value="<?php echo $info['menu1']?>">
				<br>
				<label for="menu2">2nd menu</label>
				<input name="menu2" value="<?php echo $info['menu2']?>">
				<br>
				<label for="menu3">3rd menu</label>
				<input name="menu3" value="<?php echo $info['menu3']?>">
				<br><br>
				<button type="submit">SAVE</button>
			</form>
		</div>
		<div id="footer"><a href="admin.php">Back to admin page</a></div>
	</body>
</html>