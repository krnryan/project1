<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Titillium Web">
		<link rel="stylesheet" href="css/style_admin.css" />
	</head>
	<body>
		<h1>Admin Page</h1>
	</body>

<?php
	include_once("config/constants.php");
	include_once("config/database.php");

	$new_name = $_POST['newname'];
	if(!empty($new_name)){
		
		$insert_query = 'INSERT INTO pages (name) VALUES ("'.addslashes($new_name).'")';
		if(mysql_query($insert_query)) {
			echo '<div id="message"> New page added successfully </div>';
		}
		else {
			echo 'ERROR: Could not able to execute $insert_query.' .mysql_error();
		}
	}
	
	$delete_name = $_POST['delete'];
	if(!empty($delete_name)){
		
		$delete_query = 'DELETE FROM pages WHERE id = '.$delete_name;
		if(mysql_query($delete_query)) {
			echo '<div id="message"> Page deleted successfully </div>';
		}
		else {
			echo 'ERROR: Could not able to execute $delete_query.' .mysql_error();
		}
	}
	
	$pages = 'SELECT * FROM pages';
	$res = mysql_query($pages);
	echo '<div id="mega"><div id="left"><h2>Manage a current page</h2><ul id="number">';
	while ($row = mysql_fetch_assoc($res)) {
		echo '<li>'.$row['id'].'. <a href="admin_form.php?id='.$row['id'].'">'.$row['name'].'</a></li>';
	}
	echo '</ul>';
	
	//
	
	$list = 'SELECT * FROM navigation';
	$result = mysql_query($list);
	echo '<h2>Manage a menu</h2><ul>';
	while ($row = mysql_fetch_assoc($result)) {
		echo '<li><a href="admin_form2.php?id='.$row['id'].'">'.$row['name'].'</a></li>';
	}
	echo '</ul></div>
	<div id="right">	
	<h2>Create a new page</h2>
	<form method="post"><label>Title: </lable><input type="text" name="newname" /><button type="submit">SUBMIT</button></form>
	<br><br>
	<h2>Delete a page</h2>
	<form method="post"><label>Page number: </lable><input id="response" type="text" name="" /><button type="submit" onclick="deleteConfirm()">SUBMIT</button></form>
	</div></div>';
?>
<script>
 	function deleteConfirm() {
 		if (document.getElementById("response").value == 1 || document.getElementById("response").value == 2 || document.getElementById("response").value == 3){
 			alert ("Don't delete my hard work! :(")
		}
		else {
			var ans = confirm("Are you sure to delete page "+document.getElementById("response").value+"?");
			if (ans == true){
				document.getElementById("response").name = "delete";
			}
			else {
				alert ("Page deletion canceled!");
			}
		}
	}
</script>
</html>