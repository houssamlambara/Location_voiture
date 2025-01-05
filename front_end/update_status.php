<?php
include("../classes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id = $_POST['reservation_id'];
    $status = $_POST['status'];

    echo "Reservation ID: $reservation_id, Status: $status";

    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("UPDATE reservations SET status = ? WHERE id = ?");
    if ($stmt->execute([$status, $reservation_id])) {
        header("Location: reservation_list.php");
        exit();
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Erreur lors de la mise à jour du statut: " . $errorInfo[2];
    }
}
?>