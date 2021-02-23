<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action=<?= (isset($data)) ? "index.php?controller=workoutDetail&action=updateWorkout" : "index.php?controller=workoutDetail&action=addWorkout" ?> method="POST">
        <label for="name">name:</label>
        <input type="text" name="name" id="name" value=<?= isset($data) ? $data['name'] : '' ?>>
        <label for="mode">mode:</label>
        <input type="text" name="mode" id="mode" value=<?= isset($data) ? $data['mode'] : '' ?>>
        <label for="duration">duration:</label>
        <input type="text" name="duration" id="duration" value=<?= isset($data) ? $data['duration'] : '' ?>>
        <input type="hidden" name="id" value=<?= isset($data) ? $data['id'] : '' ?>>
        <input type="submit" value=<?= (isset($data)) ? "modificar" : "crear" ?>>
    </form>
    <?php
    echo "<a href='http://localhost/MVC-pattern-pill/index.php?controller=userDetail&action=logout'><button>Logout</button></a>";
    echo "<a href=http://localhost/MVC-pattern-pill/index.php?controller=workoutDashboard&action=getAllWorkoutFromUser&param={$_SESSION['userId']}>Go to dashboard</a>"
    ?>
</body>

</html>