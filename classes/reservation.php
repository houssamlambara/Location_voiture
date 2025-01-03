<?php
 include_once 'db.php';
 class reservation{
    private PDO $db;
    function __construct($db)
    {
        $this->db=$db;
    }
    function ajouterReservation($iduser,$idvoiture,$pickup_date,$return_date,$total_price){

    }
 }
?>