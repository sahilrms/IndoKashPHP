<?php
include "../dbConnection.php"; // Include your database connection file

// Fetch existing items from the database
$items_query = $conn->query("SELECT * FROM management");
$existing_items = $items_query->fetch_all(MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Start a transaction to ensure either all or none of the operations are executed
    $conn->begin_transaction();

    // Delete existing entries from the table
    $delete_stmt = $conn->prepare("DELETE FROM management");
    $delete_stmt->execute();
    $target_dir = "../img/our_management/";

    $files = glob($target_dir . '*'); // Get all file names in the directory
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file); // Delete the file
        }
    }

    // Loop through each item submitted in the form
    foreach ($_FILES['items']['tmp_name'] as $index => $tmp_name) {
        // Check if the individual image file was uploaded successfully
        if (isset($tmp_name['image']) && is_uploaded_file($tmp_name['image'])) {
            // Extract the values for title, description, and image
            $title = $_POST['items'][$index]['title'];

            $description = $_POST['items'][$index]['description'];
            $designation = $_POST['items'][$index]['designation'];


            $target_dir = "../img/our_management/";
            $original_file_name = basename($_FILES['items']['name'][$index]['image']);
            $imageFileType = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));
            $target_file = $target_dir . uniqid('', true) . '.' . $imageFileType; // Generate a unique file name

            if (move_uploaded_file($tmp_name['image'], $target_file)) {
                // Insert the item into the database
                $insert_stmt = $conn->prepare("INSERT INTO management (image_link, title,designation, description) VALUES (?, ?, ?,?)");
                $insert_stmt->bind_param("ssss", $target_file, $title, $designation, $description);
                $insert_stmt->execute();
                } else {
                echo "Failed to upload image.";
                $conn->rollback(); // Rollback the transaction
                exit; // Exit the script
            }
        } else {
            echo "Image file not uploaded.";
            $conn->rollback(); // Rollback the transaction
            exit; // Exit the script
        }
    }

    // Commit the transaction if all operations were successful
    $conn->commit();
    echo '<div id="banner" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Items saved successfully!</strong>
    <span class="block sm:inline">Your items have been added to the database.</span>
    <span onclick="removeBanner()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 0 1-1.497 1.323l-2.145-2.275-2.145 2.275a1 1 0 1 1-1.496-1.324l2.206-2.34-2.206-2.339a1 1 0 0 1 1.496-1.324l2.145 2.275 2.145-2.275a1 1 0 0 1 1.497 1.323l-2.206 2.339 2.206 2.34a1 1 0 0 1 0 1.324z"/></svg>
    </span>
  </div>
 
  ';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Management</title>
</head>

