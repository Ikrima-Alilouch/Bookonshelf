<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";

$Email = $_POST['Email'];
$Name = $_POST['Name'];
$Middel_Name = $_POST['Middel_Name'];
$Surname = $_POST['Surname'];
$Birthday = $_POST['Birthday'];
$Street = $_POST['Street'];
$Residence = $_POST['Residence'];
$Postal_Code = $_POST['Postal_Code'];
$Password = $_POST['Password'];
$Roleid = $_POST['Roleid'];

try {
    $pdo->beginTransaction();

    $sql = "INSERT INTO Login (Password, Email, Roleid) VALUES (:Password, :Email, :Roleid)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':Password', $Password);
    $stmt->bindParam(':Roleid', $Roleid);
    $stmt->execute();

    $Loginid = $pdo->lastInsertId();

    $sql2 = "INSERT INTO Customer (Loginid, Name, Middel_Name, Surname, Birthday, Street, Residence,Postal_Code) 
             VALUES (:Loginid, :Name, :Middel_Name, :Surname, :Birthday, :Street, :Residence,:Postal_Code)";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':Loginid', $Loginid);
    $stmt2->bindParam(':Name', $Name);
    $stmt2->bindParam(':Middel_Name', $Middel_Name);
    $stmt2->bindParam(':Surname', $Surname);
    $stmt2->bindParam(':Birthday', $Birthday);
    $stmt2->bindParam(':Street', $Street);
    $stmt2->bindParam(':Residence', $Residence);
    $stmt2->bindParam(':Postal_Code', $Postal_Code);
    $stmt2->execute();
    $pdo->commit();

    header('location: ../index.php?page=Login');
    exit();

} catch (PDOException $e) {
    $pdo->rollBack();
    echo "Error: not workin men " . $e->getMessage();
}

?>