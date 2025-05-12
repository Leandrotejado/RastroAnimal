<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'auth.php';

// Fetch username if logged in
$username = '';
if (isset($_SESSION['user_id'])) {
    require 'db_connect.php';
    $stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
    $username = $user['username'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión o Registrarse - EncuentraPeludos</title>
    <link rel="stylesheet" href="styles.php">
</head>
<body>
    <header>
        <h1>EncuentraPeludos</h1>
        <nav>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="index.php">Inicio</a>
                <a href="forum.php">Foro</a>
                <a href="dashboard.php">Panel</a>
                <a href="logout.php">Cerrar Sesión</a>
                <span class="username"><?php echo htmlspecialchars($username); ?></span>
            <?php else: ?>
                <a href="index.php">Inicio</a>
                <a class="active" href="login.php">Iniciar Sesión</a>
                <a href="login.php#register">Registrarse</a>
            <?php endif; ?>
        </nav>
    </header>

    <?php if (!isset($_SESSION['user_id'])): ?>
    <section id="login">
        <h2>Iniciar Sesión</h2>
        <form method="POST" class="centered-form">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" name="login">Iniciar Sesión</button>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
    </section>

    <section id="register">
        <h2>Registrarse</h2>
        <form method="POST" class="centered-form">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" name="register">Registrarse</button>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
    </section>
    <?php else: ?>
    <section>
        <h2>Bienvenido, <?php echo htmlspecialchars($username); ?>!</h2>
        <p>Ya has iniciado sesión. ¿Qué quieres hacer?</p>
        <div class="actions">
            <a href="forum.php" class="cta-button">Ver Foro</a>
            <a href="dashboard.php" class="cta-button">Ir al Panel</a>
        </div>
    </section>
    <?php endif; ?>

    <footer>
        <p>© 2025 EncuentraPeludos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>