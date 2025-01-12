<?php
require_once "../config/database.php";
include_once "../classes/Game.php";
include_once "../classes/Library.php";


$user_id = $_SESSION["user_id"] ?? "";
$collections = new Library();


// if (isset($_POST['change_status'])) {
//     $bib_id = $_POST['bib_id_submit'];
// }


// if (isset($_POST['submit'])) {

//     $bib_id = $_POST['bib_id_submit'];
//     $status =  $_POST["status"];

//     // header("location:library.php?status_updated $status");



//     $change_status = $collections->updateStatus($status, $bib_id);
//     if ($change_status) {
//         header("location:library.php?status updated");
//     } else {
//         header("location:library.php?status updated failed");
//     }
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>


<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
    <div class="flex items-start">

    <?php require_once "../template/sidebar.php" ?>
    <!-- update the game status -->

    <div id="update_status_container" class="fixed inset-0 p-4 hidden flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
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

    
    </div>
</div>




    
</body>
</html>