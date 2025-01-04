    <?php

    class Reservation
    {

        private $id;
        private $voiture_id;
        private $user_id;
        private $pickup_date;
        private $return_date;
        private $total_price;
        private $status;

        public function __construct($id = null, $voiture_id = null, $pickup_date = null, $return_date = null, $total_price = null, $status = 'En attente')
        {
            $this->voiture_id = $voiture_id;
            $this->pickup_date = $pickup_date;
            $this->return_date = $return_date;
            $this->total_price = $total_price;
            $this->status = $status;
        }

        public function creerReservation($pdo, $user_id)
        {
            try {
                $query = "INSERT INTO reservations (user_id, voiture_id, pickup_date, return_date, total_price, status) 
                          VALUES (:user_id, :voiture_id, :pickup_date, :return_date, :total_price, :status)";

                $stmt = $pdo->prepare($query);

                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':voiture_id', $this->voiture_id, PDO::PARAM_INT);
                $stmt->bindParam(':pickup_date', $this->pickup_date, PDO::PARAM_STR);
                $stmt->bindParam(':return_date', $this->return_date, PDO::PARAM_STR);
                $stmt->bindParam(':total_price', $this->total_price, PDO::PARAM_STR);
                $stmt->bindParam(':status', $this->status, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    return $pdo->lastInsertId(); // Retourne l'ID de la réservation créée
                } else {
                    return false; // Retourne false si l'exécution échoue
                }
            } catch (PDOException $e) {
                return "Erreur PDO : " . $e->getMessage();
            }
        }
        public function getAllReservations($pdo)
        {
            try {
                $query = "SELECT r.id, r.pickup_date, r.return_date, r.total_price, r.status, 
                                 v.model AS voiture_model, u.username AS utilisateur
                          FROM reservations r
                          JOIN voiture v ON r.voiture_id = v.id
                          JOIN users u ON r.user_id = u.id
                          ORDER BY r.created_at DESC";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return "Erreur PDO : " . $e->getMessage();
            }
        }

        public static function getReservationById($pdo, $id)
        {
            try {
                $stmt = $pdo->prepare("SELECT * FROM `reservations` WHERE `id` = :id");
                $stmt->execute(['id' => $id]);
                $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

                return $reservation ?: null;
            } catch (Exception $e) {
                error_log("Erreur lors de l'insertion : " . $e->getMessage());
                return "Couldn't fetch reservation: " . $e->getMessage();
            }
        }

        public static function getMyReservations($pdo, $userId)
        {
            try {
                $stmt = $pdo->prepare("SELECT * FROM `reservations` WHERE `user_id` = :userId");
                $stmt->execute(['userId' => $userId]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Couldn't fetch reservations: " . $e->getMessage();
            }
        }

        public function modifierReservation($pdo)
        {
            try {
                $stmt = $pdo->prepare("UPDATE `reservations` SET 
                                        `voiture_id` = :voiture_id, 
                                        `pickup_date` = :pickup_date, 
                                        `return_date` = :return_date, 
                                        `total_price` = :total_price, 
                                        `status` = :status
                                        WHERE `id` = :id");
                $stmt->execute([
                    'voiture_id' => $this->voiture_id,
                    'pickup_date' => $this->pickup_date,
                    'return_date' => $this->return_date,
                    'total_price' => $this->total_price,
                    'status' => $this->status,
                    'id' => $this->id
                ]);
                return "Reservation updated successfully.";
            } catch (Exception $e) {
                return "Couldn't update reservation: " . $e->getMessage();
            }
        }

        public static function deleteReservation($pdo, $id)
        {
            try {
                $stmt = $pdo->prepare("DELETE FROM `reservations` WHERE `id` = :id");
                $stmt->execute(['id' => $id]);
                return "Reservation deleted successfully.";
            } catch (Exception $e) {
                return "Couldn't delete reservation: " . $e->getMessage();
            }
        }

        public function annulerReservation($pdo)
        {
            try {
                $stmt = $pdo->prepare("UPDATE `reservations` SET 
                                        `status` = :status 
                                        WHERE `id` = :id");
                $stmt->execute([
                    'status' => $this->status,
                    'id' => $this->id
                ]);
                return "Reservation status updated successfully.";
            } catch (Exception $e) {
                return "Couldn't update reservation status: " . $e->getMessage();
            }
        }

        public function __toString()
        {
            return "Mon statut est: " . $this->status;
        }
    }

    ?>
