<?php
include "/xampp/htdocs/Connection/Connection_Ws.php";
$stmt = $pdo->prepare("SELECT * FROM categories");
$stmt->execute();
$rows = $stmt->fetchall(PDO::FETCH_ASSOC);
?>

<div class="Navbar">
<ul>
    <li><a href="index.php?page=Home_Customer">Home</a></li>
    <li><a href="index.php?page=Order_Page">History</a></li>
    <li><a href="php/Logout.php">Logout</a></li>
<li style="float:right" >
    <a  href="index.php?page=Shopping_Cart" class="navbar-brand" >
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTa4SedCGCwokVFdVw1T1zs7-cgnA6Ys3w1mu6HVHBu2w&s" class="Shoppingcart">
    </a>
</li>
</ul>
</div>
<div class="Mini_Navbar">
    <ul>
        <?php foreach ($rows as $row):?>
            <li><a href="index.php?page=Products&Categoriesid=<?php echo $row['Categoriesid']; ?>"><?php echo $row['Categories']; ?></a></li>
        <?php endforeach;?>
    </ul>
</div>