<?php

    include_once "../vendor/autoload.php";
    session_start();

    if (!isset($_SESSION['image']) || !isset($_SESSION['email'])) {
        header("location:../index.php");
    }









?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>

    <div class="mt-3 w-50 mx-auto card">
        <div class="card-header">
            <h3 style="display: inline-block;" >Admin Profile</h3>
            <a style="float:right" class="btn btn-secondary" href="logout.php">Logout</a>
        </div>
        <div class="card-body">
            <img style="width: 120px; height:120px; border-radius:50%" src="image/<?php echo $_SESSION['image']; ?>" alt="">
            <table class="mt-3 table table-bordered">
                <tr>
                    <th>Name :</th>
                    <td><p><?php echo $_SESSION['name']; ?></p></td>
                </tr>
                <tr>
                    <th>Email :</th>
                    <td><p><?php echo $_SESSION['email']; ?></p></td>
                </tr>
                <tr>
                    <th>Cell :</th>
                    <td><p><?php echo $_SESSION['cell']; ?></p></td>
                </tr>
            </table>
            <form action="">
                <h3>Students :</h3>
                <hr>
                <div class="form-group">
                    <label for="">Add Student</label>
                    <a style="display: block;" class="btn btn-primary" href="../Student/add_stu.php">Add Student</a>
                </div>
                <div class="form-group">
                    <label for="">All Students</label>
                    <a style="display: block;" class="btn btn-success" href="../Student/all_stu.php">All Students</a>
                </div>
            </form>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>