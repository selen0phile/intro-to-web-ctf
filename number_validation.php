<?php
// Default incorrect flag
$flag = "🚫 FLAG{incorrect_value}";

// Correct value for validation
$correctValue = 12345;

// Check if the user submitted a value
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userValue = isset($_POST['value']) ? $_POST['value'] : '';

    // Server-side check
    if ($userValue == $correctValue) {
        $flag = "🏁 FLAG{cracked_the_cipher_12342_flex}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🔢 Challenge: Number Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: white;
        }
        .container {
            margin-top: 60px;
        }
        .form-control {
            background-color: #1e1e1e;
            border: 1px solid #555;
            color: white;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .alert {
            border-radius: 10px;
        }
    </style>
    <script>
        // XOR-based validation — reversible by nature 😉
        function validateNumber(num) {
            let x = num;
            for(let i = 0; i < 3453; i++) x ^= i;
            return x === 15685;
        }

        function submitValue() {
            const inputValue = document.getElementById("numberInput").value;
            if (validateNumber(Number(inputValue))) {
                const form = document.getElementById("numberForm");
                const inputField = document.getElementById("hiddenInput");
                inputField.value = inputValue;
                form.submit();
            } else {
                alert("❌ Nope! Try again.");
            }
        }
    </script>
</head>
<body>
    <div class="container text-center">
        <h2 class="mb-3">🧠 Number Validation</h2>
        <p class="lead">Can you crack the code and reveal the flag? 🔍</p>

        <form id="numberForm" method="POST" class="mb-4">
            <input type="hidden" name="value" id="hiddenInput">
            <input type="number" id="numberInput" class="form-control mb-3" placeholder="🔢 Enter the magic number" required>
            <button type="button" onclick="submitValue()" class="btn btn-primary">✨ Validate and Get Flag</button>
        </form>

        <?php if ($flag !== "🚫 FLAG{incorrect_value}") : ?>
            <div class="alert alert-success">
                🎉 <strong>Well done!</strong> You unlocked the flag: <code><?php echo $flag; ?></code>
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                😬 <strong>Wrong Value!</strong> Give it another shot.
            </div>
        <?php endif; ?>

        <div class="alert alert-info mt-4">
            💡 Hint: XOR is magical ✨ — you can reverse it if you know the steps!
        </div>
    </div>
</body>
</html>
