<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'login';

switch ($page) {
    case 'login':
        include('views/login.php');
        break;
    case 'home':
        include('views/home.php');
        break;
    case 'create_account':
        include('views/create_account.php');
        break;
    default:
        echo "404 - Page not found";
        break;
}
?>
