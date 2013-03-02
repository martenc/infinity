<?php
if ($_POST && $_POST['user_name']) {
	$link = mysql_connect('localhost', $_POST['user_name'], $_POST['user_passwd']);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}

	//drop database 
	$sql = 'DROP DATABASE IF EXISTS infinity';
	mysql_query($sql, $link);


	//create database 
	$sql = 'CREATE DATABASE IF NOT EXISTS infinity';
	if (mysql_query($sql, $link)) {
		mysql_select_db('infinity');
	} else {
	    echo 'Error creating database: ' . mysql_error() . "\n";
	}

	//create project table
	$sql = "CREATE TABLE IF NOT EXISTS `project` (
	  `pid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The primary identifier for a Project.',
	  `name` varchar(256) NOT NULL COMMENT 'Name of Project',
	  `client` int(11) NOT NULL COMMENT 'Name of client related to project',
	  `uid` int(11) NOT NULL COMMENT 'user who created project',
	  PRIMARY KEY (`pid`)
	)";
	mysql_query($sql, $link);


	$sql = "INSERT INTO `infinity`.`project` (`pid`, `name`, `client`, `uid`) VALUES 
		('1', 'project1', '1', '1'), 
		('2', 'project2', '1', '1')
	";
	mysql_query($sql, $link);

	//create timesheet table
	$sql = "CREATE TABLE IF NOT EXISTS `timesheet` (
	  `tid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The primary identifier for a Timesheet.',
	  `pid` int(11) NOT NULL COMMENT 'Project ID.',
	  `uid` int(11) NOT NULL COMMENT 'The users.uid that owns this timesheet; initially, this is the user that created it.',
	  `description` varchar(255) DEFAULT NULL,
	  `created` int(8) DEFAULT NULL COMMENT 'The Unix tiamestamp when the Timesheet was created.',
	  `ended` int(8) DEFAULT NULL COMMENT 'The Unix tiamestamp when the Timesheet was ended.',
	  `total` int(11) DEFAULT NULL COMMENT 'Total timesheet time in seconds',
	  PRIMARY KEY (`tid`)
	)";
	mysql_query($sql, $link);

	$timesheets[] = array('pid' => 1, 'uid' => 2, 'description' => '"Timesheet entry 3"', 'created' => strtotime('-46 hour'), 'ended' => strtotime('-35 hour'), 'total' => 3600);
	$timesheets[] = array('pid' => 2, 'uid' => 1, 'description' => '"Timesheet entry 3"', 'created' => strtotime('-46 hour'), 'ended' => strtotime('-35 hour'), 'total' => 3600);
	$timesheets[] = array('pid' => 1, 'uid' => 1, 'description' => '"Timesheet entry 3"', 'created' => strtotime('-32 hour'), 'ended' => strtotime('-31 hour'), 'total' => 3600);
	$timesheets[] = array('pid' => 2, 'uid' => 2, 'description' => '"Timesheet entry 3"', 'created' => strtotime('-3 hour'), 'ended' => strtotime('-2 hour'), 'total' => 3600);
	$timesheets[] = array('pid' => 2, 'uid' => 2, 'description' => '"Timesheet entry 3"', 'created' => strtotime('-3 hour'), 'ended' => strtotime('-2 hour'), 'total' => 3600);
	$timesheets[] = array('pid' => 1, 'uid' => 2, 'description' => '"Timesheet entry 3"', 'created' => strtotime('-3 hour'), 'ended' => strtotime('-2 hour'), 'total' => 3600);
	$timesheets[] = array('pid' => 1, 'uid' => 1, 'description' => '"Timesheet entry 3"', 'created' => strtotime('-3 hour'), 'ended' => strtotime('-2 hour'), 'total' => 3600);
	$timesheets[] = array('pid' => 2, 'uid' => 1, 'description' => '"Timesheet entry 2"', 'created' => strtotime('-2 hour'), 'ended' => strtotime('-1 hour'), 'total' => 3600);
	$timesheets[] = array('pid' => 1, 'uid' => 1, 'description' => '"Timesheet entry 1"', 'created' => strtotime('-1 hour'), 'ended' => strtotime('now'), 'total' => 3600);
	$values = '';
	foreach ($timesheets as $key => $value) {
		$values = '';
		$values .= "(NULL, ";
		$values .= implode(",", $value);
		$values .= ")";
		$test[] = $values;
	}
	$sql = "INSERT INTO `infinity`.`timesheet` (`tid`, `pid`, `uid`, `description`, `created`, `ended`, `total`) VALUES " . implode(",", $test);
	
	mysql_query($sql, $link);
	//create users table
	$sql = "CREATE TABLE `users` (
	  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user unique id',
	  `email` varchar(255) NOT NULL COMMENT 'user email address',
	  `password` varchar(128) NOT NULL COMMENT 'user password sha hash',
	  PRIMARY KEY (`uid`))";
	mysql_query($sql, $link);


	//insert user data data
	$sql = "INSERT INTO `infinity`.`users` (`uid`, `email`, `password`) VALUES 
		('1', 'vijay.mayekar@focalworks.in', 'bf0ffe5296172d2d442a92c899a262758f7df1a7ee0c242088f15cd0e5280bab36df34160b344b4b799b231db6ab1c47e62a4dc000c15445235773ccbd65d46c'), 
		('2', 'amitav.roy@focalworks.in', 'bf0ffe5296172d2d442a92c899a262758f7df1a7ee0c242088f15cd0e5280bab36df34160b344b4b799b231db6ab1c47e62a4dc000c15445235773ccbd65d46c');
	";
	//mysql_query($sql, $link);
	if (mysql_query($sql, $link)) {
	
	} else {
	    echo 'Error creating database: ' . mysql_error() . "\n";
	}



	//create clients table
	$sql = "CREATE TABLE IF NOT EXISTS `clients` (
	  `cid` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(256) NOT NULL,
	  PRIMARY KEY (`cid`))";
	mysql_query($sql, $link);

	$sql = "INSERT INTO `infinity`.`clients` (`cid`, `name`) VALUES 
		('1', 'client1'), 
		('2', 'client2')
	";
	mysql_query($sql, $link);
	
	mysql_close($link);
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Welcome to Infinity</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>

  <!--[if lt IE 7]>
  <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
  <![endif]-->

  <div class="container">
  	<div>
  		<?php if ($_POST && $_POST['user_name']) : ?>
	     	<div class="alert alert-success">  
			  <a class="close" data-dismiss="alert">×</a>  
			  <strong>Success!</strong>You have successfully done it.  
			</div> 
	     <?php else: ?>
		     <form class="form-signin" method="post" action="import.php">
		        <h2 class="form-signin-heading">Prefill Database tabel</h2>
		        <input name="user_name" type="text" class="input-block-level" placeholder="User Name" required>
		        <input name="user_passwd" type="password" class="input-block-level" placeholder="User Password">
		        <button class="btn btn-large btn-primary" type="submit">Import</button>
	     	 </form>
	     <?php endif; ?>
  	</div>


  </div>

</body>

</html>