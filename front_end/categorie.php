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
    <nav class="bg-black bg-opacity-95 shadow-2xl fixed w-full z-50">
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
                    <a href="../login/signup.php" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-500 text-sm font-medium shadow-md transform hover:scale-105 transition duration-300">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Page de Catégorie de Voitures -->
    <div class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold text-center mt-12 mb-12">Nos Premium Voitures</h1>

        <!-- Filtres de Catégorie -->
        <div class="flex justify-center mb-12 space-x-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
                onclick="filterCars('all')">Tous</button>
            <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300"
                onclick="filterCars('berlines')">Berlines</button>
            <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300"
                onclick="filterCars('suv')">SUV</button>
            <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300"
                onclick="filterCars('cabriolets')">Cabriolets</button>
            <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300"
                onclick="filterCars('electriques')">Électriques</button>
        </div>

        <!-- Voitures -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
    <?php 
    require_once '../classes/vehicule.php';
     $voiture= new vehicule();
     $allCars= $voiture->showAllvehicules();
     foreach($allCars as $car):
    ?>
    <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/classe S.jpg" alt="Mercedes Classe S" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2"><?= $car['model']?></h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600"><?= $car['prix_par_jour']?>/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>4
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>
                    <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">Voir détail</button>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>
            <!-- Voiture 1 -->
            

            <!-- Voiture 2 -->
            <!-- <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/bmw X5.jpeg" alt="BMW X5" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">BMW X5</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">150€/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>5
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>
                        <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray- 300">Voir
                            détail</button>
                    </div>
                </div>
            </div> -->

            <!-- Voiture 3 -->
            <!-- <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/911 turbo S.jpg" alt="Porsche 911" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Porsche 911</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">250€/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>2
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>
                        <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">Voir
                            détail</button>
                    </div>
                </div>
            </div> -->

            <!-- Voiture 4 -->
            <!-- <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/tesla model S.jpg" alt="Tesla Model S" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Tesla Model S</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">150€/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>4
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Electrique
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>

                        <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">Voir
                            détail</button>
                    </div>
                </div>
            </div> -->

            <!-- Voiture 5 -->
            <!-- <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/RS7.jpg" alt="Audi RS7" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Audi RS7</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">200€/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>4
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>

                        <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">Voir
                            détail</button>
                    </div>
                </div>
            </div> -->

            <!-- Voiture 6 -->
            <!-- <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/SVR.jpg" alt="Range Rover SVR" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Range Rover SVR</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">190€/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>5
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>

                        <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">Voir
                            détail</button>
                    </div>
                </div>
            </div> -->

            <!-- Voiture 7 -->
            <!-- <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/458 italia .jpeg" alt="Ferrari 458" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Ferrari 458</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">300€/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>2
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>

                        <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">Voir
                            détail</button>
                    </div>
                </div>
            </div> -->

            <!-- Voiture 8 -->
            <!-- <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/RSQ8.jpg" alt="Audi RSQ8" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Audi RSQ8</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">220€/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>4
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>

                        <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">Voir
                            détail</button>
                    </div>
                </div>
            </div> -->

            <!-- Voiture 9 -->
            <!-- <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/Urus.jpg" alt="Lamborghini Urus" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Lamborghini Urus</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">300€/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>4
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>

                        <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">Voir
                            détail</button>
                    </div>
                </div>
            </div> -->

            <!-- Voiture 10 -->
            <!-- <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/AMG GT.jpeg" alt="Mercedes GT63" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Mercedes GT63</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">260€/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>4
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>

                        <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">Voir
                            détail</button>
                    </div>
                </div>
            </div> -->

            <!-- Voiture 11 -->
            <!-- <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/Porsche Cayenne.jpg" alt="Porsche Cayenne" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Porsche Cayenne</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">240€/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>5
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>

                        <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">Voir
                            détail</button>
                    </div>
                </div>
            </div> -->

            <!-- Voiture 12 -->
            <!-- <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="../img/GranTurismo.jpeg" alt="Maserati Granturismo" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Maserati Granturismo</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">260€/jour</span>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>2
                            <i class="fas fa-gas-pump ml-2 mr-2"></i>Essence
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                    <a href="../front_end/reservation.php"class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-400 text-center flex items-center justify-center">Réserver</a>

                        <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-md hover:bg-gray-300">Voir
                            détail</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Pagination -->
    <div class="flex justify-center mb-12 space-x-4">
        <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300">1</button>
        <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300">2</button>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">3</button>
        <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300">Suivant</button>
    </div>
    </div>

    <script>
        function filterCars(category) {
            const allCars = document.querySelectorAll('.car-item');
            allCars.forEach(car => {
                if (category === 'all' || car.getAttribute('data-category') === category) {
                    car.style.display = 'block';
                } else {
                    car.style.display = 'none';
                }
            });
        }
    </script>

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
                    <li><a href="./categorie.php" class="hover:text-yellow-400 transition duration-300">Nos Véhicules</a></li>
                    <li><a href="./reservation.php" class="hover:text-yellow-400 transition duration-300">Réservation</a></li>
                    <li><a href="./about.php" class="hover:text-yellow-400 transition duration-300">About Us</a></li>
                    <li><a href="./contact.php" class="hover:text-yellow-400 transition duration-300">Contact Us</a></li>
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