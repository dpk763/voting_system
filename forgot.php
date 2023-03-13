
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link_meta.php"; ?>

    <title>Forgot id</title>

</head>

<body>
        <?php
       
       function msg($m){
       
           echo '
           <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
             <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
             <div>
              '.$m.'
             </div>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
           
           ';
       
          
       }
       
       ?>
    <div class="container">

    

        <a href="index.php">
            <button type="button" class="btn btn-primary my-4"><i class="bi bi-house-fill"></i></button>
        </a>
        <form action="" method="post" class="row g-3 needs-validation" novalidate>

            <div class="col-md-4">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="name" required>
            </div>
            <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>

            <div class="col-md-4">
                <label for="pet" class="form-label">Enter your Pet Name</label>
                <input type="text" class="form-control" id="pet" name="pet" required>
            </div>  
                <input class="btn btn-primary" type="submit" value="Find">
                <input class="btn btn-primary" type="reset" value="Clear">
        </form>




        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">City</th>
                    <th scope="col">Pet Name</th>
                    <th scope="col">VOTE</th>

                </tr>
            </thead>
            <tbody>
                <?php

                include 'conn.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $VNAME = $_POST['name'];
                    $CITY = $_POST['city'];
                    $PET = $_POST['pet'];

                    if ($VNAME != "" && $CITY != "" && $PET != "") {
                       

                        $sql = "SELECT * FROM `voter` WHERE vname='$VNAME' AND city='$CITY' AND pet_name='$PET'";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>" .

                                    "<td>" . $row["id"] . "</td>" .
                                    "<td>" . $row["vname"] . "</td>" .
                                    "<td>" . $row["gender"] . "</td>" .
                                    "<td>" . $row["age"] . "</td>" .
                                    "<td>" . $row["city"] . "</td>" .
                                    "<td>" . $row["pet_name"] . "</td>" .

                                    "<td>
                    <a href='voting.php?vid=" . $row['id'] . "'>
                    <button type='button' class='btn btn-primary'>VOTE</button>
                    </a>" .


                                    "</tr>";
                            }
                        }
                        else{
                            msg('record not found!');
                        }
                    }
                }



                ?>







            </tbody>
        </table>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>