<?php
include("conn.php");
include("session.php");


$error = "";


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (empty($email)) {
        // email validate
        $error = 'enter your email';
    }

    if (empty($password)) {

        $error = 'enter your password';
    }

    if (empty($error)) {
        if ($query = $conn->prepare("SELECT * FROM data WHERE email = '$email' ")) {
            $query->bind_param('s', $email);
            $query->execute();
            $row = $query->fetch();
            if ($row) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['user'] = $row;

                    // redirect
                    header("location: welcome.php");
                    exit;
                } else {
                    $error = "password is not valid";
                }
            } else {
                $error = "worng user";
            }
        }
        $query->close();
    }
    mysqli_close($conn);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container col-sm-4">
        <div class="mt-5">
            <h1>Please login</h1>
        </div>
        <form>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="username" name="username" class="form-control" id="username" placeholder="enter your user name">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" placeholder="enter your password">
            </div>

            <button type="submit" name="submit" class="btn btn-success"> <a href="welcome.php"></a> Log In</button>

            <div class="text-center">
                <p class="mt-3">Don't have an account?</p>
                <a href="registration.php" class="text-decoration-none">Register here</a>
            </div>


        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>