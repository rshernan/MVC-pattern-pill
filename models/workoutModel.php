<?php

require_once("./config/constants.php");

function getDatabase()
{
    $mysql_host = "localhost";
    $mysql_database = "MVC_pill";
    $mysql_workout = "root";
    $mysql_password = "";

    return new mysqli($mysql_host, $mysql_workout, $mysql_password, $mysql_database);
}

function get($id)
{
    $query = getDatabase()->query("select * from workout where id=" . $id);
    return $query->fetch_assoc();
}

function getAllFromworkout($idworkout)
{
    $workouts = [];
    $query = getDatabase()->query("select * from workout where workout_id=" . $idworkout);
    while ($workout = $query->fetch_assoc()) {
        array_push($workouts, $workout);
    }
    return $workouts;
}

function getAll()
{
    $workouts = [];
    $query = getDatabase()->query("select * from workout");
    while ($workout = $query->fetch_assoc()) {
        array_push($workouts, $workout);
    }
    return $workouts;
}

function delete($id)
{
    $query = getDatabase()->query("delete from workout where id= {$id}");
    return "usuario eliminado con exito";
}

//the workout need to be an array take care with this
function update(array $workout)
{
    foreach ($workout as $key => $value) {
        if ($key != "id") {
            $query = getDatabase()->query("update workout set {$key} = '{$value}' where id = {$workout["id"]}");
        }
    }
    return "usuario actualizado con exito";
}

function create(array $workout)
{
    $keys = "";
    $values = "";
    foreach ($workout as $key => $value) {
        $keys .= "{$key},";
        $values .= "'{$value}',";
    }
    $rtrim = 'rtrim';
    echo "insert ({$rtrim($keys, ",")}) into workout values ({$rtrim($values, ",")})";
}
