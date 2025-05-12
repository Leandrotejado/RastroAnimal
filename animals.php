<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_animal'])) {
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $color = htmlspecialchars($_POST['color']);
    $image_url = htmlspecialchars($_POST['image_url']);
    $location = htmlspecialchars($_POST['location']);
    $age = $_POST['age'];
    $whatsapp = htmlspecialchars($_POST['whatsapp']);
    $species = htmlspecialchars($_POST['species']);
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO animals (user_id, name, description, color, image_url, location, age, whatsapp, species) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $name, $description, $color, $image_url, $location, $age, $whatsapp, $species]);
    header("Location: dashboard.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM animals WHERE id = ? AND user_id = ?");
    $stmt->execute([$id, $_SESSION['user_id']]);
    header("Location: dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_animal'])) {
    $id = $_POST['id'];
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $color = htmlspecialchars($_POST['color']);
    $image_url = htmlspecialchars($_POST['image_url']);
    $location = htmlspecialchars($_POST['location']);
    $age = $_POST['age'];
    $whatsapp = htmlspecialchars($_POST['whatsapp']);
    $species = htmlspecialchars($_POST['species']);

    $stmt = $pdo->prepare("UPDATE animals SET name = ?, description = ?, color = ?, image_url = ?, location = ?, age = ?, whatsapp = ?, species = ? WHERE id = ? AND user_id = ?");
    $stmt->execute([$name, $description, $color, $image_url, $location, $age, $whatsapp, $species, $id, $_SESSION['user_id']]);
    header("Location: dashboard.php");
}
?>