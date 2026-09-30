<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location: ../admin/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login Admin - Abigaile Co</title>
    <!-- Gunakan cache busting selama masa pengembangan -->
    <link rel="stylesheet" href="../assets/style.css?v=<?= time(); ?>">
</head>
<body class="login-body">

<div class="login-container">
    <div class="login-card">
        <h1>Login</h1>
        <p>Silakan login untuk masuk ke dashboard.</p>

        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>

        <form action="proses_login.php" method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn btn-login">Login</button>
        </form>

        <a href="../index.php" class="back-link">← Kembali ke Website</a>
    </div>
</div>

</body>
</html>