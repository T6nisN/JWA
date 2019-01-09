<?php include('header.php');?>
<?php if(!$friendUsername){
	header("location: profile.php"); // Redirecting To Other Page
}?>
<body >
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
		        <li><a href="/test">Test</a></li>
		        <li><a href="/my-table">My Window</span></a></li>
						<li><a href="/profile">Profile</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="/logout">Log Out</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="notification" id="notification">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php $friendInfo = getFriendInfo($friendUsername); ?>
					<div class="page-header">
						<p id="friendUsername" class="hidden"><?php	echo $friendInfo['UserName'];?></p>
						<h3><small>You are helping</small> <?php echo $friendInfo['FirstName']; ?> <?php echo $friendInfo['LastName']; ?> <small> to find his path.</small></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
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
								<button style="width:200px;" type="button" class="cta-button" value="Saada andmebaasi" id="friendAdjectivesArray"/>Send to database</button>
							</div>
					</div>
				</div>
			</div> <!--row end-->
		</div> <!--container end-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="assets/js/bootstrap.min.js"></script>

	</div>
		<?php include('footer.php');?>
</body>

</html>
