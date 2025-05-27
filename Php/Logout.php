<?php
$_SESSION["loggedin"] = false;
header('Location: ../index.php?page=Login');
session_start();
session_destroy();
?>