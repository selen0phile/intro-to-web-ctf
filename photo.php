<?php
// Set the path for uploads and the allowed file extensions
$upload_dir = 'uploads/';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    // Get file details
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    
    // Get file extension
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    // Check for upload errors
    if ($file_error !== 0) {
        echo "Error during file upload!";
        exit;
    }

    // Move the uploaded file to the uploads directory
    $upload_path = $upload_dir . basename($file_name);
    if (move_uploaded_file($file_tmp, $upload_path)) {
        echo "Profile picture uploaded successfully! You can now view it: <br><a href='" . $upload_path . "' target='_blank'>View Profile Picture</a>";
    } else {
        echo "Failed to upload file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Booth Challenge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #212529;
            color: white;
        }
        .container {
            margin-top: 50px;
        }
        .jumbotron {
            background-color: #343a40;
            color: white;
            padding: 2rem;
            border-radius: 1rem;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>📸 Photo Booth Challenge</h1>
            <p class="lead">Upload your best profile picture for your photo booth!</p>
            
            <!-- File upload form -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="file" class="form-label">Choose a profile picture:</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</body>
</html>
