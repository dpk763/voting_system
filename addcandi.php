<?php
session_start();

if (!isset($_SESSION['uname'])) {
    header("location:index.php");  
} 




?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include "link_meta.php";?>
   
    <title>CANDIDATE</title>
</head>
<body>
    
<div class="container">
<a href="cinsert.php">
<button type="button" class="btn btn-primary my-4"><i class="bi bi-person-fill-add"></i></button>
</a>
<a href="welcome.php">
<button type="button" class="btn btn-primary my-4"><i class="bi bi-house-fill"></i></button>
</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Symbol</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Age</th>
      <th scope="col">City</th>
      <th scope="col">Update/Delete</th>

    </tr>
  </thead>
  <tbody>
  <?php

    include 'conn.php';
  $id=1;
    $sql="SELECT * FROM `candidate`";

    $result=mysqli_query($conn,$sql);

    if($result){

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>".

            "<td>" . $id. "</td>".
            "<td>" . $row["symbol"]. "</td>".
            " <td>" . $row["cname"]. "</td>".
            "<td>".$row["gender"]."</td>".
            "<td>".$row["age"]."</td>".
            "<td>".$row["city"]."</td>".

            "<td>
            <a href='cupdate.php?updateid=".$row['id']."'>
            <button type='button' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button>
            </a>
         
            <a href='cdelete.php?deleteid=".$row['id']."'>
            <button type='button' class='btn btn-danger'><i class='bi bi-trash-fill'></i></button>
            </a>
            </td>".
            "</tr>";
            $id++;
          }

        
    }
   

    ?>





    
    
  </tbody>
</table>
</div>


</body>
</html>