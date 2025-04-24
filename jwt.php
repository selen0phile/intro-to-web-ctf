<?php
// Secret key for signing and verifying JWT
$secret_key = '12345'; 

function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}


// Base64url decode (restores padding and replaces -_ with +/)
function base64url_decode($data) {
    $remainder = strlen($data) % 4;
    if ($remainder > 0) {
        $data .= str_repeat('=', 4 - $remainder);
    }
    return base64_decode(strtr($data, '-_', '+/'));
}

// Function to create JWT
function createJWT($payload, $key) {
    $header = ['alg' => 'HS256', 'typ' => 'JWT'];

    $encoded_header = base64url_encode(json_encode($header));
    $encoded_payload = base64url_encode(json_encode($payload));

    $signature = hash_hmac('sha256', "$encoded_header.$encoded_payload", $key, true);
    $encoded_signature = base64url_encode($signature);

    return "$encoded_header.$encoded_payload.$encoded_signature";
}

// Function to decode JWT and verify signature
function decodeJWT($jwt, $key) {
    list($encoded_header, $encoded_payload, $encoded_signature) = explode('.', $jwt);

    $signature = hash_hmac('sha256', "$encoded_header.$encoded_payload", $key, true);
    $expected_signature = base64url_encode($signature);

    if (!hash_equals($expected_signature, $encoded_signature)) {
        return false; // Signature mismatch
    }

    return json_decode(base64url_decode($encoded_payload), true);
}

// Default role
$role = 'user'; 

// Check if JWT cookie exists
if (isset($_COOKIE['jwt'])) {
    $jwt = $_COOKIE['jwt'];
    $decoded = decodeJWT($jwt, $secret_key);
    
    if ($decoded && isset($decoded['role']) && $decoded['role'] === 'admin') {
        $role = 'admin'; // User is admin
    }
}

// Generate a JWT for initial state
if (!isset($_COOKIE['jwt'])) {
    $initial_payload = ['role' => 'user'];
    $jwt = createJWT($initial_payload, $secret_key);
    setcookie('jwt', $jwt, time() + 3600, '/'); // Set the JWT cookie for 1 hour
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JWT Manipulation Challenge 🌐</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #333;
            color: white;
        }
        .container {
            margin-top: 50px;
        }
        .flag {
            font-size: 1.5rem;
            color: #28a745;
            font-weight: bold;
        }
        .alert {
            font-size: 1.2rem;
        }
        .emoji {
            font-size: 3rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>JWT Manipulation Challenge 🧩</h1>
        <p>Use your knowledge to manipulate the JWT and become an <strong>admin</strong>! 🕵️‍♂️</p>

        <div class="mt-4">
            <?php if ($role === 'admin'): ?>
                <p class="alert alert-success">🎉 Congratulations! You are an admin. Here's the flag:</p>
                <p class="flag">🎯 FLAG{you_manipulated_the_jwt_successfully!}</p>
            <?php else: ?>
                <p class="alert alert-danger">🚫 You are not an admin. Try again!</p>
                <p>Current Role: <strong><?php echo htmlspecialchars($role); ?> 🌟</strong></p>
                <p>Hint: Try manipulating the JWT cookie to gain admin access! 🔐</p>
                <p>Cookie: <code>jwt=<?php echo htmlspecialchars($jwt); ?></code></p>
                <p>Decoded JWT: <code><?php echo htmlspecialchars(json_encode($decoded)); ?></code></p>
            <?php endif; ?>
        </div>

        <div class="mt-5">
            <p>💡 <strong>Hint:</strong> Use JWT decoding tools like <a href="https://jwt.io/" target="_blank">jwt.io</a> to decode and manipulate the token!</p>
        </div>

        <div class="mt-5">
            <p>🤖 Feel free to experiment by modifying the JWT! Here are some emojis to get you in the mood:</p>
            <div>
                <span class="emoji" onclick="alert('Admin powers unlocked! 💪')">🦸‍♂️</span>
                <span class="emoji" onclick="alert('Maybe you can try changing something? 🤔')">🔧</span>
                <span class="emoji" onclick="alert('Good luck! 🍀')">🍀</span>
            </div>
        </div>
    </div>
</body>
</html>
