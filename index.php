<?php include("./dbConnection.php");  ?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>INDOKASH | HOME</title>
    <?php include("head.php");  ?>
</head>

<body class='flex flex-col'>
    <!-- Preloader -->
    <?php include("preloader.php"); ?>
    <?php include("navBar.php"); ?>
    <?php include("carousal.php"); ?>
   <div class="mx-auto">
    <?php include("whyIndokash.php"); ?>
    <?php include("serviceintro.php"); ?>
    </div>
    <?php include "contactForm.php"; ?>
    <?php include 'footer.php'; ?>
    <?php include 'scripts.php'; ?>
</body>

</html>