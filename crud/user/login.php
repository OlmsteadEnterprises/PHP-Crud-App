<?php
//Login PHP File
$email = $password = "";
$emailError = $passwordError = "";

function formData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailError = "Invalid Email.";
    } else {
        $email = formData($_POST["email"]);
    }
    if (empty($_POST["password"])) {
        $passwordError = "Password is required.";
    } else {
        $password = formData($_POST["password"]);
    }

}//outer if statement
//End of PHP Code
?>
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
    <script src="/js/registration.js"></script>
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
                    <a href="http://localhost:8080/crud/index.php" class="nav-link">Index</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost:8080/crud/user/login.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost:8080/crud/user/signup.php" class="nav-link">Sign Up</a>
                </li>
                <!--                <li class="nav-item">-->
                <!--                    <a href="#share-head-section" class="nav-link">Share</a>-->
                <!--                </li>-->
            </ul>
        </div>
    </div>
</nav>
<br><br><br><br>

<!-- Validation Form -->
<div class="container" align="center">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="card bg-dark text-center card-form">
            <div class="card-body">
                <h3 class="text-light">Login</h3>
                <p class="text-light">Please fill out this form to register!</p>
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Email">
<!--                    <div class="invalid_feedback is-invalid">-->
<!--                        <small class="text-danger">--><?php //echo $fnameError ?><!--</small>-->
<!--                    </div>-->
                </div>
                <!-- Password -->
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                </div>
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="submit" class="btn btn-outline-light btn-block" placeholder="Sign Up">
                </div>
<!--                <div class="form-group col-md-5 ml-auto mr-auto">-->
<!--                    <small class="form-control corm-control-lg">--><?php //echo $me?><!--</small>-->
<!--                </div>-->
            </div>
        </div>
    </form>
</div>



<!-- Necessary Scripts for Bootstrap -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

</body>

</html>

<?php
//PHP Database Logic for login.php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'phpcrudtutorial';

$connection = mysqli_connect($host, $user, $password, $db_name);
if (!$connection) {
    die("CONNECTION TO DB FAILED.  " . mysqli_error($connection));
} //check connection

$sql = "SELECT email, password FROM Users WHERE email='$email' AND password='$password'";
$result = mysqli_query($connection, $sql);
$count = mysqli_num_rows($result);
if ($count == 0) {
    $message = "Invalid email or password!";
} else {
    $message = "You are successfully logged in!";
}


//while ($row = mysqli_fetch_assoc($result)) {
//    echo  $row["email"] . "\t" . $row["password"];
//
//}


mysqli_close($connection);




//End of php code.
?>