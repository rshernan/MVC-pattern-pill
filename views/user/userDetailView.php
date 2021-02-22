<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php?" <?= (isset($_SESSION['user'])) ? "controller=userDetail&action=updateUser" : "controller=userDetail&action=addUser" ?> method="GET">
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
        <label for="email">email:</label>
        <input type="email" name="email" id="email">
        <?php
        if (!isset($_GET['action'])) {
            echo '<label for="password">password:</label>
            <input type="password" name="password" id="password">';
        }
        ?>
        <input type="submit" value=<?= (isset($_GET['action'])) ? "modificar" : "crear" ?>>
    </form>
</body>

</html>