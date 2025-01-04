<?php
class Reservation
{
    protected $user_id;
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
        $stmt = $pdo->prepare("INSERT INTO reservations (user_id, voiture_id, pickup_date, return_date, total_price) VALUES (:user_id, :voiture_id, :pickup_date, :return_date, :total_price)");
        $stmt->bindParam(':user_id',$this->user_id, PDO::PARAM_INT);
        $stmt->bindParam(':voiture_id', $this->voiture_id, PDO::PARAM_INT);
        $stmt->bindParam(':pickup_date', $this->pickup_date, PDO::PARAM_STR);
        $stmt->bindParam(':return_date', $this->return_date, PDO::PARAM_STR);
        $stmt->bindParam(':total_price', $this->total_price, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $pdo->lastInsertId();
        } else {
            return false;
        }
    }
}