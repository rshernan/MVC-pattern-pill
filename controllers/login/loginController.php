<?php

require("./models/userModel.php");

if (isset($_POST["email"])) {
    if ($userId = validateUser($_POST["email"], $_POST["password"])) {
        saveSessionData($userId);
        $url = 'http://localhost/MVC-pattern-pill/index.php?controller=workoutDashboard&action=getAllWorkoutFromUser&param='. $_SESSION["userId"];
        header('Location: ' . $url);
        exit();
    } else {
        header("Refresh: 0; index.php");
        exit();
    }
} else {
    require_once(VIEWS . "/login/loginView.php");
}
