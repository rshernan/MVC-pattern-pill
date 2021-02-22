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
