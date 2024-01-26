<?php
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
        // Redirection vers voyage.html
        header("Location: voyage.html");
        exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
    } else {
        echo "Mot de passe incorrect.";
    }
} else {
    echo "Nom d'utilisateur non trouvé.";
}

$conn->close();
?>
