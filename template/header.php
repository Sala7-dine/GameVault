<?php
require_once "../config/database.php";
require_once "../classes/User.php";
include_once "../classes/Favorite.php";

$user = new users();
$user_id = $_SESSION["user_id"] ?? "";
$username =  $user->getUser($user_id);
$favoris = new Favoris();

$counter = $favoris->nb_favoris_element($user_id);

?>

<header class='flex bg-white border-b py-3 sm:px-6 px-4 font-[sans-serif] min-h-[75px] tracking-wide relative z-50'>
  <div class='flex max-w-screen-xl mx-auto w-full'>
    <div class='flex flex-wrap items-center lg:gap-y-2 gap-4 w-full'>
      <a href="../public/index.php" class="max-sm:hidden"><img src="../asset/Game.svg" alt="logo" class='w-36' />
      </a>
      <a href="../public/index.php" class="hidden max-sm:block"><img src="../asset/Game.svg" alt="logo" class='w-32' />
      </a>

      <div id="collapseMenu"
        class='lg:ml-6 max-lg:hidden lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50'>
        <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white w-9 h-9 flex items-center justify-center border'>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 fill-black" viewBox="0 0 320.591 320.591">
            <path
              d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
              data-original="#000000"></path>
            <path
              d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
              data-original="#000000"></path>
          </svg>
        </button>

        <ul
          class='lg:flex lg:gap-x-3 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
          <li class='mb-6 hidden max-lg:block'>
            <div class="flex items-center justify-between gap-4">
              <a href="login.php"><img src="../asset/Game.svg" alt="logo" class='w-36' />
                <button
                  class='px-4 py-2 text-sm rounded-full text-white bg-orange-500 hover:bg-orange-600'>Sign
                  In</button>
            </div>
            </a>
          </li>
        </ul>
      </div>

      <div class="flex items-center gap-x-6 gap-y-4 ml-auto">
        <div
          class='flex bg-gray-50 border focus-within:bg-transparent focus-within:border-gray-400 rounded-full px-4 py-2.5 overflow-hidden max-w-52 max-lg:hidden'>
          <input type='text' placeholder='Search something...' class='w-full text-sm bg-transparent outline-none pr-2' />
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px"
            class="cursor-pointer fill-gray-600">
            <path
              d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
            </path>
          </svg>
        </div>

        <div class='flex items-center sm:space-x-8 space-x-6'>
          <?php
          if (empty($_SESSION["user_id"])) {
          ?>
            <a href="../public/login.php">
            <?php

          } else {   ?>
              <a href="../public/favoris.php">
              <?php
            }
              ?>

              <div class="flex flex-col items-center justify-center gap-0.5 cursor-pointer">
                <div class="relative">
                  <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer fill-[#333] inline w-5 h-5"
                    viewBox="0 0 64 64">
                    <path
                      d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"
                      data-original="#000000" />
                  </svg>
                  <span class="absolute left-auto -ml-1 top-0 rounded-full bg-red-500 px-1 py-0 text-xs text-white"><?php echo $counter ?></span>
                </div>
                <span class="text-[13px] font-semibold text-[#333]">Favoris</span>
              </div>

              </a>


              <?php
              if (empty($_SESSION["user_id"])) {

              ?>
                <a href="login.php">
                  <button
                    class='max-lg:hidden px-4 py-2 text-sm rounded-full text-white bg-orange-500 hover:bg-orange-600'>Sign
                    In</button>
                </a>

              <?php } else {

              ?>

                <div class="flex items-center justify-end gap-6 ml-auto">
                  <div class="w-1 h-10 border-l border-gray-400">
                  </div>
                  <div class="dropdown-menu relative flex shrink-0 group">
                    <div class="flex items-center gap-4">
                      <p class="text-gray-500 text-sm">Hi, <?= $username["username"] ?></p>
                      <img src="https://readymadeui.com/team-1.webp" alt="profile-pic"
                        class="w-[38px] h-[38px] rounded-full border-2 border-gray-300 cursor-pointer" />
                    </div>

                    <div
                      class="dropdown-content hidden group-hover:block shadow-md p-2 bg-white rounded-md absolute top-[38px] right-0 w-56">
                      <div class="w-full space-y-2">
                        <a href="../public/detailePage.php"
                          class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-[#ffece1] dropdown-item transition duration-300 ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-4 fill-current"
                            viewBox="0 0 512 512">
                            <path
                              d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
                              data-original="#000000"></path>
                          </svg>
                          Account</a>
                        <hr class="my-2 -mx-2" />

                        <a href="../public/admin.php"
                          class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-[#ffece1] dropdown-item transition duration-300 ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="w-[18px] h-[18px] mr-4 fill-current" viewBox="0 0 24 24">
                            <path
                              d="M19.56 23.253H4.44a4.051 4.051 0 0 1-4.05-4.05v-9.115c0-1.317.648-2.56 1.728-3.315l7.56-5.292a4.062 4.062 0 0 1 4.644 0l7.56 5.292a4.056 4.056 0 0 1 1.728 3.315v9.115a4.051 4.051 0 0 1-4.05 4.05zM12 2.366a2.45 2.45 0 0 0-1.393.443l-7.56 5.292a2.433 2.433 0 0 0-1.037 1.987v9.115c0 1.34 1.09 2.43 2.43 2.43h15.12c1.34 0 2.43-1.09 2.43-2.43v-9.115c0-.788-.389-1.533-1.037-1.987l-7.56-5.292A2.438 2.438 0 0 0 12 2.377z"
                              data-original="#000000"></path>
                            <path
                              d="M16.32 23.253H7.68a.816.816 0 0 1-.81-.81v-5.4c0-2.83 2.3-5.13 5.13-5.13s5.13 2.3 5.13 5.13v5.4c0 .443-.367.81-.81.81zm-7.83-1.62h7.02v-4.59c0-1.933-1.577-3.51-3.51-3.51s-3.51 1.577-3.51 3.51z"
                              data-original="#000000"></path>
                          </svg>
                          Dashboard</a>
                        <a href="../public/library.php"
                          class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-[#ffece1] dropdown-item transition duration-300 ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-4 fill-current" viewBox="0 0 24 24">
                            <path d="M4 3h13c.55 0 1 .45 1 1v2c0 .55-.45 1-1 1H4c-.55 0-1-.45-1-1V4c0-.55.45-1 1-1zm0 6h15c.55 0 1 .45 1 1v2c0 .55-.45 1-1 1H4c-.55 0-1-.45-1-1v-2c0-.55.45-1 1-1zm0 6h17c.55 0 1 .45 1 1v2c0 .55-.45 1-1 1H4c-.55 0-1-.45-1-1v-2c0-.55.45-1 1-1z" />
                          </svg>

                          Library</a>
                        <a href="../public/history.php"
                          class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-[#ffece1] dropdown-item transition duration-300 ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-4 fill-current"
                            viewBox="0 0 510 510">
                            <g fill-opacity=".9">
                              <path
                                d="M255 0C114.75 0 0 114.75 0 255s114.75 255 255 255 255-114.75 255-255S395.25 0 255 0zm0 459c-112.2 0-204-91.8-204-204S142.8 51 255 51s204 91.8 204 204-91.8 204-204 204z"
                                data-original="#000000" />
                              <path d="M267.75 127.5H229.5v153l132.6 81.6 20.4-33.15-114.75-68.85z"
                                data-original="#000000" />
                            </g>
                          </svg>
                          History</a>
                        <a href="logout.php"
                          class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-[#ffece1] dropdown-item transition duration-300 ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-4 fill-current"
                            viewBox="0 0 6 6">
                            <path
                              d="M3.172.53a.265.266 0 0 0-.262.268v2.127a.265.266 0 0 0 .53 0V.798A.265.266 0 0 0 3.172.53zm1.544.532a.265.266 0 0 0-.026 0 .265.266 0 0 0-.147.47c.459.391.749.973.749 1.626 0 1.18-.944 2.131-2.116 2.131A2.12 2.12 0 0 1 1.06 3.16c0-.65.286-1.228.74-1.62a.265.266 0 1 0-.344-.404A2.667 2.667 0 0 0 .53 3.158a2.66 2.66 0 0 0 2.647 2.663 2.657 2.657 0 0 0 2.645-2.663c0-.812-.363-1.542-.936-2.03a.265.266 0 0 0-.17-.066z"
                              data-original="#000000" />
                          </svg>
                          Logout</a>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>


              <button id="toggleOpen" class='lg:hidden'>
                <svg class="w-7 h-7" fill="#333" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                </svg>
              </button>
        </div>
      </div>
    </div>
  </div>
</header>