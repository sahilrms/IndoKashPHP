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
        <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 1" class="w-48 h-48 object-cover cursor-pointer transform transition-transform hover:scale-105" onclick="openModal(this)">
        <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 2" class="w-48 h-48 object-cover cursor-pointer transform transition-transform hover:scale-105" onclick="openModal(this)">
        <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 3" class="w-48 h-48 object-cover cursor-pointer transform transition-transform hover:scale-105" onclick="openModal(this)">
        <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 4" class="w-48 h-48 object-cover cursor-pointer transform transition-transform hover:scale-105" onclick="openModal(this)">
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
