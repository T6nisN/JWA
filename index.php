<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
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
        <title>Johar Window Test</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
	<script>
		window.onload = function(){
			$("#myBtn").click(function(){
				$("#myModal").modal();
			});
		};
	</script>
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Johar Window Test</strong></h1>
                            <div class="description">
                            	<p><?php /*show_errors($action);*/?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login</h3>
                            		<p>Insert Username and Password:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input id="name" type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input id="password" name="password" type="password"  placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
									<span><?php echo $error; ?></span>
			                        <button name="submit" type="submit" class="btn">Login</button>
			                        <a id="myBtn" class="btn">Or register</a>
									
								</form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>...or try login with social media:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-1 btn-link-1-facebook" href="facebookindex.html">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<!--<a class="btn btn-link-1 btn-link-1-twitter" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>-->
                        	</div>
                        </div>
                    </div>
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
          <h3 class="modal-title" style="text-align:center;">Register</h3>
         <!-- <h4 class="modal-title" style="text-align:center;">Invite your friends to answer about you.</h4>-->
        </div>
        <div class="modal-body">
            <form action="register.php" method="POST">
				<div class="form-group">
			        <label class="sr-only" for="form-username">Username</label>
			        <input id="name" type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
			    </div>
				<div class="form-group">	
			        <label class="sr-only" for="form-password">Password</label>
			        <input id="password" type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
			    </div>
				<div class="form-group">
			        <label class="sr-only" for="form-email">Email</label>
			        <input id="email" type="text" name="email" placeholder="email..." class="form-email form-control" id="form-username">
			    </div>
				<div class="form-group">
			        <label class="sr-only" for="form-firstname">First Name</label>
			        <input id="name" type="text" name="firstname" placeholder="First Name..." class="form-firstname  form-control" id="form-lastname">
			    </div>
				<div class="form-group">
			        <label class="sr-only" for="form-lastname">Last Name</label>
			        <input id="name" type="text" name="lastname" placeholder="Last name..." class="form-lastname form-control" id="form-lastname">
			    </div>
				
			 <button name="submit" type="submit" class="btn">Register</button>
		  </form>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-default" data-dismiss="modal">Not now!</a>
        </div>
      </div>
      
    </div>
  </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
			
        <![endif]-->

    </body>
	<p style="text-align:center;">Author:Tõnis Nerep</p>
</html>