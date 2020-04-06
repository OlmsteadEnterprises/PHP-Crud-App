<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/newstyle.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Bootstrap Theme</title>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container">
        <a href="index.php" class="navbar-brand">PHP Crud App Tutorial</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="http://localhost:8080/PHP-Crud-App/crud/index.php" class="nav-link">Index</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost:8080/PHP-Crud-App/crud/user/login.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost:8080/PHP-Crud-App/crud/user/signup.php" class="nav-link">Sign Up</a>
<!--                    --><?php //include ("user/signup.php"); ?>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a href="#share-head-section" class="nav-link">Share</a>-->
<!--                </li>-->
            </ul>
        </div>
    </div>
</nav>

<h1 align="center">Welcome to this PHP CRUD App</h1>
<h3 align="center">This is simply a basic create, read, update, and delete web app written in PHP.  For simplicity, the user login is simply to display certain skills for employers of the individual who created this web app.</h3>
<br><br>


<!-- Necessary Scripts for Bootstrap -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

</body>

</html>