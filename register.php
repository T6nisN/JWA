<?php
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("joharWindow", $connection);

if(!isset($_SESSION)) { 
    session_start();
}
/*if(empty($username)){ 
	$action['result'] = 'error';
	array_push($text,'You forgot your username'); }
if(empty($email)){ 
	$action['result'] = 'error';
	array_push($text,'You forgot your email'); }
if(empty($firstname)){ 
	array_push($text,'You forgot your firstname'); }
if(empty($lastname)){ 
	array_push($text,'You forgot your lastname'); }
if(empty($password)){ 
	array_push($text,'You forgot your password'); }
*/
$username = mysql_real_escape_string($_POST['username']);
$email = mysql_real_escape_string($_POST['email']);
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$password = mysql_real_escape_string($_POST['password']);

$action = array();
$action['result'] = null;
 
$text = array();
	if($action['result'] != 'error'){
    //no errors, continue signup
       $password = md5($password);
			   
			   //add to the database
		$add = mysql_query("INSERT INTO `login` VALUES(NULL,'$username','$password','$email','$firstname','$lastname')");
				 
		if($add){
		 
			$action['result'] = 'error';
			array_push($text,'Successfully registred'); 
			return $action;
			header( 'Location: login.php' ); 
		}else{
				 
			$action['result'] = 'error';
			array_push($text,'User could not be added to the database. Reason: ' . mysql_error());
			
			}		
}
     
$action['text'] = $text;

/*echo $username;
echo $email;
echo $firstname;
echo $lastname;
echo $password;*/
?>