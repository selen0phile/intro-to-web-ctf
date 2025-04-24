<?php
// Simulating a fake login process

// Wrong credentials, so "login failed"
$username = $_POST['username'];
$password = $_POST['password'];

// Flag hidden in the JSON response if login fails
$response = array(
    'status' => 'fail',
    'message' => 'Invalid credentials.',
    'debug' => 'FLAG{hidden_in_network_response}'  // Flag hidden here!
);

header('Content-Type: application/json');
echo json_encode($response);
?>
