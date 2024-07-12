<?php
// Start a new session or resume the existing session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user"])) {
   // Redirect the user to the login page if not logged in
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>User Dashboard</title>
    <style>
        body {
            margin: 0;
            background-color: #f0f8ff;
            font-family: 'Arial', sans-serif;
        }
        .content {
            padding: 20px;
        }
        .nav-link {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #000;
            text-decoration: none;
            overflow: hidden;
            transition: color 0.4s;
        }
        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            transition: left 0.4s;
        }
        .nav-link:hover::before {
            left: 0;
        }
        .nav-link:hover {
            color: #FFFDB5;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            width: 100%;
            max-width: 18rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 10px;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }
        .card-text {
            font-size: 1rem;
            color: #555;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .footer {
            background-color: #9CDBA6;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #9CDBA6;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-weight: bold; font-size: 1.5rem; color: #fff;">
                <img src="image/logo.jfif" style="height: 40px; margin-right: 10px; border-radius: 50%;">
                BEASTMODE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inventory.php">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#notifications">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="card-container">
            <div class="card" style="transition: transform 0.3s ease;">
                <img src="image/logo.jfif" alt="Card 1">
                <div class="card-body">
                    <h5 class="card-title">YouTube</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="https://www.youtube.com/" class="btn btn-primary" style="transition: background-color 0.3s ease;">YouTube</a>
                </div>
            </div>
            <div class="card" style="transition: transform 0.3s ease;">
                <img src="image/logo.jfif" alt="Card 2">
                <div class="card-body">
                    <h5 class="card-title">Netflix</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="https://www.netflix.com/browse" class="btn btn-primary" style="transition: background-color 0.3s ease;">Netflix</a>
                </div>
            </div>
            <div class="card" style="transition: transform 0.3s ease;">
                <img src="image/logo.jfif" alt="Card 3">
                <div class="card-body">
                    <h5 class="card-title">Card 3</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="note/note3.php" class="btn btn-primary" style="transition: background-color 0.3s ease;">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="transition: transform 0.3s ease;">
                <img src="image/logo.jfif" alt="Card 4">
                <div class="card-body">
                    <h5 class="card-title">Card 4</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="note/note4.php" class="btn btn-primary" style="transition: background-color 0.3s ease;">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    
    <h1 class="text-center my-4" style="text-decoration: underline; font-size: 2.5rem; color: black;">Learnings</h1>
    <style>
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
        }
    </style>

    <div class="content">
        <div class="card-container">
            <div class="card" style="transition: transform 0.3s ease;">
                <img src="image/logo.jfif" alt="Card 1">
                <div class="card-body">
                    <h5 class="card-title">W3schools</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="https://www.w3schools.com/" class="btn btn-primary" style="transition: background-color 0.3s ease;">W3schools</a>
                </div>
            </div>
            <div class="card" style="transition: transform 0.3s ease;">
                <img src="image/logo.jfif" alt="Card 2">
                <div class="card-body">
                    <h5 class="card-title">Netflix</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="https://www.netflix.com/browse" class="btn btn-primary" style="transition: background-color 0.3s ease;">Netflix</a>
                </div>
            </div>
            <div class="card" style="transition: transform 0.3s ease;">
                <img src="image/logo.jfif" alt="Card 3">
                <div class="card-body">
                    <h5 class="card-title">Card 3</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="note/note3.php" class="btn btn-primary" style="transition: background-color 0.3s ease;">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="transition: transform 0.3s ease;">
                <img src="image/logo.jfif" alt="Card 4">
                <div class="card-body">
                    <h5 class="card-title">Card 4</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="note/note4.php" class="btn btn-primary" style="transition: background-color 0.3s ease;">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        &copy; 2023 BEASTMODE. All rights reserved.
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzOg6ubJp6b2Q6A6z9E+Yd2I4p5h5K5R6cpk6J6p6g6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IQsoLXlYQd6Q6p6b2Q6A6z9E+Yd2I4p5h5K5R6cpk6J6p6g6" crossorigin="anonymous"></script>
</body>
</html>