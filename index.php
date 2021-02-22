<?php

// This is the entry point of your application, all your application must be executed in
// the "index.php", in such a way that you must include the controller passed by the URL
// dynamically so that it ends up including the view.

require_once("./config/constants.php");

if (isset($_GET['controller'])) {
    if ($_GET['controller'] == "userDetail") {
        require_once(CONTROLLERS . "/user/{$_GET['controller']}Controller.php");
        require_once(VIEWS . "/user/{$_GET['controller']}View.php");
    }
    if ($_GET['controller'] == "workoutDetail") {
        require_once(CONTROLLERS . "/workout/{$_GET['controller']}Controller.php");
        require_once(VIEWS . "/workout/{$_GET['controller']}View.php");
    }
    if ($_GET['controller'] == "workoutDashboard") {
        require_once(CONTROLLERS . "/workout/{$_GET['controller']}Controller.php");
        require_once(VIEWS . "/workout/{$_GET['controller']}View.php");
    }
} else {
    require_once(CONTROLLERS . "/login/loginController.php");
}


// TODO Implement the logic to include the controller passed by the URL dynamically
// In the event that the controller passed by URL does not exist, you must show the error view.
