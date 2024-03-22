<?php 
session_start();
require_once('../../db/DB_connection.php');

if (!isset($_SESSION['loggedin']) || $_SESSION[ 'loggedin'] !== true) {
    header('Location: ../index.php');
    exit;
}

$realName = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BTR RA | Welcome Cashier!</title>
    <link rel="stylesheet" href="../../assets/style/dashboard.css">
    <link rel="stylesheet" href="../../assets/style/navbar.css">
</head>
<body>
    <?php include '../navbar.php'; ?>
    <h1>Hello, <?php echo htmlspecialchars($realName); ?>! Welcome to the dashboard!</h1>
    <form action="../db/DB_logout.php" method="post">
        <button type="submit" class="btn-logout">Log Out</button>
    </form>
    
    <div class="dashboard-content">
        <h2>Dashboard</h2>
        <p>Welcome to the BTR RA cashier dashboard. You can manage products and perform other tasks here.</p>
    </div>
    <div class="additional-content">
        <h2>Manage product</h2>
        <p>would you like to manage products?</p>
        <p><a href="../kasir/manage_product.php" class="text-blue-500 underline">click here</a></p>
    </div>
</div>
</body>
</html>