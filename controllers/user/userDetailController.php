<?php
require_once("./config/constants.php");
require_once("./models/userModel.php");

function getUser($id)
{
    return get($id);
}

function updateUser($user)
{
    return update($user);
}

function addUser($user)
{
    return create($user);
}

function deleteUser($id)
{
    return delete($id);
}

function getAllUser()
{
    return getAll();
}
