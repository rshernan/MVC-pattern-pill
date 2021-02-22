<?php

require_once("./config/constants.php");

function getDatabase()
{
    $mysql_host = "localhost";
    $mysql_database = "MVC_pill";
    $mysql_user = "root";
    $mysql_password = "";

    return new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
}

function validateUser($email, $password)
{
    $usersObject = getDatabase()->query("SELECT * FROM users WHERE email='{$email}' AND password='{$password}'");
    echo '<pre>';
    var_dump($usersObject);

    if (isset($usersObject)) {
        $usersArray = $usersObject->fetch_assoc();
        $userId = $usersArray['id'];
    } else {
        $userId = false;
    }

    return $userId;
}

function saveSessionData($userId)
{
    session_start();

    $usersObject = getDatabase()->query("SELECT * FROM users WHERE id = '{$userId}'");
    $user = $usersObject->fetch_assoc();

    $_SESSION["userId"] = $user["id"];
    $_SESSION["name"] = $user["name"];
    $_SESSION["password"] = $user["password"];
    $_SESSION["email"] = $user["email"];
}

function logout()
{
    session_start();
    session_destroy();

    header("Location: index.php");
    exit();
}

function get($id)
{
    $query = getDatabase()->query("select * from users where id=" . $id);
    return $query->fetch_assoc();
}

function getAll()
{
    $users = [];
    $query = getDatabase()->query("select * from users");
    while ($user = $query->fetch_assoc()) {
        array_push($users, $user);
    }
    return $users;
}

function delete($id)
{
    $query = getDatabase()->query("delete from users where id= {$id}");
    return "usuario eliminado con exito";
}

//the user need to be an array take care with this
function update(array $user)
{
    foreach ($user as $key => $value) {
        if ($key != "id") {
            $query = getDatabase()->query("update users set {$key} = '{$value}' where id = {$user["id"]}");
        }
    }
    return "usuario actualizado con exito";
}

function create(array $user)
{
    $keys = "";
    $values = "";
    foreach ($user as $key => $value) {
        $keys .= "{$key},";
        $values .= "'{$value}',";
    }
    $rtrim = 'rtrim';
    echo "insert ({$rtrim($keys, ",")}) into users values ({$rtrim($values, ",")})";
}
