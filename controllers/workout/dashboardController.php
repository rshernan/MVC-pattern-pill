<?php
require_once("./config/constants.php");
require_once("./models/workoutModel.php");

function addWorkout($workout)
{
    return get($workout);
}

function deleteWorkout($id)
{
    return delete($id);
}

function getAllWorkout()
{
    return getAll();
}

function getAllWorkoutFromUser($userId)
{
    getAllFromUser($userId);
}

if (isset($_GET['action'])) {
    isset($_GET['param']) ?  $_GET['action']($_GET['param']) : $_GET['action']();
}
