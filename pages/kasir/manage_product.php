<?php
session_start();
require_once('../../db/DB_connection.php');
$no=1;
if (!isset($_SESSION['loggedin']) || $_SESSION ['loggedin'] !== true) {
    header ('Locatton: ../Index-php'); 
    exit;
}

$query = "SELECT * FROM products";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="../../assets/style/manage_product.css">
<link rel="stylesheet" href="../../assets/style/navbar.css">
</head>
<body>
<?php include '../navbar.php'; ?>
    <div class="header">
        <h1>Hello, <?php echo htmlspecialchars($_SESSION['nama']); ?>! Welcome to product management!
</h1>
</div>

<div class="form-container">
<img style="width: 100px; margin-center: 2rem;" src="../../assets/images/btr.png" alt="btr">
<i class="bi bi-apple"></i>
    <form action="../../db/DB_add_product.php" method="post">
        <label for="nama_produk">Produk Name:</label>
        <input type="text" name="nama produk" required>
        <br>
        <label for="harga_produk">Product Price:</label> 
        <input type="number" name="harga_produk" required>
        <br>
        <label for="jumlah">Quantity</label>
        <input type="number" name="jumlah" required>
        <br>
        <button type="submit" name="add_product">Add Product</button>
    </form>
</đtv>

<table class="table table-bordered border-primary">
    <tr>
        <th>no.</th>
        <th>ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Quantity</th>
        <th>Terakhir Dt Updates</th>
        <th> action</th>
    </tr>
<?php while ($row = $result->fetch_assoc()): ?>
    <tr>
    <div class="btn-group" role="group" aria-label="Basic example">
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['nama_produk']); ?></td>
        <td>Rp. <?php echo number_format($row['harga_produk']); ?></td>
        <td><?php echo number_format($row['jumlah']); ?> pcs</td>
        <td><?php echo date('d F Y H:i:s', strtotime($row['created_at'])); ?></td>
        <td class="actton-buttons">
            <form action="./update_product.php" method="get">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <!-- <button class="update-button" types="submit">Updaste</button>  -->
                <button type="submit" class="btn btn-primary">Updates</button>
            </form>
            <form action="../../db/DB_delete_product.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <!-- <button type="submit" class="delete-button" name="delete_product" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button> -->
                <button type="submit" class="btn btn-primary"  name="delete_product" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
            </form> 

            <form action="../../db/DB_process_checkout.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                <!-- <button type="submit" class="checkout-button" name="checkout_product">Checkout</button> -->
                <button type="submit" class="btn btn-primary" name="checkout_product">Checkout</button>
            </form>
            
</td>
</div>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
