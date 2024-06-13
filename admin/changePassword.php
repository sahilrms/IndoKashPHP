<?php

// Database connection
include "../dbConnection.php";
// session_start();
// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    // User is not logged in, redirect to index.php
    echo 'User not logged in';
    header("Location: ./index.php");
    exit;
}
if (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if new password and confirm password are the same
    if ($new_password != $confirm_password) {
        $_SESSION['error'] = "New password and confirm password do not match";
    } else {
        // Prepare the SQL query
        $query = "SELECT * FROM login WHERE user_name = ?";
        $stmt = $conn->prepare($query);
        // Bind the username to the prepared statement
        $stmt->bind_param('s', $_SESSION['username']);

        // Execute the prepared statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if a user was found
        if ($result->num_rows > 0) {
            // Get the user data
            $user = $result->fetch_assoc();
            echo $user;
            // Verify the current password
            if ($current_password == $user['password']) {
                // Current password is correct, update the password
                $query = "UPDATE login SET password = ? WHERE user_name = ?";
                $stmt = $conn->prepare($query);
                echo $new_password;
                echo $_SESSION['username'];
                $stmt->bind_param('ss', $new_password, $_SESSION['username']);
                $stmt->execute();

                $_SESSION['message'] = "Password changed successfully";
                
                header("Location: index.php");
            } else {
                // Current password is incorrect
                $_SESSION['error'] = "Invalid current password";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="w-full max-w-xs mx-auto mt-20">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="changePassword.php">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="text" name="username"
                    value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" readonly>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="current_password">
                    Current Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="current_password" type="password" name="current_password" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="new_password">
                    New Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="new_password" type="password" name="new_password" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm_password">
                    Confirm New Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="confirm_password" type="password" name="confirm_password" required>
            </div>
            <!-- Display the error message -->
            <?php
            if (isset($_SESSION['error'])) {
                echo '<p class="text-red-500 text-xs italic">' . $_SESSION['error'] . '</p>';
                unset($_SESSION['error']);
            }
            ?>
            <!-- Display the success message -->
            <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="text-green-500 text-xs italic">' . $_SESSION['message'] . '</p>';
                unset($_SESSION['message']);
            }
            ?>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Change Password
                </button>
            </div>
        </form>
    </div>
</body>

</html>