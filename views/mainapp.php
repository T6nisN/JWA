<?php include('header.php');?>
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
			        <li class="active"><a href="/test">Test</a></li>
			        <li><a href="/my-table">My  Window</span></a></li>
							<li><a href="/profile">Profile</a></li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="/logout">Log Out</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="notification" id="notification">

						</div>
					</div>
				</div>
				<div class="row">

				</div>
			</div>

			<div class="container-fluid" >
				<div class="row">
					<div class="col-md-6">
						<div class="page-header">
							<h3>Choose at least 6 adjectives</h3>
						</div>
						<div class="text-center adjective-buttons">
								<?php getAllAdjectives();  ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="page-header">
							<h3>Chosen adjectives <small> <span id="adjectivesLimit">6</span> </small> </h3>
						</div>
						<div class="chosen-adjectives">
								<div id="WhatButton" class="well"></div>
								<div>
									<button style="width:200px;" type="button" class="cta-button" value="Saada andmebaasi" id="myAdjectivesArray"/>Send to database</button>
								</div>
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
		</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
		<script>


			$(document).ready(function(){
			    $("#myBtn").click(function(){
			        //$("#myModal").modal();
			    });
			});

		</script>
<?php include('footer.php');?>
</body>

</html>
