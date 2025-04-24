<?php
$output = '🌀 Waiting for ping...';
// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target = $_POST['host'] ?? '';
    $output = shell_exec("ping -n 1 $target"); // ⚠️ Intentional vulnerability for challenge
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🏓 Ping Pong Playground</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1e1e1e;
            color: #fff;
        }
        .jumbotron {
            background-color: #2c3e50;
            color: white;
            border-radius: 10px;
        }
        .container {
            margin-top: 60px;
        }
        .form-control {
            background-color: #2b2b2b;
            border: 1px solid #555;
            color: white;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .footer {
            background-color: #111;
            color: #aaa;
            padding: 10px;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
        pre {
            background-color: #151515;
            padding: 12px;
            border-radius: 6px;
            color: #00ff00;
            font-size: 0.9rem;
        }
        .alert-info, .alert-warning {
            background-color: #3e3e3e;
            border: none;
            color: #ffc107;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">🏓 Ping Pong Playground</h1>
            <hr class="my-4">
            <p class="lead">Ping a host and watch the magic happen... or mischief 😏</p>

            <div class="alert alert-warning">
                🎯 Goal: Retrieve the <code>ping_pong_flag.txt</code> file using your skills. <br>
                🤔 Can you chain your command?
            </div>

            <form method="POST" class="mb-4">
                <input type="text" name="host" class="form-control mb-2" placeholder="e.g. www.google.com">
                <button type="submit" class="btn btn-danger">🔥 Ping!</button>
            </form>

            <?php if ($output): ?>
                <div class="text-left mt-4">
                    <h5>📡 Output:</h5>
                    <pre><?php echo htmlspecialchars($output); ?></pre>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Web CTF Challenge – Hack responsibly 🧠💥</p>
    </footer>
</body>
</html>
