<?php
//Client Side Form Validation
$fname = $lname = $email = $password = $confirmPassword = "";
$fnameError = $lnameError = $emailError = $passwordError = $confirmPasswordError = "";
$fnameError2 = $lnameError2 = $emailError2 = $pwordError2 = "";

function formData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnameError = "First Name is required.";
    } else {
        $fname = formData($_POST["fname"]);
    }
    if (empty($_POST["lname"])) {
        $lnameError = "Last Name is required.";
    } else {
        $lname = formData($_POST["lname"]);
    }
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
    if (empty($_POST["confirmPassword"])) {
        $confirmPasswordError = "You must confirm your password.";
    } else {
        $confirmPassword = formData($_POST["confirmPassword"]);
    }
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    if ($password != $confirmPassword) {
        $passwordError = $confirmPasswordError = "Passwords must match.";
    }

    if ($password != $confirmPassword) {
        $passwordError = $confirmPasswordError = "Passwords must match.";
    } else {
        //Database Validation
        $host = 'localhost';
        $user = 'root';
        $db_password = '';
        $db_name = 'phpcrudtutorial';

        $connection = mysqli_connect($host, $user, $db_password, $db_name);
        if (!$connection) {
            die("CONNECTION TO DB FAILED.  " . mysqli_error($connection));
        } //check connection
        if (isset($_POST['submit'])) {
            $sql = "SELECT * FROM Users WHERE email = '$email'";
            $query = mysqli_query($connection, $sql);
            $count = mysqli_num_rows($query);

            if ($count > 0) {
                $error = "User with Email Already Exists!";
            } else {
                if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
                    $firstName = ucwords(mysqli_real_escape_string($connection, $fname));
                    $lastName = ucwords(mysqli_real_escape_string($connection, $lname));
                    $email2 = ucwords(mysqli_real_escape_string($connection, $email));
                    $pword = ucwords(mysqli_real_escape_string($connection, $password));
                    //$confirmPword = mysqli_real_escape_string($connection, $confirmPword);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailError2 = "Email is invalid!";
                    }
                    if (!preg_match("/^[a-zA-Z]*$/", $firstName)) {
                        $fnameError2 = "Can only use valid alphabetical letters!";
                    }
                    if (!preg_match("/^[a-zA-Z]*$/", $lastName)) {
                        $lnameError2 = "Can only use alphabetical letters!";
                    }
//                    if (!preg_match("/^\S*(?=\S{7,15})(?=\S[a-z])(?=\S[A-Z])(?=\S*[\d])\S*$/", $pword)) {
//                        $pwordError2 = "Password must be between 7-15 characters.";
//                    }
                    $userActivationKey = md5(rand().time());
                    //validation($fname, $lname, $email, $password, $userActivationKey, '0', date("d-m-Y H:i:s"));
                    $sql = "INSERT INTO Users (firstname, lastname, email, password, activation_key, is_active, date_time) VALUES ('$firstName', '$lastName', '$email2', '$pword', '$userActivationKey', '0', current_date )";
                    if (!mysqli_query($connection, $sql)) {
                        $last_id = mysqli_insert_id($connection);
                        echo 'Query Failed!!! ' . mysqli_error($connection);
                    } else {
                        echo 'Query SUCCESSFUL!';
                    }


                }//check if fields are empty
            }//else statement
        }//is set statement
    }//Database Validation



}//outer if statement


?><!-- End of PHP Code -->
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="card bg-dark text-center card-form">
            <div class="card-body">
                <h3 class="text-light">Sign Up!</h3>
                <p class="text-light">Please fill out this form to register!</p>
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="text" class="form-control form-control-lg" name="fname" placeholder="First Name">
                    <div class="invalid_feedback is-invalid">
                        <small class="text-danger"><?php echo $fnameError; ?></small>
                        <small class="text-danger"><?php echo $fnameError2; ?></small>
                    </div>
<!--                    <div class="alert alert-danger alert-dismissable fade show">-->
<!--                        <small>--><?php //echo $fnameError2 ?><!--</small>-->
<!--                    </div>-->
                </div>
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="text" class="form-control form-control-lg" name="lname" placeholder="Last Name">
                    <div class="invalid_feedback is-invalid">
                        <small class="text-danger"><?php echo $lnameError; ?></small>
                        <small class="text-danger"><?php echo $lnameError2; ?></small>
                    </div>
<!--                    <div class="alert alert-danger">-->
<!--                        <small>--><?php //echo $lnameError2 ?><!--</small>-->
<!--                    </div>-->
                </div>
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Email">
                    <div class="invalid_feedback is-invalid">
                        <small class="text-danger"><?php echo $emailError; ?></small>
                        <small class="text-danger"><?php echo $emailError2; ?></small>
                    </div>
<!--                    <div class="alert alert-danger">-->
<!--                        <small>--><?php //echo $emailError2 ?><!--</small>-->
<!--                    </div>-->
                </div>
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                    <div class="invalid_feedback is-invalid">
                        <small class="text-danger"><?php echo $passwordError; ?></small>
                        <small class="text-danger"><?php echo $pwordError2; ?></small>
                    </div>
<!--                    <div class="alert alert-danger">-->
<!--                        <small>--><?php //echo $pwordError2 ?><!--</small>-->
<!--                    </div>-->
                </div>
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="password" class="form-control form-control-lg" name="confirmPassword" placeholder="Confirm Password">
                    <div class="invalid_feedback is-invalid">
                        <small class="text-danger"><?php echo $confirmPasswordError; ?></small>
                    </div>
                </div>
                <div class="form-group col-md-5 ml-auto mr-auto">
                    <input type="submit" class="btn btn-outline-light btn-block" placeholder="Sign Up" name="submit">
<!--                    <div class="alert alert-danger">-->
<!--                        <strong>--><?php //$error ?><!--</strong>-->
<!--                    </div>-->
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
//PHP Functions
function validation($fname, $lname, $email, $password, $userActivationKey, $isActive, $dateTime) {
    $host = 'localhost';
    $user = 'root';
    $db_password = '';
    $db_name = 'phpcrudtutorial';

    $connection = mysqli_connect($host, $user, $db_password, $db_name);
    if (!$connection) {
        die("CONNECTION TO DB FAILED.  " . mysqli_error($connection));
    } //check connection
    $sql = "INSERT INTO Users (firstname, lastname, email, password, activation_key, is_active, date_time) VALUES ('$fname', '$lname', '$email', '$password', '$userActivationKey', '$isActive', '$dateTime')";
    if (!mysqli_query($connection, $sql)) {
        $last_id = mysqli_insert_id($connection);
        echo 'Query Failed!!! ' . mysqli_error($connection);
    }
}


//End of PHP Code
?>