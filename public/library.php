<?php
require_once "../config/database.php";
include_once "../classes/Game.php";
include_once "../classes/Library.php";


$user_id = $_SESSION["user_id"] ?? "";
$collections = new Library();
$all_collections = $collections->getUserBiblio($user_id);
if (isset($_POST['change_status'])) {
}

if (isset($_POST['gameDelete'])) {

    $gameDelete = $_POST['gameDelete'];
    $result = $collections->delete($gameDelete);
    if ($result) {
        header("location:library.php?game_deleted");
    } else {
        header("location:library.php?game_already_added");
    }
}

if (isset($_POST["submit"])) {

    $jeu_id = $_POST["jeu_id"];
    $user_id = $_POST["user_id"];

    $collections->addToBiblio($user_id, intval($jeu_id));

    header("Location: detaileGame.php?game_id=" . urlencode($jeu_id));
}

if (isset($_POST['change_status'])) {
    $bib_id = $_POST['bib_id_submit'];
    $bibo = $collections->getbibo($bib_id);
    include_once "status_game.php";
 
}


if (isset($_POST['submit_status_update'])) {

    $bib_id = $_POST['bib_id_submit'];
    $status =  $_POST["status"];

    // header("location:library.php?status_updated $status");



    $change_status = $collections->updateStatus($status, $bib_id);
    if ($change_status) {
        header("location:library.php?status updated");
    } else {
        header("location:library.php?status updated failed");
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

    <?php include_once "../template/header.php" ?>

    <div class="max-w-7xl mx-auto my-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">
                Ma Bibliothèque de Jeux
            </h1>
        </div>

        <!-- Search and Filters -->
        <div class="mb-8 space-y-4">
            <div class="relative">
                <input type="text"
                    placeholder="Rechercher un jeu..."
                    class="w-full bg-white border border-gray-200 rounded-lg px-4 py-3 pl-12 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300 shadow-sm">
                <i class="fas fa-search absolute left-4 top-4 text-gray-400"></i>
            </div>

            <div class="flex flex-wrap gap-4">
                <button class="px-6 py-2 rounded-full bg-orange-600 text-white hover:bg-orange-700 transition-colors duration-300">
                    Tous
                </button>
                <button class="px-6 py-2 rounded-full bg-white text-gray-700 hover:bg-gray-100 transition-colors duration-300 shadow-sm border border-gray-200">
                    En cours
                </button>
                <button class="px-6 py-2 rounded-full bg-white text-gray-700 hover:bg-gray-100 transition-colors duration-300 shadow-sm border border-gray-200">
                    Terminé
                </button>
                <button class="px-6 py-2 rounded-full bg-white text-gray-700 hover:bg-gray-100 transition-colors duration-300 shadow-sm border border-gray-200">
                    Abandonné
                </button>
                <button class="px-6 py-2 rounded-full bg-white text-gray-700 hover:bg-gray-100 transition-colors duration-300 shadow-sm border border-gray-200">
                    <i class="fas fa-heart text-red-500 mr-2"></i>Favoris
                </button>
            </div>


        </div>


        <!-- Games Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Game Card 1 -->

            <?php foreach ($all_collections as $collection) { ?>
                <div class="group bg-white rounded-xl overflow-hidden hover:shadow-xl hover:shadow-orange-500/10 transition-all duration-300 border border-gray-200">
                    <div class="relative">
                        <img src="<?= $collection["image"]; ?>" alt="Game Cover" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex gap-2">

                            <form method="POST">
                                <input type="hidden" name="gameDelete" value="<?= $collection["bib_id"] ?>">
                                <button class="p-2 bg-white/90 rounded-full hover:bg-white">
                                    <i class="fas fa-trash text-red-500"></i>
                                </button>
                            </form>

                        </div>
                        <form action="" method="POST">
                            <div class="absolute bottom-2 left-2">
                                <button  name="change_status"
                                    class="update_status flex justify-center items-center gap-2 px-5 py-2.5 rounded text-white text-sm font-medium border-none outline-none bg-blue-500  hover:bg-blue-700  active:bg-green-600">
                                    <span><?php echo $collection["status"] ?></span>
                                </button>

                                <input type="hidden" name="bib_id_submit" value="<?= $collection["bib_id"] ?>">

                            </div>
                        </form>

                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold text-lg"><?= $collection["title"]; ?></h3>
                            <button class="text-red-500">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <p class="text-sm text-gray-500 py-4"><?= $collection["description"]; ?></p>
                        <div class="flex items-center gap-4 mb-3 text-gray-600">
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-2"></i>
                                <span>45h</span>
                            </div>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>

                </div>


            <?php } ?>

            
        </div>






    </div>

 








    <?php include_once "../template/footer.php" ?>


    
</body>

</html>