<?php
include_once 'User.php';
include_once 'Database.php';

class SigninController {
    private $user;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->user = new User($db);
    }

    public function registerUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->username  = $_POST['username '];
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];

            $message = $this->user->register();

            return $message;
        }
    }
}
?>