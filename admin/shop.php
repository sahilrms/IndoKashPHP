<!DOCTYPE html>
<?php
// Database connection
include "../dbConnection.php";

if (isset($_POST['submit'])) {
    // Turn on error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    foreach ($_POST as $service => $price) {
        if ($service == 'submit')
            continue;
        $service = str_replace('_', ' ', $service);
        $query = "UPDATE shop SET service_price = ? WHERE service_name = ?";
        
        $stmt = $conn->prepare($query);

        // Check if prepare was successful
        if ($stmt === false) {
            die('prepare() failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param('ds', $price, $service); // assuming service_price is a decimal
        if (!$stmt->execute()) {
            die('execute() failed: ' . htmlspecialchars($stmt->error));
        }
       
        $stmt->close(); // Close statement after execution
    }
    // $conn->close(); // Close the database connection
    // header('Location: shop.php');
    // exit;
    echo '<div id="banner" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Prices saved successfully!</strong>
    <span class="block sm:inline">Your items have been added to the database.</span>
    <span onclick="removeBanner()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 0 1-1.497 1.323l-2.145-2.275-2.145 2.275a1 1 0 1 1-1.496-1.324l2.206-2.34-2.206-2.339a1 1 0 0 1 1.496-1.324l2.145 2.275 2.145-2.275a1 1 0 0 1 1.497 1.323l-2.206 2.339 2.206 2.34a1 1 0 0 1 0 1.324z"/></svg>
    </span>
  </div>
 
  ';
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Prices</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-100">
    <h1 class="bg-white flex justify-center text-2xl font-bold px-2 py-4">Add Prices For Services</h1>
    <?php
    // Reopen the database connection
    include "../dbConnection.php";
    // Fetch data from the database
    $query = "SELECT * FROM shop"; // Replace with your actual query
    $result = mysqli_query($conn, $query); // Replace $conn with your actual connection variable

    // Check if the query was successful
    if (!$result) {
        die('Query failed: ' . htmlspecialchars(mysqli_error($conn)));
    }
    ?>
    <form method="post" action="" class="bg-blue-100">
        <div class="overflow-x-auto">
            <table class="w-5/6 bg-slate-400 border border-gray-300 divide-y divide-gray-300 shadow-md m-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Service Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Price Per kanal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-3 text-sm text-gray-900"><?php echo htmlspecialchars($row['service_name']); ?></td>
                            <td class="px-6 py-3">
                                <input type="number" name="<?php echo htmlspecialchars($row['service_name']); ?>" value="<?php echo htmlspecialchars($row['service_price']); ?>" step="0.01" required class="w-full px-2 py-1 border rounded">
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="flex justify-end pr-20 p-4">
            <button type="submit" class="bg-green-800 px-4 py-2 text-white rounded border-0 hover:bg-green-600" name="submit">Save Prices</button>
        </div>
    </form>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>

</html>
