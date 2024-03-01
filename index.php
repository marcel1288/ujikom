<?php
require_once('./db/DB_connection.php');
require_once('./db/DB_login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BTR RA| Login</title>
    <link rel="stylesheet" href="./assets/style/login.css">
</head>
<body>
    <div class="container">
        <img style="width: 100px; margin-bottom: 2rem;" src="./assets/images/btr.png" alt="btr">
        <form method="POST">
            <?php if (isset($error_message)) : ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <div>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="Username" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="**********">
            </div>
            <div>
                <button type="submit">Sign In</button>
            </div>
            <div class="text-center mt-4">
                 <p>Don't have an account? <a href="./pages/register.php">Register here</a></p>
            </div>
        </form>
    </div>
</body>
</html>