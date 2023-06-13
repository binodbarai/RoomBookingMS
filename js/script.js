// this is for the position fixed navbar
window.addEventListener("scroll", function() {
    var navbar = document.querySelector(".navbar");
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollPosition > 30) {
        navbar.classList.add("fixed");
    } else {
        navbar.classList.remove("fixed");
    }
});