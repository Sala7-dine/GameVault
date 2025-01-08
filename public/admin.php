<?php

require_once "../config/database.php";
include_once "../classes/User.php";
include_once "../classes/Game.php";

if(!empty($_SESSION["user_id"])){
  $id = $_SESSION["user_id"];
}else{
  header("Location:login.php");
}

$user = new users();
$game = new Game();

$games = $game->getGames();

$res = $user->getUser($_SESSION["user_id"]);

if($res["role"] === "user"){
    header("Location:index.php");
}
  
$users = $user->getUsers();

  if(isset($_POST["role"])){

    $userId = intval($_POST['user_id']);
    $role = $_POST['role'];
    
    $result = $user->UpdateRole($userId , $role);

    if($result){
      header("Location:admin.php");
    }else{
      echo $result;
    }

  }

  if(isset($_POST["delete"])){

    $id = $_POST["user_id"];
    
    $result = $user->deleteUser($id);

    if($result){
      header("Location:admin.php");
    }else{
      echo $result;
    }

  }

  if(isset($_POST["status"])){

    $status = $_POST["status"];
    $id = $_POST["user_id"];

    if($status == "on"){

      $suspended = "suspended";
      $user->Bannes($id , $suspended);  
      header("Location:admin.php");

    }elseif($status == "off"){

      $active = "active";
      $user->Bannes($id , $active);  
      header("Location:admin.php");

    }
  
  }

  if(isset($_POST["submit"])){

    $titre =  $_POST["titre"] ;
    $description =  $_POST["description"];
    $type = $_POST["type"];
    $version = $_POST["version"];
    $image = $_POST["image"];

    $resultGame = $game->createGame($titre , $image , $type , $version , $description);

    header("Location: " . $_SERVER['PHP_SELF']);

  }


  if(isset($_POST["deleteBtn"])){

    $jeu_id = $_POST["jeu_id"]; 
    $game->deleteGame($jeu_id);
    header("Location: " . $_SERVER['PHP_SELF']);

  }




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
      
    <?php include "../template/sidebar.php"; ?>
  
      <section class="main-content w-full px-8">

       <?php include "../template/dashboardHeader.php"; ?>

        <!--------------------------------------------------- DASHBOARD ---------------------------------------------------------------->

        <section id="dashboard" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6">

              <!-- Card 1 -->
              <div class="bg-white rounded-lg shadow p-6">
                  <div class="flex items-center">
                      <div class="p-3 bg-gray-1000 rounded-full text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 9.75h.008v.008H9.75v-.008zM14.25 9.75h.008v.008h-.008v-.008zM9.75 14.25h.008v.008H9.75v-.008zM14.25 14.25h.008v.008h-.008v-.008z" />
                          </svg>
                      </div>
                      <div class="ml-4">
                          <h4 class="text-lg font-semibold text-gray-700">Total Users</h4>
                          <p class="text-2xl font-bold text-gray-900">1,245</p>
                      </div>
                  </div>
              </div>

              <!-- Card 2 -->
              <div class="bg-white rounded-lg shadow p-6">
                  <div class="flex items-center">
                      <div class="p-3 bg-green-500 rounded-full text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a4 4 0 10-8 0v2a4 4 0 01-8 0v2a4 4 0 008 0v6" />
                          </svg>
                      </div>
                      <div class="ml-4">
                          <h4 class="text-lg font-semibold text-gray-700">Revenue</h4>
                          <p class="text-2xl font-bold text-gray-900">$54,000</p>
                      </div>
                  </div>
              </div>

              <!-- Card 3 -->
              <div class="bg-white rounded-lg shadow p-6">
                  <div class="flex items-center">
                      <div class="p-3 bg-yellow-500 rounded-full text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                          </svg>
                      </div>
                      <div class="ml-4">
                          <h4 class="text-lg font-semibold text-gray-700">Growth</h4>
                          <p class="text-2xl font-bold text-gray-900">+15%</p>
                      </div>
                  </div>
              </div>

              <!-- Card 4 -->
              <div class="bg-white rounded-lg shadow p-6">
                  <div class="flex items-center">
                      <div class="p-3 bg-red-500 rounded-full text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.5 0-4 2-4 2s1.5 2 4 2 4-2 4-2-1.5-2-4-2z" />
                          </svg>
                      </div>
                      <div class="ml-4">
                          <h4 class="text-lg font-semibold text-gray-700">Bounce Rate</h4>
                          <p class="text-2xl font-bold text-gray-900">32%</p>
                      </div>
                  </div>
              </div>

          </section>

          <!------------------------------------------------ GESTION DES JEUX ------------------------------------------------------------->

          <section id="Game" class="flex flex-col items-center bg-gray-50 min-h-screen p-6 hidden">

              <!-- <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full pb-6 max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto">
               
                <div class="min-h-[300px]">
                  <img src="https://readymadeui.com/cardImg.webp" class="w-full" />
                </div>

                <div class="px-6">
                  <div class="flex justify-between mb-4">
                    <h2 class="text-md text-balck font-bold leading-relaxed hover:underline cursor-pointer ">Valorant</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" class="cursor-pointer fill-orange-600 shrink-0"
                    viewBox="0 0 64 64">
                    <path
                      d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"
                      data-original="#000000"></path>
                  </svg>
                  </div>
                  <p class="text-sm text-gray-600 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor. Lorem ipsum
                    dolor sit amet, consectetur adipiscing elit. Sed auctor.</p>

                  <div class="mt-8 flex items-center flex-wrap gap-4">
                    <h3 class="text-xl text-gray-800 font-bold flex-1">$12.90</h3>
                    <button type="button"
                      class="px-5 py-2.5 rounded-lg text-white text-sm tracking-wider bg-orange-600 hover:bg-orange-700 outline-none">Order
                      now</button>
                  </div>
                </div>
              </div> -->

              <!-- <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full pb-6 max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto">
               
                <div class="min-h-[300px]">
                  <img src="https://readymadeui.com/cardImg.webp" class="w-full" />
                </div>

                <div class="px-6">
                  <div class="flex justify-between mb-4">
                    <h2 class="text-md text-balck font-bold leading-relaxed hover:underline cursor-pointer ">Valorant</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" class="cursor-pointer fill-orange-600 shrink-0"
                    viewBox="0 0 64 64">
                    <path
                      d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"
                      data-original="#000000"></path>
                  </svg>
                  </div>
                  <p class="text-sm text-gray-600 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor. Lorem ipsum
                    dolor sit amet, consectetur adipiscing elit. Sed auctor.</p>

                    <form method="GET">
                    <a href="update.php?updateId='.$article["id_article"].'" class="mt-4 inline-block px-4 py-2 rounded tracking-wider bg-green-500 hover:bg-green-600 text-white text-[13px]" >Update</a>
                    <a href="dashboard.php?deleteid='.$article["id_article"].'" class="mt-4 inline-block px-4 py-2 rounded tracking-wider bg-red-500 hover:bg-red-600 text-white text-[13px]">Delete</a>
                  </form>
                </div>
              </div> -->
            
              <div class="artcile w-full">

                  <div class="flex justify-between py-10 px-1">

                    <h1 class="text-gray-500 text-xl font-bold">All Games</h1>

                    <div class="flex gap-4"> 

                    <div class="relative font-[sans-serif] w-max">
                        <button type="button" id="dropdownToggle"
                          class="px-5 py-2.5 rounded text-white text-sm font-semibold border-none outline-none bg-orange-600 hover:bg-orange-700 active:bg-orange-600">
                          Filter by Title
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-white inline ml-3" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                              d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                              clip-rule="evenodd" data-original="#000000" />
                          </svg>
                        </button>
                  
                        <ul id="dropdownMenu" class='absolute hidden shadow-lg bg-white py-2 z-[1000] min-w-full w-max rounded max-h-96 overflow-auto'>
                          <li class='py-2.5 px-5 hover:bg-orange-50 text-white text-sm cursor-pointer'>Facile</li>
                          <li class='py-2.5 px-5 hover:bg-orange-50 text-white text-sm cursor-pointer'>Moyenne</li>
                          <li class='py-2.5 px-5 hover:bg-orange-50 text-white text-sm cursor-pointer'>Difficile</li>
                        </ul>
                      </div>
                    <div class="relative font-[sans-serif] w-max">
                        <button type="button" id="dropdownToggle"
                          class="px-5 py-2.5 rounded text-white text-sm font-semibold border-none outline-none bg-orange-600 hover:bg-orange-700 active:bg-orange-600">
                          Filter by Date
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-white inline ml-3" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                              d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                              clip-rule="evenodd" data-original="#000000" />
                          </svg>
                        </button>
                  
                      </div>


                      <div class="font-[sans-serif] w-max">
                        <button type="button" id="ajoutBtn"
                          class="flex justify-center items-center gap-2 px-5 py-2.5 rounded text-white text-sm font-medium border-none outline-none bg-green-600 hover:bg-green-700 active:bg-green-600">
                          <span>Ajouter Jeu</span>  
                          <i class="fa fa-plus" style="font-size:16px"></i>
                        </button>
                      </div>

                    </div>

                    <!-- Modal Ajouter Jeu -->

                    <div id="ajoutModalArticle" class="fixed inset-0 p-4 hidden flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                    <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8 relative">
                        <div class="flex items-center">
                            <h3 class="text-orange-600 text-3xl font-bold flex-1 text-center w-full">Ajouter Game</h3>

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

                        <form class="space-y-4 mt-8" action="admin.php" method="post" autocomplete="off">

                            <div>
                                <label class="text-gray-800 text-sm mb-2 block">Titre</label>
                                <input type="text" name="titre" placeholder="Saisir le titre..."
                                    class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-orange-600 focus:bg-transparent rounded-lg" />
                            </div>

                            <div>
                                <label class="text-gray-800 text-sm mb-2 block">Image</label>
                                <input type="text" name="image" placeholder="Saisir L'image..."
                                    class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-orange-600 focus:bg-transparent rounded-lg" />
                            </div>

                            <div>
                                <label class="text-gray-800 text-sm mb-2 block">Type</label>
                                <input type="text" name="type" placeholder="Saisir type..."
                                    class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-orange-600 focus:bg-transparent rounded-lg" />
                            </div>

                            <div>
                                <label class="text-gray-800 text-sm mb-2 block">version</label>
                                <input type="text" name="version" placeholder="Saisir version..."
                                    class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-orange-600 focus:bg-transparent rounded-lg" />
                            </div>

                            <div>
                                <label class="text-gray-800 text-sm mb-2 block">Description</label>
                                <textarea placeholder='Saisir la description...' name="description"
                                    class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-orange-600 focus:bg-transparent rounded-lg" rows="3"></textarea>
                            </div>

                            <div class="flex justify-end gap-4 !mt-8">
                                <button type="button" id="ajouteCancelQuiz"
                                    class="px-6 py-3 rounded-lg text-gray-800 text-sm border-none outline-none tracking-wide bg-gray-200 hover:bg-gray-300">Cancel</button>
                                <button type="submit" id="ajoutQuizBtn" name="submit"
                                    class="px-6 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-orange-600 hover:bg-orange-700">Ajouter</button>
                            </div>


                        </form>
                    </div>
                    </div>


                    


                    <!-- Fin Ajout Article -->


                    

                  </div>

                  <div class="bg-gray-100 md:px-10 px-4 py-12 font-[sans-serif]">
                <div class="max-w-5xl max-lg:max-w-3xl max-sm:max-w-sm mx-auto">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-sm:gap-8">


                    <?php foreach($games as $jeu){ ?>

                      <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full pb-6 max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto">
               
                              <div class="min-h-[240px]">
                                <img src="<?= $jeu["image"]; ?>" class="w-[400px] h-[200px]" />
                              </div>

                              <div class="px-6">
                                <div class="flex justify-between mb-4">
                                  <h2 class="text-md text-balck font-bold leading-relaxed hover:underline cursor-pointer "><?= $jeu["title"]; ?></h2>
                                </div>
                                <p class="text-sm text-gray-600 leading-relaxed"><?= $jeu["description"]; ?></p>
                                


                                <div class="flex gap-2">

                                  <form action="updateJeu.php" method="POST">
                                    <input type="hidden" name="jeu_id" value="<?= $jeu["jeu_id"]; ?>">
                                    <button type="submit" name="updateBtn" class="mt-4 inline-block px-4 py-2 rounded tracking-wider bg-green-500 hover:bg-green-600 text-white text-[13px]">Update</button>
                                  </form>

                                  <form method="POST">
                                    <input type="hidden" name="jeu_id" value="<?= $jeu["jeu_id"]; ?>">
                                    <button type="submit" name="deleteBtn" class="mt-4 inline-block px-4 py-2 rounded tracking-wider bg-red-500 hover:bg-red-600 text-white text-[13px]">Delete</button>
                                  </form>
                                </div>

                              </div>
                        </div>


                    <?php } ?>
                          

                </div>
                </div>
                </div>
                </div>

              
          </section>
          <!--------------------------------------------- GESTION DES UTILISATER ---------------------------------------------------------->

          <section id="user" class="flex flex-col items-center bg-gray-50 min-h-screen p-6 hidden">
            <!-- Header -->
            <div class="w-full max-w-7xl bg-white shadow-lg rounded-lg p-6 space-y-6">
              <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                  Gestion des Utilisateurs
                </h1>
                <div class="flex gap-4">
                  <button class="flex items-center gap-2 px-5 py-2 bg-gray-200 text-gray-600 text-sm font-medium rounded-lg shadow hover:bg-gray-300 transition transform hover:scale-105">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4z" />
                    </svg>
                    Filtrer par Statut
                  </button>
                  <button class="flex items-center gap-2 px-5 py-2 bg-gray-200 text-gray-600 text-sm font-medium rounded-lg shadow hover:bg-gray-300 transition transform hover:scale-105">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6" />
                    </svg>
                    Filtrer par Rôle
                  </button>
                </div>
              </div>

              <!-- Table -->
              <div class="font-[sans-serif] overflow-x-auto">
                <table class="min-w-full bg-white">
                  <thead class="whitespace-nowrap">
                    <tr>
                      <th class="p-4 text-left text-sm font-semibold text-black">
                        user id
                      </th>
                      <th class="p-4 text-left text-sm font-semibold text-black">
                        Name
                      </th>
                      <th class="p-4 text-left text-sm font-semibold text-black">
                        Role
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-400 inline cursor-pointer ml-2"
                          viewBox="0 0 401.998 401.998">
                          <path
                            d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                            data-original="#000000" />
                        </svg>
                      </th>
                      <th class="p-4 text-left text-sm font-semibold text-black">
                        Suspend
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-400 inline cursor-pointer ml-2"
                          viewBox="0 0 401.998 401.998">
                          <path
                            d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                            data-original="#000000" />
                        </svg>
                      </th>
                      <th class="p-4 text-left text-sm font-semibold text-black">
                        Action
                      </th>
                    </tr>
                  </thead>

                  <tbody class="whitespace-nowrap">


                  <?php foreach($users as $User){ ?>  

                    <tr class="odd:bg-gray-100">
                      <td class="p-4 text-md font-bold">
                      <?= $User["user_id"]; ?>
                      </td>
                      <td class="p-4 text-sm">
                        <div class="flex items-center cursor-pointer w-max">
                          <img src='https://readymadeui.com/profile_4.webp' class="w-9 h-9 rounded-full shrink-0" />
                          <div class="ml-4">
                            <p class="text-sm text-black"> <?= $User["username"]; ?> </p>
                            <p class="text-xs text-gray-500 mt-0.5"><?= $User["email"]; ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="p-4 text-sm text-black">

                        <form action="admin.php" method="POST">
                            <input type="hidden" name="user_id" value="<?= $User["user_id"]; ?>">
                            <select name="role" onchange="this.form.submit()" class="mt-1 block w-3/6 p-2 border rounded-md bg-white text-gray-700 focus:ring focus:ring-orange-300">
                                <option value="admin" <?= $User["role"] == "admin" ? "selected" : ""  ?> >Admin</option>
                                <option value="user" <?= $User["role"] == "user" ? "selected" : ""  ?> >User</option>
                            </select>
                        </form>

                      </td>
                      <td class="p-4">

                        <form action="admin.php" method="POST">
                        <input type="hidden" name="user_id" value="<?= $User["user_id"]; ?>">
                        <input type="hidden" name="status" value="off">
                          <label class="relative cursor-pointer">
                            <input type="checkbox" onchange="this.form.submit()" name="status" value="<?= $User["status"] === "active" ? "on" : "off" ?>" class="sr-only peer" <?= $User["status"] === "suspended" ? "checked" : "" ?>  />
                            <div
                              class="w-11 h-6 flex items-center bg-gray-300 rounded-full peer peer-checked:after:translate-x-full after:absolute after:left-[2px] peer-checked:after:border-white after:bg-white after:border after:border-gray-300 after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500">
                            </div>
                          </label>
                        </form>
                       
                      </td>
                      <td class="p-4">
                      
                      <form action="admin.php" method="POST">
                      <input type="hidden" name="user_id" value="<?= $User["user_id"]; ?>">
                        <button type="submit" name="delete"
                            class="px-4 py-2 flex items-center justify-center rounded text-white text-sm tracking-wider font-medium border-none outline-none bg-red-600 hover:bg-red-700 active:bg-red-600">
                            <span class="border-r border-white pr-3">Delete</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="11px" fill="currentColor" class="ml-3 inline" viewBox="0 0 320.591 320.591">
                              <path
                                d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                                data-original="#000000" />
                              <path
                                d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                                data-original="#000000" />
                            </svg>
                          </button>
                      </form>
                     
                      </td>
                    </tr>


                  <?php } ?>  

        

                  </tbody>
                </table>
              </div>
            </div>
          </section>

          <!----------------------------------------------- GESTION DES CONTENU ----------------------------------------------------------->

      </section>
    </div>
  </div>





