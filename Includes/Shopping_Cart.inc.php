<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";
$Customerid = $_SESSION ['Customerid'];
$sql = 'SELECT S.Shopping_Cartid, S.Productid, S.Amount, S.Customerid, P.Productid, P.Categoriesid
        ,P.Name, P.Price, P.Description, P.Image, P.Active 
        FROM shopping_cart S
        INNER JOIN product P ON P.Productid = S.Productid
        WHERE Customerid = :Customerid';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':Customerid', $Customerid);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$totalPrice = 0;

?>
<h2>Shopping Cart</h2>
<table class="Tabel_Adjust" style="background-color: darkgray" width="100%">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Delete</th>
        <th>Adjust</th>
        <th></th>
    </tr>

    <?php foreach ($result as $row): ?>
        <tr>
            <td><img src="data:image/png;base64,<?php echo $row['Image']; ?>"/></td>
            <td><?php echo htmlspecialchars($row['Name']); ?></td>
            <td>€<?php echo htmlspecialchars($row['Price'] * $row['Amount']); ?></td>
            <td><?php echo htmlspecialchars($row['Description']); ?></td>
            <td>
                <form action="Php/Delete_Shopping.php" method="post" style="display: inline;">
                    <input type="hidden" name="Productid" value="<?php echo $row['Productid'];?>">
                    <input type="hidden" name="Shopping_Cartid" value="<?php echo $row['Shopping_Cartid']; ?>">
                    <button type="submit" name="btn1">Delete</button>
                </form>
            </td>
            <td>
                <form action="Php/Adjust_Shopping.php" method="post" style="display: inline;">
                    <input type="hidden" name="Productid" value="<?php echo $row['Productid'];?>">
                    <input type="hidden" name="Shopping_Cartid" value="<?php echo $row['Shopping_Cartid']; ?>">
                    <button type="submit" name="btn_adjust">Adjust</button>
                    <input type="number" name="new_amount" value="<?php echo htmlspecialchars($row['Amount']); ?>" min="1">
                </form>
            </td>
            <td>
            </td>
        </tr>
        <?php
        $subTotal = $row['Price'] * $row['Amount'];
        $totalPrice += $subTotal;

        ?>
    <?php endforeach; ?>
    <tr>
        <th> <form action="Php/Order.php" method="post" style="display: inline;">
            <input type="hidden" name="TotalPrice" value="<?php echo $totalPrice; ?>">
            <input type="hidden" name="Customerid" value="<?php echo $Customerid; ?>">
            <button class="Btn1" type="submit" name="Btn_order">Order</button>
        </form>
        </th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>Total Price=</th>
        <td>€<?= number_format($totalPrice, 2); ?></td>
    </tr>
</table>

