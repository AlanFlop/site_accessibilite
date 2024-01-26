<!-- register.php -->

<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ma_base_de_donnees";
$conn = new mysqli($servername, $username, $password, $dbname);




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
$address = $_POST['address'];
$phoneNumber = $_POST['phoneNumber'];
$postalCode = $_POST['postalCode'];

// Insertion des données dans la base de données
$sql = "INSERT INTO users (username, password, firstName, lastName, address, phoneNumber, postalCode)
        VALUES ('$username', '$password', '$firstName', '$lastName', '$address', '$phoneNumber', '$postalCode')";

if ($conn->query($sql) === TRUE) {
    echo "Compte créé avec succès.";
} else {
    echo "Erreur lors de la création du compte: " . $conn->error;
}

$conn->close();
?>
