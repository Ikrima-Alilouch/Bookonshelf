<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Categoriesid = $_POST['Categoriesid'];
    $Name = $_POST['Name'];
    $Price = $_POST['Price'];
    $Description = $_POST['Description'];
    $Image = base64_encode(file_get_contents($_FILES['Image']['tmp_name']));


        $sql = "INSERT INTO product (Categoriesid, Name, Price, Description,Image, Active)
                VALUES (:Categoriesid, :Name, :Price, :Description, :Image, :Active)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':Categoriesid', $Categoriesid);
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Price', $Price);
        $stmt->bindParam(':Description', $Description);
        $stmt->bindParam(':Image', $Image);
        $stmt->bindValue(':Active', 1);


    $stmt->execute();

    header('location: ../index.php?page=Add_Product');
    exit();
}
?>
