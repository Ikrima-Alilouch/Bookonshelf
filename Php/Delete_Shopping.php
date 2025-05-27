<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";

if(isset($_POST['Productid']) && isset($_POST['Shopping_Cartid'])) {
    $Productid = $_POST['Productid'];
    $Shopping_Cartid = $_POST['Shopping_Cartid'];

    $sql = 'UPDATE shopping_cart SET Amount = Amount - 1 WHERE Shopping_Cartid = :Shopping_Cartid';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':Shopping_Cartid', $Shopping_Cartid);
    $stmt->execute();

    $sql = 'SELECT Amount FROM shopping_cart WHERE Shopping_Cartid = :Shopping_Cartid';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':Shopping_Cartid', $Shopping_Cartid);
    $stmt->execute();
    $Amount = $stmt->fetchColumn();

    if($Amount <= 0) {
        $sql = 'DELETE FROM shopping_cart WHERE Shopping_Cartid = :Shopping_Cartid';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':Shopping_Cartid', $Shopping_Cartid);
        $stmt->execute();
    }
}
header('Location: ../index.php?page=Shopping_Cart');
?>
