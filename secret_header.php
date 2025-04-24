<?php
// Default incorrect flag
$flag = "FLAG{wrong_headers_make_me_sad}";

// send the flag in the header
header('X-Flag: ' . $flag);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Challenge 6</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: white;
        }
        .jumbotron {
            background-color: #356643;
            color: white;
            border-radius: 10px;
        }
        .container {
            margin-top: 50px;
        }
        .footer {
            background-color: #212529;
            color: white;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
        .lead {
            font-size: 1.2rem;
        }
        .flag-text {
            font-size: 1.4rem;
            font-weight: bold;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <p class="lead">The flag is hidden in the shadows... maybe your browser isn't enough to find it?</p>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Web CTF Challenge - Licensed to Leak Flags</p>
    </footer>
</body>
</html>
