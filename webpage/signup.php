<?php
require_once "config.php";

$username = $password = $confirmPassword = "";
$username_err = $password_err = $confirmPassword_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT id FROM users1 WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST["username"]);

            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Something went wrong";
            }
        }
        mysqli_stmt_close($stmt);
    }

    // Check for password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password cannot be less than 6 characters";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check for confirm password
    if (empty(trim($_POST["confirmPassword"]))) {
        $confirmPassword_err = "Please confirm password.";
    } elseif (trim($_POST["password"]) != trim($_POST["confirmPassword"])) {
        $confirmPassword_err = "Passwords should match.";
    } else {
        $confirmPassword = trim($_POST["confirmPassword"]);
    }

    // If there are no errors, go ahead and insert into the database
    if (empty($username_err) && empty($password_err) && empty($confirmPassword_err)) {
        $sql = "INSERT INTO users1 (username, password) VALUES (?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set these parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            // Try to execute query
            if (mysqli_stmt_execute($stmt)) {
                header("Location: login.php");
            } else {
                echo "Something went wrong... Cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Portfolio Website</title>
    <link rel="stylesheet" href="signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header>
        <nav>
            <div class="left">Evita Barboza's Portfolio</div>
            <div class="right">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="contact.php">Contact Me</a></li>
                    <li><a href="signup.php">Login/SignUp</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="firstSection">
            <div>
                <h2 style="padding: 30px;">Signup:</h2>
                <form id="signupForm" action="signup.php" method="POST" onsubmit="return validateSignupForm()">
                    <label for="username">Username: </label>
                    <input type="text" id="username" name="username" required><br><br>
                    <!-- <label for="email">Email: </label>
                    <input type="email" id="email" name="email" required><br><br> -->
                    <label for="password">Password: </label>
                    <input type="password" id="password" name="password" required><br><br>
                    <label for="confirmPassword">Confirm Password: </label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>
                    <input type="submit" value="Signup"><br><br>
                    <p style="text-align: center;"><small>Already have an account? <br><a href="login.html"> Click Here</a> to Login</small></p>
                </form>
            </div>
        </section>
    </main>


    <footer>
        <div class="footer">
            <div class="footerfirst">
                <h3>Evita's Developer Portfolio</h3>
            </div>
            <div class="footersecond">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    
                </ul>
            </div>
            <div class="footerthird">
                <ul>
                    <li><i class="fab fa-instagram"></i> <a href="https://www.instagram.com/">Instagram</a></li>
                    <li><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/feed/">LinkedIn</a> </li>
                    <li><i class="fab fa-github"></i> <a href="https://github.com/evitabarboza">Github</a></li>
                    <li><i class="fab fa-twitter"></i> <a href="https://twitter.com/?lang=en">Twitter</a></li>
                </ul>
                </ul>
            </div>
        </div>
        <div class="footer-rights">
            Copyright &copy; www.sharonportfolio.com | All Rights Reserved
        </div>
    </footer>


</body>

</html>
