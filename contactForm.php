<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include the Tailwind CSS CDN link -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="bg-cover" style="background-image: url(./img/core-img/apple3.jpg);">
        <section class="contact-area section-padding-100-0 mx-4 z-0 w-4/6 mx-auto ">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12">
                        <!-- Section Heading -->
                        <div class="section-heading">
                            <h2 class="text-white font-bold">GET IN TOUCH</h2>
                            <p class="text-white">Send us a message, we will call back later</p>
                        </div>
                        <!-- Contact Form Area -->
                        <div class="contact-form-area mb-100">
                            <form method="POST" action="process_form.php">
                                <div class="row">
                                    <div class="col-12 col-sm-6 ">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control bg-opacity-10 focus:bg-opacity-100"
                                                id="contact-name" name="name" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control bg-opacity-10 focus:bg-opacity-100"
                                                name='email' id="contact-email" placeholder="Your Email" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control bg-opacity-10 focus:bg-opacity-100"
                                                name="subject" id="contact-subject" placeholder="Subject" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control bg-opacity-10 focus:bg-opacity-100"
                                                name="message" id="message" cols="30" rows="10"
                                                placeholder="Message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                            class="bg-green-400 hover:bg-green-600 text-white px-4 py-2 rounded-2xl mt-15">Send
                                            Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
