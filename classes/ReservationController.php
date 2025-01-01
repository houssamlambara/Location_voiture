<?php 

class Reservation {
    private $user;
    private $car;
    private $pickupDate;
    private $returnDate;
    private $totalPrice;
    
    public function __construct(User $user, Car $car, $pickupDate, $returnDate) {
        $this->user = $user;
        $this->car = $car;
        $this->pickupDate = $pickupDate;
        $this->returnDate = $returnDate;
        $this->calculateTotalPrice();
    }
    
    private function calculateTotalPrice() {
        $days = (strtotime($this->returnDate) - strtotime($this->pickupDate)) / (60 * 60 * 24);
        $this->totalPrice = $this->car->getPricePerDay() * $days;
    }
    
    public function getTotalPrice() {
        return $this->totalPrice;
    }
    
    public function saveToDatabase() {
    }
}
?>
