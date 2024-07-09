
<?php
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $role = $_POST['role'];

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'webpage1';

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO details2 (name, email, phone, company, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $company, $role);

    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Website</title>
    <link rel="stylesheet" href="contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
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
                <h2 style="padding: 30px;">Contact Details</h2>
                <form id="myForm" action="contact.php" method="post"  onsubmit="return validateForm(event)">
                    <label for="name">Name: </label>
                    <input type="text" id="name" name="name" required><br><br>
                    <label for="email">Email: </label>
                    <input type="email" id="email" name="email" required><br><br>
                    <label for="phone">Phone Number: </label>
                    <input type="text" id="phone" name="phone"><br><br>
                    <label for="company">Company Worked: </label>
                    <input type="text" id="company" name="company"><br><br>
                    <label for="role">Specific Role Desired: </label>
                    <input type="text" id="role" name="role"><br><br>
                    <input type="submit" value="Submit" name="submit"><br><br>
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

    <script src="script.js"></script>
</body>

</html>