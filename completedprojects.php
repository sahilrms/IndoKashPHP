<div class="px-4 py-8">
    <h3 class="text-white font-bold text-3xl underline my-4">Completed Projects</h3>
    <ul class="flex flex-wrap w-screen justify-around border-white">
        <?php
        include "./dbConnection.php";
        $sql = "SELECT * FROM completed_projects";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <li class="flex flex-col justify-center border border-2 border-white rounded-2xl bg-gray-800 hover:bg-gray-600 lg:w-1/6 md:w-2/5 w-full m-2">
                    <!-- <img height={100} width={200} class="rounded-t-2xl" src="./img/core-img/orchardservice1.jpg"> -->
                    <span class="text-2xl font-semibold mx-auto py-2 capitalize"><?php echo $row['owner_name'] ?></span>
                    <div><span class="text-lg  font-semibold mx-2 py-2">Place :</span><span class="text-lg  mx-2 py-2"> <?php echo $row['place'] ?></span></div>
                    <div><span class="text-lg  font-semibold mx-2 py-2">Description :</span><span class="text-lg  mx-2 py-2"><?php echo $row['description'] ?></span></div>
                    <div><span class="text-lg  font-semibold mx-2 py-2">Feedback : </span><span class="text-lg  mx-2 py-2"><?php echo $row['feedback'] ?></span></div>
                    <div><span class="text-lg  font-semibold mx-2 py-2">Client Contact :</span><span class="text-lg  mx-2 py-2"><?php echo $row['client_contact'] ?></span></div>
                </li>
                <?php
            }
        } else {
            echo "No projects found.";
        }
        ?>
    </ul>
</div>
