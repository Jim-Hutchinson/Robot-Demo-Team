<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Run Python Script</title>
    <script>
        function runPythonScript() {
            // Create an AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "run_script.php", true); // Call the PHP file
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Display the result from the Python script
                    document.getElementById("output").innerHTML = xhr.responseText;
                }
            };
            xhr.send(); // Send the request
        }
    </script>
</head>
<body>
    <h1>Run Python Script from PHP</h1>
    <button onclick="runPythonScript()">Run Script</button>
    <div id="output"></div> <!-- Div to display the output -->
</body>
</html>
