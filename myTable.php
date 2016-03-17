
<?php
include('session.php');
include('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Johar Window Test</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html;
charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> <!--Disable zooming on mobile-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="style.css" rel="stylesheet" type="text/css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</head>
<body><nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Johar Window Test</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		<li ><a href="profile.php">Menu</a></li>
        <li ><a href="mainapp.php">Start Test<span class="sr-only">(current)</span></a></li>
		<li class="active"><a href="myTable.php">My Johar Window</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="col-md-12">
			<table border="1" style="table-layout: fixed;">
				<tr> 
					<th style="padding:10px;text-align:center;width: 50%;">Arena</th>
					<th style="padding:10px;text-align:center;width: 50%;background-color:">Blind Spot</th>
					
				</tr>
				<tr> 
					<td style="padding:10px;"> <?php getMyArena() ?> </td>
					<td style="padding:10px;background-color:lightgreen;"> <?php getMyBlindSpot() ?> </td>
					 
				</tr>
				<tr>
					<th style="padding:10px;text-align:center;width: 50%;background-color:lightpink">Facade</th>
					<th style="padding:10px;text-align:center;width: 50%;background-color:lightgrey">Unknown</th>
				</tr>
				<tr> 
					
					<td style="padding:10px;background-color:lightpink;"> <?php getMyFacade() ?> </td>
					<td style="padding:10px;background-color:lightgrey;"> <?php getMyUnknownAdjectives() ?> </td>
					
				</tr>
			</table>
			
		</div>
			
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>