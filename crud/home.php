<?php
session_start();

include ("../crud/config/db.php");

echo $_SESSION['firstname'];