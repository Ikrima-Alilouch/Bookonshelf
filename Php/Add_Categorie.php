<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";
session_start();

$Categoriesid = $_POST['Categoriesid'];

    $sql = "INSERT INTO categories VALUES (NULL, :Categoriesid)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':Categoriesid', $Categoriesid);
    $stmt->execute();

header('location: ../index.php?page=Add_Categorie');

