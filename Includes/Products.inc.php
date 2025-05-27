    <?php
    include "/xampp/htdocs/Connection/Connection_Ws.php";
    $Categoriesid = $_GET['Categoriesid'];

    $stmt = $pdo->prepare("SELECT * FROM product where Categoriesid = :Categoriesid");
    $stmt->bindParam(':Categoriesid', $Categoriesid);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php foreach ($results as $row): ?>
        <div class="card">
            <img src="data:image/png;base64,<?php echo $row['Image']; ?>" style="width:100%">
            <h1><?php echo $row['Name']; ?></h1>
            <p>€<?php echo $row['Price']; ?></p>
            <p><?php echo $row['Description']; ?></p>
            <form action="Php/Shopping_Add.php" method="post">
                <input type="hidden" name="Productid" value="<?php echo $row['Productid'];?>">
                <button type="submit">Add to Cart</button>
            </form>
        </div>

    <?php endforeach; ?>
