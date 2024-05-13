document.getElementById('toggleButton').addEventListener('click', function() {
    var navbar = document.getElementById('navbar');
    if (navbar.style.width === '200px' || navbar.style.width === "") {
        navbar.style.width = '0'; // Hide
    } else {
        navbar.style.width = '200px'; // Show
    }
});

// Handle resizing of the window
window.addEventListener('resize', function() {
    var navbar = document.getElementById('navbar');
    if (window.innerWidth > 500) {
        navbar.style.width = '200px'; // Show navbar if window is wider than 500px
    } else {
        navbar.style.width = '0'; // Hide navbar if window is less than or equal to 500px
    }
});
