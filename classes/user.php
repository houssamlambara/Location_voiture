<?php
include_once 'db.php';

class User {
    private $user_id;
    private $username;
    private $email;
    private $phone;
    private $password;
    private PDO $db;
    function __construct($db)
    {
       $this->db=$db; 
    }
    public function registerUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->username = $_POST['username']; 
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];

            $message = $this->register();

            return $message;
        }
    }

    private function register() {
        if (empty($this->username) || empty($this->email) || empty($this->password)) {
            return "Tous les champs doivent être remplis.";
        }

        $database = new Database();  
        $db = $database->getConnection();  

        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $db->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', password_hash($this->password, PASSWORD_DEFAULT));  

        if ($stmt->execute()) {
            return "Utilisateur enregistré avec succès.";
        } else {
            return "Erreur lors de l'enregistrement de l'utilisateur.";
        }
    }
}
?>
