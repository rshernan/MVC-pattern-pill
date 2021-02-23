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
    require_once(VIEWS . "/workout/{$_GET['controller']}View.php");
    return get($id);
}

function updateWorkout($workout)
{
    return update($workout);
}

function addWorkout($workout)
{
    return create($workout);
}

function deleteWorkout($id)
{
    return delete($id);
}

function getAllWorkout()
{
    return getAll();
}

if (isset($_GET['action'])) {
    isset($_GET['param']) ?  $_GET['action']($_GET['param']) : $_GET['action']();
}
