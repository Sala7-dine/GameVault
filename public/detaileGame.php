<?php
require_once "../config/database.php";
require_once "../classes/User.php";
include_once "../classes/Game.php";



$user = new users();

$game = new Game();


$user_id = $_SESSION["user_id"] ?? "";
$currentUser =  $user->getUser($user_id);



if(isset($_GET['game_id'])){

   $game_id=$_GET['game_id'];
   $currentGame=$game->getGame($game_id);
  
}



?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body { 
      font-family: Poppins, sans-serif;
      background: linear-gradient(to bottom, #f8fafc, #f1f5f9);
    }
    .game-card {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.9);
    }
    .screenshot-grid img {
      transition: all 0.3s ease;
    }
    .screenshot-grid img:hover {
      transform: scale(1.02);
    }
    .chat-message {
      animation: slideIn 0.3s ease-out;
    }
    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body class="min-h-screen">


  <?php include_once "../template/header.php"; ?>

  <!-- Decorative Background -->
  <div class="fixed inset-0 z-0 opacity-50">
    <div class="absolute"></div>
    <div class="absolute top-0 left-0 w-full h-full bg-[url('https://readymadeui.com/bg-effect.svg')] bg-no-repeat bg-cover opacity-30"></div>
  </div>

  <!-- Main Content -->
  <div class="relative z-10 container mx-auto px-24 py-8">
    <!-- Game Hero Section -->
    <div class="game-card rounded-2xl overflow-hidden shadow-sm mb-12">
      <div class="grid lg:grid-cols-2 gap-8 p-8">
        <!-- Main Image -->
        <div class="relative group">
          <img src="<?php echo $currentGame['image'];?>" alt="Game Main Image" class="w-full h-[500px] object-cover rounded-xl"/>
          <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-xl"></div>
          <button class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm p-3 rounded-full hover:bg-white/40 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
          </button>
        </div>
        
        <!-- Game Info -->
        <div class="space-y-6 flex flex-col justify-center">
          <div>
            <h1 class="text-5xl font-bold text-gray-800 mb-4"><?php echo $currentGame['title'];?></h1>
            <div class="flex items-center space-x-4 mb-6">
              <span class="px-4 py-1.5 bg-gradient-to-r from-yellow-400 to-orange-400 text-white font-semibold text-sm rounded-full"><?php echo $currentGame['version'];?></span>
              <span class="text-gray-600 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <?php echo $currentGame['created_at'];?>
              </span>
            </div>
          </div>
          
          <p class="text-gray-600 text-lg leading-relaxed"><?php echo $currentGame['description'];?></p>
          
          <div class="flex flex-wrap gap-4 mt-4">

            <form action="library.php" method="POST">

              <input type="hidden" name="user_id" value="<?= $currentUser['user_id'] ?>">
              <input type="hidden" name="jeu_id" value="<?= $_GET['game_id'] ?>">

              <button type="submit" name="submit" class="px-8 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl hover:from-orange-600 hover:to-orange-700 transition-all flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add to Library
              </button>



            </form>
            

            <button class="px-8 py-4 bg-white border-2 border-orange-500 text-orange-500 rounded-xl hover:bg-orange-50 transition-all flex items-center">
              <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
              </svg>
              Download Demo
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Screenshots Grid -->
    <div class="game-card rounded-2xl p-8 mb-12 shadow-sm">
      <h2 class="text-3xl font-bold mb-8 text-gray-800">Screenshots</h2>
      <div class="screenshot-grid grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="relative overflow-hidden rounded-xl group">
          <img src="/api/placeholder/400/250" alt="Screenshot 1" class="w-full h-64 object-cover"/>
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
            <p class="text-white p-4">Explore vast landscapes</p>
          </div>
        </div>
        <div class="relative overflow-hidden rounded-xl group">
          <img src="/api/placeholder/400/250" alt="Screenshot 2" class="w-full h-64 object-cover"/>
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
            <p class="text-white p-4">Epic boss battles</p>
          </div>
        </div>
        <div class="relative overflow-hidden rounded-xl group">
          <img src="/api/placeholder/400/250" alt="Screenshot 3" class="w-full h-64 object-cover"/>
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
            <p class="text-white p-4">Stunning visuals</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Reviews and Chat Section -->
    <div class="grid lg:grid-cols-3 gap-8">
      <!-- Reviews Section -->
      <div class="lg:col-span-2 space-y-6">
        <div class="game-card rounded-2xl p-8 shadow-sm">
          <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Reviews</h2>
            <div class="flex items-center space-x-2">
              <span class="text-4xl font-bold text-orange-500">4.8</span>
              <div class="text-yellow-400 text-2xl">★★★★★</div>
            </div>
          </div>
          
          <!-- Review Card -->
          <div class="space-y-6">
            <div class="border-b border-gray-200 pb-6">
              <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-4">
                  <img src="/api/placeholder/48/48" alt="User Avatar" class="w-12 h-12 rounded-full ring-2 ring-orange-500"/>
                  <div>
                    <h3 class="font-semibold text-lg">John Doe</h3>
                    <div class="flex text-yellow-400">★★★★★</div>
                  </div>
                </div>
                <span class="text-gray-500 text-sm">2 days ago</span>
              </div>
              <p class="text-gray-600">Absolutely stunning game! The attention to detail in the world design is remarkable. Combat feels fluid and responsive, and the story had me hooked from the start.</p>
            </div>
          </div>

          <!-- Add Review Form -->
          <div class="mt-8">
            <h3 class="font-semibold text-xl mb-4">Write a Review</h3>
            <div class="flex text-3xl text-gray-300 space-x-2 mb-4 cursor-pointer">
              <span class="hover:text-yellow-400 transition-colors">★</span>
              <span class="hover:text-yellow-400 transition-colors">★</span>
              <span class="hover:text-yellow-400 transition-colors">★</span>
              <span class="hover:text-yellow-400 transition-colors">★</span>
              <span class="hover:text-yellow-400 transition-colors">★</span>
            </div>
            <textarea class="w-full p-4 border rounded-xl resize-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all" rows="4" placeholder="Share your thoughts about this game..."></textarea>
            <button class="mt-4 px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl hover:from-orange-600 hover:to-orange-700 transition-all">
              Submit Review
            </button>
          </div>
        </div>
      </div>

      <!-- Chat Section -->
      <div class="game-card rounded-2xl shadow-sm flex flex-col h-[800px]">
        <div class="p-6 border-b">
          <h2 class="font-bold text-xl flex items-center">
            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            Game Chat
          </h2>
        </div>
        
        <!-- Chat Messages -->
        <div class="flex-1 overflow-y-auto p-6 space-y-4">
          <!-- Message -->
          <div class="chat-message flex space-x-3">
            <img src="/api/placeholder/40/40" alt="User" class="w-10 h-10 rounded-full ring-1 ring-gray-200"/>
            <div class="bg-gray-100 rounded-2xl p-4 max-w-[80%]">
              <p class="text-sm font-semibold text-gray-800">User123</p>
              <p class="text-gray-600">Anyone want to team up for the boss fight?</p>
            </div>
          </div>
          
          <!-- Another Message -->
          <div class="chat-message flex space-x-3 justify-end">
            <div class="bg-orange-100 rounded-2xl p-4 max-w-[80%]">
              <p class="text-sm font-semibold text-gray-800">You</p>
              <p class="text-gray-600">I'm in! What server are you on?</p>
            </div>
            <img src="/api/placeholder/40/40" alt="You" class="w-10 h-10 rounded-full ring-1 ring-orange-500"/>
          </div>
        </div>

        <!-- Chat Input -->
        <div class="p-6 border-t">
          <div class="flex space-x-2">
            <input type="text" placeholder="Type your message..." 
              class="flex-1 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all"
            />
            <button class="px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl hover:from-orange-600 hover:to-orange-700 transition-all flex items-center">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include_once "../template/footer.php"; ?>
</body>
</html>