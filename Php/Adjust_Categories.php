<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Categoriesid = $_POST['Categoriesid'];
    $Categories = $_POST['Categories'];

    $sql = 'UPDATE categories SET Categories = :Categories WHERE Categoriesid = :Categoriesid';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':Categories', $Categories);
    $stmt->bindParam(':Categoriesid', $Categoriesid);
    $stmt->execute();

    header('Location: ../index.php?page=Adjust_Categorie');
}
?>
