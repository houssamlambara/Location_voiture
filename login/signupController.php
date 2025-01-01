<?php

class User {
    protected $username;
    protected $email;
    protected $password;
    protected $phone;
    public $message; // Variable pour stocker le message

    // Constructeur pour initialiser les propriétés
    public function __construct($username, $email, $password, $phone) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;  
        $this->message = ''; // Initialiser le message vide
    }

    // Méthode pour enregistrer l'utilisateur
    public function register() {
        // Validation des données
        if ($this->validate()) {
            // Connexion à la base de données
            $conn = new mysqli("localhost", "root", "", "location_voiture");

            if ($conn->connect_error) {
                die("Échec de la connexion à la base de données : " . $conn->connect_error);
            }

            // Vérifier si le nom d'utilisateur existe déjà
            $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->bind_param("s", $this->username);
            $stmt->execute();
            $stmt->store_result();

            // Si le nom d'utilisateur existe déjà, afficher une erreur
            if ($stmt->num_rows > 0) {
                $this->message = "Le nom d'utilisateur est déjà pris.";
                $stmt->close();
                $conn->close();
                return; // Retourner sans continuer l'enregistrement
            }

            // Hacher le mot de passe pour plus de sécurité
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

            // Préparer la requête d'insertion
            $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $this->username, $this->email, $this->phone, $hashedPassword);

            // Exécuter la requête
            if ($stmt->execute()) {
                $this->message = "Inscription réussie !";
                header('Location: signin.php'); // Redirection vers la page signin.php
                exit(); // Assure-toi que le script s'arrête ici pour éviter d'afficher des messages après la redirection
            } else {
                $this->message = "Erreur : " . $stmt->error;
            }

            // Fermer la connexion
            $stmt->close();
            $conn->close();
        } else {
            $this->message = "Les champs sont invalides.";
        }
    }

    // Méthode de validation des données
    private function validate() {
        // Vérifier la validité de l'email
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->message = "L'email n'est pas valide.<br>";
            return false;
        }

        return true;
    }
}

// Traitement du formulaire d'inscription
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User($_POST['username'], $_POST['email'], $_POST['password'], $_POST['phone']);
    $user->register();
    echo $user->message; // Afficher le message ici
}
?>
