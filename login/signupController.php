<?php
include_once "../classes/db.php";

class User {
    private $username;
    private $email;
    private $password;
    private $phone;
    public $message;
    private PDO $db;

    public function __construct(PDO $db, $username, $email, $password, $phone)
    {
        $this->db = $db;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->message = '';
    }

    public function register()
    {
        if ($this->validate()) {
            $stmt = $this->db->prepare("SELECT id FROM users WHERE username = :username");
            $stmt->execute([':username' => $this->username]);

            if ($stmt->rowCount() > 0) {
                $this->message = "Le nom d'utilisateur est déjà pris.";
                return;
            }

            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO users (role_id,username, email, phone, password) VALUES (:role_id, :username, :email, :phone, :password)");
            $params = [
                ':role_id' => 2,    
                ':username' => $this->username,
                ':email' => $this->email,
                ':phone' => $this->phone,
                ':password' => $hashedPassword
            ];

            if ($stmt->execute($params)) {
                $this->message = "Inscription réussie !";
                header('Location: ./signin.php');
                exit();
            } else {
                $this->message = "Erreur : " . $stmt->errorInfo()[2];
            }
        } else {
            $this->message = "Les champs sont invalides.";
        }
    }

    private function validate()
    {
        if (empty($this->username) || empty($this->email) || empty($this->password) || empty($this->phone)) {
            $this->message = "Tous les champs sont requis.";
            return false;
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->message = "L'email n'est pas valide.";
            return false;
        }

        return true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../classes/db.php'; 

    $dbInstance = new Database();
    $pdo = $dbInstance->getConnection();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $user = new User($pdo, $username, $email, $password, $phone);

    $user->register();

    echo $user->message;
}
?>