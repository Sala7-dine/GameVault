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
  <header class='flex bg-white border-b py-3 sm:px-6 px-4 font-[sans-serif] min-h-[75px] tracking-wide relative z-50'>
      <div class='flex max-w-screen-xl mx-auto w-full'>
        <div class='flex flex-wrap items-center lg:gap-y-2 gap-4 w-full'>
          <a href="javascript:void(0)" class="max-sm:hidden"><img src="../asset/Game.svg" alt="logo" class='w-36' />
          </a>
          <a href="javascript:void(0)" class="hidden max-sm:block"><img src="../asset/Game.svg" alt="logo" class='w-32' />
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
                  <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-36' />
                  </a>
                  <button
                    class='px-4 py-2 text-sm rounded-full text-white bg-orange-500 hover:bg-orange-600'>Sign
                    In</button>
                </div>
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
              <div class="flex flex-col items-center justify-center gap-0.5 cursor-pointer">
                <div class="relative">
                  <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer fill-[#333] inline w-5 h-5"
                    viewBox="0 0 64 64">
                    <path
                      d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"
                      data-original="#000000" />
                  </svg>
                  <span class="absolute left-auto -ml-1 top-0 rounded-full bg-red-500 px-1 py-0 text-xs text-white">0</span>
                </div>
                <span class="text-[13px] font-semibold text-[#333]">Favoris</span>
              </div>
            

              <button
                class='max-lg:hidden px-4 py-2 text-sm rounded-full text-white bg-orange-500 hover:bg-orange-600'>Sign
                In</button>

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
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">10 FEB 2023 | BY JOHN DOE</span>
              <h3 class="text-xl font-bold text-white">A Guide to Igniting Your Imagination</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/hacks-watch.webp" alt="Blog Post 2" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">7 JUN 2023 | BY MARK ADAIR</span>
              <h3 class="text-xl font-bold text-white">Hacks to Supercharge Your Day</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/prediction.webp" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">5 OCT 2023 | BY SIMON KONECKI</span>
              <h3 class="text-xl font-bold text-white">Trends and Predictions</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/images/food.webp" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">5 OCT 2023 | BY SIMON KONECKI</span>
              <h3 class="text-xl font-bold text-white">Trends and Predictions</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/images/food11.webp" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">5 OCT 2023 | BY SIMON KONECKI</span>
              <h3 class="text-xl font-bold text-white">Trends and Predictions</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
          <div class="bg-white cursor-pointer rounded-lg overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-60">
            <img src="https://readymadeui.com/images/food22.webp" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
              <span class="text-sm block mb-2 text-yellow-400 font-semibold">5 OCT 2023 | BY SIMON KONECKI</span>
              <h3 class="text-xl font-bold text-white">Trends and Predictions</h3>
              <div class="mt-4">
                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-white px-4 sm:px-10 py-12 mt-32">
      <div class="grid max-sm:grid-cols-1 max-lg:grid-cols-2 lg:grid-cols-5 lg:gap-14 max-lg:gap-8">
        <div class="lg:col-span-2">
          <h4 class="text-xl font-semibold mb-6">About Us</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida,
            mi eu pulvinar cursus, sem elit interdum mauris.</p>

          <div class="bg-[#f8f9ff] flex px-4 py-3 rounded-md text-left mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px"
              class="fill-gray-500 mr-3 rotate-90">
              <path
                d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
              </path>
            </svg>
            <input type='email' placeholder='Search...'
              class="w-full outline-none bg-transparent text-gray-600 text-[15px]" />
          </div>
        </div>

        <div>
          <h4 class="text-xl font-semibold mb-6">Services</h4>
          <ul class="space-y-5">
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Web
                Development</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Mobile App
                Development</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">UI/UX
                Design</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Digital Marketing</a></li>
          </ul>
        </div>

        <div>
          <h4 class="text-xl font-semibold mb-6">Resources</h4>
          <ul class="space-y-5">
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Webinars</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Ebooks</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Templates</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Tutorials</a></li>
          </ul>
        </div>

        <div>
          <h4 class="text-xl font-semibold mb-6">About Us</h4>
          <ul class="space-y-5">
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Our Story</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Mission and
                Values</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Team</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Testimonials</a></li>
          </ul>
        </div>
      </div>

      <hr class="my-8" />

      <p class="text-center">
        Copyright © 2024
        <a href="#" target="_blank" class="hover:underline mx-1">Youcode</a>
        All Rights Reserved.
      </p>
    </footer>

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