<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Fetch username
$stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
$username = $user['username'];

// Fetch all animals
$stmt = $pdo->prepare("SELECT animals.*, users.username FROM animals JOIN users ON animals.user_id = users.id ORDER BY animals.created_at DESC");
$stmt->execute();
$animals = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro - EncuentraPeludos</title>
    <link rel="stylesheet" href="styles.php">
</head>
<body>
    <header>
        <h1>EncuentraPeludos</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <a class="active" href="forum.php">Foro</a>
            <a href="dashboard.php">Panel</a>
            <a href="logout.php">Cerrar Sesión</a>
            <span class="username"><?php echo htmlspecialchars($username); ?></span>
        </nav>
    </header>

    <section>
        <h2>Foro de Animales Perdidos</h2>
        <div class="animal-grid">
            <?php foreach ($animals as $animal): ?>
                <div class="animal-card">
                    <img src="<?php echo htmlspecialchars($animal['image_url']); ?>" alt="<?php echo htmlspecialchars($animal['name']); ?>">
                    <h3><?php echo htmlspecialchars($animal['name']); ?></h3>
                    <p><strong>Publicado por:</strong> <?php echo htmlspecialchars($animal['username']); ?></p>
                    <p><strong>Especie:</strong> <?php echo htmlspecialchars($animal['species']); ?></p>
                    <p><strong>Descripción:</strong> <?php echo htmlspecialchars($animal['description']); ?></p>
                    <p><strong>Color:</strong> <?php echo htmlspecialchars($animal['color']); ?></p>
                    <p><strong>Ubicación:</strong> <?php echo htmlspecialchars($animal['location']); ?></p>
                    <p><strong>Edad:</strong> <?php echo $animal['age'] == 'puppy' ? 'Cachorro' : 'Adulto'; ?></p>
                    <p><strong>Contacto:</strong> <a href="https://wa.me/<?php echo htmlspecialchars($animal['whatsapp']); ?>" target="_blank"><img src="whatsapp.png" alt="WhatsApp" class="whatsapp-icon"></a> <?php echo htmlspecialchars($animal['whatsapp']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <p>© 2025 EncuentraPeludos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>