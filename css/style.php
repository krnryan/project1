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

<style>
html, body {
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	font-family: "Titillium Web";
	font-size: 0.8vw;
}

#mega-container {
	width: 100%;
	height: 100%;
	background-image: url('../img/main_background.jpg');
	background-size: cover;
}

#mega-container2 {
	width: 100%;
	height: 100%;
	background-image: url('../img/main_background_rvs.jpg');
	background-size: cover;
}

#catchy {
	position: absolute;
	margin: 2% 0 0 10%;
	width: 40%;
}

#catchy2 {
	position: absolute;
	margin: 2% 0 0 10%;
	width: 30%;
}

#catchy p {
	margin: 0;
	padding: 0;
}

#phrase {
	margin: 0;
	padding: 0;
	font-family: 'Titillium Web';
	font-size: 8vw;
	color: white;
	position: absolute;
	line-height: 5vw;
}

#phrase2 {
	font-size: 4vw;
	vertical-align: super;
}

#phrase3 {
	font-size: 10vw;
	color: #f1b521;
}

#phrase-container {
	width: 80%;
	float: left;
}

#header-container {
	height: 30%;
	width: 80%;
	float: left;
	position: relative;
	text-align: right;
}

.search {
	display: inline-block;
	float: right;
	margin: 2%;
}

input {
	height: 30px;
	width: 70%;
	opacity: 0.5;
	border: 2px solid #f1b521;
	padding-left: 10px;
}

.input {
	height: 30px;
	width: 200px;
	background: url('../img/mag.png') no-repeat white;
	opacity: 0.5;
	background-position: 10px center;
	border: 2px solid #f1b521;
	padding-left: 30px;
}

.ft {
	margin: 5px 0 0 10px;
	height: 8%;
	width: 8%;
}

#navigation {
	background: rgba(25, 20, 20, 0.7);
	float: left;
	z-index: 0;
	width: 20%;
	height: 100%;
	float: left;
	position: relative;
}

.nav {
	display: inline-block;
	width: 100%;
}

.logo {
	background: url('../img/logo.png') no-repeat center;
	background-size: contain;
	height: 20%;
	width: 100%;
	margin: 50px 0;
	float: left;
}

#navigation ul {
	padding: 0;
	margin-top: 50px;
	text-align: right;
}

li {
	list-style-type: none;
	text-transform: uppercase;
	margin-bottom: 20px;
	padding: 15px 20px 15px 10px;
	background: white;
	opacity: 0.7;
	border-right: 8px solid #f1b521;
	font-weight: bold;
}

li:hover{
	background: none;
	color: #f1b521;
}

/*.onthepage {
	background: none;
	color: #f1b521;
}*/

.li1 {
	background: url('../img/lambo1.gif') no-repeat;
	bakcground-size: cover;
	background-position: center;
}

.li2 {
	background: url('../img/lambo3.gif') no-repeat;
	bakcground-size: cover;
	background-position: center;
}

.li3 {
	background: url('../img/lambo2.gif') no-repeat;
	bakcground-size: cover;
	background-position: center right;
}

#navigation a {
	text-decoration: none;
	color: black;
	font-size: 30px;
}

#footer-container {
	width: 80%;
	height: 70%;
	float: left;
	position: relative;
	z-index: 0;
}

.footer {
	height: 4%;
	width: 80%;
	position: absolute;
	bottom: 10px;
	margin: 0 10%;
	border-bottom: 2px solid #f1b521;
	text-align: center;
}

.footer span {
	font-size: 12px;
	font-weight: bold;
}

.footer a {
	text-decoration: none;
	color: black;
}

#phone {
	margin-right: 10px;
}

#mail {
	margin-right: 10px;
}

#middle {
	margin: 0 100px;
}

#main-container {
	background-color: #262626;
	opacity: 0.85;
	outline: 1px solid #f1b521;
	width: 60%;
	height: 60%;
	position: absolute;
	top: 32%;
	left: 30%;
	z-index: 1;
}

.content {
	background: url('../img/company_profile.jpg') top no-repeat;
	background-size: contain;
}

.text {
	text-align: justify;
	padding: 24% 2% 0 2%;
	color: white;
}

#contact_content {
	background: url('../img/contact_phone.png') left no-repeat;
	background-size: fit;
	position: relative;
	width: 100%;
	height: 100%;
}

.contact_text {
	float: left;
	position: relative;
	width: 30%;
	margin-top: 4%;
	padding: 0 2%;
	color: white;
	border-right: 1px solid white;
}

#contact_form {
	float: left;
	position: relative;
	width: 65%;
	margin-top: 4%;
	color: white;
	font-size: 1.5vw;
	height: 90%;
}

.contact_text h1 {
	font-size: 1vw;
	color: #f1b521;
}

#form-group {
	margin-bottom: 2%;
	position: relative;
}

#form-group label {
	width: 20%;
	display: inline-block;
	text-align: right;
	margin-right: 2%;
	vertical-align: top;
	color: #f1b521;
}

textarea {
	position: relative;
	height: 110px;
	width: 70%;
	opacity: 0.5;
	border: 2px solid #f1b521;
	padding-left: 10px;
	resize: none;
}

.button {
	width: 100%;
	height: 50px;
	position: absolute;
}

.button-middle {
	height: 40px;
	width: 100px;
	position: relative;
	margin: 0 auto;
}

button {
	height: 100%;
	width: 100%;
	background-color: none;
	border: white;
	cursor: pointer;
}

button:hover {
	box-shadow: 0px 0px 10px white;
}
</style>