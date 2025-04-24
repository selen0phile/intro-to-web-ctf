<?php
$flag = "FLAG{too_fast_too_curious}";
$show_flag = false;

// Get the current time value
$server_value = time();

// User guess from GET param
$user_value = isset($_GET['guess']) ? intval($_GET['guess']) : null;

if ($user_value !== null) {
    if ($user_value === $server_value) {
        $show_flag = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Race Against Time</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #212529;
            color: white;
        }
        .container {
            margin-top: 80px;
        }
        .flag-box {
            font-size: 1.4rem;
            font-weight: bold;
            color: #28a745;
        }
        .code-box {
            background-color: #343a40;
            padding: 10px;
            border-radius: 10px;
            margin-top: 10px;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>🚀 Race Against Time</h1>
        <br/>
        <h4><pre>Now: <?= $server_value ?></pre></h4>
        <p class="lead">Try to guess the current time based on <code>time()</code>... but the clock is ticking!</p>

        <form method="GET" class="mb-3">
            <input type="number" name="guess" class="form-control mb-2" placeholder="Enter your guess (Unix timestamp)" required>
            <button type="submit" class="btn btn-warning">Guess</button>
        </form>

        <?php if ($user_value !== null): ?>
            <div class="code-box">
                <p>⏳ You guessed: <strong><?= htmlspecialchars($user_value) ?></strong></p>
                <p>💻 Server value at time of request: <strong><?= $server_value ?></strong></p>
            </div>

            <?php if ($show_flag): ?>
                <p class="flag-box mt-3">🎉 Flag: <?= $flag ?></p>
            <?php else: ?>
                <p class="text-danger mt-3">❌ Close, but not fast enough!</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
