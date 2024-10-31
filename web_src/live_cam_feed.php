<?PHP
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>●Live Robot Camera</title>
</head>
<body>
    <h1>This page will display the live camera feed from the robot.</h1>
</body>
</head>
<?PHP
echo shell_exec(escapeshellcmd('camera.py'));
?>