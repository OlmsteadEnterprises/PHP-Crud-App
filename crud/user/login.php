<?php
//Login PHP File
global $connection;
global $email, $password, $filtered_email, $pass2;
//$email = $password = $filtered_email = $pass2 = "";
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
//    login($email, $password);
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
        <a href="http://localhost:8080/PHP-Crud-App/crud/index.php" class="navbar-brand">PHP Crud App Tutorial</a>
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
    <form action="" method="post">
        <div class="card bg-dark text-center card-form">
            <div class="card-body">
                <h3 class="text-light">Login</h3>
                <p class="text-light">Please fill out this form to register!</p>
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Email">
                    <div class="">
                        <small class="text-danger"><?php echo $emailError; ?></small>
                    </div>
                </div>
                <!-- Password -->
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                    <div class="">
                        <small class="text-danger"><?php echo $passwordError; ?></small>
                    </div>
                </div>
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="submit" class="btn btn-outline-light btn-block">
                </div>
                <div class="form-group col-md-5 ml-auto mr-auto">
<!--                    <small class="form-control form-control-lg">--><?php //echo $me?><!--</small>-->
                    <div>
                        <small class="text-primary"?><?php echo "Client: <br>"; ?></small>
                        <small class="text-primary"><?php echo $email . "    " . $password; ?></small><br>
                        <small class="text-danger"><?php echo "Database: <br>"; ?></small>
                        <small class="text-danger"><?php echo login($email, $password); ?></small>
                    </div>
                </div>
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
function login($db_email, $db_password) {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'phpcrudtutorial';

    $connection = mysqli_connect($host, $user, $password, $db_name);
    if (!$connection) {
        die("CONNECTION TO DB FAILED.  " . mysqli_error($connection));
    } //check connection


    $email_sql = "SELECT id, firstname, lastname, email, password, activation_key FROM Users WHERE email='$db_email'";
    $password_sql = "SELECT password FROM Users WHERE password = '$db_password'";



    $email_result = mysqli_query($connection, $email_sql);
    $password_result = mysqli_query($connection, $password_sql);

    $email_count = mysqli_num_rows($email_result);
    $password_count = mysqli_num_rows($password_result);

    $filtered_email = filter_var($db_email, FILTER_SANITIZE_EMAIL);
    $pass2 = mysqli_real_escape_string($connection, $db_password);

    if (!$email_sql) {
        die("QUERY FAILED!!! " . mysqli_error($connection));
    }
    if($email_count <= 0) {
        if (!empty($db_email) && !empty($db_password)) {
            return "User NOT found! Try a different email and password!";
        }
    } else {
        echo $filtered_email . "  " . $pass2 . "<br><br>";
        if (mysqli_num_rows($email_result) > 0) {
            //print_r(mysqli_fetch_assoc($email_result));
            while ($row = mysqli_fetch_assoc($email_result)) {
                $user_id = $row['id'];
                $user_firstname = $row['firstname'];
                $user_lastname = $row['lastname'];
                $user_email = $row['email'];
                $user_password = $row['password'];
                $user_activation_key = $row['activation_key'];

            }
            echo "Id: " . $user_id . "    First Name: " . $user_firstname . "    Last Name: " . $user_lastname . "      Email: " . $user_email;
        }
        $_SESSION['id'] = $user_id;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['email'] = $user_email;
        $_SESSION['password'] = $user_password;
        $_SESSION['activation_key'] = $user_activation_key;


    }//else statement

    mysqli_close($connection);
}//login function




//End of php code.
?>