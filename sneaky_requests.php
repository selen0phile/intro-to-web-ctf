<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sneaky Requests 💀</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function submitForm() {
            // Simulate form submission
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "fake_login.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            
            // Fake credentials, these are wrong but we don't care right now
            var data = "username=wronguser&password=wrongpass";
            
            // Show loading message
            document.getElementById("error-message").style.display = "none";
            document.getElementById("loading-message").style.display = "block";
            
            // Listen for the response
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    
                    // Show the "Wrong Password" error message
                    if (response.status === "fail") {
                        document.getElementById("error-message").innerText = response.message;
                        document.getElementById("error-message").style.display = "block";
                    }
                    
                    // Simulate network response body (incorrect login) with hidden flag in response
                    console.log("Response Received:");
                    console.log(response);
                } else {
                    console.error("Failed to fetch data.");
                }

                // Hide the loading message after response is received
                document.getElementById("loading-message").style.display = "none";
            };
            
            xhr.send(data);
        }
    </script>
</head>
<body class="bg-dark text-white">
    <div class="container mt-5 text-center">
        <h2 class="mb-3">Sneaky Requests 💀</h2>
        <p class="lead">Try submitting the form, but the real flag is hidden elsewhere... 🔍</p>
        
        <form onsubmit="submitForm(); return false;">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit 🔑</button>
        </form>
        
        <!-- Loading message -->
        <div id="loading-message" class="alert alert-info mt-3" style="display:none;">Please wait... ⏳</div>
        
        <!-- Error message -->
        <div id="error-message" class="alert alert-danger mt-3" style="display:none;"></div>

        <div class="alert alert-secondary mt-4">
            <strong>Hint 💡:</strong> Inspect the <strong>Network tab</strong> after submission to find the flag. 🧐
        </div>
    </div>
</body>
</html>
