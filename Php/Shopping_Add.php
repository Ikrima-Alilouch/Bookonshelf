<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $Customerid  = $_SESSION['Customerid'];
    $Productid = $_POST['Productid'];

    $sql = 'SELECT COUNT(*) FROM shopping_cart WHERE Productid = :Productid AND Customerid = :Customerid';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':Productid', $Productid);
    $statement->bindParam(':Customerid', $Customerid);
    $statement->execute();
    $result = $statement->fetchColumn();

    if ($result) {
        $sql = 'UPDATE shopping_cart SET Amount = Amount + 1 WHERE Productid = :Productid AND Customerid = :Customerid';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':Productid', $Productid);
        $statement->bindParam(':Customerid', $Customerid);
        $statement->execute();
    } else {
        $sql = "INSERT INTO shopping_cart (Customerid, Productid, Amount) VALUES (:Customerid, :Productid, 1)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':Customerid', $Customerid);
        $stmt->bindParam(':Productid', $Productid);
        $stmt->execute();
    }

    header('location: ../index.php?page=Shopping_Cart');
    exit();
}
?>
