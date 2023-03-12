<?php

include "conn.php";

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


session_start();
if(isset($_SESSION['uname'])){

    header('location:welcome.php');
}
else{



if($_SERVER["REQUEST_METHOD"] == "POST"){

    $n=$_POST["txt"];
    $p=$_POST["pas"];

    $sql="select * from admin where user_id = '$n' and password = '$p'";

    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
    if($row){

            

    if($row['user_id']==$n && $row['password']==$p){



        session_start();
        
        $_SESSION['uname']=$n;
        
        $_SESSION['pass']=$p;
        
        // echo "session created";
    
        header('location:welcome.php');
        
        
        
    }
    
}
else{
   echo msg("Invalid Username or password");
}

    
}

}








?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include "link_meta.php";?>
   
    <title>Login</title>
</head>
<body>

<div class="container my-4">
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="container">
</a>
  <a href="welcome.php">
<button type="button" class="btn btn-primary my-4"><i class="bi bi-house-fill"></i></button>
</a>
</div>
    <h1>Login Page</h1>
    <form method="post" action="session.php">
        
  <div class="mb-3">
      <label for="uname" class="form-label">Enter User Name</label>
    <input type="text" class="form-control" id="uname" aria-describedby="emailHelp" name="txt">
    <div id="emailHelp" class="form-text">We'll never share your Uname with anyone else.</div>
  </div>
  <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pas">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>

</div>
</body>
</html>