<section class="our-services-area bg-gray section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>OUR SERVICES</h2>
                    <p>We provide the perfect service for you.</p>
                </div>
            </div>
        </div>
        <!-- cards -->

        <div class="flex flex-wrap py-8 justify-center  my-8 bg-white shadow-sm rounded-xl border border-red-900 border-8">
            <?php
            $stmt = $conn->prepare("SELECT id, image_link, title, description FROM services ORDER BY id");
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                ?>
                <!-- img card  -->
                <?php
                // Replace '../' with './' in the image link
                $row['image_link'] = str_replace('../', './', $row['image_link']);
                ?>
                <div class="w-5/12 bg-white my-2 p-4 rounded-xl overflow-hidden shadow-lg mx-auto">
                    <img width="700" src="<?php echo $row['image_link']; ?>" alt="<?php echo $row['title']; ?>">
                    <div class="px-6 py-2">
                        <div class="font-bold text-xl mb-2">
                            <?php echo $row['title']; ?>
                        </div>
                        <p class="text-gray-700 text-base">
                            <?php echo $row['description']; ?>
                        </p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>