<!DOCTYPE html>
<?php
// Start the session
session_start();
// Database connection
include "../dbConnection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL query
    $query = "SELECT * FROM login WHERE user_name = ?";
    $stmt = $conn->prepare($query);

    // Bind the username to the prepared statement
    $stmt->bind_param('s', $username);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a user was found
    if ($result->num_rows > 0) {
        // Get the user data
        $user = $result->fetch_assoc();
        // Verify the password
        if ($password == $user['password']) {
            // Password is correct
            echo "Login successful";
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: adminhome.php?page=addaboutus");
            exit;
        } else {
            // Password is incorrect
            $_SESSION['error'] = "Invalid password";
        }
    } else {
        // No user found with the given username
        $_SESSION['error'] = "Invalid username";
    }
}
?>
<html>

<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-80">
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
        <h2 class="text-2xl mb-6 text-center text-gray-700">Admin Login</h2>
        <form action="index.php" method="post">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" id="username" name="username" required class="w-full px-3 py-2 border rounded mt-1">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3 py-2 border rounded mt-1">
            </div>
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-600 text-white rounded hover:bg-blue-700">Login</button>
            </div>
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
        </form>
    </div>
</body>

</html>