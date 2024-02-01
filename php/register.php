<?php
session_start(); // Démarrez la session au début du script

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ma_base_de_donnees";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}

// Récupération des données du formulaire de création de compte
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNumber = $_POST['phoneNumber'];
$address = $_POST['address'];
$postalCode = $_POST['postalCode'];

// Validation du numéro de téléphone
if (!preg_match('/^\d{10}$/', $phoneNumber)) {
    die("Le numéro de téléphone doit contenir exactement 10 chiffres.");
}

// Insertion des données dans la base de données
$sql = "INSERT INTO users (username, password, firstName, lastName, phoneNumber, address, postalCode)
        VALUES ('$username', '$password', '$firstName', '$lastName', '$phoneNumber', '$address', '$postalCode')";

if ($conn->query($sql) === TRUE) {
    // Stocker l'ID de l'utilisateur dans la session
    $_SESSION['user_id'] = $conn->insert_id;
    $_SESSION['loggedin'] = true; // Définir la variable de session

    // Redirection vers voyage.html après la création du compte
    header("Location: ../voyage.html");
    exit();
} else {
    echo "Erreur lors de la création du compte: " . $conn->error;
}

$conn->close();
?>
