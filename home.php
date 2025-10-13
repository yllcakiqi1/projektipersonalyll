<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Appointment System - Home</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f7f9fc;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        nav {
            background: #0077b6;
            padding: 15px 30px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav .logo {
            font-weight: bold;
            font-size: 1.5rem;
            letter-spacing: 2px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #90e0ef;
        }

        /* Main container */
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            color: #023e8a;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #555;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 25px;
        }

        .buttons a button {
            background: #0077b6;
            border: none;
            color: white;
            padding: 15px 40px;
            font-size: 1.1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
            font-weight: 600;
            box-shadow: 0 4px 8px rgba(0, 119, 182, 0.3);
        }

        .buttons a button:hover {
            background: #023e8a;
            box-shadow: 0 6px 12px rgba(2, 62, 138, 0.6);
        }

        /* Guest credentials */
        .guest-info {
            font-size: 1rem;
            color: #333;
            margin-top: 10px;
        }

        .guest-info b {
            color: #0077b6;
        }

        /* Footer with social links */
        footer {
            margin-top: auto;
            background: #023e8a;
            color: white;
            padding: 15px 30px;
            text-align: center;
        }

        footer .social-links {
            margin-top: 10px;
        }

        footer .social-links a {
            color: white;
            margin: 0 15px;
            font-size: 1.5rem;
            text-decoration: none;
            transition: color 0.3s ease;
            vertical-align: middle;
        }

        footer .social-links a:hover {
            color: #90e0ef;
        }

        /* Import FontAwesome for icons */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');

        /* Responsive */
        @media (max-width: 600px) {
            .buttons {
                flex-direction: column;
            }

            .buttons a button {
                width: 100%;
            }

            nav ul {
                gap: 15px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="logo">AppointmentSys</div>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="book.php">Book Appointment</a></li>
            <li><a href="dashboard.php">Admin Dashboard</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Welcome to the Appointment System</h1>
        <p>Choose how you want to continue:</p>
        <div class="buttons">
            <a href="login.php"><button>Admin Login</button></a>
            <a href="login.php"><button>Guest Login</button></a>
        </div>
        <p class="guest-info">Guest credentials: <b>username: guest</b>, <b>password: guest123</b></p>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Appointment System
        <div class="social-links" aria-label="Social Media Links">
            <a href="https://twitter.com/yourhandle" target="_blank" rel="noopener" aria-label="Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://instagram.com/yourhandle" target="_blank" rel="noopener" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://facebook.com/yourhandle" target="_blank" rel="noopener" aria-label="Facebook">
                <i class="fab fa-facebook"></i>
            </a>
        </div>
    </footer>

</body>
</html>
