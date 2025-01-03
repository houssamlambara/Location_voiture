<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxAuto - Location de Voitures</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        .nav-hover:hover {
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Navbar Amélioré -->
    <!-- <nav class="bg-black bg-opacity-95 shadow-2xl fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="../index.php" class="flex-shrink-0">
                        <img class="h-10 w-auto transform hover:scale-110 transition duration-300" src="https://via.placeholder.com/150x50?text=RoadRover" alt="RoadRover Logo">
                    </a>
                </div>
                <div class="flex-1 flex justify-center">
                    <div class="flex items-baseline space-x-4">
                        <a href="../index.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="./categorie.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Nos Véhicules</a>
                        <a href="./reservation.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Réservation</a>
                        <a href="./about.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">À Propos</a>
                        <a href="./contact.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
                <div>
                    <a href="./login/signup.php" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-500 text-sm font-medium shadow-md transform hover:scale-105 transition duration-300">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav> -->

    <?php
    include_once '../classes/db.php';
    include_once '../classes/classe_Reservation.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ensure each field is set before using it
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
        $voiture_id = isset($_POST['voiture_id']) ? $_POST['voiture_id'] : null;
        $pickup_date = isset($_POST['pickup_date']) ? $_POST['pickup_date'] : null;
        $return_date = isset($_POST['return_date']) ? $_POST['return_date'] : null;
    
        // Check if voiture_id is provided
        if ($voiture_id == null) {
            echo "Voiture ID is required.";
        } else {
            // Proceed with the reservation process
            $prix_voiture = 0;
            if ($voiture_id == 'berline') {
                $prix_voiture = 100; 
            } elseif ($voiture_id == 'suv') {
                $prix_voiture = 150;
            } elseif ($voiture_id == 'cabriolet') {
                $prix_voiture = 200;
            }
    
            $user_id = 1; 
            
            $voiture_id = ($voiture_id == 'berline') ? 1 : (($voiture_id == 'suv') ? 2 : 3);
    
            $db = new Database();
            $pdo = $db->getConnection(); // Create an instance of the DatabaseManager
            $reservation = new Reservation($user_id, $voiture_id, $pickup_date, $return_date, $prix_voiture); // Pass the instance to the Reservation constructor
    
            $is_saved = $reservation->creerReservation($pdo);
    
            if ($is_saved) {
                echo $is_saved;
            } else {
                echo "Erreur lors de la réservation.";
            }
        }
    }
?>


   <!-- Formulaire de Réservation -->
