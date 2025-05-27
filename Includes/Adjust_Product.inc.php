    <?php
    include "/xampp/htdocs/Connection/Connection_Ws.php";
    $sql = 'SELECT * FROM product';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h2>Adjust Product</h2>
    <table class="Tabel_Adjust" style="background-color: darkgray" width="100%">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($result as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['Name']); ?></td>
                <td>€<?php echo htmlspecialchars($row['Price']); ?></td>
                <td><?php echo htmlspecialchars($row['Description']); ?></td>
                <td><img src="data:image/png;base64,<?php echo $row['Image']; ?>"/></td>
                <td>
                    <a href="index.php?page=Adjust_Page&Productid='.$row['Categoriesid'].'"><button>Edit</button></a>
                </td>

                <td>
                    <form action="Php/Delete_Products.php" method="post" style="display: inline;">
                        <input type="hidden" name="Productid" value="<?php echo $row['Productid']?>">
                        <button type="submit" name="btn1">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
