<?php
include "../dbConnection.php"; // Include your database connection file

// Fetch existing items from the database
$items_query = $conn->query("SELECT * FROM completed_projects");
$existing_items = $items_query->fetch_all(MYSQLI_ASSOC);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Start a transaction to ensure either all or none of the operations are executed
    $conn->begin_transaction();

    // Delete existing entries from the table
    $delete_stmt = $conn->prepare("DELETE FROM `completed_projects`");
    $delete_stmt->execute();
    // Insert data into completed_projects table
    foreach ($_POST['items'] as $item) {
        print_r($item);
        printf("%s", $item['owner']);
        $owner_name = $conn->real_escape_string($item['owner']);
        $place = $conn->real_escape_string($item['place']);
        $description = $conn->real_escape_string($item['description']);
        $feedback = $conn->real_escape_string($item['feedback']);
        $client_contact = $conn->real_escape_string($item['client_contact']);
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        // Insert project details into completed_projects table
        $sql = "INSERT INTO `completed_projects` ( `owner_name`, `place`, `description`, `feedback`, `client_contact`, `created_at`, `updated_at`)
                VALUES ( '$owner_name', '$place', '$description', '$feedback', '$client_contact', '$created_at', '$updated_at')";

        if ($conn->query($sql) === TRUE) {
            $project_id = $conn->insert_id; // Get the ID of the inserted project

            $conn->commit();
            echo '<div id="banner" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Items saved successfully!</strong>
            <span class="block sm:inline">Your items have been added to the database.</span>
            <span onclick="removeBanner()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 0 1-1.497 1.323l-2.145-2.275-2.145 2.275a1 1 0 1 1-1.496-1.324l2.206-2.34-2.206-2.339a1 1 0 0 1 1.496-1.324l2.145 2.275 2.145-2.275a1 1 0 0 1 1.497 1.323l-2.206 2.339 2.206 2.34a1 1 0 0 1 0 1.324z"/></svg>
            </span>
          </div>
         ';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
</head>

<body class="bg-blue-100">
    <h1 class="bg-white flex justify-center text-2xl font-bold px-2 py-4">Add our Project</h1>
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
                    <div class="border rounded-lg shadow-2xl bg-white w-5/6 mx-auto flex flex-col space-y-1 my-2 p-4">
                        <div class="flex flex-wrap">
                            <div class="w-2/5 py-2 flex flex-col">
                                <label for="owner_<?php echo $index ?>" class="text-gray-600">Orchard Owner:</label>
                                <input id="owner_<?php echo $index ?>" name="items[<?php echo $index ?>][owner]"
                                    value="<?php echo $item['owner_name'] ?>" type="text" required
                                    class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="w-2/5 py-2 mx-auto flex flex-col">
                                <label for="place" class="text-gray-600">Place:</label>
                                <input id="place_<?php echo $index ?>" name="items[<?php echo $index ?>][place]"
                                    value="<?php echo $item['place'] ?>" type="text" required
                                    class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                        </div>
                        <div class="w-full py-2 flex flex-col">
                            <label for="description_<?php echo $index ?>" class="text-gray-600">Description:</label>
                            <textarea id="description_<?php echo $index ?>" name="items[<?php echo $index ?>][description]"
                                required
                                class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"><?php echo $item['description'] ?></textarea>
                        </div>
                        <div class="w-full py-2 flex flex-col">
                            <label for="feedback_<?php echo $index ?>" class="text-gray-600">Feedback:</label>
                            <textarea id="feedback_<?php echo $index ?>" name="items[<?php echo $index ?>][feedback]"
                                class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"><?php echo $item['feedback'] ?></textarea>
                        </div>
                        <div class="w-full py-2 flex flex-col">
                            <label for="client_contact_<?php echo $index ?>" class="text-gray-600">Client Contact:</label>
                            <input id="client_contact_<?php echo $index ?>"
                                name="items[<?php echo $index ?>][client_contact]"
                                value="<?php echo $item['client_contact'] ?>" type="text"
                                class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        </div>

                    </div>


                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex justify-end pr-20 p-4 ">
            <button onClick="addItem()" class="bg-blue-800 px-2 mx-2 text-white rounded border-0" name="submit">Add
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
            <div class="bg-gray-100 mx-28 rounded-md py-4 px-10">
        <div class="border rounded-lg shadow-2xl bg-white w-5/6 mx-auto flex flex-col space-y-1 my-2 p-4">
            <button type="button" onclick="removeItem(this)" class="bg-red-500  ml-auto text-white p-1 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6">
                    <path fill-rule="evenodd"
                        d="M10 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L11.414 10l4.293-4.293a1 1 0 0 0-1.414-1.414L10 8.586 5.707 4.293a1 1 0 0 0-1.414 1.414L8.586 10l-4.293 4.293a1 1 0 1 0 1.414 1.414L10 11.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="flex flex-wrap">
                            <div class="w-2/5 py-2 flex flex-col">
                                <label for="owner_${itemCount}" class="text-gray-600">Orchard Owner:</label>
                                <input id="owner_${itemCount}"  type="text" name="items[${itemCount}][owner]" required
                                    class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="w-2/5 py-2 mx-auto flex flex-col">
                                <label for="place_${itemCount}" class="text-gray-600">Place:</label>
                                <input id="place_${itemCount}"  type="text" name="items[${itemCount}][place]" required
                                    class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                        </div>
            <div class="w-full py-2 flex flex-col">
                <label for="description_${itemCount}" class="text-gray-600">Description:</label>
                <textarea id="description_${itemCount}" name="items[${itemCount}][description]" required
                    class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"></textarea>
            </div>
            <div class="w-full py-2 flex flex-col">
                <label for="feedback_${itemCount}" class="text-gray-600">Feedback:</label>
                <textarea id="feedback_${itemCount}" name="items[${itemCount}][feedback]"
                    class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"></textarea>
            </div>
            <div class="w-full py-2 flex flex-col">
                <label for="client_contact_${itemCount}" class="text-gray-600">Client Contact:</label>
                <input id="client_contact_${itemCount}" type="text" name="items[${itemCount}][client_contact]"
                    class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="w-full py-2 flex flex-col">
                <label for="media_url_${itemCount}" class="text-gray-600">Media files:</label>
                <input id="media_url_${itemCount}" type="file" name="items[${itemCount}][media_url]" multiple
                    class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
        </div></div>
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