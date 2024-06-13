<?php
    $basicPrice = 100;
    $premiumPrice = 200;
    $premiumPlusPrice = 300;
    $nutritionBasicPrice = 300;
    $nutritionPremiumPrice = 300;
    $nutritionPremiumPlusPrice = 300;
    $pruningPrice = 300;
    $antiHailNetPrice = 300;
?>
<html lang="en">

<head>
    <?php include ("head.php"); ?>
    <title>INDOKASH | Shop</title>
</head>

<body class="flex flex-col">
<?php
include "./dbConnection.php";
    // Fetch all data from the database
    $query = "SELECT service_name, service_price FROM shop";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die('Query failed: ' . htmlspecialchars(mysqli_error($conn)));
    }

    // Fetch the results and store them in an associative array
    $prices = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $prices[$row['service_name']] = $row['service_price'];
    }

    // Now you can access the price of any service by its name
    $basicPrice = $prices['Orchard Dev Basic'];
    $premiumPrice = $prices['Orchard Dev Premium'];
    $premiumPlusPrice =$prices['Orchard Dev Premium Plus'];
    $nutritionBasicPrice =$prices['Nutrition Basic'];
    $nutritionPremiumPrice =$prices['Nutrition Premium'];
    $nutritionPremiumPlusPrice =$prices['Nutrition Premium Plus'];
    $pruningPrice =$prices['Pruning'];
    $antiHailNetPrice =$prices['Anti Hail Net'];
    // ... and so on for other services
