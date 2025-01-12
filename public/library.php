<?php
require_once "../config/database.php";
include_once "../classes/Game.php";
include_once "../classes/Library.php";


$user_id = $_SESSION["user_id"] ?? "";
$collections = new Library();
$all_collections = $collections->getUserBiblio($user_id);
if (isset($_POST['change_status'])) {

    ?>
    <!-- update the game status -->

    <div id="update_status_container" class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8 relative">
            <div class="flex items-center">
                <h3 class="text-orange-600 text-3xl font-bold flex-1 text-center w-full">Update the Game's Status</h3>

                <div id="close1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 ml-2 cursor-pointer shrink-0 fill-gray-400 hover:fill-red-500"
                        viewBox="0 0 320.591 320.591">
                        <path
                            d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                            data-original="#000000"></path>
                        <path
                            d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                            data-original="#000000"></path>
                    </svg>
                </div>

            </div>

            <form class="space-y-4 mt-8" method="post" autocomplete="off">

                <div class="flex ">
                    <input type="radio" name="status" value="In progress" />
                    <label class="text-gray-800 text-sm mb-2 block">In progress</label>

                </div>
                <div class="flex ">
                    <input type="radio" name="status" value="Completed" />
                    <label class="text-gray-800 text-sm mb-2 block">Completed</label>

                </div>
                <div class="flex ">
                    <input type="radio" name="status" value="Abandoned" />
                    <label class="text-gray-800 text-sm mb-2 block">Abandoned</label>

                </div>
                <!-- ------------------------------------------submit----------------------------- -->
                <div class="flex justify-end gap-4 !mt-8">

                    <button type="submit" id="ajoutQuizBtn" name="submit"
                        class="px-6 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-orange-600 hover:bg-orange-700">Save Changes</button>
                </div>


            </form>
        </div>
    </div>

    <!-- -----------------end update the game status------------ -->
    <?php
   
    
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

if(isset($_POST["submit"])){

  $jeu_id = $_POST["jeu_id"];
  $user_id = $_POST["user_id"];

  $collections->addToBiblio($user_id , intval($jeu_id));

  header("Location: detaileGame.php?game_id=" . urlencode($jeu_id));

}
// if (isset($_POST['change_status'])) {
//     $bib_id = $_POST['bib_id_submit'];
//     header("location:library.php?hh $bib_id");
// }


if (isset($_POST['submit'])) {
   

    $bib_id = $_POST['bib_id_submit'];
    $status =  $_POST["status"];




    $change_status = $collections->updateStatus($status, $bib_id);
    if ($change_status) {
        echo " <script>alert('done')</script>";
        // header("location:library.php?status updated $bib_id jjj");
    } else {
        echo "<script>alert('hhhh')</script>";

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
                        <form action="" method="post">
                            <div class="absolute bottom-2 left-2">
                                <input type="hidden" name="bib_id_submit" value="<?= $collection["bib_id"] ?>">
                                <button type="submit" name="change_status"
                                    class="update_status flex justify-center items-center gap-2 px-5 py-2.5 rounded text-white text-sm font-medium border-none outline-none bg-blue-500  hover:bg-blue-700  active:bg-green-600">
                                    <span><?php echo $collection["status"] ?></span>
                                </button>
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


    <!-- <script>
        let update_status_container = document.getElementById("update_status_container");
        let updateBtn = document.querySelectorAll(".update_status");
        let close1 = document.getElementById("close1");

        // updateBtn.addEventListener("click", (e) => {
        //         e.preventDefault();

        //         update_status_container.classList.remove("hidden");
        //         update_status_container.classList.add("flex");

        //     });

        updateBtn.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();

                update_status_container.classList.remove("hidden");
                update_status_container.classList.add("flex");

            });

        });
        close1.addEventListener("click", () => {

            update_status_container.classList.remove("flex");
            update_status_container.classList.add("hidden");

        });
    </script> -->
</body>

</html>