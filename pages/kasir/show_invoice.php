<?php
require_once('../../db/DB_connection.php');
require_once('../../db/DB_process_checkout.php');

if (!isset($_SESSION['invoice_data'])) {
    echo "No invoice data found.";
    exit;
}

$invoice_data = $_SESSION['invoice_data'];

$tanggal_bulan = date('d F Y H:i:s', time());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style/show_invoice.css"> 
    <link rel="stylesheet" href="../../assets/style/print_invoice.css" media="print"> 
    <link rel="stylesheet" href="../../assets/style/navbar.css">
</head>
<body>
<?php include '../navbar.php'; ?>
    <div class="invoice-container">
        <h1>Invoice</h1>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Unique Code</th>
                <th>Tanggal Bulan</th> 
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($invoice_data['product_id']); ?></td>
                <td><?php echo htmlspecialchars($invoice_data['nama_produk']); ?></td>
                <td>Rp. <?php echo number_format($invoice_data['harga_produk']); ?></td>
                <td><?php echo number_format($invoice_data['jumlah']); ?> pcs</td>
                <td><?php echo htmlspecialchars($invoice_data['kode_unik']); ?></td>
                <td><?php echo $tanggal_bulan; ?></td> 
            </tr>
        </table>
    </div>
    <button onclick="window.print()">Print Invoice</button>
</body>
</html>