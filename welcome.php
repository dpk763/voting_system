<?php

session_start();

if (!isset($_SESSION['uname'])) {
    header("location:index.php");  
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link_meta.php"; ?>

    <style>
        .card i {
            font-size: 100px;
            text-align: center;

        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white">Welcome <i class="bi bi-house-fill"></i></a>
           
            <a href='logout.php'>
                <button class="btn bg-success text-white" type="submit"><i class="bi bi-box-arrow-left"></i> Logout</button>
               
                </a>
          
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center my-5">


            <div class="card col-3 mx-4 my-3" style="width: 13rem;">
                <i class="bi bi-trash text-danger"></i>
                <div class="card-body">
                    <h5 class="card-title my-4">Delete All Votes</h5>
                    <a href="reset.php" class="btn btn-danger">Reset Voting</a>
                </div>
            </div>



            <div class="card col-3 mx-4 my-3" style="width: 13rem;">
            <i class="bi bi-person-fill-add text-primary"></i>
                <div class="card-body">
                    <h5 class="card-title my-4">Candidates</h5>
                    <a href="addcandi.php" class="btn btn-primary">Add/Update</a>
                </div>
            </div>

 
            <div class="card col-3 mx-4 my-3" style="width: 13rem;">
                <i class="bi bi-person-fill text-primary"></i>
                <div class="card-body">
                    <h5 class="card-title my-4">Voter</h5>
                    <a href="addvoter.php" class="btn btn-primary">Add/Update</a>
                </div>
            </div>



            <div class="card col-3 mx-4 my-3" style="width: 13rem;">
                <i class="bi bi-download text-success"></i>
                <div class="card-body">
                    <h5 class="card-title my-4">Show Result</h5>
                    <a href="result.php" class="btn btn-success">Result</a>
                </div>
            </div>
        </div>


</body>

</html>