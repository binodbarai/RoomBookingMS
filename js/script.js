
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
function toggleLogin(){
    let submenu = document.querySelector(".container");
    submenu.classList.toggle("active");
}
