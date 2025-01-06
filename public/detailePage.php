<?php
require_once "../config/database.php";
require_once "../classes/User.php";

$user = new users();
$user_id = $_SESSION["user_id"] ?? "";
$currentUser =  $user->getUser($user_id);

if (isset($_POST['submit_edited_info'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($user->edit_profile_info($user_id, $username, $email, $password, $confirm_password)) {

        
        header("location:detailePage.php");

    } else {
        echo "<script>alert('Invalid changes! Please Try again!!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body class="bg-gradient-to-br from-orange-50 via-gray-100 to-gray-200">

    <?php include "../template/header.php"; ?>

    <section class="flex justify-center items-center bg-gray-100 p-4">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6 space-y-6">
            <h1 class="text-2xl font-semibold text-gray-700">Edit Profile</h1>
            <form class="space-y-4" method="POST">
                <!-- Profile Picture -->
                <div class="flex items-center gap-6">
                    <div class="relative">
                        <img src="https://readymadeui.com/team-1.webp" alt="Profile" class="w-20 h-20 rounded-full border-2 border-gray-300">
                        <label for="profile-pic" class="absolute bottom-0 right-0 bg-orange-500 text-white rounded-full p-1 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7" />
                            </svg>
                        </label>
                        <input type="file" id="profile-pic" class="hidden">
                    </div>
                    <p class="text-sm text-gray-600">Click to upload a new profile picture.</p>
                </div>

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-600">Username</label>
                    <div class="relative">
                        <input type="text" id="name" name="username" value="<?= $currentUser["username"]; ?>"
                            class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2.5 text-gray-700 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        <i class="absolute left-3 top-2.5 text-xl abs fa fa-user-circle text-gray-400"></i>
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" value="<?= $currentUser["email"]; ?>"
                            class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2.5 text-gray-700 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        <i class="absolute left-3 top-2.5 text-xl material-icons text-gray-400">email</i>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="••••••••"
                            class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2.5 text-gray-700 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        <i class="absolute left-3 top-2.5 text-xl material-icons text-gray-400">keyboard</i>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                    <div class="relative">
                        <input type="password" name="confirm_password" id="confirmpassword" placeholder="••••••••"
                            class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2.5 text-gray-700 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        <i class="absolute left-3 top-2.5 text-xl material-icons text-gray-400">keyboard</i>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="flex justify-end">
                    <button type="submit" name="submit_edited_info" class="px-6 py-3 text-white bg-orange-500 rounded-lg hover:bg-orange-600 transition duration-300">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </section>



</body>

</html>