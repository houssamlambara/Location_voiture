<?php
class Reservation
{
    private $user_id;
    private $voiture_id;
    private $pickup_date;
    private $return_date;
    private $total_price;

    public function __construct($user_id, $voiture_id, $pickup_date, $return_date, $total_price)
    {
        $this->user_id = $user_id;
        $this->voiture_id = $voiture_id;
        $this->pickup_date = $pickup_date;
        $this->return_date = $return_date;
        $this->total_price = $total_price;
    }

    public function creerReservation($pdo)
    {
        $sql = "INSERT INTO reservations (user_id, voiture_id, pickup_date, return_date, total_price) VALUES (:user_id, :voiture_id, :pickup_date, :return_date, :total_price)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':voiture_id', $this->voiture_id);
        $stmt->bindParam(':pickup_date', $this->pickup_date);
        $stmt->bindParam(':return_date', $this->return_date);
        $stmt->bindParam(':total_price', $this->total_price);
        return $stmt->execute();
    }
}
