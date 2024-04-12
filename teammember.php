<?php
include "./dbConnection.php"; // Include your database connection file

// Fetch existing items from the database
$items_query = $conn->query("SELECT * FROM management");
$members = $items_query->fetch_all(MYSQLI_ASSOC);
?>
<div class="flex flex-wrap bg-green-300 w-full justify-center p-4 m-auto "
style=" background-image: url(./img/bg-img/bgprofile.jpg);"
 >


    <?php foreach ($members as $item): ?>

       <div
        class="flex h-1/6 mx-4 text-gray-900 bg-gray-100 md:w-6/12 lg:w-2/5 mb-6 px-6 sm:px-6 lg:px-4 border rounded-2xl p-4 shadow-xl ">
            <?php
            // Replace '../' with './' in the image link
            $imageLink = str_replace('../', './', $item['image_link']);
            ?>

            <div class="flex flex-col">
                <!-- Avatar -->
                <a href="#" class="mx-auto">
                    <img width="300"
                        class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                        src="<?php echo $imageLink; ?>">
                </a>

                <!-- Details -->
                <div class="text-center mt-6">
                    <!-- Name -->
                    <h1 class="text-gray-900 text-gray-900 text-3xl font-extrabold mb-1">
                        <?php echo $item['title']; ?>
                    </h1>

                    <!-- Title -->
                    <div class="text-gray-900 text-gray-700 text-lg font-bold">
                        <?php echo $item['designation']; ?>
                    </div>

                    <p class="py-4 text-gray-900 flex justify-start items-start text-gray-700 text-lg font-semibold mb-2 w-full">
                        <?php echo $item['description']; ?>
                    </p>

                </div>
            </div>


        </div>
       
        
    <?php endforeach; ?>

</div>