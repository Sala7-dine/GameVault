<?php 

  require_once "../config/database.php";
  include_once "../classes/User.php";
  include_once "../classes/Game.php";

  $game = new Game();

  $games = $game->getGames();

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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-12 max-lg:max-w-3xl max-md:max-w-md mx-auto">

        <?php foreach($games as $gm) { ?>

          <div class="bg-white rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">

            <div class="absolute z-50 top-4 right-4">

                <svg xmlns="http://www.w3.org/2000/svg" width="30px" class="cursor-pointer fill-white shrink-0"
                  viewBox="0 0 64 64">
                  <path
                    d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"
                    data-original="#000000"></path>
                </svg>
            </div>

            <img src="<?= $gm["image"] ?>" alt="Blog Post 1" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold"> <?php echo "Created At : " . DATE("Y-m-d" , strtotime($gm["created_at"])) ?> </span>
              <h3 class="text-xl font-bold text-white"><?= $gm["title"] ?></h3>
              <div class="mt-4">
                <p class="text-gray-200 text-md "><?= $gm["description"] ?></p>
                <p class="text-gray-200 text-sm py-2"><?=  "Version : " . $gm["version"] ?></p>
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
</body>

</html>