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

    <title>RESULT</title>
</head>

<body>

    <div class="container">
        <a href="welcome.php">
            <button type="button" class="btn btn-primary my-4"><i class="bi bi-house-fill"></i></button>
        </a>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Party Name</th>
                    <th scope="col">Total Votes</th>

                </tr>
            </thead>
            <tbody>
                <?php

                include 'conn.php';
                $id = 1;
             
                $ptnm;
             
                $sql = "SELECT * FROM `candidate`";
                $result = mysqli_query($conn, $sql);


                if ($result) {

                    while ($row = mysqli_fetch_assoc($result)) {

                        $ptnm = $row['symbol'];
                        $sql1 = "SELECT * FROM `vote` WHERE partname='$ptnm'";

                        $result1 = mysqli_query($conn, $sql1);

                        if ($result1) {

                          
                                echo "<tr>" .

                                    "<td>" . $id . "</td>" .
                                    "<td>" . $row["symbol"] . "</td>" .
                                    "<td>". mysqli_num_rows($result1) ."</td>" .

                                    "</tr>";
                                $id++;
                                
                            
                        }
                    }
                }



                ?>







            </tbody>
        </table>
    </div>


</body>

</html>