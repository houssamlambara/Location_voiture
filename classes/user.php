<?php
include_once 'db.php';

class User
{
    private $username;
    private $email;
    private $password;
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->username = $_POST['username'] ?? null;
            $this->email = $_POST['email'] ?? null;
            $this->password = $_POST['password'] ?? null;

            if (empty($this->username) || empty($this->email) || empty($this->password)) {
                return "Tous les champs doivent être remplis.";
            }

            $user_id = $this->register();
            if (is_numeric($user_id)) {
                return "Utilisateur enregistré avec succès. ID utilisateur : " . $user_id;
            } else {
                return $user_id; 
            }
        }
        return "Méthode non autorisée.";
    }

    private function register()
    {
        try {
            $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', password_hash($this->password, PASSWORD_DEFAULT));

            if ($stmt->execute()) {
                return $this->db->lastInsertId(); 
            } else {
                return "Erreur lors de l'enregistrement de l'utilisateur.";
            }
        } catch (PDOException $e) {
            return "Erreur SQL : " . $e->getMessage();
        }
    }
}
?>