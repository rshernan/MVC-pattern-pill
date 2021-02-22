<?php

// This is the entry point of your application, all your application must be executed in
// the "index.php", in such a way that you must include the controller passed by the URL
// dynamically so that it ends up including the view.

require_once("./config/constants.php");

if (isset($_GET['controller']) && $_GET['controller'] == "userDetail") {
    $path = "./controllers/user/{$_GET['controller']}Controller.php";
    if (isset($_GET['action'])) {
        isset($_GET['param']) ? $path .= "action={$_GET['action']($_GET['param'])}" : $path .= "action={$_GET['action']()}";
    }
    require_once($path);
    require_once("./views/user/{$_GET['controller']}View.php");
};

// TODO Implement the logic to include the controller passed by the URL dynamically
// In the event that the controller passed by URL does not exist, you must show the error view.
