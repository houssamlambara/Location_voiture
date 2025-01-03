<?php
require_once '../classe/db.php';
require_once '../classe/reservation.php';
try{
  $database =new Database();
  $db=$database->connect();
}catch(PDOException $e){$e->getMessage();}
if($_SERVER['REQUEST_METHOD']=="POST"){
    $user_id=$_POST['user_id'];
    $voiture_id=$_POST['voiture_id'];
    $pickup_date=$_POST['pickup_date'];
    $return_date=$_POST['return_date'];
    $total_price=$_POST['total_price'];
    $resrvation =new reservation($db);
    $bool=$resrvation->ajouterReservation($user_id,$voiture_id,$pickup_date,$return_date,$total_price);
    if($bool){
        echo "resrve";
        header("location: ../pages/cars.php");
        exit;
    }else echo "err resrvation";
}