<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";
$stmt = $pdo->prepare("SELECT * FROM categories");
$stmt->execute();
$result = $stmt->fetchall(PDO::FETCH_ASSOC);
?>

<form method="post" action="Php/Add_Product.php" enctype="multipart/form-data">

    <div class="P_Adding_box">
        <div class="Adding">
            <h3>Add Products</h3>
            <div class="Input_Box">
                <input type="hidden" name="Categoriesid" >
                <div class="Select_Box">
                <select name="Categoriesid" id="Categoriesid" required>

                    <?php foreach ($result as $row): ?>
                        <option value="<?php echo $row['Categoriesid']; ?>"><?php echo $row['Categories']; ?> </option>
                    <?php endforeach; ?>
                </select>
                </div>
                <input type="text" name="Name" placeholder="Name" required>
                <input type="text" name="Price" placeholder="Price" required>
                <input type="text" name="Description" placeholder="Description" required>
                <input type="file" name="Image" placeholder="Image" required>
                <button type="submit" class="P_Btn_Adding">Add</button>
            </div>
            <div class="Register-Link">
                <br>
            </div>
        </div>
    </div>

</form>
