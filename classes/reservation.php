<?php
 include_once 'db.php';
 class reservation{
    private PDO $db;
    function __construct($db)
    {
        $this->db=$db;
    }
    function ajouterReservation($iduser,$idvoiture,$pickup_date,$return_date,$total_price){
        $stmt=$this->db->prepare("call ajoutReservation(:iduser,:idvoiture,:pickup_date,:return_date,:total_price)");
        $stmt->execute(['iduser'=>$iduser,
                        'idvoiture'=>$idvoiture,
                        'pickup_date'=>$pickup_date,
                        'return_date'=>$$return_date,
                        'total_price'=>$total_price]);

    }
 }
?>