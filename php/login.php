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

// Récupération des données du formulaire de connexion
$loginUsername = $_POST['loginUsername'];
$loginPassword = $_POST['loginPassword'];

// Recherche de l'utilisateur dans la base de données
$sql = "SELECT * FROM users WHERE username='$loginUsername'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Vérification du mot de passe
    if (password_verify($loginPassword, $row['password'])) {
        // Stocker l'ID de l'utilisateur dans la session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['loggedin'] = true; // Définir la variable de session

        // Redirection vers voyage.html
        header("Location: ../voyage.html");
        exit();
    } else {
        echo "Mot de passe incorrect.";
    }
} else {
    echo "Nom d'utilisateur non trouvé.";
}

$conn->close();
?>
