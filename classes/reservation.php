<?php
class Reservation {
    private $user_id;
    private $voiture_id;
    private $pickup_date;
    private $return_date;
    private $total_price;

    public function __construct($user_id, $voiture_id, $pickup_date, $return_date, $total_price) {
        $this->user_id = $user_id;
        $this->voiture_id = $voiture_id;
        $this->pickup_date = $pickup_date;
        $this->return_date = $return_date;
        $this->total_price = $total_price;
    }

    public function creerReservation($pdo) {
        try {
            $sql = "SELECT COUNT(*) FROM reservations 
                    WHERE voiture_id = :voiture_id 
                    AND ((pickup_date BETWEEN :pickup_date AND :return_date) 
                    OR (return_date BETWEEN :pickup_date AND :return_date))";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':voiture_id' => $this->voiture_id,
                ':pickup_date' => $this->pickup_date,
                ':return_date' => $this->return_date
            ]);
            
            if ($stmt->fetchColumn() > 0) {
                throw new Exception("La voiture n'est pas disponible pour ces dates.");
            }

            $sql = "INSERT INTO reservations (user_id, voiture_id, pickup_date, return_date, total_price) 
                    VALUES (:user_id, :voiture_id, :pickup_date, :return_date, :total_price)";
            
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                ':user_id' => $this->user_id,
                ':voiture_id' => $this->voiture_id,
                ':pickup_date' => $this->pickup_date,
                ':return_date' => $this->return_date,
                ':total_price' => $this->total_price
            ]);

            if ($result) {
                return $pdo->lastInsertId();
            }
            return false;
            
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la création de la réservation: " . $e->getMessage());
        }
    }
}
?>