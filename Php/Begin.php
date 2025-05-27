<?php
if(isset($_SESSION['loggedin']))
{
    if ($_SESSION['Role'] == 'Customer')
    {
        include 'Includes/Navbar_Customer.inc.php';
    }
    if ($_SESSION['Role'] == 'Admin')
    {
        include 'Includes/Navbar_Admin.inc.php';
    }
}
?>

