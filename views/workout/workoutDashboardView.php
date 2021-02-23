<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Workout dashboard</h2>
    <?php
    foreach ($data as $workout) {
        echo $workout["name"];
        echo $workout["mode"];
        echo $workout["duration"];
        echo "<a href='http://localhost/MVC-pattern-pill/index.php?controller=workoutDetail&action=getWorkout&param=" . $workout["id"] . "'><button>Details</button></a>";
        echo "<a href='http://localhost/MVC-pattern-pill/index.php?controller=workoutDashboard&action=deleteWorkout&param=" . $workout["id"] . "'><button>Delete workout</button></a>";
        echo "<br>";
    }
    echo "<a href=''><Logout</button></a>";
    ?>

</body>

</html>