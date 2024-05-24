<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Gallery</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #98FB98;
    }

    .gallery {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      justify-content: center;
      padding: 20px;
    }

    .gallery-item {
      width: 200px;
      height: 200px;
      object-fit: cover;
      cursor: pointer;
      transition: transform 0.2s;
    }

    .gallery-item:hover {
      transform: scale(1.05);
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 60px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.8);
    }

    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }

    #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
    }

    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }

    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="gallery">
    <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 1" class="gallery-item">
    <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 1" class="gallery-item">
    <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 1" class="gallery-item">
    <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 1" class="gallery-item">
    <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 1" class="gallery-item">
   >
  </div>

  <div id="modal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modal-image">
    <div id="caption"></div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const modal = document.getElementById('modal');
      const modalImg = document.getElementById('modal-image');
      const captionText = document.getElementById('caption');
      const close = document.querySelector('.close');
      const images = document.querySelectorAll('.gallery-item');
      let currentIndex = 0;

      images.forEach((img, index) => {
        img.addEventListener('click', () => {
          currentIndex = index;
          openModal(img);
        });
      });

      close.addEventListener('click', closeModal);
      window.addEventListener('click', (e) => {
        if (e.target == modal) closeModal();
      });
      window.addEventListener('keydown', (e) => {
        if (modal.style.display === 'block') {
          if (e.key === 'ArrowRight') {
            currentIndex = (currentIndex + 1) % images.length;
            openModal(images[currentIndex]);
          } else if (e.key === 'ArrowLeft') {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            openModal(images[currentIndex]);
          } else if (e.key === 'Escape') {
            closeModal();
          }
        }
      });

      function openModal(img) {
        modal.style.display = 'block';
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;
      }

      function closeModal() {
        modal.style.display = 'none';
      }
    });
  </script>
</body>
</html>
