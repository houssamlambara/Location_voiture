<?php
include_once '../classes/db.php';

class Reservation
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAllReservations()
    {
        $sql = "SELECT reservations.*, users.username FROM reservations JOIN users ON reservations.user_id = users.id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($reservation_id, $status)
    {
        $stmt = $this->db->prepare("UPDATE reservations SET status = ? WHERE id = ?");
        if ($stmt->execute([$status, $reservation_id])) {
            return true;
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Erreur lors de la mise à jour du statut: " . $errorInfo[2];
            return false;
        }
    }

    public function deleteReservation($reservation_id)
    {
        $stmt = $this->db->prepare("DELETE FROM reservations WHERE id = ?");
        if ($stmt->execute([$reservation_id])) {
            return true;
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Erreur lors de la suppression de la réservation: " . $errorInfo[2];
            return false;
        }
    }
}
?>