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
    $data = get($id);
    require_once(VIEWS . "/workout/{$_GET['controller']}View.php");
}

function updateWorkout()
{
    $workout = getQueryStringParameters();
    update($workout);
    header("Location: http://localhost/MVC-pattern-pill/index.php?&controller=workoutDetail&action=getWorkout&param={$workout['id']}");
}

function addWorkout()
{
    $workout = getQueryStringParameters();
    array_pop($workout);
    $workout["user_id"]=$_SESSION["userId"];
    create($workout);
    header("Location: http://localhost/MVC-pattern-pill/index.php?&controller=workoutDashboard&action=getAllWorkoutFromUser&param={$_SESSION["userId"]}");
}

function deleteWorkout($id)
{
    return delete($id);
}

function getQueryStringParameters(): array
{
    parse_str(file_get_contents('php://input'), $query);
    return $query;
}

if (isset($_GET['action'])) {
    isset($_GET['param']) ?  $_GET['action']($_GET['param']) : $_GET['action']();
}else{
    require_once(VIEWS . "/workout/{$_GET['controller']}View.php");
}
