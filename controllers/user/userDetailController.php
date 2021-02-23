<?php
require_once("./config/constants.php");
require_once("./models/userModel.php");

function getUser($id)
{;
    $data = get($id);
    require_once(VIEWS . "/user/{$_GET['controller']}View.php");
}

function updateUser($user)
{
    session_start();
    $user['id'] = $_SESSION['userId'];
    update($user);
    header("Location: http://localhost/index.php?&controller=userDetail&action=getUser&param={$user['id']}");
}

function addUser()
{
    $data = create(getQueryStringParameters());
    require_once(VIEWS . "/user/{$_GET['controller']}View.php");
}

function getQueryStringParameters(): array
{
    parse_str(file_get_contents('php://input'), $query);
    return $query;
}

if (isset($_GET['action'])) {
    isset($_GET['param']) ?  $_GET['action']($_GET['param']) : $_GET['action']();
} else {
    require_once(VIEWS . "/user/{$_GET['controller']}View.php");
}
