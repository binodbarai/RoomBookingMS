
window.addEventListener("scroll", function() {
    var navbar = document.querySelector(".navbar");
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollPosition > 30) {
        navbar.classList.add("fixed");
    } else {
        navbar.classList.remove("fixed");
    }
});



function toggleMenu(){
    let submenu = document.querySelector(".profile-menu-wrap");
    submenu.classList.toggle("active"); 
}
function toggleLogin() {
    let loginContainer = document.querySelector(".container");
    let overlay = document.querySelector(".overlay");
    let body = document.querySelector("body");
    loginContainer.classList.toggle("active");
    overlay.classList.toggle("active");
    body.classList.toggle("blurred-background"); 
}

