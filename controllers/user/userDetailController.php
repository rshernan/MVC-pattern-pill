<?php

session_start();

require_once("./config/constants.php");
require_once("./models/userModel.php");

function getUser($id)
{
    $data = get($id);
    require_once(VIEWS . "/user/{$_GET['controller']}View.php");
}

function updateUser()
{
    $user = $_POST;
    $user['id'] = $_SESSION['userId'];
    update($user);
    header("Location: http://localhost/MVC-pattern-pill/index.php?&controller=userDetail&action=getUser&param={$user['id']}");
    exit();
}

function addUser()
{
    $id = create($_POST);
    saveSessionData($id);
    header("Location: http://localhost/MVC-pattern-pill/index.php?&controller=workoutDashboard&action=getAllWorkoutFromUser&param={$id}");
    exit();
}

function logoutUser (){
    logout();
}

if (isset($_GET['action'])) {
    if (!isset($_SESSION["userId"]) && $_GET["action"]!="addUser"){
        $url = 'http://localhost/MVC-pattern-pill/index.php';
        header('Location: ' . $url);
        exit();
    }
    isset($_GET['param']) ?  call_user_func($_GET['action'], $_GET['param']) : call_user_func($_GET['action']);
} else {
    require_once(VIEWS . "/user/{$_GET['controller']}View.php");
}
