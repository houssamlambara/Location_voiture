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
                        <a href="#" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="./front_end/categorie.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Nos Véhicules</a>
                        <a href="./front_end/reservation.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Réservation</a>
                        <a href="./front_end/about.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">À Propos</a>
                        <a href="./front_end/contact.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
                <div>
                    <a href="./login/signup.php" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-500 text-sm font-medium shadow-md transform hover:scale-105 transition duration-300">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header id="home" class="relative pt-20 h-screen flex items-center">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a?ixlib=rb-4.0.3&auto=format&fit=crop&w=2069&q=80" 
                 alt="Voiture de luxe" 
                 class="w-full h-full object-cover brightness-50">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl font-bold mb-4 text-shadow">Louez Votre Voiture de Rêve</h1>
            <p class="text-xl mb-8 text-shadow">Découvrez la liberté avec LuxAuto - Location de Voitures de Luxe</p>
            <a href="./front_end/categorie.php" class="bg-yellow-400 text-white px-6 py-3 rounded-full hover:bg-yellow-500 transition duration-300">Réserver Maintenant</a>
        </div>
    </header>

    <div class="flex items-center justify-center mt-16">
    <div class="bg-white shadow-lg rounded-lg p-4 w-full max-w-4xl">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Find Your Perfect Car</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Select Year -->
            <div>
                <label for="year" class="block text-sm font-medium text-gray-700 mb-2">Select Year</label>
                <select id="year" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="default" disabled selected>Choose year</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                </select>
            </div>

            <!-- Select Body Style -->
            <div>
                <label for="style" class="block text-sm font-medium text-gray-700 mb-2">Body Style</label>
                <select id="style" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="default" disabled selected>Choose style</option>
                    <option value="sedan">Sedan</option>
                    <option value="van">Van</option>
                    <option value="roadster">Roadster</option>
                </select>
            </div>

            <!-- Select Make -->
            <div>
                <label for="make" class="block text-sm font-medium text-gray-700 mb-2">Select Make</label>
                <select id="make" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="default" disabled selected>Choose make</option>
                    <option value="toyota">Toyota</option>
                    <option value="holden">Holden</option>
                    <option value="mercedes-benz">Mercedes-Benz</option>
                </select>
            </div>

            <!-- Select Model -->
            <div>
                <label for="model" class="block text-sm font-medium text-gray-700 mb-2">Select Model</label>
                <select id="model" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="default" disabled selected>Choose model</option>
                    <option value="kia-rio">Kia Rio</option>
                    <option value="mitsubishi">Mitsubishi</option>
                    <option value="ford">Ford</option>
                </select>
            </div>

            <!-- Car Condition -->
            <div>
                <label for="condition" class="block text-sm font-medium text-gray-700 mb-2">Car Condition</label>
                <select id="condition" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="default" disabled selected>Choose condition</option>
                    <option value="new">New</option>
                    <option value="used">Used</option>
                </select>
            </div>

            <!-- Select Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Select Price</label>
                <select id="price" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="default" disabled selected>Choose price</option>
                    <option value="0-10k">$0 - $10,000</option>
                    <option value="10k-20k">$10,000 - $20,000</option>
                    <option value="20k-30k">$20,000 - $30,000</option>
                </select>
            </div>
        </div>

        <!-- Search Button -->
        <div class="mt-6 text-center">
            <button class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Search
            </button>
        </div>
    </div>
</div>



    <!-- Voitures Section -->
    <section id="cars" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-10">Notre Collection</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Voitures -->
                <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                    <img src="./img/AMG GT.jpeg" alt="Voiture de luxe"class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Berline de Luxe</h3>
                        <p class="text-gray-600">À partir de 200€/jour</p>
                        <button class="mt-4 w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Détails</button>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                    <img src="./img/Urus.jpg" alt="SUV de luxe"class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">SUV Premium</h3>
                        <p class="text-gray-600">À partir de 200€/jour</p>
                        <button class="mt-4 w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Détails</button>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                    <img src="./img/tesla model S.jpg" alt="Cabriolet de luxe" 
                         class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Cabriolet Sport</h3>
                        <p class="text-gray-600">À partir de 160€/jour</p>
                        <button class="mt-4 w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Détails</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

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