function validateForm() {
    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var company = document.getElementById("company").value.trim();
    var role = document.getElementById("role").value.trim();
    var password = document.getElementById("password").value.trim();
    var confirmPassword = document.getElementById("confirmPassword").value.trim();
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (name === "") {
        alert("Name must be filled out");
        return false;
    }
    
    if (email === "" || !emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    if (phone !== "" && !(/^\d{10}$/.test(phone))) {
        alert("Please enter a valid 10-digit phone number");
        return false;
    }

    if (company === "") {
        alert("Please enter the company you worked for");
        return false;
    }

    if (role === "") {
        alert("Please specify the specific role desired");
        return false;
    }

    if(password.length<6) {
        alert("Password must be 6 characters long");
    }

    if(confirmPassword!=password) {
        alert("Password is incorrect. Try again!");
    }

    return true;
}

