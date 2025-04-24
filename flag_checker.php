<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flag Checker - Frontend</title>
    <script src="https://cdn.jsdelivr.net/npm/js-md5@0.7.3/build/md5.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1e1e1e;
            color: white;
        }
        .container {
            margin-top: 50px;
        }
        .result {
            margin-top: 20px;
        }
        .correct {
            color: #28a745;
        }
        .incorrect {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>🔍 Flag Checker - Frontend</h1>
        <p>⚡ Enter the flag, split by underscores.</p>
        
        <form id="flagForm">
            <input type="text" id="flagInput" class="form-control mb-3" placeholder="Enter Flag (e.g., FLAG{this_is_not_secure})">
            <button type="submit" class="btn btn-success">Check Flag</button>
        </form>

        <div id="result" class="result"></div>
    </div>

    <script>
        // Correct flag parts
        const correctMD5Hashes = [
            "1bc29b36f623ba82aaf6724fd3b16718",
            "a2a551a6458a8de22446cc76d639a9e9",
            "7927be390e743cc4cee581d12d029078",
            "66f7eb9a8cfd745c8dcfa668ae7064a6"
        ]
        document.getElementById('flagForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const inputFlag = document.getElementById('flagInput').value.trim();
            const flagParts = inputFlag.replace('FLAG{', '').replace('}', '').split('_');
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = '';  // Clear previous results

            if (flagParts.length !== correctMD5Hashes.length) {
                resultDiv.innerHTML = '<p class="incorrect">❌ Wrong number of parts in the flag!</p>';
                return;
            }

            let correctCount = 0;
            flagParts.forEach((part, index) => {
                const inputHash = md5(part);
                if (inputHash === correctMD5Hashes[index]) {
                    resultDiv.innerHTML += `<p class="correct">✅ Part ${index + 1} is correct: "${part}"</p>`;
                    correctCount++;
                } else {
                    resultDiv.innerHTML += `<p class="incorrect">❌ Part ${index + 1} is incorrect: "${part}"</p>`;
                }
            });

            // If all parts are correct, show the flag
            if (correctCount === correctMD5Hashes.length) {
                resultDiv.innerHTML += `<p class="correct">🎉 Full flag correct! FLAG{${flagParts.join('_')}}🎉</p>`;
            }
        });
    </script>
</body>
</html>
