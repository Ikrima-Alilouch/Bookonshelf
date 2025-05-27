<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Customerid = $_POST['Customerid'];
    $now = date('Y-m-d H:i:s');

    $sql = "INSERT INTO `order` (Customerid, Birthday) VALUES (:Customerid, :Birthday)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':Customerid', $Customerid);
    $stmt->bindParam(':Birthday', $now);
    $stmt->execute();
    $Orderid = $pdo->lastInsertId();

    $sql_select = 'SELECT S.Productid, S.Amount, P.Price FROM shopping_cart S
                   INNER JOIN product P ON S.Productid = P.Productid
                   WHERE S.Customerid = :Customerid';
    $stmt_select = $pdo->prepare($sql_select);
    $stmt_select->bindParam(':Customerid', $Customerid);
    $stmt_select->execute();
    $rows = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

    if ($rows) {
        foreach ($rows as $row) {
            $Productid = $row['Productid'];
            $Amount = $row['Amount'];
            $Price = $row['Price'];


            $sql_insert = 'INSERT INTO order_product (Orderid, Productid, Amount, Price)
                           VALUES (:Orderid, :Productid, :Amount, :Price)';
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->bindParam(':Orderid', $Orderid);
            $stmt_insert->bindParam(':Productid', $Productid);
            $stmt_insert->bindParam(':Amount', $Amount);
            $stmt_insert->bindParam(':Price', $Price);
            $stmt_insert->execute();
        }

        $sql_delete = 'DELETE FROM shopping_cart WHERE Customerid = :Customerid';
        $stmt_delete = $pdo->prepare($sql_delete);
        $stmt_delete->bindParam(':Customerid', $Customerid);
        $stmt_delete->execute();
    }

    header('Location: ../index.php?page=Order_Page');
    exit();
}
?>
