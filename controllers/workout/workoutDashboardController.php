<?php

session_start();

if (!isset($_SESSION["userId"])){
    $url = 'http://localhost/MVC-pattern-pill/index.php';
    header('Location: ' . $url);
    exit();
}

require_once("./config/constants.php");
require_once("./models/workoutModel.php");

function getWorkout($id)
{
    return get($id);
}

function deleteWorkout($id)
{
    delete($id);
    $url = 'http://localhost/MVC-pattern-pill/index.php?controller=workoutDashboard&action=getAllWorkoutFromUser&param=' . $_SESSION["userId"];
    header('Location: ' . $url);
    exit();
}

function getAllWorkoutFromUser($userId)
{
    $data = getAllFromUser($userId);
    require_once(VIEWS . "/workout/{$_GET['controller']}View.php");
}

if (isset($_GET['action'])) {
    isset($_GET['param']) ?  call_user_func($_GET['action'], $_GET['param']) : call_user_func($_GET['action']);
}
