<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxAuto - Location de Voitures</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-black shadow-md fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="../index.php" class="flex-shrink-0">
                        <img class="h-10 w-auto" src="https://via.placeholder.com/150x50?text=RoadRover"
                            alt="RoadRover Logo">
                    </a>
                </div>
                <div class="flex-1 flex justify-center">
                    <div class="flex items-baseline space-x-4">
                        <a href="../index.php" class="text-white hover:bg-gray-200 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="./categorie.php" class="text-white hover:bg-gray-200 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Nos Véhicules</a>
                        <a href="./reservation.php" class="text-white hover:bg-gray-200 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Réservation</a>
                        <a href="./about.php" class="text-white hover:bg-gray-200 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">À Propos</a>
                        <a href="#" class="text-white hover:bg-gray-200 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
                <div>
                    <a href="./login/signup.php" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-500 text-sm font-medium">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>
</body>

<!-- Footer Amélioré -->
<footer class="bg-gradient-to-r from-gray-900 to-black text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <!-- Colonnes précédentes avec des améliorations visuelles subtiles -->
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