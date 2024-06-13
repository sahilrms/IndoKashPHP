<?php
include "./dbConnection.php";

$checkStmt = $conn->prepare("SELECT * FROM about WHERE location = 'home_page'");
$checkStmt->execute();
$result = $checkStmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $about_us = $row['about_us'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ("head.php"); ?>
    <title>INDOKASH | ABOUT US</title>
</head>

<body class="flex flex-col">
    <?php include ("preloader.php"); ?>
    <?php include ("navBar.php"); ?>
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(img/core-img/aboutPage.jpg);">
            <h2>ABOUT US</h2>
        </div>


    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### About Area Start ##### -->

    <div class="w-full -mt-4 mx-4 w-screen">
        <div class="col-12 col-lg-12  py-4 ">
            <div class="section-heading text-white">
                <?php echo $about_us; ?>
            </div>
        </div>
        <?php include ("qualityControl.php"); ?>
    </div>
    </div>
    <!-- ##### About Area End ##### -->
    <!-- ##### Service Area Start ##### -->
    <?php include ("ourservices.php"); ?>

    <!-- ##### Service Area End ##### -->
    <?php include 'footer.php'; ?>
    <?php include 'scripts.php'; ?>
</body>

</html>