<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";
$Customerid = $_SESSION['Customerid'];

$sql_select = 'SELECT ORD.Birthday, P.Name, P.Image, O.Amount, O.Price 
               FROM order_product O
               INNER JOIN product P ON O.Productid = P.Productid
               LEFT JOIN `order` ORD ON ORD.Orderid = O.Orderid 
               WHERE ORD.Customerid = :Customerid';

$stmt = $pdo->prepare($sql_select);
$stmt->bindParam(':Customerid', $Customerid);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Here is your order history↓↓↓</h2>
<table class="Tabel_Adjust" style="background-color: darkgray" width="100%">
    <tr>
        <th>Date Of Order</th>
        <th>Name</th>
        <th>Image</th>
        <th>Amount</th>
        <th>Price</th>
    </tr>

    <?php foreach ($result as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['Birthday']); ?></td>
            <td><?php echo htmlspecialchars($row['Name']); ?></td>
            <td><img src="data:image/png;base64,<?php echo $row['Image']; ?>" style="width: 20%"/></td>
            <td><?php echo htmlspecialchars($row['Amount']); ?></td>
            <td>€<?php echo htmlspecialchars($row['Price'] * $row['Amount']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
