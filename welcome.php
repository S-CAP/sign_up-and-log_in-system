<?php
// start session
session_start();
// check is user is not logged in then redirect the user to login page
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head>

<body>
    <div class="container text-center">
        <div>
            <h1>hello,<strong><?php echo $_SESSION["name"]; ?></strong>welcome here</h1>
        </div>
    </div>

</body>

</html>