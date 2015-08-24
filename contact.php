<?php
	// Five steps to PHP database connections:
	
	// 1. Create a database connection
	//		(Use your own servername, username and password if they are different.)
	//		$connection allows us to keep refering to this connection after it is established
	$connection = mysql_connect("localhost","u979911157_admin","pulse1687"); 
	if (!$connection) {
		die("Database connection failed: " . mysql_error());
	}

	// 2. Select a database to use 
	$db_select = mysql_select_db("u979911157_mails",$connection);
	if (!$db_select) {
		die("Database selection failed: " . mysql_error());
	}

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Mekanika : Contact</title>
	<meta name="description" content="">
	<meta name="author" content="Mukul" >

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/fonts/font-awesome.min.css">
	<link rel="stylesheet" href="css/animated.css">
	<link rel="stylesheet" href="css/settings.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="css/retina.css">
	<link rel="stylesheet" href="css/skins/default.css">

	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Rosario' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/logo1.gif">
	<link rel="apple-touch-icon" href="images/icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/wolkslogo4.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/wolkslogo5.png">

</head>
<body>
<?php
$name = $_POST["name"];
$email= $_POST["email"]
$subject = $_POST["subject"];
$message = $_POST["message"];

// 3. Perform database query
	$query = "INSERT INTO Contact_messages ( name , email , mail_subject , mail_message ) values ( '$name' , '$email' , '$subject' , '$message' )";
	
	if (mysql_query($query,$connection)) {
		header("Location : contact.php");
		exit:
	}
	else{die("Your message was not sent " . mysql_error());
	}
	// 4. Use returned data
	while ($row = mysql_fetch_array($result)) {
		echo $row["menu_name"]." ".$row["position"]."<br />";
	}

?>
</body>
</html>
<?php
	// 5. Close connection
	mysql_close($connection);
?>