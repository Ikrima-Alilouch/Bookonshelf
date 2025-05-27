<?php
session_start();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'Home_Customer';
}
function debug() {
    echo '<pre>';
    echo '$_POST: ';
    print_r($_POST);
    echo '$_GET: ';
    print_r($_GET);
    echo '$_SESSION: ';
    print_r($_SESSION);

    echo 'All vars: ';
    print_r(get_defined_vars());
    echo '</pre>';
}
?>

<body>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Css/Style.css">
    <title>Index</title>
</head>
<body>
<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    if ($_SESSION["Role"] == 'Admin') {
        include 'Includes/Navbar_Admin.inc.php';
    } else {
        include 'Includes/Navbar_Customer.inc.php';
    }
}
else
{
    include 'Includes/Navbar_Register.inc.php';
}
?>
<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && $_SESSION["Role"] == 'Admin') {
    if (file_exists('Includes/' . $page . '.inc.php')) {
        include 'Includes/' . $page . '.inc.php';
    } else {
       echo '<p style="color: rgba(255,0,0,0.62); font-size: 85px; font-weight: bold;">De Gegeven Pagina Bestaat Niet, Log Graag In Als Een Gebruiker! </p>';
    }
} elseif (file_exists('Includes/' . $page . '.inc.php') && $page != 'Home_Admin') {
    include 'Includes/' . $page . '.inc.php';
} else {
    echo '<p style="color: rgba(255,0,0,0.62); font-size: 85px; font-weight: bold;">De Gegeven Pagina Bestaat Niet, Log Graag In Als Een Gebruiker! </p>';
}
?>
</body>
</html>