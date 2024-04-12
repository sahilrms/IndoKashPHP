<?php
include "../dbConnection.php";
function updateAboutUs($conn) {
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $about = $_POST['about_us'];

        // Check if a row already exists for 'home_page'
        $checkStmt = $conn->prepare("SELECT 1 FROM about WHERE location = 'home_page'");
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            // Update the existing row
            $updateStmt = $conn->prepare("UPDATE about SET about_us = ? WHERE location = 'home_page'");
            $updateStmt->bind_param("s", $about);
            $updateStmt->execute();
            $updateStmt->close();
        } else {
            // Insert a new row
            $insertStmt = $conn->prepare("INSERT INTO about (about_us, location) VALUES (?, 'home_page')");
            $insertStmt->bind_param("s", $about);
            $insertStmt->execute();
            $insertStmt->close();
        }

        // Redirect to success page
        echo '<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold">Update Successfull</p>
        </div>';
        
        
    }
}

updateAboutUs($conn);

$checkStmt = $conn->prepare("SELECT * FROM about WHERE location = 'home_page'");
$checkStmt->execute();
$result = $checkStmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $about_us = $row['about_us'];
}
?>
<html lang="en">
<head>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
</head>
<body>
<div class="flex flex-wrap">
        <div class="w-11/12 mx-auto">
            <div class="h-screen p-4  flex flex-col">
                <form method="post" action="">
                    <label for="about_us" class="block mb-2 text-2xl font-medium text-gray-700">About Us</label>
                    <textarea id="editor" name="about_us" rows="12"
                        class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 overflow-y-scroll"><?php echo trim($about_us); ?></textarea>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Save</button>
                </form>
            </div>
        </div>
        <div></div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>
