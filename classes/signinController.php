<?php

class User {
    private $db;
    private $pdo;

    public function __construct() {
        // On crée une instance de la classe DB pour accéder à la base de données
        $this->db = new Database();
        $this->pdo = $this->db->getConnection();
    }

    public function authenticate($email, $password) {
        // On protège la requête avec une requête préparée pour éviter les injections SQL
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Si l'utilisateur existe
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier si le mot de passe est correct
            if (password_verify($password, $user['password'])) {
                return $user; // Authentification réussie
            }
        }

        return false; // Authentification échouée
    }
}
?>