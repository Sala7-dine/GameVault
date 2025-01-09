<?php
require_once "../config/database.php";
require_once "../classes/User.php";
include_once "../classes/Game.php";
include_once "../classes/Library.php";
include_once "../classes/Chat.php";




$user = new users();

$game = new Game();

$library = new Library();

$chat = new Chat();


$user_id = $_SESSION["user_id"] ?? "";
$currentUser =  $user->getUser($user_id);



if (isset($_GET['game_id'])) {
  $game_id = $_GET['game_id'];
  $currentGame = $game->getGame($game_id);
}

if (isset($_POST['add_to_library'])) {

  if (empty($_SESSION["user_id"])) {
    header("location:login.php");
  } else {
    $jeu_id = $_POST['add_to_library'];
    $add_to_library = $library->addToBiblio($user_id, $jeu_id);
    if ($add_to_library) {

      echo "<script>alert('Game added to your library list');</script>";
      // header("location:library.php");


    } else {
      echo  "<script>alert('Game already added to your library.');</script>";
      // header("location:library.php");


    }
  }
}

if (isset($_POST['submit_chat'])) {
  if (empty($_SESSION["user_id"])) {
    header("location:login.php");
  } else {
    $content = $_POST['chat_content'];
    $jeu_id = $_POST['submit_chat'];
    $chat->add_comment_to_chat($user_id, $jeu_id, $content);
  }
}
$my_chat = $chat->display_my_chat($user_id, $game_id);
$others_chat = $chat->display_others_chat($user_id, $game_id);



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
  <?php include "../template/header.php"; ?>

  <!-- Decorative Background -->
  <div class="fixed inset-0 z-0 opacity-50">
    <div class="absolute inset-0 bg-gradient-to-br from-orange-100 via-white to-blue-100"></div>
    <div class="absolute top-0 left-0 w-full h-full bg-[url('https://readymadeui.com/bg-effect.svg')] bg-no-repeat bg-cover opacity-30"></div>
  </div>

  <!-- Main Content -->
  <div class="relative z-10 container mx-auto px-24 py-8">
    <!-- Game Hero Section -->
    <div class="game-card rounded-2xl overflow-hidden shadow-sm mb-12">
      <div class="grid lg:grid-cols-2 gap-8 p-8">
        <!-- Main Image -->
        <div class="relative group">
          <img src="<?php echo $currentGame['image']; ?>" alt="Game Main Image" class="w-full h-[500px] object-cover rounded-xl" />
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
            <h1 class="text-5xl font-bold text-gray-800 mb-4"><?php echo $currentGame['title']; ?></h1>
            <div class="flex items-center space-x-4 mb-6">
              <span class="px-4 py-1.5 bg-gradient-to-r from-yellow-400 to-orange-400 text-white font-semibold text-sm rounded-full"><?php echo $currentGame['version']; ?></span>
              <span class="text-gray-600 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <?php echo $currentGame['created_at']; ?>
              </span>
            </div>
          </div>

          <p class="text-gray-600 text-lg leading-relaxed"><?php echo $currentGame['description']; ?></p>

          <div class="flex flex-wrap gap-4 mt-4">
            <form action="" method="post">
              <button name="add_to_library" value="<?php echo $currentGame['jeu_id']; ?>" class="px-8 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl hover:from-orange-600 hover:to-orange-700 transition-all flex items-center">
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
          <img src="/api/placeholder/400/250" alt="Screenshot 1" class="w-full h-64 object-cover" />
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
            <p class="text-white p-4">Explore vast landscapes</p>
          </div>
        </div>
        <div class="relative overflow-hidden rounded-xl group">
          <img src="/api/placeholder/400/250" alt="Screenshot 2" class="w-full h-64 object-cover" />
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
            <p class="text-white p-4">Epic boss battles</p>
          </div>
        </div>
        <div class="relative overflow-hidden rounded-xl group">
          <img src="/api/placeholder/400/250" alt="Screenshot 3" class="w-full h-64 object-cover" />
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
                  <img src="/api/placeholder/48/48" alt="User Avatar" class="w-12 h-12 rounded-full ring-2 ring-orange-500" />
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
          <?php foreach ($others_chat as $chat) { ?>

            <div class="chat-message flex space-x-3">
              <img src="data:image/jpeg;base64,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" alt="User" class="w-10 h-10 rounded-full ring-1 ring-gray-200" />
              <div class="bg-gray-100 rounded-2xl p-4 max-w-[80%]">
                <p class="text-sm font-semibold text-gray-800"><?php echo $chat['username']; ?></p>
                <p class="text-gray-600"><?php echo $chat['content']; ?></p>
              </div>
            </div>
          <?php } ?>


          <!-- Another Message -->
          <?php foreach ($my_chat as $chat) { ?>
            <div class="chat-message flex space-x-3 justify-end">
              <div class="bg-orange-100 rounded-2xl p-4 max-w-[80%]">
                <p class="text-sm font-semibold text-gray-800">You</p>

                <p class="text-gray-600"><?php echo $chat['content']; ?></p>


              </div>
              <img src="data:image/jpeg;base64,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" alt="You" class="w-10 h-10 rounded-full ring-1 ring-orange-500" />
            </div>
          <?php } ?>
        </div>

        <!-- Chat Input -->
        <div class="p-6 border-t">
          <form action="" method="post">

            <div class="flex space-x-2">
              <input name="chat_content" type="text" placeholder="Type your message..."
                class="flex-1 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all" />
              <button name="submit_chat" value="<?php echo $currentGame['jeu_id']; ?>" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl hover:from-orange-600 hover:to-orange-700 transition-all flex items-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0" />
                </svg>
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  <?php include "../template/footer.php"; ?>

</body>

</html>