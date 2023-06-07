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

// register form validation
function validateForm() {
    var username = document.getElementsByClassName('username')[0].value;
    var phone = document.forms["myForm"]["phone"].value;
    var email = document.forms["myForm"]["email"].value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;

    if (password !== confirmPassword) {
        alert("Error: Passwords do not match!");
        return false; // Prevent form submission
    }

    if (username == "") {
        alert("Please enter your name.");
        return false;
    }
    if (phone == "") {
        alert("Please enter your mobile number.");
        return false;
    }
    if (email == "") {
        alert("Please enter your email.");
        return false;
    }
    if (password == "") {
        alert("Please enter your password.");
        return false;
    }

    var phoneRegex = /^[0-9]{10}$/;
    if (!phoneRegex.test(phone)) {
        alert("Please enter a valid 10-digit mobile number.");
        return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/)) {
        alert(
            'Password should be 8 to 15 characters long and should contain at least one lowercase letter,   one uppercase letter, one number, and one special character.'
        );
        return false;
    }
    else{
    // Form is valid, allow submission
    return true;
    }
    
}

// closing the login and register page
function closeLogin() {
    window.location.replace('index.php');
}

const closeButton = document.querySelector('.cross');
closeButton.addEventListener('click', closeLogin);
