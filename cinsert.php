<?php

include 'conn.php';


session_start();

if (!isset($_SESSION['uname'])) {
    header("location:index.php");  
} 

function msg($m){

  return('
  <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
     '.$m.'
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  
  ');
}


//insert data into database



if($_SERVER["REQUEST_METHOD"] == "POST"){

    $SYMBOL=$_POST['symbol'];
    $CNAME=$_POST['cname'];
    $GENDER=$_POST['gender'];
    $AGE=$_POST['age'];
    $CITY=$_POST['city'];


    if ($SYMBOL!="" && $CNAME!="" && $GENDER!="" && $AGE!="" && $CITY!="") {

      $sql="SELECT * FROM `candidate` WHERE symbol='$SYMBOL'";

      $result=mysqli_query($conn,$sql);

      if (mysqli_num_rows($result) > 0) {

        echo msg("Already Exist!");
      }

      else{

        
        $ins = "INSERT INTO candidate (symbol,cname, gender, age , city)
        VALUES ('$SYMBOL', '$CNAME', '$GENDER', '$AGE', '$CITY')";
    
        $result = mysqli_query($conn,$ins);  

        if($result){
          header('location:addcandi.php');
        }
        
      }



    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<?php include "link_meta.php";?>
   
<title>Add Candidate</title>
</head>
<body>
<form class="container"  method="post">
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="container">
<a href="addcandi.php">
<button type="button" class="btn btn-primary my-4"><i class="bi bi-arrow-left"></i></button>
</a>
<a href="welcome.php">
<button type="button" class="btn btn-primary my-4"><i class="bi bi-house-fill"></i></button>
</a>
</div>
<div class="mb-3 my-4">
    <label for="symbol" class="form-label">Symbol</label>
    <input type="text" class="form-control" id="symbol" name="symbol" aria-describedby="emailHelp">
    
  </div>

<div class="mb-3 my-4">
    <label for="cname" class="form-label">Name</label>
    <input type="text" class="form-control" id="cname" name="cname" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3 my-4">
    <label for="gender" class="form-label">Gender</label>
    <input type="text" class="form-control" id="gender" name="gender" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3 my-4">
    <label for="age" class="form-label">Age</label>
    <input type="text" class="form-control" id="age" name="age" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3 my-4">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp">
    
  </div>


  
  
  
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</body>
</html>