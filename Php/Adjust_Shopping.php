<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['new_amount'])) {

        $Productid = $_POST['Productid'];
        $Shopping_Cartid = $_POST['Shopping_Cartid'];
        $newAmount = $_POST['new_amount'];


        $sql = 'UPDATE shopping_cart SET Amount = :newAmount WHERE Shopping_Cartid = :Shopping_Cartid AND Productid = :Productid';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':newAmount', $newAmount, PDO::PARAM_INT);
        $stmt->bindParam(':Shopping_Cartid', $Shopping_Cartid, PDO::PARAM_INT);
        $stmt->bindParam(':Productid', $Productid, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: ../index.php?page=Shopping_Cart');
    } else {
        echo "Error: No new amount provided.";
    }
}
?>
