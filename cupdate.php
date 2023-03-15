<?php


session_start();

if (!isset($_SESSION['uname'])) {
    header("location:index.php");  
} 



include 'conn.php';


//insert data into database

$id=$_GET['updateid'];
$sql="SELECT * FROM `candidate` WHERE id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

    $SYMBOL=$row['symbol'];
    $CNAME=$row['cname'];
    $GENDER=$row['gender'];
    $AGE=$row['age'];
    $CITY=$row['city'];



if($_SERVER["REQUEST_METHOD"] == "POST"){

  $SYMBOL=$_POST['symbol'];
  $CNAME=$_POST['cname'];
  $GENDER=$_POST['gender'];
  $AGE=$_POST['age'];
  $CITY=$_POST['city'];

  if ($SYMBOL!="" && $CNAME!="" && $GENDER!="" && $AGE!="" && $CITY!="") {

        $sql = "UPDATE `candidate` SET id=$id,symbol='$SYMBOL', cname='$CNAME',gender='$GENDER',age='$AGE', city='$CITY' WHERE id=$id";
    
        $result = mysqli_query($conn,$sql);  

        if($result){
            header('location:addcandi.php');
        }



    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<?php include "link_meta.php";?>

      <title>UPDATE</title>

</head>
<body>
<div class="container">
<a href="addcandi.php">
<button type="button" class="btn btn-primary my-4"><i class="bi bi-arrow-left"></i></button>
</a>
<a href="welcome.php">
<button type="button" class="btn btn-primary my-4"><i class="bi bi-house-fill"></i></button>
</a>
</div>
<form class="container"  method="post">
<div class="mb-3 my-4">
    <label for="symbol" class="form-label">Symbol</label>
    <input type="text" class="form-control" id="symbol" name="symbol" aria-describedby="emailHelp" value="<?php echo $SYMBOL ?>">
    
  </div>

<div class="mb-3 my-4">
    <label for="cname" class="form-label">Name</label>
    <input type="text" class="form-control" id="cname" name="cname" aria-describedby="emailHelp"  value="<?php echo $CNAME ?>">
    
  </div>
  <div class="mb-3 my-4">
    <label for="gender" class="form-label">Gender</label>
    <input type="text" class="form-control" id="gender" name="gender" aria-describedby="emailHelp"  value="<?php echo $GENDER ?>">
    
  </div>
  <div class="mb-3 my-4">
    <label for="age" class="form-label">Age</label>
    <input type="number" class="form-control" id="age" name="age" min="18" aria-describedby="emailHelp"  value="<?php echo $AGE ?>">
    
  </div>
  <div class="mb-3 my-4">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp"  value="<?php echo $CITY ?>">
    
  </div>


  
  
  
  <input type="submit" class="btn btn-primary" value="Update">
</form>
</body>
</html>