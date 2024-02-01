-- Création de la base de données
CREATE DATABASE IF NOT EXISTS ma_base_de_donnees;

-- Utilisation de la base de données
USE ma_base_de_donnees;

-- Création de la table des utilisateurs
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  firstName VARCHAR(255) NOT NULL,
  lastName VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  phoneNumber VARCHAR(20) NOT NULL,
  postalCode VARCHAR(10) NOT NULL
);

-- Exemple d'insertion d'un utilisateur
INSERT INTO users (username, password, firstName, lastName, address, phoneNumber, postalCode)
VALUES ('test', 'test', 'John', 'Doe', '123 Main Street', '123-456-7890', '12345');
VALUES ('utilisateur_2', 'utilisateur_2', 'Johnny', 'Goat', '123 Main Street', '123-456-7890', '12345');