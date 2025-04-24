<?php
// Default flag
$flag = "FLAG{incorrect_value}";

// Set a base64-encoded cookie for 'role'
if (!isset($_COOKIE['auth'])) {
    // Default 'guest' role encoded in base64
    setcookie('auth', base64_encode('guest'), time() + 3600); // 1 hour expiry
    $role = 'guest';
} else {
    $encoded_role = $_COOKIE['auth'];
    // Decode the base64 cookie
    $role = base64_decode($encoded_role);
}

$show_flag = false;

// Check if the decoded role is 'admin'
if ($role === 'admin') {
    $flag = "FLAG{base64_cookie_solved_well_done}";
    $show_flag = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookie Based Challenge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #212529; color: white; }
        .jumbotron { background-color: #343a40; padding: 2rem; border-radius: 1rem; }
        .flag-text { color: #4caf50; font-weight: bold; font-size: 1.3rem; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1>🍪 Cookie Challenge</h1>
            <p class="lead">Your role: <strong><?php echo htmlspecialchars($role); ?></strong></p>
            
            <?php if ($show_flag): ?>
                <p class="flag-text">Flag: <?php echo $flag; ?></p>
            <?php else: ?>
                <p class="text-warning">Access denied. You're still a guest.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
