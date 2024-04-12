document.addEventListener("DOMContentLoaded", function() {
    // Get the scrolling text element
    var scrollingText = document.querySelector(".scrolling-text");

    // Function to check if an element is in the viewport
    function isInViewport(element) {
        var rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    // Function to animate the text when it's in the viewport
    function animateText() {
        if (isInViewport(scrollingText)) {
            scrollingText.style.opacity = "1";
            scrollingText.style.transform = "translateY(0)";
        }
    }

    // Add an event listener for the scroll event
    window.addEventListener("scroll", animateText);

    // Call the animateText function initially to check if the text is already in the viewport
    animateText();
});
