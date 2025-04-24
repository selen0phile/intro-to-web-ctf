<?php
// Secret flag is only shown if a specific eval'd command is passed
$flag = "FLAG{math_is_just_fancy_guessing}";
$input = '';
$result = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['expression'] ?? '';
    
    try {
        // Dangerously evaluate the math expression (or anything, really)
        $output = eval("\$result = $input;");
    } catch (Throwable $e) {
        $result = "Error: " . htmlspecialchars($e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Challenge: Evil Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #222; color: #fff; }
        .jumbotron { background-color: #444; border-radius: 10px; padding: 2rem; }
        .form-control, .btn { border-radius: 0.5rem; }
        .flag-text { color: #4caf50; font-weight: bold; font-size: 1.2rem; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="mb-4">🧮 Evil Calculator</h1>
            <p class="lead">Enter a math expression. Definitely nothing sketchy allowed here...</p>
            <form method="POST" class="mb-4">
                <input type="text" name="expression" class="form-control mb-2" placeholder="Try something like 5+5" value="<?php echo htmlspecialchars($input); ?>">
                <button type="submit" class="btn btn-primary">Calculate</button>
            </form>

            <?php if ($result !== ''): ?>
                <p class="lead">Result: <strong><?php echo htmlspecialchars($result); ?></strong></p>
            <?php endif; ?>

            <?php if (str_contains($input, 'echo') && str_contains($input, '$flag')): ?>
                <div class="mt-3">
                    <p class="flag-text">Flag: <?php echo $flag; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
