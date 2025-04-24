<?php
// Default incorrect flag
$flag = "";

// Check the request method
$request_method = $_SERVER['REQUEST_METHOD'];

// Simulate flag based on request method
if ($request_method === 'POST') {
    $flag = "FLAG{thank_you_for_posting!";
} elseif ($request_method === 'GET') {
    $flag = "_you_got_it!}";
} elseif($request_method === 'PUT') {
    $flag = "_heading_towards_the_flag!";
} else {
    $flag = "😢 sad :(";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🧪 Challenge 5: HTTP Method Mayhem</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .jumbotron {
            background-color: #1f3b4d;
            color: #ffffff;
            border-radius: 12px;
        }
        .container {
            margin-top: 50px;
        }
        .footer {
            background-color: #1c1c1c;
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
            color: #ffc107;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">Ⓜ️ Method Mayhem</h1>
            <p class="lead">Use the right method and win the flag 🏁</p>
            <hr class="my-4">
            <p class="lead">You sent a <strong class="text-warning"><?php echo $request_method; ?></strong> request 🧪</p>
            <div class="mt-3">
                <p class='flag-text'>✨ <?php echo $flag; ?></p>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>💻 &copy; 2025 Web CTF Challenge | 🚀 Hack smart, not hard</p>
    </footer>
</body>
</html>
