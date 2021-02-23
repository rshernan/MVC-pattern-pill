<?php

require_once("./config/constants.php");

if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'userDetail':
            require_once(CONTROLLERS . "/user/{$_GET['controller']}Controller.php");
            break;
        case 'workoutDetail':
            require_once(CONTROLLERS . "/workout/{$_GET['controller']}Controller.php");
            break;
        case 'workoutDashboard':
            require_once(CONTROLLERS . "/workout/{$_GET['controller']}Controller.php");
            break;
    }
} else {
    session_start();
    if (isset($_SESSION)){

        session_destroy();
    }
    require_once(CONTROLLERS . "/login/loginController.php");
}
