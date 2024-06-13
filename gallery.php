<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <title>INDOKASH | Gallery</title>
</head>

<body class="flex flex-col">
    <?php include("preloader.php"); ?>
    <?php include("navBar.php"); ?>
    <?php include("galleryBreadCrumb.php");  ?>
    <div class="flex flex-wrap justify-center gap-4 p-5 bg-green-700">
        <?php
            include "./dbConnection.php";
            $sql = "SELECT * FROM gallery";
            $result = mysqli_query($conn, $sql);
        
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <img src="<?php echo preg_replace('/^\.\.\//', '', $row['img_link']); ?>" onclick="openModal(this)">
                    <?php
                }
            } else {
                echo "No Images in gallery found.";
            }
        ?>
    </div>

    <div id="modal" class="modal hidden fixed z-10 top-0 left-0 w-full h-full overflow-auto bg-black bg-opacity-80">
        <span class="close absolute top-5 right-5 text-white text-4xl font-bold cursor-pointer transition-colors duration-300" onclick="closeModal()">&times;</span>
        <img class="modal-content block mx-auto w-full h-full object-contain" id="modal-image" onclick="closeModal()">
        <div id="caption" class="text-center text-gray-300"></div>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'scripts.php'; ?>
    <style>
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            font-size: 30px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .modal-content {
                max-width: 90vw;
                max-height: 90vh;
            }
        }
    </style>
    <script>
        function openModal(img) {
            const modal = document.getElementById('modal');
            const modalImg = document.getElementById('modal-image');
            const captionText = document.getElementById('caption');
            modal.style.display = 'block';
            modalImg.src = img.src;
            captionText.innerHTML = img.alt;
            window.addEventListener('keydown', closeModalOnKeyPress);
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.style.display = 'none';
            window.removeEventListener('keydown', closeModalOnKeyPress);
        }

        function closeModalOnKeyPress(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        }
    </script>
</body>

</html>
