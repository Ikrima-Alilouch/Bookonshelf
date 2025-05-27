<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";
$Categoriesid = $_POST['Categoriesid'];


$sql = 'DELETE FROM categories WHERE Categoriesid = :Categoriesid';

$stmt = $pdo->prepare($sql);
$stmt->bindParam('Categoriesid', $Categoriesid);
$stmt->execute();

header('Location: ../index.php?page=Adjust_Categorie');
?>