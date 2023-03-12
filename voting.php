<?php
include 'conn.php';
$list = "";
$sql = "SELECT * FROM `candidate`";
$result = mysqli_query($conn, $sql);

if ($result) {

    while ($row = mysqli_fetch_assoc($result)) {

        $list .= "<option>" . $row['symbol'] . "</option>";
    }
}


$vid = $_GET['vid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "SELECT * FROM `vote` WHERE voterid=$vid";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo msg("Already voted!");
    } else {


        $partyname = $_POST['pname'];
        if ($partyname != "") {
            $ins = "INSERT INTO vote (voterid, partname) VALUES ('$vid','$partyname')";

            $result = mysqli_query($conn, $ins);

            if ($result) {

                header('location:voter.php');
            }
        }
    }
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



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link_meta.php"; ?>

    <title>Vote for your party</title>
</head>

<body>
    <div class="container my-4">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
<a href="index.php">
<button type="button" class="btn btn-primary my-4"><i class="bi bi-house-fill"></i></button>
</a>
        <h1>Vote For Your Party</h1>
        <form action="" method="post" class="row g-3">
        <select name="pname" id="" class="form-select" aria-label="Default select example">
            <?php

            echo $list;
            
            ?>
        </select>
        
        <input class="btn btn-primary" type="submit" value="Vote">
        
    </form>
</div>


</body>

</html>