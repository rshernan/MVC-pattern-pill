<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>

<body>
    <form class="form" action="index.php" method="GET">
        <label for="email" >Email:</label>
        <input id="email" type="email" class="form-control" name="email" require>
        <label for="password">Password:</label>
        <input id="password" type="password" class="form-control" name="password" require>
        <input type="submit" value="log in">
    </form>
    <a href="http://localhost/MVC-pattern-pill/index.php?controller=userDetail">Create new user</a>
    
</body>

</html>