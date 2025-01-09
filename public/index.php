<?php

require_once "../config/database.php";
include_once "../classes/User.php";
include_once "../classes/Game.php";
include_once "../classes/Favorite.php";
include_once "../classes/library.php";

$game = new Game();

$games = $game->getGames();

$user = new users();
$user_id = $_SESSION["user_id"] ?? "";
$username =  $user->getUser($user_id);

$favoris = new Favoris();

if (isset($_POST['gameId_btn'])) {
  if (empty($_SESSION["user_id"])){
    header("location:login.php");
  } else{
    $jeu_id = $_POST['gameId_btn'];
  $result = $favoris->add_favoris($user_id, $jeu_id);
  if ($result) {
    echo"<script>alert('Game added to the favorites list');</script>";


  } else {
    echo  "<script>alert(''Game already added to the favorites list.);</script>";

  }

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

    <div class="relative h-[88vh] flex items-center justify-center">
      <div class="px-4 sm:px-10">
        <div class="max-w-4xl mx-auto text-center relative z-10">
          <h1 class="md:text-6xl text-4xl font-extrabold mb-6 md:!leading-[75px]">Build Landing Pages with Typeform
            Integration</h1>
          <p class="text-base">Embark on a gastronomic journey with our curated dishes, delivered promptly to your
            doorstep. Elevate your dining experience today. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          <div class="mt-10">
            <button class='max-lg:hidden px-4 py-3 text-sm rounded-full text-white border-2 border-orange-600 bg-orange-600 hover:bg-[#004bff]'>Get started
              today</button>
          </div>
        </div>


      </div>
      <img src="https://readymadeui.com/bg-effect.svg" class="absolute inset-0 w-full h-full" />
    </div>

    <div class="bg-white font-[sans-serif] p-4">
      <div class="max-w-6xl mx-auto">
        <div class="text-center max-w-xl mx-auto">
          <h2 class="text-3xl font-extrabold text-gray-800 inline-block">LATEST GAMES</h2>
          <p class="text-gray-600 text-sm mt-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
        </div>
        <div  class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-12 max-lg:max-w-3xl max-md:max-w-md mx-auto">

          <?php foreach ($games as $gm) { ?>

            <div class="go_to_detail bg-white rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-0 before:bg-black before:opacity-60">
              
              
              <div class="absolute z-5 top-4 right-4 flex flex-col justify-between">
                <form method="POST">
                  <input type="hidden" name="gameId_btn" value="<?= $gm["jeu_id"] ?>">
                  <!-- heart_img -->
                  <svg class="favoris_counter w-[30px] h-[30px] fill-[#ffffff] relative z-10" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"></path>
                  </svg>

              
                </form>

              </div>


              <img src="<?= $gm["image"] ?>" alt="Blog Post 1" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
              <a href="detaileGame.php?game_id=<?= $gm['jeu_id'] ?>" >

              <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
                <span class="text-sm block mb-2 text-yellow-400 font-semibold"> <?php echo "Created At : " . DATE("Y-m-d", strtotime($gm["created_at"])) ?> </span>
                <h3 class="hover:underline text-xl font-bold text-white"><?= $gm["title"] ?></h3>

                <div class="mt-4">
                  <p class="text-gray-200 text-md "><?= $gm["description"] ?></p>
                  <p class="text-gray-200 text-sm py-2"><?= "Version : " . $gm["version"] ?></p>

                </div>
              </div>
              </a>
            </div>


          <?php } ?>

        </div>
      </div>
    </div>

    <?php include "../template/footer.php"; ?>
  </div>
  <script>
    var toggleOpen = document.getElementById('toggleOpen');
    var toggleClose = document.getElementById('toggleClose');
    var collapseMenu = document.getElementById('collapseMenu');

    function handleClick() {
      if (collapseMenu.style.display === 'block') {
        collapseMenu.style.display = 'none';
      } else {
        collapseMenu.style.display = 'block';
      }
    }

    toggleOpen.addEventListener('click', handleClick);
    toggleClose.addEventListener('click', handleClick);
  </script>

  <script>
    document.querySelectorAll(".favoris_counter").forEach((counter) => {
      counter.addEventListener('click', function() {
        const form = this.closest("form");
        form.submit();
      });
    });

    

//     document.querySelectorAll(".go_to_detail").forEach((card) => {
//   card.addEventListener("click", function () {
//     alert("hh");
//     const gameId = this.querySelector("input[name='gameId_library_btn']").value;
//     window.location.href = `detaileGame.php?game_id=${gameId}`;
//   });
// });


  </script>








</body>

</html>