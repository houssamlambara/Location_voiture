<?php

class Reservation {
    private $conn;

    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function addReservation($userId, $voitureId, $pickupDate, $returnDate, $totalPrice) {
        $sql = "INSERT INTO reservations (user_id, voiture_id, pickup_date, return_date, total_price) 
                VALUES (:user_id, :voiture_id, :pickup_date, :return_date, :total_price)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':voiture_id', $voitureId);
        $stmt->bindParam(':pickup_date', $pickupDate);
        $stmt->bindParam(':return_date', $returnDate);
        $stmt->bindParam(':total_price', $totalPrice);
        return $stmt->execute();
    }
}
