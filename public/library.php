<?php
require_once "../config/database.php";
require_once "../classes/User.php";

$user = new users();
$user_id = $_SESSION["user_id"] ?? "";
$currentUser =  $user->getUser($user_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body class="bg-gradient-to-br from-orange-50 via-gray-100 to-gray-200">
    
    <?php include "../template/header.php"; ?>

    <section class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-300 p-6">
  <!-- Header -->
  <header class="text-center py-10 bg-gradient-to-r from-purple-600 via-indigo-500 to-blue-600 text-white shadow-lg rounded-lg">
    <h1 class="text-5xl font-extrabold tracking-wide">Ma Bibliothèque de Jeux</h1>
    <p class="mt-4 text-lg font-light">Retrouvez vos jeux préférés et plongez dans l'aventure.</p>
    <div class="flex justify-center mt-8">
      <input 
        type="text" 
        placeholder="Rechercher un jeu ou un genre..." 
        class="w-80 px-5 py-3 rounded-l-lg border-none focus:outline-none text-gray-800 shadow-md focus:ring-2 focus:ring-purple-300" />
      <button class="bg-white text-purple-700 px-6 py-3 rounded-r-lg font-semibold shadow-md hover:bg-purple-200 hover:shadow-lg transition">
        Rechercher
      </button>
    </div>
  </header>

  <!-- Main Content -->
  <main class="mt-12 max-w-7xl mx-auto">
    <!-- Filter Tags -->
    <div class="flex flex-wrap gap-4 justify-center mb-12">
      <button class="px-6 py-3 bg-purple-200 text-purple-800 font-medium rounded-full shadow-md hover:bg-purple-300 transition">Action</button>
      <button class="px-6 py-3 bg-blue-200 text-blue-800 font-medium rounded-full shadow-md hover:bg-blue-300 transition">Stratégie</button>
      <button class="px-6 py-3 bg-green-200 text-green-800 font-medium rounded-full shadow-md hover:bg-green-300 transition">Sport</button>
      <button class="px-6 py-3 bg-yellow-200 text-yellow-800 font-medium rounded-full shadow-md hover:bg-yellow-300 transition">Aventure</button>
      <button class="px-6 py-3 bg-red-200 text-red-800 font-medium rounded-full shadow-md hover:bg-red-300 transition">Multijoueur</button>
    </div>

    <!-- Game Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-12 max-lg:max-w-3xl max-md:max-w-md mx-auto">
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">10 FEB 2023 | BY JOHN DOE</span>
              <h3 class="text-xl font-bold text-white">A Guide to Igniting Your Imagination</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/hacks-watch.webp" alt="Blog Post 2" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">7 JUN 2023 | BY MARK ADAIR</span>
              <h3 class="text-xl font-bold text-white">Hacks to Supercharge Your Day</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/prediction.webp" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">5 OCT 2023 | BY SIMON KONECKI</span>
              <h3 class="text-xl font-bold text-white">Trends and Predictions</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/images/food.webp" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">5 OCT 2023 | BY SIMON KONECKI</span>
              <h3 class="text-xl font-bold text-white">Trends and Predictions</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/images/food11.webp" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">5 OCT 2023 | BY SIMON KONECKI</span>
              <h3 class="text-xl font-bold text-white">Trends and Predictions</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/images/food22.webp" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">5 OCT 2023 | BY SIMON KONECKI</span>
              <h3 class="text-xl font-bold text-white">Trends and Predictions</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
        </div>
    <!-- Call-to-Action Section -->
    <div class="mt-16 text-center bg-gradient-to-r from-purple-200 to-blue-200 p-10 rounded-lg shadow-lg transform hover:shadow-xl hover:scale-105 transition">
      <h2 class="text-3xl font-bold text-gray-800">Vous ne trouvez pas ce que vous cherchez ?</h2>
      <p class="mt-4 text-gray-600">Parcourez notre collection et ajoutez de nouveaux jeux à votre bibliothèque.</p>
      <button class="mt-6 px-8 py-4 bg-purple-600 text-white text-lg font-semibold rounded-lg shadow hover:bg-purple-700 transform hover:scale-105 transition">
        Explorer des Jeux
      </button>
    </div>
  </main>

  <!-- Footer -->
  <footer class="mt-16 text-center text-gray-600 text-sm">
    <p>© 2025 Bibliothèque des Jeux. Tous droits réservés.</p>
  </footer>
</section>





</body>
</html>