<?php
// Default incorrect flag
$flag = "FLAG{incorrect_value}";

// Connect to SQLite database using PDO
try {
    $db = new PDO('sqlite:users.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the table (you can create the table manually if running this challenge multiple times)
    $db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, username TEXT, password TEXT)");
    $db->exec("INSERT OR IGNORE INTO users (username, password) VALUES ('admin', 'password123')");

    // Check if the user submitted 'username' and 'password' parameters
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Simple query that is vulnerable to SQL injection
        $stmt = $db->prepare("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        
        // Execute the query and get the result
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the query returned any rows (successful login)
        if ($user && $user['username'] == 'admin') {
            $flag = "FLAG{sql_injection_is_fun}";
        }
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SQL Injection CTF Challenge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #212529; color: white; }
        .container { margin-top: 50px; }
        .jumbotron { background-color: #343a40; padding: 2rem; border-radius: 1rem; }
        .flag-text { color: #4caf50; font-weight: bold; font-size: 1.3rem; }
        .alert-warning { color: #ffcc00; }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>🔐 SQL Injection CTF Challenge</h1>
            <p class="lead">Can you manipulate the SQL query and login as the admin?</p>

            <!-- Login Form -->
            <form method="POST" action="" class="mb-4">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group mt-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Login</button>
            </form>

            <?php if ($flag !== "FLAG{incorrect_value}"): ?>
                <p class="flag-text">Flag: <?php echo $flag; ?></p>
            <?php else: ?>
                <p class="alert-warning">Hint: Try SQL injection to bypass the login. Can you login as 'admin'?</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
