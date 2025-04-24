<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>💀 Input Override</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-secondary text-white shadow-lg rounded-4 border-0">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4">🔐 Admin Login Portal</h2>
                        <p class="text-center">🔎 Looks normal... but is it really?</p>
                        <form method="POST" action="input_override.php">
                            <div class="mb-3">
                                <label class="form-label">👤 Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter your username">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">🔑 Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter your password">
                            </div>
                            <!-- 🔒 Seems harmless, right? -->
                            <input type="hidden" name="isAdmin" value="false" />
                            <button type="submit" class="btn btn-warning w-100">🚪 Login</button>
                        </form>
                        <?php
                        if ($_POST) {
                            if ($_POST['isAdmin'] === 'true') {
                                echo '<div class="alert alert-success mt-4">🎉 FLAG{you_changed_the_game}</div>';
                            } else {
                                echo '<div class="alert alert-danger mt-4">❌ Access Denied.</div>';
                            }
                        }
                        ?>
                        <div class="text-center mt-3 text-muted">
                            🧠 Think outside the input box...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
