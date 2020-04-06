<?php
if (!isset($_SESSION)) {
    session_start();
}

function logout() {
    $_SESSION['id'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['email'] = null;
    $_SESSION['password'] = null;
    $_SESSION['activation_key'] = null;
    //header("Location: ./index.php");

}//logout


//End of PHP Code
?>