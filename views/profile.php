<?php
include('session.php');
include('functions.php');


?>
<!DOCTYPE html>
<html>
<head>
<title>JWA</title>

<meta http-equiv="Content-Type" content="text/html;
charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> <!--Disable zooming on mobile-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>
function redirect(){
	window.location="/test"
	return}

</script>
</head>
<body>
	<div class="main-wrapper">
		<nav class="navbar jwa-navbar">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="/">JWA</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li ><a href="/test">Test</a></li>
						<li><a href="/my-table">My Window</span></a></li>
						<li class="active"><a href="/profile">Profile</a></li>
			 		</ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="/logout">Log Out</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<div class="sidebar">
			<div class="container-fluid">
				<div class="page-header">
					<h3><small>Hi, </small><?php echo $session_firstname.' '.$session_lastname; ?></h3>
				</div>
				<div class="">
					<input href="#" type="button" class="cta-button" onclick="redirect()" value="Start Test" ></input>
				</div>
				<div class="personal-information">
					<p><span>Firstname: </span><?php echo $session_firstname; ?></p>
					<p><span>Lastname: </span><?php echo $session_lastname; ?></p>
					<p><span>Email: </span><?php echo $session_email; ?></p>
					<p><span>Created: </span><?php echo $session_created; ?></p>
					<a href="changePersonalInfo.php" class="link">Change</a>
				</div>
			</div>
			<div class="sidebar-footer">
				<a href="logout.php" class="link">Log Out</a>
			</div>
		</div>
		<div class="main">
			<div class="container-fluid">
				<div class="page-header">
					<h3>Test your friends</h3>
				</div>
				<?php getFriends(); ?>
			</div>
		</div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<?php include('footer.php');?>
</body>
</html>
