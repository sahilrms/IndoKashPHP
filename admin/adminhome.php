<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    // User is not logged in, redirect to index.php
    echo 'User not logged in';
    header("Location: ./index.php");
    exit;
}
function listItem($item)
{
    echo "<li class=\"flex\">
    <span class=\"inline-flex justify-center items-center ml-4\">
    <svg class=\"w-5 h-5\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"
        xmlns=\"http://www.w3.org/2000/svg\">
        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\"
            d=\"M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4\">
        </path>
    </svg>
</span>
 <a href=\"?page=$item\"
     class=\"relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6\">

     <span class=\"ml-2 text-md tracking-wide truncate\">$item</span>
 </a>
</li>";
}

// Check if the logout parameter is set
if (isset($_GET['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: ./index.php");
    exit;
}

?>
<html>

<head>
    <?php include ("../head.php"); ?>
</head>

<body>
    <div x-data="setup()" :class="{ 'dark': isDark }">
        <div
            class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

            <!-- Header -->
            <div class="fixed w-full flex items-center  h-14 text-white z-10">
                <div
                    class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-blue-800 dark:bg-gray-800 border-none">
                    <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden"
                        src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
                    <span class="hidden md:block">ADMIN</span>
                </div>

                <div class="w-full flex justify-between items-center h-14 bg-blue-800 ">

                    <ul class="ml-auto flex items-center">
                        <li>
                            <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
                        </li>

                        <li>
                            <a href="?logout=true" class="flex items-center mr-4 hover:text-blue-100">
                                <span class="inline-flex mr-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                </span>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./Header -->

            <!-- Sidebar -->
            <div
                class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
                <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                    <ul class="flex flex-col py-4 space-y-1">
                        <li class="px-5 hidden md:block">
                            <div class="flex flex-row items-center h-8">
                                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                            </div>
                        </li>


                        <!-- item start -->
                        <li class="flex">
                        <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                        </path>
                                    </svg>
                                </span>
                            <a href="?page=addaboutus"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">

                                <span class="ml-2 text-md tracking-wide truncate">Add About US</span>
                            </a>
                        </li>
                        <!-- item end  -->

                        <?php listItem('Quality Control') ?>
                        <?php listItem('Add Services') ?>
                        <?php listItem('Our Management') ?>
                        <?php listItem('Our Projects') ?>
                        <?php listItem('Gallery') ?>
                        <?php listItem('Shop') ?>

                        <li class="px-5 hidden md:block">
                            <div class="flex flex-row items-center mt-5 h-8">
                                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Settings</div>
                            </div>
                        </li>
                        
                        <?php listItem('Change Password') ?>
                    </ul>
                    <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2021</p>
                </div>
            </div>
            <!-- ./Sidebar -->

            <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'addaboutus') {
                    include 'addaboutus.php';
                }
                ?>
                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'Quality Control') {
                    include 'addQualityControl.php';
                }
                ?>
                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'Add Services') {
                    include 'addServices.php';
                }
                ?>
                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'Our Management') {
                    include 'addOurManagement.php';
                }
                ?>
                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'Our Projects') {
                    include 'addOurProjects.php';
                }
                ?>
                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'Gallery') {
                    include 'gallery.php';
                }
                ?>
                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'Shop') {
                    include 'shop.php';
                }
                ?>
                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'Change Password') {
                    include 'changePassword.php';
                }
                ?>



            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }
                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            return {
                loading: true,
                isDark: getTheme(),
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
            }
        }
    </script>
</body>

</html>