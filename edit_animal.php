<?php
session_start();
require 'db_connect.php';
require 'animals.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// Fetch username
$stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
$username = $user['username'];

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM animals WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $_SESSION['user_id']]);
$animal = $stmt->fetch();

if (!$animal) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Animal - EncuentraPeludos</title>
    <link rel="stylesheet" href="styles.php">
</head>
<body>
    <header>
        <h1>EncuentraPeludos</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="forum.php">Foro</a>
            <a href="dashboard.php">Panel</a>
            <a href="logout.php">Cerrar Sesión</a>
            <span class="username"><?php echo htmlspecialchars($username); ?></span>
        </nav>
    </header>

    <section>
        <h2>Editar <?php echo htmlspecialchars($animal['name']); ?></h2>
        <form method="POST" class="centered-form">
            <input type="hidden" name="id" value="<?php echo $animal['id']; ?>">
            <input type="text" name="name" value="<?php echo htmlspecialchars($animal['name']); ?>" required>
            <textarea name="description" required><?php echo htmlspecialchars($animal['description']); ?></textarea>
            <input type="text" name="color" value="<?php echo htmlspecialchars($animal['color']); ?>" required>
            <input type="url" name="image_url" value="<?php echo htmlspecialchars($animal['image_url']); ?>" required>
            <input type="text" name="location" value="<?php echo htmlspecialchars($animal['location']); ?>" required>
            <select name="age" required>
                <option value="puppy" <?php echo $animal['age'] == 'puppy' ? 'selected' : ''; ?>>Cachorro</option>
                <option value="adult" <?php echo $animal['age'] == 'adult' ? 'selected' : ''; ?>>Adulto</option>
            </select>
            <select name="species" required>
                <option value="Perro" <?php echo $animal['species'] == 'Perro' ? 'selected' : ''; ?>>Perro</option>
                <option value="Gato" <?php echo $animal['species'] == 'Gato' ? 'selected' : ''; ?>>Gato</option>
                <option value="Otro" <?php echo $animal['species'] == 'Otro' ? 'selected' : ''; ?>>Otro</option>
            </select>
            <input type="text" name="whatsapp" value="<?php echo htmlspecialchars($animal['whatsapp']); ?>" required>
            <button type="submit" name="edit_animal">Guardar Cambios</button>
        </form>
    </section>

    <footer>
        <p>© 2025 EncuentraPeludos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>