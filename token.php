<?php
include('session.php');
generateFormHash($login_session);
function generateFormHash($login_session)
{
    $hash = md5(mt_rand(1,1000000) . $login_session);
    $_SESSION['csrf_hash'] = $hash;
    print_r ($hash);
}

?>