<section class="our-services-area bg-gray section-padding-100-0" style="background-image: url(./img/core-img/apples.jpg); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2 class="font-extrabold text-3xl text-white">OUR SERVICES</h2>
                    <p class="font-semibold text-xl text-white">We provide the perfect service for you.</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap py-8">
        <?php
            $stmt = $conn->prepare("SELECT id, image_link, title, description FROM services ORDER BY id desc");
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                ?>
                <!-- img card  -->
                <?php
                // Replace '../' with './' in the image link
                $row['image_link'] = str_replace('../', './', $row['image_link']);
                ?>
                <div class="max-w-sm bg-white my-2 p-4 rounded-xl overflow-hidden shadow-lg mx-2"">
                    <img width="500" src="<?php echo $row['image_link']; ?>" alt="<?php echo $row['title']; ?>">
                    <div class="px-6 py-2">
                        <div class="font-bold text-xl mb-2">
                            <?php echo $row['title']; ?>
                        </div>
                        
                    </div>
                </div>
                <?php
            }
            ?>  
        </div>
    </div>
    </div>
</section>