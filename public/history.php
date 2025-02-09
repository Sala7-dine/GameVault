<?php
require_once "../config/database.php";
include_once "../classes/Game.php";
include_once "../classes/Library.php";
include_once "../classes/History.php";


$user_id = $_SESSION["user_id"] ?? "";
$collections = new Library();
$collections = new History();
$all_collections = $collections->getUserHistory($user_id);

if (isset($_POST['gameDelete'])) {

    $gameDelete = $_POST['gameDelete'];
    $result = $collections->delete($gameDelete);
    if ($result) {
        header("location:history.php?game_deleted");
    } else {
        header("location:history.php?game_already_added");
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Bibliothèque de Jeux</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-white min-h-screen text-gray-800">
    
    <?php include_once "../template/header.php"?>

    <div class="max-w-7xl mx-auto my-8"> 
        <div class="flex justify-between items-center mb-20">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">
                MY HISTORY GAMES
            </h1>
        </div>


      
        <!-- Games Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Game Card 1 -->
      
            <?php foreach($all_collections as $collection){ ?>
            <div class="group bg-white rounded-xl overflow-hidden hover:shadow-xl hover:shadow-orange-500/10 transition-all duration-300 border border-gray-200">
                <div class="relative">
                    <img src="<?= $collection["image"]; ?>" alt="Game Cover" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex gap-2">
                     
                        <form method="POST">
                              <input type="hidden" name="gameDelete" value="<?= $collection["his_id"] ?>">
                              <button class="p-2 bg-white/90 rounded-full hover:bg-white">
                                  <i class="fas fa-trash text-red-500"></i>
                              </button>
                        </form>
                        
                    </div>
                    <!-- <div class="absolute bottom-2 left-2">
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm shadow-sm">En cours</span>
                    </div> -->
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-lg"><?= $collection["title"]; ?></h3>
                        <button class="text-red-500">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 py-4"><?= $collection["description"]; ?></p>
                    
                </div>
            </div>

            <?php } ?>

            <!-- Game Card 2 -->
            <!-- <div class="group bg-white rounded-xl overflow-hidden hover:shadow-xl hover:shadow-orange-500/10 transition-all duration-300 border border-gray-200">
                <div class="relative">
                    <img src="/api/placeholder/400/250" alt="Game Cover" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex gap-2">
                        <button class="p-2 bg-white/90 rounded-full hover:bg-white">
                            <i class="fas fa-edit text-orange-600"></i>
                        </button>
                        <button class="p-2 bg-white/90 rounded-full hover:bg-white">
                            <i class="fas fa-trash text-red-500"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-2 left-2">
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm shadow-sm">Terminé</span>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-bold text-lg">Red Dead Redemption 2</h3>
                        <button class="text-red-500">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="flex items-center gap-4 mb-3 text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-2"></i>
                            <span>120h</span>
                        </div>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Game Card 3 -->
            <!-- <div class="group bg-white rounded-xl overflow-hidden hover:shadow-xl hover:shadow-orange-500/10 transition-all duration-300 border border-gray-200">
                <div class="relative">
                    <img src="/api/placeholder/400/250" alt="Game Cover" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex gap-2">
                        <button class="p-2 bg-white/90 rounded-full hover:bg-white">
                            <i class="fas fa-edit text-orange-600"></i>
                        </button>
                        <button class="p-2 bg-white/90 rounded-full hover:bg-white">
                            <i class="fas fa-trash text-red-500"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-2 left-2">
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm shadow-sm">Abandonné</span>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-bold text-lg">Cyberpunk 2077</h3>
                        <button class="text-gray-400">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                    <div class="flex items-center gap-4 mb-3 text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-2"></i>
                            <span>8h</span>
                        </div>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>


     
    </div>



    <?php include_once "../template/footer.php" ?>
</body>
</html>









