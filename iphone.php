<?php
// Secret User-Agent to trigger the flag
$correct_user_agent = "iphone";

// Check if the correct User-Agent is set
if (strstr($_SERVER['HTTP_USER_AGENT'], $correct_user_agent)) {
    // Display the flag if User-Agent matches
    echo "<div class='alert alert-success'>🎉 Correct User-Agent! Here's your flag: FLAG{user_agent_is_not_so_reliable}</div>";
} else {
    // Display a hint if the User-Agent does not match
    echo "<div class='alert alert-info'>💀 Please login from an iPhone</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Agent Challenge 🔑</title>
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
        <h1 class="header mb-4">User-Agent Challenge 🔑</h1>
        <p class="lead">To solve this challenge, you need to login from an iPhone, or do you?</p>

        <div class="alert">💡 Hint: Inspect your browser's User-Agent header to get a clue on what to change.</div>
        
        <!-- Instructions -->
        <div class="alert border-warning">⚠️ The flag will only appear if you send the right User-Agent. Modify your request!</div>
    </div>
</body>
</html>
