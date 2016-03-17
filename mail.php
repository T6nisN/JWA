<?php
include('session.php');

if(isset($_POST['email'])) {
	$friend_email = array();
	$friend_email = $_POST['email'];
	mailToFriends($friend_email);
}

function mailToFriends($friend_email){
$to      = $friend_email;
$subject = 'Can you help me?';
$message = $_SESSION['csrf_hash'];
$headers = 'From: joharwindow@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
	echo ($to.$subject.$message.$headers);
}
?>