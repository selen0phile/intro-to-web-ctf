<?php
// Directory contents
$files = [
    'iphone.php',
    'calculator.php',
    'console_confessions.php',
    'cookies.php',
    'emoji.php',
    'flag_checker.php',
    'hidden.php',
    'input_override.php',
    'jwt.php',
    'md5_magic.php',
    'methods.php',
    'number_validation.php',
    'photo.php',
    'pin_checker.php',
    'ping_challenge.php',
    'profile_peek.php',
    'race_against_time.php',
    'secret_header.php',
    'sneaky_requests.php',
    'source_seeker.php',
    'sqli.php',
    'sweet_tooth.php',
    'theme_explorer.php',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web CTF Challenges 🧩</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: white;
        }
        .container {
            margin-top: 50px;
        }
        .alert {
            padding: 15px;
            border-radius: 10px;
            font-size: 1.2rem;
        }
        .alert-info {
            background-color: #17a2b8;
            color: #fff;
        }
        .alert-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .alert-success {
            background-color: #28a745;
            color: #fff;
        }
        .alert-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .challenge-list {
            list-style-type: none;
            padding: 0;
        }
        .challenge-list li {
            background-color: #1e1e1e;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .challenge-list li a {
            color: #ffffff;
            text-decoration: none;
        }
        .challenge-list li a:hover {
            text-decoration: underline;
        }
        .emoji {
            font-size: 1.5rem;
        }
        .header {
            font-size: 2.5rem;
            color: #ff5722;
        }
        .lead {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1 class="header mb-4">Web CTF Challenges 🧩</h1>
        <p class="lead">Choose a challenge below to start your journey. ✨</p>

        <!-- Instructions and alerts -->
        <div class="alert alert-info">Explore and have fun! 💻 You can inspect the network tab for hidden flags! 👀</div>
        <div class="alert alert-warning">Hint: Look for hidden files and headers! 🕵️‍♂️</div>

        <!-- Challenge List -->
        <ul class="challenge-list">
            <?php foreach ($files as $file): ?>
                <li>
                    <span class="emoji">🔍</span>
                    <a href="<?php echo $file; ?>" target="_blank"><?php echo htmlspecialchars($file); ?></a>
                    <span class="emoji">➡️</span>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <!-- Footer with some humor -->
        <div class="alert alert-success mt-5">
            <p>Good luck on your CTF journey! 🍀 Keep hunting for those flags! 🔑</p>
        </div>
    </div>
</body>
</html>
