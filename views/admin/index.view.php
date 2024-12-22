<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/output.css">
    <title>Dashboard</title>
</head>

<body>
    <!-- <h1>admin index</h1> -->
    <!-- tailwind.config.js -->




    <!-- component -->
    <div>
        <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->

        <div class="flex h-screen bg-gray-200">
            <div class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
            <!-- :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" -->
            <div class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center">
                        <a class="mx-2 text-2xl font-semibold text-white" href="/">Rento</a>
                    </div>
                </div>

                <nav class="mt-10">
                    <a class="flex items-center px-6 py-2 mt-4 <?= $partial == 'dashboard' ? " text-gray-100 bg-gray-700 bg-opacity-25 " : " text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 " ?>  " href="?show=dashboard">

                        <span class="mx-3">Dashboard</span> <?php  if($countUserPending>0 || $countResvPending>0){ ?> <span class="rounded-full bg-indigo-500 h-2 w-4 ml-auto"></span> <?php }?>
                    </a>

                    <a class="flex items-center px-6 py-2 mt-4 <?= $partial == 'cars' ? " text-gray-100 bg-gray-700 bg-opacity-25 " : " text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 " ?> "
                        href="?show=cars">

                        <span class="mx-3">Cars</span>
                    </a>

                    <a class="flex items-center px-6 py-2 mt-4 <?= $partial == 'users' ? " text-gray-100 bg-gray-700 bg-opacity-25 " : " text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 " ?> "
                        href="?show=users">

                        <span class="mx-3">Users</span> <?php  if($countUserPending>0){ ?> <span class="rounded-full bg-indigo-500 h-2 w-4 ml-auto"></span> <?php }?>
                    </a>

                    <a class="flex items-center px-6 py-2 mt-4 <?= $partial == 'reservations' ? " text-gray-100 bg-gray-700 bg-opacity-25 " : " text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 " ?> "
                        href="?show=reservations">

                        <span class="mx-3">Reservations</span><?php  if($countResvPending>0){ ?> <span class="rounded-full bg-indigo-500 h-2 w-4 ml-auto"></span> <?php }?>
                    </a>
                    <a class="flex items-center px-6 py-2 mt-4  text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100  "
                    href="/connecter?mtd=logout">

                        <span class="mx-3">Log Out</span>
                    </a>
                </nav>
            </div>
            <div class="flex flex-col flex-1 overflow-hidden">
                <header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-indigo-600">
                    <div class="flex items-center">
                       

                        <div class="relative mx-4 lg:mx-0">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                            </span>

                            <input class="w-32 pl-10 pr-4 rounded-md form-input sm:w-64 focus:border-indigo-600" type="text"
                                placeholder="Search">
                        </div>
                    </div>


                </header>

                <!--  -->
                <?php require("views/admin/partials/{$partial}.php"); ?>
                <!--  -->

            </div>
        </div>
    </div>
    <section id="message-model" class="hidden absolute h-screen w-screen top-0 left-0 z-50 backdrop-blur bg-[#0000006c] ">
        <div class="flex justify-center items-center h-full w-full ">
            <form action="/manage_user" method="POST" class="bg-white rounded-lg py-10 px-10 text-center ">
                <p id="submit_message">
                    
                </p>
                <!-- CSRF -->
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                <input type="hidden" name="selected_id" id="selected_id"  value="-1">
                <input type="hidden" name="_action" id="_action"  value="-1">
                <button type="button" onclick="closeModel(event)" class="px-4 py-1 rounded text-white bg-red-600 ">Cancel</button>
                <button type="submit" name="change_user_status"  class="px-4 py-1 rounded text-white bg-blue-600 ">Submit</button>
            </form>
        </div>
    </section>
</body>
<script src="assets/js/admin.js"></script>

</html>
