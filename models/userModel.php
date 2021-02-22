<?php

function connect()
{
    $db = new mysqli('127.0.0.1', 'root', '', 'MVC_pill');
    if ($db->connect_errno) {
        echo "Error: Fallo al conectarse a MySQL debido a: \n";
        echo "Errno: " . $db->connect_errno . "\n";
        echo "Error: " . $db->connect_error . "\n";
    }
    return $db;
}

function validateUser($email, $password)
{
    $usersObject = connect()->query("SELECT * FROM users WHERE email='{$email}' AND password='{$password}'");
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

    $usersObject = connect()->query("SELECT * FROM users WHERE id = '{$userId}'");
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
