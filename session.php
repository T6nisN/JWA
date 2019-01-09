<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
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
// Storing Session
$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql=$mysqli->query("select * from login where username='$user_check'");
$result = mysqli_fetch_assoc($ses_sql);
$session_firstname = $result['firstname'];
$session_lastname = $result['lastname'];
$session_username = $result['username'];
$session_email = $result['email'];
$session_created = $result['created'];
$date = new DateTime($session_created);
$session_created = $date->format('d.m.Y');
if(!isset($result)){
mysqli_close($mysqli); // Closing Connection
header('Location: /'); // Redirecting To Home Page
}
?>
