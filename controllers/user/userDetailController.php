<?php
require_once("./config/constants.php");
require_once("./models/userModel.php");

function getUser($id)
{
    require_once(VIEWS . "/user/{$_GET['controller']}View.php");
    return get($id);
}

function updateUser($user)
{
    return update($user);
}

function addUser()
{
    return create(getQueryStringParameters());
}

function deleteUser($id)
{
    return delete($id);
}

function getAllUser()
{
    return getAll();
}

function getQueryStringParameters(): array
{
    parse_str(file_get_contents('php://input'), $query);
    return $query;
}

if (isset($_GET['action'])) {
    echo $_GET['action'];
    isset($_GET['param']) ?  $_GET['action']($_GET['param']) : $_GET['action']();
}
