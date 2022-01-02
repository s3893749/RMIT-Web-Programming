//Navbar script createed by W3 schools https://www.w3schools.com/howto/howto_js_navbar_sticky.asp
//Not created by JACK HARRIS, accessed and copied on 31/12/2021

// When the user scrolls the page, execute myFunction
window.onscroll = function() {stickyFunction()};

// Get the navbar
var navbar = document.getElementById("header-nav-container");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function stickyFunction() {
    if (window.pageYOffset > sticky) {
        navbar.classList.add("header-nav-container-sticky")
    } else {
        navbar.classList.remove("header-nav-container-sticky");
    }
}

function showMobileMenu(){
let mobileMenu = document.getElementById("mobile-menu")
    mobileMenu.style.display = "block"
}