<body class="bg-blue-100">
<h1 class="bg-white flex justify-center text-2xl font-bold px-2 py-4">Add our Management</h1>
    <form method="post" action="" class="bg-blue-100" enctype="multipart/form-data">

        <div id="items" class="flex flex-col h-full">
            <?php foreach ($existing_items as $index => $item): ?>
                <div class="border rounded-lg shadow-2xl bg-white w-5/6 mx-auto flex flex-col space-y-1 my-2 p-4">
                    <!-- Remove button is disabled for the first form -->
                    <button type="button" onclick="removeItem(this)" class="bg-red-500  ml-auto text-white p-1 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6">
                            <path fill-rule="evenodd"
                                d="M10 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L11.414 10l4.293-4.293a1 1 0 0 0-1.414-1.414L10 8.586 5.707 4.293a1 1 0 0 0-1.414 1.414L8.586 10l-4.293 4.293a1 1 0 1 0 1.414 1.414L10 11.414z"
                                clip-rule="evenodd"></path>
                        </svg></button>
                    <div class="flex flex-wrap">
                        <div class="w-2/5 py-2 flex flex-col">
                            <label for="image_<?php echo $index ?>" class="text-gray-600">Image:</label>
                            <img id="preview_<?php echo $index ?>" class="h-24 w-24" src="<?php echo $item['image_link'] ?>"
                                alt="Preview Image">
                            <input id="image_<?php echo $index ?>" type="file" name="items[<?php echo $index ?>][image]"
                                accept="image/*"
                                class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"
                                onchange="showPreview(this, 'preview_<?php echo $index ?>')">
                        </div>
                        <!-- name  -->
                        <div class="w-2/5 py-2 mx-auto flex flex-col">
                            <label for="title_<?php echo $index ?>" class="text-gray-600">Name:</label>
                            <input id="title_<?php echo $index ?>" type="text" name="items[<?php echo $index ?>][title]"
                                value="<?php echo $item['title'] ?>" required
                                class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                        <!-- name end  -->
                        <!-- designation  -->
                        <div class="w-full py-2 flex flex-col">
                            <label for="title_<?php echo $index ?>" class="text-gray-600">Designation:</label>
                            <input id="title_<?php echo $index ?>" type="text"
                                name="items[<?php echo $index ?>][designation]" value="<?php echo $item['designation'] ?>"
                                required
                                class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                        <!-- designation -->
                    </div>
                    <div class="w-full py-2 flex flex-col">
                        <label for="description_<?php echo $index ?>" class="w-1/2  py-2 text-gray-600">Description:</label>
                        <textarea id="description_<?php echo $index ?>" name="items[<?php echo $index ?>][description]"
                            required
                            class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"><?php echo $item['description'] ?></textarea>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex justify-end pr-20 p-4 ">
            <button type="button" class="mx-2 px-2 bg-blue-800 text-white rounded border-0" onclick="addItem()">Add
                Item</button>
            <button type="submit" class="bg-green-800 px-2 text-white rounded border-0" name="submit">Save
                Items</button>
        </div>
    </form>

    <script>
        let itemCount = <?php echo count($existing_items) ?>; // Start with the number of existing items

        function addItem() {
            var item = document.createElement("div");
            item.innerHTML = `
            <div class="border rounded-lg shadow-2xl bg-white w-5/6 mx-auto flex flex-col space-y-1 my-2 p-4">
            <button type="button" onclick="removeItem(this)"
                    class="bg-red-500  ml-auto text-white p-1 rounded"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6">
  <path fill-rule="evenodd" d="M10 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L11.414 10l4.293-4.293a1 1 0 0 0-1.414-1.414L10 8.586 5.707 4.293a1 1 0 0 0-1.414 1.414L8.586 10l-4.293 4.293a1 1 0 1 0 1.414 1.414L10 11.414z" clip-rule="evenodd"></path>
</svg></button>   
            <div class="flex flex-wrap">   
                 
                    <div class="w-2/5  py-2 flex flex-col">
                        <label for="image_${itemCount}" class="text-gray-600">Image:</label>
                        <img id="preview_${itemCount}" class="h-32" src="#" alt="Preview Image">
                        <input id="image_${itemCount}" type="file" name="items[${itemCount}][image]" required accept="image/*"
                            class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"
                            onchange="showPreview(this, 'preview_${itemCount}')">
                    </div>
                    <div class="w-2/5  py-2 flex flex-col">
                        <label for="title_${itemCount}" class="text-gray-600">Name:</label>
                        <input id="title_${itemCount}" type="text" name="items[${itemCount}][title]" required
                            class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="w-full py-2 flex flex-col">
                        <label for="designation_${itemCount}" class="text-gray-600">Designation:</label>
                        <input id="designation_${itemCount}" type="text" name="items[${itemCount}][designation]" required
                            class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                </div>
                <div class="w-full py-2  flex flex-col">
                <label for="description_${itemCount}" class="text-gray-600">Description:</label>
                <textarea id="description_${itemCount}" name="items[${itemCount}][description]" required
                    class="border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>
            </div>
            `;
            document.getElementById("items").appendChild(item);
            itemCount++;
        }

        function removeItem(button) {
            button.parentNode.remove();
            itemCount--;
        }

        function showPreview(input, previewId) {
            const file = input.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                const preview = document.getElementById(previewId);
                preview.src = e.target.result;
            }

            reader.readAsDataURL(file);
        }

        function removeBanner() {
            document.getElementById("banner").remove();
        }

    </script>
</body>

</html>