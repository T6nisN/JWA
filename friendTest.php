<?php
include_once('functions.php');
$friendUsername;

if(isset($_POST['friend'])) {
	global $friendUsername;
	$friend = $_POST['friend'];
	$friendUsername = $friend;
	//echo $friendUsername;
	//header('Location: friendTest.php');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Johar Window Test</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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

<script>
	var friendAdjectives = new Array;
	var friendUsername;
    function GetButtonName() {
		
        var elements = document.getElementsByName ("adjective");
		var divAnswer = document.getElementById("WhatButton");
		
		
        for (var i=0; i < elements.length; i++) {
            elements[i].onclick = function() {
				
				document.getElementById("WhatButton").innerHTML += "<p style='float:left;'>"+this.value+"/</p>";
					friendAdjectives.push(this.value);
					
					console.log(friendAdjectives);
					//console.log(document.getElementById("friendUsername").innerHTML);
				};
            }
	};

	function SendArrayToPHP() {
    var friend_data_str = friendAdjectives;
	var friend_data_username = document.getElementById("friendUsername").innerHTML;

    $.ajax({
           type: 'post',
           url: 'functions.php',
           data: {
                    source2: friend_data_str,
					friend: friend_data_username
                    },
           success: function( a ) {
					console.log( a );
					 
                    }
           }); 
};

   
</script>

</head>
<body >
	<nav class="navbar navbar-default">
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
	    <li><a href="profile.php">Menu</a></li>
        <li class="active"><a href="mainapp.php">Test<span class="sr-only">(current)</span></a></li>
        <li><a href="myTable.php">My Johar Window</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="profile.php"><!--<?php echo $login_session; ?>-->Profile</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="row">
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Adjectives</h3>
  </div>
  <div class="panel-body">
    <div id="WhatButton">
	</div>
  </div>
  </div>
</div>
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Sõber keda hindad:</h3>
  </div>
  <div class="panel-body">
    <div >
		<p id="friendUsername" ><?php getFriendInfo($friendUsername); ?></p>
	</div>
  </div>
</div>
</div>
</div>
<div class="container" >
	<div class="row">
		
		<?php getAllAdjectives();


		 ?>
		

		<div class="col-md-8">
			
			
			<div style="text-align:center;">
			
			<input style="width:200px;" name="Saada andmebaasi" type="submit" class="myButton" value="Send to Database" onclick="SendArrayToPHP()"/>
			
			</div>
		</div>
		
	</div> <!--row end-->
</div> <!--container end-->
	<p style="text-align:center;">Author:Tõnis Nerep</p>
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>