<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: main.php");
    exit();
}
include("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olympic Seating - Login/Register</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            border: none;
            outline: none;
            scroll-behavior: smooth;
        }

        :root {
            --bg-color: #FFFFFF;
            --secondary-bg-color: grey;
            --text-color: #000000;
            --main-color: #FFA500;
            --font-family: 'Poppins', sans-serif;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
        }

        body {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text-color);
            font-family: var(--font-family);
            user-select: none;
            overflow-x: hidden;
        }

        html::-webkit-scrollbar {
            width: 0.8em;
        }

        html::-webkit-scrollbar-track {
            background: var(--bg-color);
        }

        html::-webkit-scrollbar-thumb {
            background: var(--main-color);
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 3rem 9%;
            background: var(--main-color);
            filter: drop-shadow(10px);
            border-bottom: .1px solid var(--main-color);
            z-index: 100;
        }

        .nav-img {
            height: 5rem;
            width: 10rem;
        }

        @keyframes gradient {
            to {
                background-position: 200%;
            }
        }

        ul {
            list-style-type: none;
        }

        .navbar-nav .nav-link {
            font-size: 1.8rem;
            color: var(--text-color);
            margin-left: 1rem;
            font-weight: 800;
            transition: 0.3s ease;
            border-bottom: 3px solid transparent;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            transform: scale(1.1);
            background: linear-gradient(to right, #0085c7, #FCB131, #FFFFFF, #00A651, #EE334E);
            background-size: 200%;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient 2.5s linear infinite;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='blue' stroke-width='2' d='M4 7h22M4 15h22M4 23h22' /%3E%3C/svg%3E");
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                height: 0;
                overflow: hidden;
                transition: height 0.4s ease-in-out;
                display: flex;
                flex-direction: column;
            }

            .navbar-nav {
                gap: 1rem;
                text-align: center;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100%;
            }

            .navbar-collapse.show {
                height: auto !important;
            }
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4e54c8;
        }

        .form-container .btn-primary {
            background: #4e54c8;
            border: none;
        }

        .form-container .btn-primary:hover {
            background: #3c43a9;
        }

        .switch-link {
            text-align: center;
            margin-top: 10px;
        }

        .switch-link a {
            color: #4e54c8;
            text-decoration: none;
        }

        .switch-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <img class="nav-img" src="logo.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" id="loginButton" onclick="showLoginForm()">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="registerButton" onclick="showRegisterForm()">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="form-container" id="login-form">
        <h2>Login</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="loginUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="loginUsername" placeholder="Enter your username"
                    name="username" required maxlength="15">
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password"
                    name="password" required maxlength="15">
            </div>
            <div class="mb-3">
                <label for="accountType" class="form-label">Account Type</label>
                <select class="form-control" id="accountType" name="account_type" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="loginSubmit">Login</button>
        </form>
        <div class="switch-link">
            <p>Don't have an account? <a href="#" onclick="showRegisterForm()">Register here</a></p>
        </div>
    </div>



    <div class="form-container" id="register-form" style="display: none;">
        <h2>Register</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="registerName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="registerName" placeholder="Enter your name" name="full_name"
                    required maxlength="50">
            </div>
            <div class="mb-3">
                <label for="registerUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="registerUsername" placeholder="Enter your username"
                    name="username" required maxlength="15">
            </div>
            <div class="mb-3">
                <label for="registerEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="registerEmail" placeholder="Enter your email" name="email"
                    required maxlength="50">
            </div>
            <div class="mb-3">
                <label for="registerPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="registerPassword" placeholder="Create a password"
                    name="password" required maxlength="15">
            </div>
            <div class="mb-3">
                <label for="registerConfirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="registerConfirmPassword" name="confirm_password"
                    placeholder="Confirm your password" required maxlength="15">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="registerSubmit">Register</button>
        </form>
        <div class="switch-link">
            <p>Already have an account? <a href="#" onclick="showLoginForm()">Login here</a></p>
        </div>
    </div>

    <?php if (isset($_POST['registerSubmit'])) {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $checkQuery = "SELECT * FROM db_accounts WHERE email = '$email'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if ($password !== $confirm_password) {
            echo '<script>alert("Passwords do not match!")</script>';
        } else {
            if (mysqli_num_rows($checkResult) > 0) {
                echo '<script>alert("Email already in use. Please choose a different one.")</script>';
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO db_accounts (full_name, username, email, password) VALUES ('$full_name', '$username', '$email', '$hashed_password')";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo '<script>
                            alert("User registered successfully!");
                            window.location = "index.php";
                          </script>';
                    exit();
                } else {
                    echo '<script>alert("Error inserting data: ' . mysqli_error($conn) . '")</script>';
                }
            }
        }
    }

    if (isset($_POST['loginSubmit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $accountType = $_POST['account_type'];

        $query = "SELECT * FROM db_accounts WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                // If the user is an admin and wants to log in as a user
                if ($accountType == 'user' && $user['account_type'] == 'admin') {
                    $_SESSION['username'] = $username;
                    $_SESSION['account_type'] = 'user'; // Set account type as 'user' even if it's an admin
                    echo '<script>alert("Login successful as User!"); window.location = "main.php";</script>';
                }
                // If the user is logging in as a user and is indeed a user
                elseif ($accountType == 'user' && $user['account_type'] == 'user') {
                    $_SESSION['username'] = $username;
                    $_SESSION['account_type'] = 'user';
                    echo '<script>alert("Login successful as User!"); window.location = "main.php";</script>';
                }
                // If the user is an admin and wants to log in as an admin
                elseif ($accountType == 'admin' && $user['account_type'] == 'admin') {
                    $_SESSION['username'] = $username;
                    $_SESSION['account_type'] = 'admin';
                    echo '<script>alert("Login successful as Admin!"); window.location = "main.php";</script>';
                } else {
                    echo '<script>alert("Incorrect account type!"); window.location = "index.php";</script>';
                }
            } else {
                echo '<script>alert("Incorrect password!"); window.location = "index.php";</script>';
            }
        } else {
            echo '<script>alert("User not found!"); window.location = "index.php";</script>';
        }
    }


    mysqli_close($conn); ?>

    <script>
        const toggler = document.querySelector('.navbar-toggler');
        const collapse = document.getElementById('navbarSupportedContent');

        toggler.addEventListener('click', function () {
            const isExpanded = toggler.getAttribute('aria-expanded') === 'true';
            toggler.setAttribute('aria-expanded', !isExpanded);
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth > 991.98) {
                collapse.classList.remove('show');
                toggler.setAttribute('aria-expanded', 'false');
            }
        });

        function showLoginForm() {
            // Show login form and hide register form
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';

            // Update active button state
            document.getElementById('loginButton').classList.add('active');
            document.getElementById('registerButton').classList.remove('active');
        }

        function showRegisterForm() {
            // Show register form and hide login form
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';

            // Update active button state
            document.getElementById('loginButton').classList.remove('active');
            document.getElementById('registerButton').classList.add('active');
        }

        // Get the password and confirm password fields
        const password = document.getElementById('registerPassword');
        const confirmPassword = document.getElementById('registerConfirmPassword');
        const registerForm = document.querySelector('#register-form form');

        // Event listener for form submission
        registerForm.addEventListener('submit', function (e) {
            if (password.value !== confirmPassword.value) {
                e.preventDefault();  // Prevent form submission if passwords don't match
                alert("Passwords do not match!"); // Show alert to the user
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>