<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'auth.php';

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
    <title>EncuentraPeludos</title>
    <link rel="stylesheet" href="styles.php">
</head>
<body>
    <!-- TODO: Add search bar for quick pet lookup -->
    <header>
        <h1>EncuentraPeludos</h1>
        <nav>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="active" href="index.php">Inicio</a>
                <a href="forum.php">Foro</a>
                <a href="dashboard.php">Panel</a>
                <a href="logout.php">Cerrar Sesión</a>
                <span class="username"><?php echo htmlspecialchars($username); ?></span>
            <?php else: ?>
                <a class="active" href="index.php">Inicio</a>
                <a href="login.php">Iniciar Sesión</a>
                <a href="login.php#register">Registrarse</a>
            <?php endif; ?>
        </nav>
    </header>

    <!-- TODO: Add testimonial section for success stories -->
    <section class="hero">
        <h2>¡Ayuda a reunir a las mascotas con sus familias!</h2>
        <p>EncuentraPeludos es una plataforma dedicada a conectar a las mascotas perdidas con sus dueños. Publica animales perdidos, busca mascotas desaparecidas y contacta directamente con sus familias.</p>
        <div class="features">
            <div class="feature">
                <span class="icon">🐾</span>
                <p>Publica fácilmente animales perdidos con fotos y detalles.</p>
            </div>
            <div class="feature">
                <span class="icon">🔍</span>
                <p>Explora nuestro foro para buscar mascotas por nombre, color o ubicación.</p>
            </div>
            <div class="feature">
                <span class="icon">📞</span>
                <p>Contacta a los dueños directamente por WhatsApp.</p>
            </div>
        </div>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="login.php" class="cta-button">Únete Ahora</a>
        <?php else: ?>
            <a href="forum.php" class="cta-button">Ver Foro</a>
        <?php endif; ?>
    </section>

    <!-- TODO: Add map integration for pet location visualization -->
    <section class="about">
        <h2>Nuestra Misión</h2>
        <p>En EncuentraPeludos, creemos que cada mascota merece volver a casa. Nuestra misión es proporcionar una plataforma sencilla y efectiva para que las comunidades se unan y ayuden a las mascotas perdidas a reunirse con sus familias.</p>
    </section>

    <!-- TODO: Add FAQ section for common questions -->
    <section class="how-it-works">
        <h2>Cómo Funciona</h2>
        <div class="steps">
            <div class="step">
                <h3>1. Regístrate</h3>
                <p>Crea una cuenta gratuita para empezar a publicar o buscar mascotas perdidas.</p>
            </div>
            <div class="step">
                <h3>2. Publica o Busca</h3>
                <p>Comparte detalles sobre una mascota perdida o explora nuestro foro para encontrar una.</p>
            </div>
            <div class="step">
                <h3>3. Conecta</h3>
                <p>Contacta directamente con los dueños a través de WhatsApp para coordinar la reunión.</p>
            </div>
        </div>
    </section>

    <!-- TODO: Add social media sharing buttons -->
    <footer>
        <p>© 2025 EncuentraPeludos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>