<?php
include 'conn.php';

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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $votid = $_POST['votid'];

    if ($votid != "") {

        $sql = "SELECT * FROM `voter` WHERE id=$votid";
        $result = mysqli_query($conn, $sql);
        

        if (mysqli_num_rows($result) > 0) {


            $sql = "SELECT * FROM `vote` WHERE voterid=$votid";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo msg("Already voted!");
            } else {



                if ($votid == "") {
                    echo "enter id";
                } else {

                    header("location:voting.php?vid=" . $votid);
                }
            }
        } else {
                echo msg("You are not Eligible for Vote!");
                
        }
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link_meta.php"; ?>
    <title>Verification</title>
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
    <form action="" method="post" class="row g-3 needs-validation" novalidate>
        <div class="col">
            <label for="validationCustom01" class="form-label">Enter your Voter id</label>
            <input type="number" class="form-control form-control-lg" name="votid" id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-12">
            <input class="btn btn-primary" type="submit">
            <input class="btn btn-primary" type="reset">

        </div>
       
        <a href="forgot.php">Forgot Voter id</a>
    </form>
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