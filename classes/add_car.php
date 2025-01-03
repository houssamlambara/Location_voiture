<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $conn = $db->getConnection();

    $model = $conn->quote($_POST['model']);
    $description = $conn->quote($_POST['description']);
    $prix = $conn->quote($_POST['prix_par_jour']);
    $imageName = NULL;
    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === 0) {
        $imageName = $_FILES['image_url']['name'];
        $imageTmpName = $_FILES['image_url']['tmp_name'];
        $imageDestination = $uploadDir . $imageName;

        if (move_uploaded_file($imageTmpName, $imageDestination)) {
            echo "Image uploaded successfully!";
        } else {
            echo "Error: Unable to move the uploaded file.";
        }
    }

    $sql = "INSERT INTO `voiture` (model, description, image_url, prix_par_jour) VALUES ($model, $description, '$imageName', $prix)";
    if ($conn->exec($sql)) {
        echo "Voiture added successfully!";
    } else {
        echo "Error: " . $conn->errorInfo()[2];
    }
}
?>