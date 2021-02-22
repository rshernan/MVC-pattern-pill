<?php

require("./models/userModel.php");

if (isset($_GET["email"])) {
    if ($user = validateUser($_GET["email"], $_GET["password"])) {
        saveSessionData($user);
        $url = 'http://localhost/MVC-pattern-pill/views/workout/dashboardView.php';
        echo $url;
        header('Location: ' . $url);
        exit();
    } else {
        header("Refresh: 0; index.php");
        exit();
    }
} else {
    require_once(VIEWS . "/login/loginView.php");
}
