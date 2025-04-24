<?php
$flag = "FLAG{php_magic_md5_trickery}";

// Get input
$user_input = isset($_GET['input']) ? $_GET['input'] : '';

$hash = md5($user_input);

// "Magic" comparison
if ($hash == '0e123456789012345678901234567890') {
    $result = "🎉 Congrats! Flag: $flag";
} else {
    $result = "❌ Nope. MD5 of your input is: $hash";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MD5 Magic</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #1c1c1c; color: #eee;">
<div class="container text-center mt-5">
    <h1>🔮 MD5 Magic Comparator</h1>
    <p>Can you find the magical input that passes our check?</p>
    <div class="alert alert-info" role="alert">
        md5(input) = 0e123456789012345678901234567890
    </div>
    <form method="GET" action="">
        <input type="text" name="input" class="form-control mb-2" placeholder="Enter something...">
        <button class="btn btn-primary">Check</button>
    </form>

    <?php if ($user_input !== ''): ?>
        <div class="mt-4">
            <p><?php echo htmlspecialchars($result); ?></p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
