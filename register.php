<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mysqli = mysqli_connect("localhost", "root", "root");
if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }

if (!$mysqli)
  {
  die('Could not connect: ' . mysqli_error());
  }

$db = mysqli_select_db($mysqli, 'joharWindow');

if (!$db)
  {
  die ("Can\'t use joharWindow : " . mysqli_error());
  }

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
$username = $mysqli->real_escape_string($_POST['username']);
$email = $mysqli->real_escape_string($_POST['email']);
$firstname = $mysqli->real_escape_string($_POST['firstname']);
$lastname = $mysqli->real_escape_string($_POST['lastname']);
$password = $mysqli->real_escape_string($_POST['password']);

$action = array();
$action['result'] = null;

$text = array();

	if($action['result'] != 'error'){
    //no errors, continue signup
    $password = md5($password);

    $userNameCheck = $mysqli->query("SELECT username FROM login WHERE username='".$username."'");
    if (mysqli_num_rows($userNameCheck) != 0) {
      echo "Username already exists";
      die;
       }
    $userEmailCheck = $mysqli->query("SELECT email FROM login WHERE email='".$email."'");
    if (mysqli_num_rows($userEmailCheck) != 0) {
      echo "Email already in use";
      die;
       }
			   //add to the database
		$add = $mysqli->query("INSERT INTO `login` VALUES(NULL,'$username','$password','$email','$firstname','$lastname',CURRENT_TIMESTAMP)");
		if($add){
			$action['result'] = 'error';
			array_push($text,'Successfully registred');
			return $action;
			header( 'Location: /login' );
		}else{

			$action['result'] = 'error';
			array_push($text,'User could not be added to the database. Reason: ' . mysqli_error($mysqli));

			}
}
$action['text'] = $text;
?>
