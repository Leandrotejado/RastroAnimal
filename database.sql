CREATE DATABASE lost_pets;
USE lost_pets;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE animals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    color VARCHAR(50) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    location VARCHAR(100) NOT NULL,
    age ENUM('puppy', 'adult') NOT NULL,
    whatsapp VARCHAR(20) NOT NULL,
    species VARCHAR(50) NOT NULL, -- Nueva columna para especie
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users (username, password, email) VALUES
('user1', '$2y$10$7r.Lx6Y9Qz9G7r7z9Qz9G7r7z9Qz9G7r7z9Qz9G7r7z9Qz9G7r7z', 'user1@example.com'),
('user2', '$2y$10$8s.Mx7Z0Ra0H8s8Mx7Z0Ra0H8s8Mx7Z0Ra0H8s8Mx7Z0Ra0H8s8Mx', 'user2@example.com');

INSERT INTO animals (user_id, name, description, color, image_url, location, age, whatsapp, species) VALUES
(1, 'Luna', 'Gata persa muy cariñosa, perdida cerca del parque.', 'Blanco', 'https://example.com/luna.jpg', 'Parque Central', 'adult', '+1234567890', 'Gato'),
(2, 'Max', 'Perro labrador juguetón, escapó de casa.', 'Dorado', 'https://example.com/max.jpg', 'Avenida Principal', 'puppy', '+0987654321', 'Perro');