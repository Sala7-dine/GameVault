<?php
require_once "../config/database.php";
include_once "../classes/Game.php";
include_once "../classes/Favorite.php";


$user_id = $_SESSION["user_id"] ?? "";
$favoris = new Favoris();
$all_favoris = $favoris->getUserFavoris($user_id);

if (isset($_POST['gameDeleteFavoris'])) {

    $favoris_id = $_POST['gameDeleteFavoris'];
    $result = $favoris->deleteFavoris($favoris_id);
    if ($result) {
        header("location:favoris.php?game_deleted");
    } else {
        header("location:favoris.php?game_already_added");
    }
}

?>



<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home page</title>

    <style>
        body {
            font-family: Poppins, sans-serif;
        }
    </style>
</head>

<body class="max-w-[1920px] mx-auto">

    <div class="text-black text-[15px]">

        <?php include "../template/header.php" ?>

        <div class="bg-white font-[sans-serif] p-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center max-w-xl mx-auto">
                    <h2 class="text-3xl font-extrabold text-gray-800 inline-block">Favorite GAMES</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-12 max-lg:max-w-3xl max-md:max-w-md mx-auto">

                    <?php foreach ($all_favoris as $fv) { ?>

                        <div class="bg-white rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60 ">
                            <div class="absolute z-50 top-4 right-4">
                                <form method="POST">
                                    <input type="hidden" name="gameDeleteFavoris" value="<?= $fv["favoris_id"] ?>">

                                    <svg class="delete_btn w-[30px] h-[30px] fill-white" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path>
                                    </svg>

                                </form>
                            </div>


                            <img src="<?= $fv["image"] ?>" alt="Blog Post 1" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
                            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
                                <span class="text-sm block mb-2 text-yellow-400 font-semibold"> <?php echo "Created At : " . DATE("Y-m-d", strtotime($fv["created_at"])) ?> </span>
                                <h3 class="text-xl font-bold text-white"><?= $fv["title"] ?></h3>
                                <div class="mt-4">
                                    <p class="text-gray-200 text-md "><?= $fv["description"] ?></p>
                                    <p class="text-gray-200 text-sm py-2"><?= "Version : " . $fv["version"] ?></p>


                                </div>
                            </div>
                        </div>


                    <?php } ?>

                </div>
            </div>
        </div>




        <?php include "../template/footer.php"; ?>
    </div>

    <script>
        document.querySelectorAll(".delete_btn").forEach((counter) => {
            counter.addEventListener('click', function() {
                const form = this.closest("form");
                form.submit();
            });
        });
    </script>

</body>

</html>