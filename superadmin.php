<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_project";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Admin</title>
</head>
<body>
  
    <div class="container mt-4">

       

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border:none">
                    <div class="card-header" style="background-color:white">
                        <h4 style="text-align:center;color:grey">Details
                        </h4>
                        <a href="index.php" class="btn btn-secondary float-end">Back</a>
                    </div>
                 

                        <table class="table ">
                            <thead>
                             
                                <tr>
                            
                            <th>id</th>
                            <th>first_name</th>
                             <th>middle_name</th>
                             <th>last_name</th>
                            <th>family_name</th>
                            <th>salary</th>

                             <th>type</th>
                        
                      
   
  </tr>
                             
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM users where user_type ='admin' OR user_type = 'user'";
                              
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['first_name']; ?></td>                                                                                        
                                                <td><?= $row['middle_name']; ?></td>
                                                <td><?= $row['last_name']; ?></td>
                                                <td><?= $row['family_name']; ?></td>
                                                <td><?= $row['salary']; ?></td>

                                                <td><?= $row['user_type']; ?></td>

                                               
                                              
                                            
                                              
                                                <td>
                                                   
                                                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="delete.php" method="GET" class="d-inline">
                                                        <button type="submit" name="id" value="<?=$row['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<br>
<br>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/csss.css" />
    <title>admin panal</title>
    <style>

        body{text-align:center;
       
        
        
        }
    </style>
</head>
<body>
<div class="container" style=" background-color:#4087FC;padding:50px;color:white;margin:auto;">
<div class="row">
<div class="col-lg-3">
 <div class="single_analite_content">
    <h4>Total  Admin</h4>
    <h3><span class="counter">
    <?php
                
                                    $query = "SELECT * FROM users where user_type ='admin' OR user_type = 'user'";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_num_rows($query_run);
     echo '<h4>'.$row.'</h4>';
         ?>
        </span> </h3>
        <div class="d-flex"></div>
        </div>
        </div>


         <div class="col-lg-2">
         <div class="single_analite_content">
         <h4>Total employees:</h4>
        <h3><span class="counter">
        <?php
                
         $query = "SELECT id FROM users  where user_type='admin' or user_type='user'";  
         $query_run = mysqli_query($conn, $query);
         $row = mysqli_num_rows($query_run);
        echo '<h4> '.$row.'</h4>';
         ?>
         </span> </h3>
        <div class="d-flex"></div>
        </div>
         </div>



        <div class="col-lg-3">
          <div class="single_analite_content">
          <h4> MIN salary:</h4>
         <h3><span class="counter">
         <?php
                
         $query = "SELECT MIN(salary) FROM users  where user_type='admin' OR user_type='user'";  
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($query_run);
       echo '<h4> '.$row['MIN(salary)'].'</h4>';
        ?>
        </span> </h3>
         <div class="d-flex"></div>
         </div>
         </div>
        <div class="col-lg-2">
          <div class="single_analite_content">
          <h4> Total Salaries:</h4>
         <h3><span class="counter">
         <?php
                
         $query = "SELECT SUM(salary) FROM users  where user_type='admin' OR user_type='user'";  
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($query_run);
       echo '<h4> '.$row['SUM(salary)'].'</h4>';
        ?>
        </span> </h3>
         <div class="d-flex"></div>
         </div>
         </div>




        <div class="col-lg-2">
      <div class="single_analite_content">
          <h4>MAX salary:</h4>
        <h3><span class="counter">
             <?php
                
         $query = "SELECT MAX(salary) FROM users  where user_type='admin' OR user_type='user'";  
         $query_run = mysqli_query($conn, $query);
          $row = mysqli_fetch_array($query_run);
         echo '<h4>  '.$row['MAX(salary)'].'</h4>';
    ?>
          </span> </h3>
     <div class="d-flex"></div>
                     </div>
    </div>
                               
  </div>

</div>                           
</body>
</html>