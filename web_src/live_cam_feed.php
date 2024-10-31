<?PHP
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>●Live Robot Camera</title>
</head>
<?PHP
echo shell_exec("python test.py 'parameter1'");
?>
</head>