<script>

  let dashboardBtn = document.getElementById("dashboardBtn");
  let dashboard = document.getElementById("dashboard");
  let user = document.getElementById("user");
  let userBtn = document.getElementById("userBtn");
  let Game = document.getElementById("Game");
  let GameBtn = document.getElementById("GameBtn");


  dashboardBtn.addEventListener("click" , ()=>{

    dashboard.style.display = "flex";
    user.style.display = "none";
    Game.style.display = "none";

  });


  userBtn.addEventListener("click" , ()=>{

    user.style.display = "flex";
    dashboard.style.display = "none";
    Game.style.display = "none";

  });

  GameBtn.addEventListener("click" , ()=>{

    Game.style.display = "flex";
    dashboard.style.display = "none";
    user.style.display = "none";

  });

  userBtn.addEventListener("click" , ()=>{

    user.style.display = "flex";
    dashboard.style.display = "none";
    Game.style.display = "none";

  });

  let artcile = document.querySelector(".artcile");

  let ajoutModalArticle = document.getElementById("ajoutModalArticle");
  let ajoutBtn = document.getElementById("ajoutBtn");
  let clsoe1 = document.getElementById("close1");

  ajoutBtn.addEventListener("click" , ()=>{

    ajoutModalArticle.classList.remove("hidden");
    ajoutModalArticle.classList.add("flex");

  });


  close1.addEventListener("click" , ()=>{

    ajoutModalArticle.classList.remove("flex");
    ajoutModalArticle.classList.add("hidden");

  });




</script> 
  
</body>
</html>