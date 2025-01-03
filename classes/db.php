<?php
    class Database {
        private $host = 'localhost'; 
        private $dbname = 'location_voiture'; 
        private $username = 'root'; 
        private $password = ''; 
        private $pdo;

        public function __construct() {
            try {
                $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname;connect_timeout=10", $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function getConnection() {
            return $this->pdo;
        }
        public function connect() {
            if ($this->pdo === null) {
                try {
                    $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("Connection failed: " . $e->getMessage());
                }
            }
            return $this->pdo;
        }
    }
    ?>
