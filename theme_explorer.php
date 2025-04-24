<?php
$theme = isset($_GET['theme']) ? $_GET['theme'] : 'light';

// Vulnerable inclusion (intentional for the CTF)
$base_dir = __DIR__ . '/includes/';
$theme_file = $base_dir . $theme;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Theme Explorer</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include($theme_file); ?>
<body>
  <div class="container text-center mt-5">
    <h1>🎨 Theme Explorer</h1>
    <p>Switch your theme:</p>
    <a class="btn btn-secondary m-2" href="?theme=dark">Dark Mode</a>
    <a class="btn btn-light m-2" href="?theme=light">Light Mode</a>
    <p class="text-muted mt-4">But what if you don't want a theme? 🤔</p>
    <div class="alert alert-info" role="alert">
        Try to get the flag! (hint: it's in the theme_flag.txt file in the parent directory)
    </div>
  </div>
</body>
</html>
