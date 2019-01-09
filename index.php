<?php

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/' :
        require __DIR__ . '/views/index.php';
        break;
    case '' :
        require __DIR__ . '/views/index.php';
        break;
    case '/profile' :
        require __DIR__ . '/views/profile.php';
        break;
    case '/test' :
        require __DIR__ . '/views/mainapp.php';
        break;
    case '/test-friend' :
        require __DIR__ . '/views/friendTest.php';
        break;
    case '/my-table' :
        require __DIR__ . '/views/myTable.php';
        break;
    case '/info' :
        require __DIR__ . '/views/jwa-info.php';
        break;
    case '/login' :
        require __DIR__ . '/login.php';
        break;
    case '/logout' :
        require __DIR__ . '/logout.php';
        break;
    case '/register' :
        require __DIR__ . '/register.php';
        break;
    default:
        require __DIR__ . '/views/404.php';
        break;
}