<section class="py-16 bg-gradient-to-r from-gray-900 via-gray-800 to-black text-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-gray-900 bg-opacity-80 p-10 shadow-2xl rounded-lg border border-gray-700 mt-12">
            <h2 class="text-4xl font-bold text-center text-yellow-400 mb-8 tracking-wide uppercase">Réservez Votre Véhicule</h2>
            <form class="space-y-8" action="reservation.php" method="POST">

            <div class="grid grid-cols-1 sm:grid-cols-1 gap-8">
                    <div>
                        <label for="last-name" class="block text-sm font-medium text-yellow-300">Nom</label>
                        <input type="text" id="last-name" name="username" placeholder="Votre nom" class="w-full bg-gray-800 border border-gray-600 text-yellow-100 rounded-md focus:border-yellow-400 focus:ring-yellow-400 focus:outline-none px-4 py-2">
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div>
                        <label for="email" class="block text-sm font-medium text-yellow-300">Email</label>
                        <input type="email" id="email" name="email" placeholder="Votre email" class="w-full bg-gray-800 border border-gray-600 text-yellow-100 rounded-md focus:border-yellow-400 focus:ring-yellow-400 focus:outline-none px-4 py-2">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-yellow-300">Téléphone</label>
                        <input type="tel" id="phone" name="phone" placeholder="Votre numéro" class="w-full bg-gray-800 border border-gray-600 text-yellow-100 rounded-md focus:border-yellow-400 focus:ring-yellow-400 focus:outline-none px-4 py-2">
                    </div>
                </div>
                <div>
                <label for="voiture_id" class="block text-sm font-medium text-yellow-300">Sélectionnez votre voiture</label>
                <select id="car" name="voiture_id" class="w-full bg-gray-800 border border-gray-600 text-yellow-100 rounded-md focus:border-yellow-400 focus:ring-yellow-400 focus:outline-none px-4 py-2">
                    <?php
                    // Affichage des voitures récupérées de la base de données
                    include ("db.php");
                    $db = new Database();
                    $pdo = $db->getConnection();
                    $stmt = $pdo->prepare("SELECT * FROM voiture");
                    $stmt->execute();
                    $voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($voitures) {
                        foreach ($voitures as $voiture) {
                            echo "<option value='{$voiture['id']}'> {$voiture['model']} </option>";
                        }
                    } else {
                        echo "<option value=''>Aucune voiture disponible</option>";
                    }
                    ?>
                </select>
            </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div>
                        <label for="start-date" class="block text-sm font-medium text-yellow-300">Date de début</label>
                        <input type="date" id="pickup_date" name="pickup_date" class="w-full bg-gray-800 border border-gray-600 text-yellow-100 rounded-md focus:border-yellow-400 focus:ring-yellow-400 focus:outline-none px-4 py-2">
                    </div>
                    <div>
                        <label for="end-date" class="block text-sm font-medium text-yellow-300">Date de fin</label>
                        <input type="date" id="return_date" name="return_date" class="w-full bg-gray-800 border border-gray-600 text-yellow-100 rounded-md focus:border-yellow-400 focus:ring-yellow-400 focus:outline-none px-4 py-2">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 px-8 py-3 rounded-full font-bold uppercase tracking-wider shadow-lg transform hover:scale-105 transition duration-300">
                        Réserver Maintenant
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

   <!-- Footer -->
<footer class="bg-gradient-to-r from-gray-900 to-black text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div>
                <img src="https://via.placeholder.com/150x50?text=RoadRover" alt="RoadRover Logo" class="mb-4 mx-auto transform hover:scale-110 transition duration-300">
                <p class="text-sm text-gray-400">RoadRover - Votre partenaire de confiance pour la location de voitures de luxe.</p>
            </div>

            <div>
                <h4 class="font-bold mb-4 text-yellow-500">Liens Rapides</h4>
                <ul class="space-y-2">
                    <li><a href="#home" class="hover:text-yellow-400 transition duration-300">Accueil</a></li>
                    <li><a href="#cars" class="hover:text-yellow-400 transition duration-300">Véhicules</a></li>
                    <li><a href="#reservation" class="hover:text-yellow-400 transition duration-300">Réservation</a></li>
                    <li><a href="#about" class="hover:text-yellow-400 transition duration-300">À Propos</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-4 text-yellow-500">Contact</h4>
                <ul class="space-y-2">
                    <li><i class="fas fa-phone mr-2 text-yellow-500"></i>+33 1 23 45 67 89</li>
                    <li><i class="fas fa-envelope mr-2 text-yellow-500"></i>contact@roadrover.com</li>
                    <li><i class="fas fa-map-marker-alt mr-2 text-yellow-500"></i>Paris, France</li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-4 text-yellow-500">Suivez-nous</h4>
                <div class="flex space-x-4 justify-center">
                    <a href="#" class="text-2xl hover:text-yellow-400 transform hover:scale-125 transition duration-300"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400 transform hover:scale-125 transition duration-300"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400 transform hover:scale-125 transition duration-300"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400 transform hover:scale-125 transition duration-300"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-8 border-t border-gray-800 text-center">
            <p class="text-sm text-gray-400">&copy; 2024 RoadRover. Tous droits réservés.</p>
        </div>
    </div>
</footer>
</body>
</html>