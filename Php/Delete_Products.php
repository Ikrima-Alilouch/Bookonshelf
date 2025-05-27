<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";
$Productid = $_POST['Productid'];


$sql = 'DELETE FROM product WHERE Productid = :Productid';

$stmt = $pdo->prepare($sql);
$stmt->bindParam('Productid',$Productid);
$stmt->execute();

header('Location: ../index.php?page=Adjust_Product');
?>