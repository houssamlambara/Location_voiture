<?php

class User
{
    protected $username;
    protected $email;
    protected $password;
    protected $phone;
    public $message;

    public function __construct($username, $email, $password, $phone)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->message = '';
    }

    public function register()
    {
        if ($this->validate()) {
            $conn = new mysqli("localhost", "root", "", "location_voiture");

            if ($conn->connect_error) {
                die("Échec de la connexion à la base de données : " . $conn->connect_error);
            }

            $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->bind_param("s", $this->username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $this->message = "Le nom d'utilisateur est déjà pris.";
                $stmt->close();
                $conn->close();
                return;
            }

            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $this->username, $this->email, $this->phone, $hashedPassword);

            if ($stmt->execute()) {
                $this->message = "Inscription réussie !";
                header('Location: signin.php');
                exit();
            } else {
                $this->message = "Erreur : " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            $this->message = "Les champs sont invalides.";
        }
    }

    private function validate()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->message = "L'email n'est pas valide.<br>";
            return false;
        }

        return true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User($_POST['username'], $_POST['email'], $_POST['password'], $_POST['phone']);
    $user->register();
    echo $user->message;
}
