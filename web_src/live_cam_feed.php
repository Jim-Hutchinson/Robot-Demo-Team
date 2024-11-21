<?PHP
require "../data_src/includes/sessioncheck.php";
if(!checklogged()){
  header("location:index.php?LoggedIn=False");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>●Live Robot Camera</title>
</head>
<body>
    <h1>This page will display the live camera feed from the robot.</h1>
    <form action="live_cam_feed.php" method="get">
        <input type="submit" name="Start_Video" value="Start Video"/>
    </form>
</body>
</head>



<?PHP
if(isset($_GET['Start_Video'])) {
    echo shell_exec(escapeshellcmd('camera.py'));
}
?>