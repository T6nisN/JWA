<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: /profile");
}
//check if the form has been submitted
if(isset($_POST['signup'])){

}
function show_errors($action){
    $error = false;
    if(!empty($action['result'])){
        $error = "<ul class=\"alert $action[result]\">"."\n";
        if(is_array($action['text'])){
            //loop out each error
            foreach($action['text'] as $text){
                $error .= "<li><p>$text</p></li>"."\n";
            }
        }else{
            //single error
            $error .= "<li><p>$action[text]</p></li>";
        }
        $error .= "</ul>"."\n";
    }
    return $error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JWA</title>
    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" href="assets/ico/favicon.png">
</head>

<body class="body-bg">
  <img class="background-image" src="assets/img/career-background.png" alt="">
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
          <li ><a href="/info">What is JWA ?</a></li>
          <li class="active"><a href="/">Login / Register</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
    <!-- Top content -->
    <div class="top-content">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                      <div class="page-header">
                        <h3>Login</h3>
                      </div>
                      <div class="form-bottom">
                           <form role="form" action="" method="post" class="login-form">
  			                    	<div class="form-group">
  			                        	<input type="text" name="username" class="form-control" id="form-username" required>
                                  <label class="form-control-placeholder" for="form-username">Username</label>
			                        </div>
			                        <div class="form-group">
  			                        	<input name="password" type="password" class="form-control" id="form-password" required>
                                  <label class="form-control-placeholder" for="form-password">Password</label>
			                        </div>
                              <div class="form-group">
                                  <span><?php echo $error; ?></span>
                              </div>
                              <div class="form-group">
                                  <button name="submit" type="submit" class="cta-button">Login</button>
    			                        <a id="myBtn" class="link">Or register</a>
                              </div>
			                      </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
		<!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title" style="text-align:center;">Register</h3>
          </div>
          <div class="modal-body">
            <form action="/register" method="POST">
        				<div class="form-group">
    			        <input id="name" type="text" name="username" class="form-username form-control" id="form-username" required>
                  <label class="form-control-placeholder" for="form-username">Username</label>
      			    </div>
        				<div class="form-group">
      			      <input id="password" type="password" name="password" class="form-password form-control" id="form-password" required>
                  <label class="form-control-placeholder" for="form-password">Password</label>
      			    </div>
        				<div class="form-group">
    			        <input id="email" type="text" name="email" class="form-email form-control" id="form-username" required>
                  <label class="form-control-placeholder" for="form-email">Email</label>
      			    </div>
        				<div class="form-group">
    			        <input id="name" type="text" name="firstname" class="form-firstname  form-control" id="form-lastname" required>
                  <label class="form-control-placeholder" for="form-firstname">First Name</label>
      			    </div>
        				<div class="form-group">
    			        <input id="name" type="text" name="lastname"  class="form-lastname form-control" id="form-lastname" required>
    			        <label class="form-control-placeholder" for="form-lastname">Last Name</label>
      			    </div>
        			 <button name="submit" type="submit" class="cta-button">Register</button>
      		   </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <?php include('footer.php');?>

</body>
</html>
