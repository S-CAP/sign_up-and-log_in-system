 <?php
    include("conn.php");


    if (isset($_POST["submit"])) {

        $name = $_POST['name'];
        $number = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        $sql = "SELECT * from data WHERE email='$email' ";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            echo "sucess";

            header('Location:login.php');
        } else {
            echo "error";
        }


        $sql = " INSERT INTO  data (name, phone, email, password)
        values('$name', '$number', '$email', '$password');";

        $query = mysqli_query($conn, $sql);
    }



    ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>registration page</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 </head>

 <body>


     <div class="container col-sm-4 ">
         <div class="mt-5">
             <h1>Register</h1>
             <p>Fill this form to create an account</p>
         </div>


         <form method="POST">
             <div class="mb-3">
                 <label for="name" class="form-label">Name</label>
                 <input type="text" name="name" class="form-control" id="name" placeholder="enter your name" required>

             </div>
             <div class="mb-3">
                 <label for="phone" class="form-label">Phone</label>
                 <input type="number" name="phone" class="form-control" id="phone" placeholder="enter your number" required>

             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Email address</label>
                 <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your email" required>

             </div>
             <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">Password</label>
                 <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="enter your password" required>

             </div>
             <div class="mb-3">
                 <label for="confirm_password" class="form-label">Confirm password</label>
                 <input type="password" class="form-control" id="confirmpassword" name="confirm" placeholder="confirm your password" required>
             </div>


             <button type="submit" name="submit" class="btn btn-primary">submit</button>

             <br>
             <br>

             <div class="mt-1 text-center">
                 <p class="mt-2">Already have an account ?</p>
                 <a href="login.php" class="text-decoration-none">Login here</a>
             </div>

         </form>
     </div>







     <!-- JavaScript Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 </body>

 </html>