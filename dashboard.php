<?php
session_start();
require 'db_connect.php';
require 'animals.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Fetch username
$stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
$username = $user['username'];

$stmt = $pdo->prepare("SELECT * FROM animals WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$animals = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - EncuentraPeludos</title>
    <link rel="stylesheet" href="styles.php">
</head>
<body>
    <header>
        <h1>EncuentraPeludos</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="forum.php">Foro</a>
            <a class="active" href="dashboard.php">Panel</a>
            <a href="logout.php">Cerrar Sesión</a>
            <span class="username"><?php echo htmlspecialchars($username); ?></span>
        </nav>
    </header>

    <section>
        <h2>Añadir Animal Perdido</h2>
        <form method="POST" class="centered-form">
            <input type="text" name="name" placeholder="Nombre" required>
            <textarea name="description" placeholder="Descripción" required></textarea>
            <input type="text" name="color" placeholder="Color" required>
            <input type="url" name="image_url" placeholder="URL de la imagen" required>
            <input type="text" name="location" placeholder="Ubicación" required>
            <select name="age" required>
                <option value="puppy">Cachorro</option>
                <option value="adult">Adulto</option>
            </select>
            <select name="species" required>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
                <option value="Otro">Otro</option>
            </select>
            <input type="text" name="whatsapp" placeholder="Número de WhatsApp (ej: +5491164367800)" required>
            <button type="submit" name="add_animal">Añadir</button>
        </form>
    </section>

    <section>
        <h2>Tus Animales Perdidos</h2>
        <div class="animal-grid">
            <?php foreach ($animals as $animal): ?>
                <div class="animal-card">
                    <img src="<?php echo htmlspecialchars($animal['image_url']); ?>" alt="<?php echo htmlspecialchars($animal['name']); ?>">
                    <h3><?php echo htmlspecialchars($animal['name']); ?></h3>
                    [TRUNCATED]
                    <p><strong>Especie:</strong> <?php echo htmlspecialchars($animal['species']); ?></p>
                    <p><strong>Descripción:</strong> <?php echo htmlspecialchars($animal['description']); ?></p>
                    <p><strong>Color:</strong> <?php echo htmlspecialchars($animal['color']); ?></p>
                    <p><strong>Ubicación:</strong> <?php echo htmlspecialchars($animal['location']); ?></p>
                    <p><strong>Edad:</strong> <?php echo $animal['age'] == 'puppy' ? 'Cachorro' : 'Adulto'; ?></p>
                    <p><strong>Contacto:</strong> <a href="https://wa.me/<?php echo htmlspecialchars($animal['whatsapp']); ?>" target="_blank"><img src="whatsapp.png" alt="WhatsApp" class="whatsapp-icon"></a> <?php echo htmlspecialchars($animal['whatsapp']); ?></p>
                    <a href="edit_animal.php?id=<?php echo $animal['id']; ?>">Editar</a>
                    <a href="dashboard.php?delete=<?php echo $animal['id']; ?>" onclick="return confirm('¿Seguro que quieres eliminar?')">Eliminar</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <p>© 2025 EncuentraPeludos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>