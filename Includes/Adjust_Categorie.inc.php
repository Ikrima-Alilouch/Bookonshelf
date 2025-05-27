<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";
$sql = 'SELECT * FROM categories';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Adjust Category</h2>
<div class="table">
    <table>
        <?php foreach ($result as $row): ?>
            <tr>
                <td>

                    <form action="Php/Adjust_Categories.php" method="post">
                        <input type="text" name="Categories" value="<?php echo $row['Categories']; ?>">
                        <input type="hidden" name="Categoriesid" value="<?php echo $row['Categoriesid']; ?>">
                        <button type="submit">Adjust</button>
                    </form>
                        <form action="Php/Delete_Categories.php" method="post" style="display:inline;">
                            <input type="hidden" name="Categoriesid" value="<?php echo $row['Categoriesid']; ?>">
                            <button type="submit" name="btn1">Delete</button>
                        </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

