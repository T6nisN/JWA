<?php
include_once('functions.php');


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
	var userAdjectives = new Array;
	window.onload = function(){
		var elements = document.getElementsByName ("adjective");
		var divAnswer = document.getElementById("WhatButton");
		
		
        for (var i=0; i < elements.length; i++) {
            elements[i].onclick = function() {
				
				document.getElementById("WhatButton").innerHTML += "<p style='float:left;'>"+this.value+"/</p>";
					userAdjectives.push(this.value);
					
					//console.log(userAdjectives);
				  
				};
            }
	}
	function SendArrayToPHP() {
    var data_str = userAdjectives;

    $.ajax({
           type: 'post',
           url: 'functions.php',
           data: {
                    source1: data_str
                    },
           success: function( a ) {
					console.log( a );
					 
                    }
           }); 
};
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
   
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
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Adjectives</h3>
  </div>
  <div class="panel-body">
    <div id="WhatButton">
	</div>
  </div>
</div>
<div class="container" >
	<div class="row">
		
		<?php getAllAdjectives();


		 ?>
		

		<div class="col-md-8">
			
			<table border="1" style="table-layout: fixed;">
				<tr> 
					<th style="padding:10px;text-align:center;width: 50%;">Arena</th>
					<th style="padding:10px;text-align:center;width: 50%;background-color:lightgreen">Blind Spot</th>
					
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
			<br>
			<div style="text-align:center;">
			<!--<input style="width:200px;" name="Saada andmebaasi" type="button" class="myButton" id="myBtn" value="Saada andmebaasi" onclick="SendArrayToPHP()"/>-->
			<input style="width:200px;" name="Saada andmebaasi" type="button" class="myButton" id="myBtn" value="Send To Database" />
			<form action="token.php">
				<input type="text" placeholder="Data">
				<button type="submit">Vajuta</button>
			</form>
			</div>
		</div>
		<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="text-align:center;">Thank you for your answer</h3>
          <h4 class="modal-title" style="text-align:center;">Invite your friends to answer about you.</h4>
        </div>
        <div class="modal-body">
          <form action="mail.php" method="POST">
			<input type="text" name="email" placeholder="First Friend Email..." name="friend_1_email">
<!--
			<input type="text" placeholder="Second Friend Email..." name="friend_2_email">

			<input type="text" placeholder="Third Friend Email..." name="friend_3_email">
	
			<input type="text" placeholder="Fourth Friend Email..." name="friend_4_email">
	
			<input type="text" placeholder="Fifth Friend Email..." name="friend_5_email">
-->				
			 <button name="submit" type="submit" class="myButton">Invite to test</button>
		  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Not now!</button>
        </div>
      </div>
      
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