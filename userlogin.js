window.onload = function() {
    var httpRequest;
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var loginBtn = document.getElementById("loginBtn");

    loginBtn.onclick = login;
    
    function login() {
        

        if(email.value === "" || password.value === "") {
            alert("Please fill in all fields before submission!");
            return;
        }

        httpRequest = new XMLHttpRequest();
        var url = "login.php";
        httpRequest.onreadystatechange = processLogin;
        httpRequest.open('POST', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('email=' + email.value + "&password=" + password.value);
    }

    function processLogin() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                var response = httpRequest.responseText;
                if(response === "true") {
                    alert("Login successful");
                    window.location = "buglogger.php";
                } else {
                    alert("Invalid Credentials!");
                    window.location = "userlogin.html";
                }
            } else {
                alert('There was a problem with the request.');
            }
        }
    }
}