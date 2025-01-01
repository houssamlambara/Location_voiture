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
                        <a href="#" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">À Propos</a>
                        <a href="./contact.php" class="text-white nav-hover hover:bg-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
                <div>
                    <a href="../login/signin.php" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-500 text-sm font-medium shadow-md transform hover:scale-105 transition duration-300">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>

<!-- Content Section Amélioré -->
<div class="flex items-center justify-center min-h-screen">
    <div class="max-w-6xl mx-auto p-4 mt-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="flex flex-col justify-center text-center md:text-left p-8">
            <h1 class="text-center text-5xl font-bold text-yellow-500 mb-6">À Propos de Nous</h1>
                <div class="border-t border-yellow-500 mb-8"></div>
                <p class="text-lg leading-relaxed mb-4 text-gray-700">
                    Welcome to Mamoune Travels, your premier luxury travel agency in Morocco. We specialize in providing our clients with the ultimate travel experience, complete with private driver service, luxurious car rentals, and expert travel guides to help you discover all the beauty and wonder that Morocco has to offer.
                </p>
                <p class="text-lg leading-relaxed text-gray-700">
                    At Mamoune Travels, we believe that travel should be more than just a simple getaway. It should be a transformative experience that stays with you for a lifetime. That's why we go above and beyond to provide our clients with the highest level of service and attention to detail.
                </p>
            </div>
            <div class="overflow-hidden">
                <img alt="A professional chauffeur opening the door of a luxury car for a client" 
                     class="w-full h-full object-cover transform hover:scale-105 transition duration-300" 
                     src="https://storage.googleapis.com/a1aa/image/PtWMD57ekfrflJ8NDuroONyIfx5meECgziWArThafXCSWPNAF.jpg"/>
            </div>
        </div>
    </div>
</div>

    <!-- Second Section Amélioré -->
    <div class="flex items-center justify-center min-h-screen">
        <div class="max-w-6xl mx-auto p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="overflow-hidden">
                    <img alt="A luxurious black car parked in a parking lot with trees in the background" 
                         class="w-full h-full object-cover transform hover:scale-105 transition duration-300"
                         src="https://storage.googleapis.com/a1aa/image/m6zw5bnaKFZhOpsrUgMf9FyIl2hUoCDm6cU8xjQXFPluf0AUA.jpg"/>
                </div>
                <div class="flex flex-col justify-center text-center p-8">
                    <p class="text-lg leading-relaxed mb-4 text-gray-700">
                        Our private driver service is perfect for those who want to explore Morocco in style and comfort. Our experienced drivers are knowledgeable about the country and its various regions, and will work with you to create a personalized itinerary that suits your interests and preferences.
                    </p>
                    <p class="text-lg leading-relaxed text-gray-700">
                        For those who want to drive themselves, our luxurious car rentals are the perfect choice. We offer a range of high-end vehicles that are sure to impress, from sports cars and SUVs to classic cars and vintage models.
                    </p>
                </div>
            </div>
        </div>
    </div>
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