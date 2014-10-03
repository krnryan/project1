<?php
	include_once("config/constants.php");
	include_once("config/database.php");
	
	$page = (int)$_GET['id'];
	
	$delete_page = $_POST['delete'];
	
	if(isset($delete_page)){
		$delete_query = 'DELETE FROM pages WHERE id = '.$page;
		if(mysql_query($delete_query)) {
			header('Location: admin.php');
		}
		else {
			echo 'ERROR: Could not able to execute $delete_query.' .mysql_error();
		}
	}
	
	if(isset($_POST['phrase1'])) {
	$update_query_format = 'UPDATE `pages`
								SET `phrase1`="%s",
								`phrase2`="%s",
								`phrase3`="%s",
								`content`="%s"
								WHERE `id`=%d';
								
	$update_query = sprintf($update_query_format, addslashes($_POST['phrase1']), addslashes($_POST['phrase2']), addslashes($_POST['phrase3']), addslashes($_POST['content']), $page);
	
	mysql_query($update_query);
	}
	
	$sql = "SELECT * FROM " .TBL_PAGES. " WHERE id=" .$page;
	$res = mysql_query($sql, $db_link) or die (mysql_error());
	$info = []; //$info = array();
	while ($row = mysql_fetch_assoc($res)) {
		$info = $row;
	}
	
?>

<html>
	<head>
		<Title>Admin Form</Title>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Titillium Web">
		<link rel="stylesheet" href="css/style_form.css" />
		<script src="//cdn.ckeditor.com/4.4.5/full/ckeditor.js"></script>
		<script src="//code.jquery.com/jquery-1.2.1.min.js"></script>
	</head>
	<body>
		<h1>Admin Form for <?php echo $info['name']?></h1>
		<div id="mega">
			<form method="post">
				<label for="phrase1">Phrase 1:</label>
				<input name="phrase1" value="<?php echo $info['phrase1']; ?>">
				<br>
				<label for="phrase2">Phrase 2:</label>
				<input name="phrase2" value="<?php echo $info['phrase2']; ?>">
				<br>
				<label for="phrase3">Phrase 3:</label>
				<input name="phrase3" value="<?php echo $info['phrase3']; ?>">
				<br>
				<label for="content">Content</label>
				<textarea id="content" name="content"></textarea>
				<br>
				<button id="left" type="submit">SAVE</button>

				<input id="response" type="hidden" name="" /><button id="right" type="submit" onclick="deleteConfirm()">DELETE</button>
			</form>
		</div>
		<div id="footer"><a href="admin.php">Back to admin page</a></div>
		<div id="hidden" style="display: none">
			<?php echo $info['content']; ?>
		</div>
		<script>
    		var editor = CKEDITOR.replace( 'content' );
    		var hidden = document.getElementById('hidden').innerHTML;
    		
    		CKEDITOR.on('instanceReady', function(){
    			//console.log(editor.document);
    			// CKEDITOR.dom.document.write(something)
    			// editor.document = CKEDITOR.dom.document
    			//var body = editor.document.getElementsByTag('body');
    			
    			var container = $('#cke_content #cke_1_contents iframe').contents().find('body').html(hidden);
    			
    			//editor.document.write(hidden);
    			// <body contenteditable="true" class="cke_editable cke_editable_themed cke_contents_ltr cke_show_borders" spellcheck="false"><div id="contact_content"><div class="contact_text"><h1>CUSTOMER CONTACT CENTER - INTERNATIONAL</h1><p>Phone: +39 051 9597282<br>Monday to Friday (except holidays):<br>from 7:00 am to 7:00 pm (GMT+1)</p><h1>CUSTOMER CONTACT CENTER - NORTH AMERICA</h1><p>Phone: +1-866-681-6276<br>Monday through Friday (except holidays):<br>9:00 AM to 5:00 PM (EST)</p><h1>LAMBORGHINI CUSTOMER CENTER - JAPAN</h1><p>Phone:+81-(0)120-988-889<br>Monday - Sunday: 9 AM - 7 PM (JST)</p></div><div id="contact_form"><form><div id="form-group">NAME: <input data-cke-saved-name="name" name="name" data-cke-editable="1" contenteditable="false"></div><div id="form-group">PHONE #: <input data-cke-saved-name="phone" name="phone" data-cke-editable="1" contenteditable="false"></div><div id="form-group">EMAIL: <input data-cke-saved-name="email" name="email" data-cke-editable="1" contenteditable="false"></div><div id="form-group">MESSAGE:<textarea data-cke-editable="1" contenteditable="false"></textarea></div></form></div></div></body>
    		});
     			///CKEDITOR.inline('hidden');
	     	function deleteConfirm() {
		 		if (<?php echo $page; ?> == 1 || <?php echo $page; ?> == 2 || <?php echo $page; ?> == 3){
		 			alert ("Don't delete my hard work! :(")
				}
				else {
					var ans = confirm("Are you sure to delete <?php echo $info['name'];?>?");
					if (ans == true){
						document.getElementById("response").name = "delete";
					}
					else {
						alert ("Page deletion canceled!");
					}
				}
			}
	</script>
	</body>
</html>