?>
    <?php include ("preloader.php"); ?>
    <?php include ("navBar.php"); ?>
    <?php include ("shopBreadCrumb.php"); ?>
    <!-- ##### Shop Area Start ##### -->
    <section class="p-4 bg-dark-green">

        <div class="w-100 bg-dark-green">
            <!-- Shop heading -->
            <div class="flex justify-center items-end w-100">
                <h1 class="text-white font-bold p-2 text-3xl">OUR SERVICES</h1>
            </div>

            <div id="services">
                <h2 class="text-xl text-white font-semibold underline p-2 my-2"> Apple Orchard development
                </h2>
                <div class="flex flex-wrap justify-around w-screen">

                <!-- basic:     -->
                <!-- card start  -->
                    <div class="m-1 w-full md:w-5/12  lg:w-3/12 h-48 p-2 border rounded-2xl bg-green-600 text-white">
                        <h3 class="flex justify-center text-black font-semibold text-md">Basic</h3>
                        <ul>
                            <li>
                                Trellis System - Iron Poles/GI Poles
                            </li>
                            <li>
                                Drip Irrigation System
                            </li>
                            <li>
                                Imported Italian Plants (5 Feathers)
                            </li>
                        </ul>
                        <h3 class="px-4 py-2 w-full rounded-xl border-none bg-cyan-900 text-white mt-auto ">
                            Price ₹ <?php echo $basicPrice ?> Per Kanal </h3>

                    </div>
                    <!-- card end  -->

                    <!-- premium  -->
                    <!-- card start  -->
                    <div class="m-1 w-full md:w-5/12  lg:w-3/12 h-48 p-2 border rounded-2xl bg-green-600 text-white">
                        <h3 class="flex justify-center text-black font-semibold text-md">Premium</h3>
                        <ul>
                            <li>
                                Basic +
                            </li>
                            <li>
                                Anti Hail Net System
                            </li>

                        </ul>
                        <h3 class="px-4 py-2 w-full rounded-xl border-none bg-cyan-900 text-white mt-auto">
                            Price ₹ <?php echo $premiumPrice ?> per Kanal </h3>
                    </div>
                    <!-- card end  -->

                    <!-- premium plus -->
                    <!-- card start  -->
                    <div class="m-1 w-full md:w-5/12  lg:w-3/12 h-48 p-2 border rounded-2xl bg-green-600 text-white">
                        <h3 class="flex justify-center text-black font-semibold text-md">Premium Plus</h3>
                        <ul>
                            <li>
                                Premium +
                            </li>
                            <li>
                                Vermi Compost (1 Year)
                            </li>
                            <li>
                                Nutrition (1st Year)
                            </li>
                        </ul>
                        <h3 class="px-4 py-2 w-full rounded-xl border-none bg-cyan-900 text-white mt-auto">
                            Price ₹ <?php echo $premiumPlusPrice ?> per Kanal </h3>
                    </div>
                    <!-- card end  -->
                </div>
            </div>

            <div id="services">
                <h2 class="text-xl text-white font-semibold underline p-2 my-2"> Nutrition
                </h2>
                <div class="flex flex-wrap justify-around w-screen">

                    <!-- card start  -->
                    <div class="m-1 w-full md:w-5/12  lg:w-3/12 h-48 p-2 border rounded-2xl bg-green-600 text-white">
                        <h3 class="flex justify-center text-black font-semibold text-md">Basic</h3>
                        <ul>
                            <li>
                                Trellis System - Iron Poles/GI Poles
                            </li>
                            <li>
                                Drip Irrigation System
                            </li>
                            <li>
                                Imported Italian Plants (5 Feathers)
                            </li>
                        </ul>
                        <h3 class="px-4 py-2 w-full rounded-xl border-none bg-cyan-900 text-white mt-auto ">
                            Price ₹ <?php echo $nutritionBasicPrice ?> per Kanal </h3>

                    </div>
                    <!-- card end  -->

                    <!-- card start  -->
                    <div class="m-1 w-full md:w-5/12  lg:w-3/12 h-48 p-2 border rounded-2xl bg-green-600 text-white">
                        <h3 class="flex justify-center text-black font-semibold text-md">Premium</h3>
                        <ul>
                            <li>
                                Basic +
                            </li>
                            <li>
                                Anti Hail Net System
                            </li>

                        </ul>
                        <h3 class="px-4 py-2 w-full rounded-xl border-none bg-cyan-900 text-white mt-auto">
                            Price ₹ <?php echo $nutritionPremiumPrice ?> per Kanal </h3>
                    </div>
                    <!-- card end  -->
                    <!-- card start  -->
                    <div class="m-1 w-full md:w-5/12  lg:w-3/12 h-48 p-2 border rounded-2xl bg-green-600 text-white">
                        <h3 class="flex justify-center text-black font-semibold text-md">Premium Plus</h3>
                        <ul>
                            <li>
                                Premium +
                            </li>
                            <li>
                                Vermi Compost (1 Year)
                            </li>
                            <li>
                                Nutrition (1st Year)
                            </li>
                        </ul>
                        <h3 class="px-4 py-2 w-full rounded-xl border-none bg-cyan-900 text-white mt-auto">
                            Price ₹ <?php echo $nutritionPremiumPlusPrice ?> per Kanal </h3>
                    </div>
                    <!-- card end  -->
                </div>
            </div>

            <div id="services">
                <h2 class="text-xl text-white font-semibold underline p-2 my-2"> Pruning Services
                </h2>
                <div class="px-4 py-2 w-fit bg-cyan-900 text-white border-none rounded-xl">Price ₹<?php echo $pruningPrice ?> per
                    Kanal</div>
            </div>

            <div id="services">
                <h2 class="text-xl text-white font-semibold underline p-2 my-2"> Anti Hail Net
                </h2>
                <div class="px-4 py-2 w-fit bg-cyan-900 text-white border-none rounded-xl">Price ₹<?php echo $antiHailNetPrice ?> per
                    Kanal</div>
            </div>

            <div id="services">
                <h2 class="text-xl text-white font-semibold underline p-2 my-2"> Apple Trading
                </h2>
                <div class="px-4 py-2 w-fit bg-cyan-900 text-white border-none rounded-xl">Buy or sell from growers
                    on outright or commision basis</div>
            </div>

        </div>

    </section>
    <!-- ##### Shop Area End ##### -->

    <?php include 'footer.php'; ?>
    <?php include 'scripts.php'; ?>
</body>

</html>