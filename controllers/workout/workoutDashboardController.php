<?php

session_start();

require_once("./config/constants.php");
require_once("./models/workoutModel.php");

function getWorkout($id)
{
    return get($id);
}

function deleteWorkout($id)
{
    delete($id);
    var_dump($_SESSION["userId"]);
    getAllWorkoutFromUser($_SESSION["userId"]);
}

function getAllWorkoutFromUser($userId)
{
    $data = getAllFromUser($userId);
    require_once(VIEWS . "/workout/{$_GET['controller']}View.php");
}

if (isset($_GET['action'])) {
    isset($_GET['param']) ?  $_GET['action']($_GET['param']) : $_GET['action']();
}

function getQueryStringParameters(): array
{
    parse_str(file_get_contents('php://input'), $query);
    return $query;
}
