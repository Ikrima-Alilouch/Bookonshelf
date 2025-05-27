<?php
session_start();
include "/xampp/htdocs/Connection/Connection_Ws.php";
$Email = $_POST["Email"];
$Password = $_POST["Password"];

$sql = 'SELECT l.Email, l.Password, l.Roleid, r.Role, c.Customerid
        FROM login l
        INNER JOIN role r ON l.Roleid = r.Roleid
        LEFT JOIN customer c ON c.loginid = l.loginid
        WHERE l.Email = :username and l.Password = :password';

$statement = $pdo->prepare($sql);
$statement->bindParam(":password", $Password);
$statement->bindParam(":username", $Email);
$statement->execute();
$rows = $statement->fetch(PDO::FETCH_ASSOC);

if ($statement->rowCount() == 1) {
    $_SESSION["loggedin"] = true;
    $_SESSION["Role"] = $rows["Role"];
    $_SESSION['Loginid'] = $rows['Loginid'];
    var_dump('Loginid');

if($rows) {
    if ($rows['Role'] == 'Admin') {
        $_session["Roleid"] = $rows ["Roleid"];
        header('Location: ../index.php?page=Home_Admin');

    } elseif ($rows['Role'] == 'Customer'){
        $_SESSION["Customerid"] = $rows["Customerid"];
        $_session["Roleid"] = $rows ["Roleid"];
        header('Location: ../index.php?page=Home_Customer');
    }
} else
{
    $_SESSION["loggedin"] = false;
    header("Location: ../index.php?page=Loginpagina");
    exit();
}

} else
{
    header('Location: ../index.php?page=Login');
}
?>