<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link_meta.php";?>
    <title>Welcome</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100vh;
            background-image: url('https://assets.telegraphindia.com/telegraph/2022/Jan/1641405686_election.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        div.container {
            display: flex;
            flex-direction: column;
            align-items: center;
            
            width: 600px;
            height: 400px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10%;
        }

        h1 {
            text-align: center;
            color: white;
            margin: 50px;
        }

        .btn{
            width: 300px;
            height: 60px;

        }

       

        @media (max-width:600px) {

            div.container {
                width: 90%;
            }

        }
    </style>
</head>

<body>
    <div class="container">

        <h1>Login As:</h1>

        <a href="voter.php">
            <button type="button" class="btn btn-primary my-4">Voter</button>
        </a>

        <a href="session.php">
            <button type="button" class="btn btn-primary my-4">Election Commisioner</button>
        </a>
    </div>

</body>

</html>