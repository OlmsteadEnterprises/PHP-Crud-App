<?php
include ("../crud/config/db.php");
ob_start();
include ("../crud/user/login.php");
ob_end_clean();
if(!isset($_SESSION)) {
    session_start();
} else {
    //echo "SESSION HAS ALREADY STARTED!!!! <br>";
    echo ($_SESSION['id'] . " " . $_SESSION['firstname'] . " " . $_SESSION['lastname']);
}



//End of PHP Code
?>
