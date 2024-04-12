<section class="about-us-area bg-gray-50">
    <div class="container">
        <div class="row justify-content-between w-screen lg:-ml-16">
            <div style=" background-image: url(./img/core-img/apple2.jpg); background-size: cover;">
                <!-- Section Heading -->
                <div class="section-heading">

                    <div class="opensans-font wow fadeInUp" data-wow-delay="500ms">
                        <h3 class="text-3xl font-bold mt-8 text-white p-6">Why Indokash?</h3>
                        <div class="flex flex-wrap justify-around w-100">

                            <?php
                            $data = [
                                [
                                    "heading" => "Expertise and Passion",
                                    "description" => "Indo Kash has a wealth of expertise and a deep-rooted passion for agriculture,
                            making them a reliable choice in horticulture."
                                ],
                                [
                                    "heading" => " Cutting-Edge Technology",
                                    "description" => "They leverage advanced horticultural practices and technologies for sustainable
                            and profitable orchard projects."
                                ],
                                [
                                    "heading" => " Comprehensive Approach",
                                    "description" => "Indo Kash considers various factors such as climate, soil conditions, and market
                            demand to provide tailored solutions."
                                ],
                                [
                                    "heading" => " Environmental Responsibility",
                                    "description" => " They prioritize eco-friendly practices, conserving water, reducing chemicals,
                            and promoting biodiversity."
                                ],
                                [
                                    "heading" => "Proven Reputation",
                                    "description" => " Indo Kash's commitment to excellence and customer satisfaction has earned them a
                            reputable position in the industry."
                                ],
                                [
                                    "heading" => "Track Record of Success",
                                    "description" => " They have successfully executed numerous orchard projects, working with both
                            individual growers and large-scale enterprises."
                                ],
                                [
                                    "heading" => " Sustainability Mission",
                                    "description" => "Their mission focuses on establishing sustainable farming systems that ensure
                            access to safe and nutritious food while safeguarding the environment and
                            supporting rural communities."
                                ],
                                [
                                    "heading" => " Organic and Regenerative Farming",
                                    "description" => " Indo Kash embraces organic and regenerative farming practices to enhance soil
                            fertility and minimize environmental impact."
                                ]
                            ];

                            foreach ($data as $item) {
                                echo '
                            <div class="lg:w-2/5 md:w-1/2 sm:w-full p-2 my-2">
                            <h3 class="text-lg  text-slate-50  font-bold">
                            ' . $item["heading"] . '
                            </h3>
                            <p class="text-sm text-white p-1 font-bold">
                            ' . $item["description"] . '
                            </p>
                        </div>';
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-12"
                style=" background-image: url(./img/core-img/apple1.jpg); background-size: cover;">
                <h2 class="text-2xl font-bold text-white py-4 px-2 ml-2">How we ensure qualtiy product?</h2>
                <div class="alazea-benefits-area" id="product">
                    <div class="flex flex-wrap justify-center w-11/12 mx-auto">
                        <?php
                        $stmt = $conn->prepare("SELECT title,image_link FROM quality_control");
                        $stmt->execute();
                        $data = $stmt->get_result();
                        foreach ($data as $item) {
                            $imageLink = str_replace('../', './', $item['image_link']);
                            echo '
                <div class="lg:w-1/5 w-1/2 ">
                    <div class="single-benefits-area mx-2">
                    <img src=' . $imageLink . ' alt="">
                    <h5 class="text-white">' . $item["title"] . '</h5>
                </div></div>';
                        }
                        ?>
                        <div class="pt-24 -mx-18">
                            <a class="anchor-style" href="./about.php#product">read more....</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>