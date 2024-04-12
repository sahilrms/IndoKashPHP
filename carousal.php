    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area h-screen">
        <div id="carousal-container" class="hero-post-slides owl-carousel">
            <?php
            $data = [
                ["img_url" => "img/bg-img/bg1.jpg", "text" => "sometext1"],
                ["img_url" => "img/bg-img/bg2.jpg", "text" => "sometext2"],
                ["img_url" => "img/bg-img/bg3.jpg", "text" => "sometext3"],
                ["img_url" => "img/bg-img/bg4.jpg", "text" => "sometext4"]
            ];

            foreach ($data as $item) {
                echo '
                <div class="single-hero-post bg-overlay">
                    <div class="slide-img bg-img" style="background-image: url(' . $item["img_url"] . ');"></div>
                    
                </div>
                ';
            }
            ?>
        </div>
        <!-- <div class="container h-100 mt-8">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-slides-content text-center">
                        <h1 class="popins-font text-3xl  text-white" style="margin-top: 1rem ; margin-bottom: 1rem;">
                            ' . $item["text"] . '
                        </h1>
                    </div>
                </div>
            </div>
        </div> -->
    </section>