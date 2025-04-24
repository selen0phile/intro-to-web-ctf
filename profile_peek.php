<?php
// Default incorrect flag
$flag = "FLAG{incorrect_value}";

// Simulate user data based on 'id' parameter
$user_data = [
    '1' => 'John Doe',
    '2' => 'Jane Smith',
    '3' => 'Alice Johnson',
    '4' => 'Bob Brown',
    '5' => 'Charlie Davis',
    '6' => 'Diana Garcia',
    '7' => 'Ethan Martinez',
    '8' => 'Fiona Lopez',
    '9' => 'Admin',
];

// Check if 'id' is set in the URL, default to empty if not
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Random "garbage" GET parameters
$garbage_params = isset($_GET['xyz']) ? $_GET['xyz'] : '';
$other_garbage = isset($_GET['random_param']) ? $_GET['random_param'] : '';

// Default redirect to simulate user profile if no 'id' is set
if ($id == '') {
    header('Location: profile_peek.php?id=1&xyz=foo&random_param=bar');
    exit;
}

// Check if the user ID exists in the simulated user data array
if (array_key_exists($id, $user_data)) {
    $user = $user_data[$id];

    // If it's the admin profile, set the flag
    if ($id === '9') {
        $flag = "FLAG{who_needs_permission_anyway} 🏆";
    }
} else {
    $user = "User not found 🚫";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Peek Challenge</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #222;
            color: white;
        }
        .jumbotron {
            background-color: black;
            color: white;
            border-radius: 10px;
        }
        .container {
            margin-top: 50px;
        }
        .footer {
            background-color: #212529;
            color: white;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
        .lead {
            font-size: 1.2rem;
        }
        .flag-text {
            font-size: 1.4rem;
            font-weight: bold;
            color: white;
        }
        .user-not-found {
            font-size: 1.4rem;
            color: red;
        }
        .alert-info {
            background-color: #6c757d;
            color: white;
        }
        .alert-danger {
            background-color: #dc3545;
            color: white;
        }
        .alert-success {
            background-color: #28a745;
            color: white;
        }
        .emoji {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">Profile Peek Challenge 👀</h1>
            <hr class="my-4">
            <p class="lead">Profile ID: <strong><?php echo htmlspecialchars($id); ?></strong></p>
            <div class="mt-3">
                <?php
                if ($user !== "User not found 🚫") {
                    echo "<p class='lead'>You are logged in as: <strong>" . htmlspecialchars($user) . "</strong></p>";
                    if ($id === '9') {
                        echo "<p class='flag-text'>" . $flag . "</p>";
                    }
                } else {
                    echo "<p class='user-not-found'>No such user found. Try modifying the URL! 🧐</p>";
                }
                ?>
            </div>
            <div class="alert alert-info">
                <strong>Hint 💡:</strong> Play around with the URL parameters. Sometimes, random things help! 🎯
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Web CTF Challenge - Dangerously Fun 🐚</p>
    </footer>
</body>
</html>
