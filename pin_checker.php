<?php
// Secret PIN (3-digit)
$secret_pin = "537";

// Default flag if incorrect
$flag = "";

// Check submitted PIN
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_pin = isset($_POST['pin']) ? $_POST['pin'] : '';

    if ($input_pin === $secret_pin) {
        $flag = "FLAG{brute_force_like_its_1999}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo Booth PIN Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #212529;
            color: white;
        }
        .container {
            margin-top: 100px;
        }
        .form-control {
            max-width: 200px;
            margin: 0 auto;
        }
        .flag-box {
            font-size: 1.4rem;
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1 class="mb-4">🔒 Enter the PIN</h1>
        <form method="POST">
            <input type="number" name="pin" class="form-control mb-3" placeholder="000 - 999" min="0" max="999" required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="mt-4">
            <p class="flag-box"><?php echo $flag; ?></p>
        </div>
    </div>
</body>
</html>
