    <?php 

    class Reservation {
        
        private $voiture_id;
        private $pickup_date;
        private $return_date;
        private $total_price;
        private $status;

        public function __construct($idReservation = null,$voiture_id = null, $pickup_date = null, $return_date = null, $total_price = null, $status = 'En attente') {
            $this->voiture_id = $voiture_id;
            $this->pickup_date = $pickup_date;
            $this->return_date = $return_date;
            $this->total_price = $total_price;
            $this->status = $status;
        }

        public function creerReservation($pdo) {
            try {
                $stmt = $pdo->prepare("INSERT INTO `reservations` (`voiture_id`, `pickup_date`, `return_date`, `total_price`, `status`) 
                                        VALUES (:voiture_id, :pickup_date, :return_date, :total_price, :status)");
        
                $params = [
                    'voiture_id' => $this->voiture_id,
                    'pickup_date' => $this->pickup_date,
                    'return_date' => $this->return_date,
                    'total_price' => $this->total_price,
                    'status' => $this->status,
                ];
        
                // Debug des paramètres
                var_dump($params);
        
                // Exécution
                $stmt->execute($params);
        
                return "Reservation added successfully.";
            } catch (Exception $e) {
                return "Couldn't add reservation: " . $e->getMessage();
            }
        }
        public static function getAllReservations($pdo) {
            try {
                $stmt = $pdo->query("SELECT * FROM `reservations`");
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Couldn't fetch reservations: " . $e->getMessage();
            }
        }

        public static function getReservationById($pdo, $id) {
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

        public static function getMyReservations($pdo, $userId) {
            try {
                $stmt = $pdo->prepare("SELECT * FROM `reservations` WHERE `user_id` = :userId");
                $stmt->execute(['userId' => $userId]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Couldn't fetch reservations: " . $e->getMessage();
            }
        }

        public function modifierReservation($pdo) {
            try {
                $stmt = $pdo->prepare("UPDATE `reservations` SET 
                                        `voiture_id` = :voiture_id, 
                                        `pickup_date` = :pickup_date, 
                                        `return_date` = :return_date, 
                                        `total_price` = :total_price, 
                                        `status` = :status
                                        WHERE `id` = :idReservation");
                $stmt->execute([
                    'voiture_id' => $this->voiture_id,
                    'pickup_date' => $this->pickup_date,
                    'return_date' => $this->return_date,
                    'total_price' => $this->total_price,
                    'status' => $this->status,
                    'idReservation' => $this->idReservation
                ]);
                return "Reservation updated successfully.";
            } catch (Exception $e) {
                return "Couldn't update reservation: " . $e->getMessage();
            }
        }

        public static function deleteReservation($pdo, $id) {
            try {
                $stmt = $pdo->prepare("DELETE FROM `reservations` WHERE `id` = :id");
                $stmt->execute(['id' => $id]);
                return "Reservation deleted successfully.";
            } catch (Exception $e) {
                return "Couldn't delete reservation: " . $e->getMessage();
            }
        }

        public function annulerReservation($pdo) {
            try {
                $stmt = $pdo->prepare("UPDATE `reservations` SET 
                                        `status` = :status 
                                        WHERE `id` = :id");
                $stmt->execute([
                    'status' => $this->status,
                    'id' => $this->idReservation
                ]);
                return "Reservation status updated successfully.";
            } catch (Exception $e) {
                return "Couldn't update reservation status: " . $e->getMessage();
            }
        }

        public function __toString() {
            return "Mon statut est: " . $this->status;
        }
    }

    ?>
