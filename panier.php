<?php
session_start();

// Code de connexion à la base de données ici...

// Code de vérification de la connexion ici...

// Récupération des données du formulaire de réservation
$flightId = $_POST['flightId'];
$userId = $row['userId']; // Assurez-vous d'avoir l'ID de l'utilisateur connecté

// Ajout de la réservation au panier (exemple)
$_SESSION['cart'][] = array('flightId' => $flightId, 'userId' => $userId);

// Redirection vers la page du panier
header("Location: panier.php");
exit();
?>
