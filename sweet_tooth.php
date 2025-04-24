<?php
// Start the session
session_start();

// Check if the 'role' cookie exists, if not, set it to 'user' by default
if (!isset($_COOKIE['role'])) {
    setcookie('role', 'user', time() + 3600, '/');
    $_COOKIE['role'] = 'user';
}

// Check if the user is admin or not
$isAdmin = ($_COOKIE['role'] === 'admin') ? true : false;

// Show the page content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sweet Tooth 🍪</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212; /* Dark mode background */
            color: white;
        }
        .container {
            margin-top: 50px;
        }
        .alert {
            padding: 20px;
            border-radius: 10px;
        }
        .alert-success {
            background-color: #28a745; /* Green for success */
            color: #ffffff;
        }
        .alert-danger {
            background-color: #dc3545; /* Red for danger */
            color: #ffffff;
        }
        .alert-secondary {
            background-color: #6c757d; /* Gray for neutral */
            color: #ffffff;
        }
        .hint {
            margin-top: 20px;
            font-size: 1.2rem;
            font-weight: bold;
        }
        .hint-text {
            font-style: italic;
            color: #ffeb3b; /* Bright yellow hint */
        }
        .emoji {
            font-size: 2rem; /* Bigger emojis */
        }
        .title {
            color: #ff5722; /* Vibrant color for the title */
        }
        .lead {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2 class="display-4 title mb-3">Sweet Tooth 🍪</h2>
        <p class="lead">You are logged in as a <strong><?php echo $_COOKIE['role']; ?></strong>.</p>
        
        <?php if ($isAdmin): ?>
            <div class="alert alert-success">
                <h4 class="emoji">Admin Access Granted! 🎉</h4>
                <p>Looks like you've got a sweet tooth for the good stuff. Here's your prize: <strong>FLAG{baked_in_the_oven}</strong></p>
                <p><i>Congratulations on finding the secret ingredient! 🍪</i></p>
            </div>
        <?php else: ?>
            <div class="alert alert-danger">
                <h4 class="emoji">You are not an admin. 😔</h4>
                <p>Sometimes the right ingredients make all the difference... Can you find the secret ingredient of baking cookies?</p>
                <div class="hint">
                    <p class="hint-text">Look around carefully; it's a sweet surprise you might miss! 🍪🔍</p>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Visual cue to keep exploring -->
        <div class="alert alert-secondary">
            <p><span class="emoji">🔍</span> Keep exploring, you might discover something hidden around the page!<span class="emoji">👀</span></p>
        </div>
    </div>
</body>
</html>
