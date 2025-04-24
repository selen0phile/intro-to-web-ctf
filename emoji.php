<?php
// Default incorrect flag
$flag = "";

// Connect to SQLite database using PDO
try {
    $db = new PDO('sqlite:sqli.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables if they don't exist
    $db->exec("CREATE TABLE IF NOT EXISTS emojis (id INTEGER PRIMARY KEY, emoji TEXT)");
    $db->exec("INSERT OR IGNORE INTO emojis (id, emoji) VALUES (1, '😀')");
    $db->exec("INSERT OR IGNORE INTO emojis (id, emoji) VALUES (2, '😂')");
    $db->exec("INSERT OR IGNORE INTO emojis (id, emoji) VALUES (3, '😎')");
    $db->exec("INSERT OR IGNORE INTO emojis (id, emoji) VALUES (4, '🥺')");

    $db->exec("CREATE TABLE IF NOT EXISTS flag (id INTEGER PRIMARY KEY, flag TEXT)");
    $db->exec("INSERT OR IGNORE INTO flag (id, flag) VALUES (1, 'FLAG{you_did_it_emoji_boss}')");

    // Get the 'id' from the GET parameter
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    // Check if 'id' is provided
    if ($id !== '') {
        // Vulnerable query using raw GET parameter (SQL Injection Vulnerability)
        $stmt = $db->prepare("SELECT emoji FROM emojis WHERE id = $id");
        $stmt->execute();
        $emoji = $stmt->fetch(PDO::FETCH_ASSOC);

        // If emoji is found, display it
        if ($emoji) {
            $emoji_display = $emoji['emoji'];
        } else {
            $emoji_display = "Emoji not found!";
        }

        // Attempt to get the flag from the 'flag' table (SQL Injection Vulnerability)
        $flag_stmt = $db->prepare("SELECT flag FROM flag WHERE id = 1");
        $flag_stmt->execute();
        $flag_row = $flag_stmt->fetch(PDO::FETCH_ASSOC);
        if ($flag_row) {
            $flag = $flag_row['flag'];
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
    <title>SQL Injection Emoji Challenge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #212529; color: white; }
        .container { margin-top: 50px; }
        .jumbotron { background-color: #343a40; padding: 2rem; border-radius: 1rem; }
        .emoji-list { display: flex; gap: 10px; justify-content: center; }
        .emoji { font-size: 2rem; cursor: pointer; }
        .emoji:hover { transform: scale(1.2); }
        .emoji-display { font-size: 5rem; text-align: center; }
        .flag-text { color: #4caf50; font-weight: bold; font-size: 1.3rem; }
        .alert-warning { color: #ffcc00; }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>💉 Emoji Challenge</h1>
            <p class="lead">Can you get the flag by clicking on the emojis?</p>

            <!-- Emoji List -->
            <h4>Click on an emoji to see it in large size:</h4>
            <div class="emoji-list">
                <a href="?id=1"><span class="emoji">😀</span></a>
                <a href="?id=2"><span class="emoji">😂</span></a>
                <a href="?id=3"><span class="emoji">😎</span></a>
                <a href="?id=4"><span class="emoji">🥺</span></a>
            </div>

            <!-- Display the emoji based on GET 'id' -->
            <div class="emoji-display mt-3">
                <p class="lead">Emoji with ID <?php echo htmlspecialchars($id); ?>: <h1><?php echo isset($emoji_display) ? htmlspecialchars($emoji_display) : 'N/A'; ?></h1></p>
            </div>
        </div>
    </div>
</body>
</html>
