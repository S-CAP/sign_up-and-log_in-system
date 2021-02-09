 <?php
    include("conn.php");

    $result = "SELECT * FROM data ";

    $query = mysqli_query($conn, $result);

    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>data display</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 </head>

 <body>
     <div class="container mt-5">

         <div class=" text-center mb-5">
             <h1>data display</h1>
         </div>

         <table class="table ">
             <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Name</th>
                     <th scope="col">phone</th>
                     <th scope="col">Email</th>

                 </tr>
             </thead>
             <tbody>
                 <?php
                    while ($row = mysqli_fetch_assoc($query)) {
                        // echo "<pre>";
                        // this is printing in array format
                        // print_r($row);



                    ?>
                     <tr>
                         <td>
                             <?php echo $row['id'] ?>
                         </td>
                         <td>
                             <?php echo $row['name'] ?>
                         </td>
                         <td>
                             <?php echo $row['phone'] ?>
                         </td>
                         <td>
                             <?php echo $row['email'] ?>
                         </td>

                     </tr>

                 <?php
                    }
                    ?>


             </tbody>
         </table>

     </div>


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 </body>

 </html>