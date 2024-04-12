<?php
include "./dbConnection.php"; // Include your database connection file

// Fetch items from the database
$result = $conn->query("SELECT * FROM quality_control");
$items = $result->fetch_all(MYSQLI_ASSOC);
?>

<head>
<?php include("head.php");  ?>
</head>

<div class="col-12 col-lg-12">
    <h2>How we ensure quality product?</h2>
    <div class="alazea-benefits-area" id="product">
        <div class="row">
            <?php foreach ($items as $item) : ?>
                <?php
                // Replace '../' with './' in the image link
                $imageLink = str_replace('../', './', $item['image_link']);
                ?>
                <div class="col-12 col-sm-6">
                    <div class="single-benefits-area">
                        <img src="<?php echo $imageLink; ?>" alt="">
                        <h5><?php echo $item['title']; ?></h5>
                        <p><?php echo $item['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
