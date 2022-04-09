<?php

    use App\Controllers\Student;
    include_once "../vendor/autoload.php";

    $stu = new Student;

    if (isset($_GET['stu_id'])) {
        $stu_id = $_GET['stu_id'];
    }


    $data =  $stu -> show_single_stu($stu_id);




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
        <div class="card-body">
            <img style="width: 120px; height:120px; border-radius:50%" src="image/<?php echo $data -> image ?>" alt="">
            <table class="mt-3 table table-bordered">
                <tr>
                    <th>Name :</th>
                    <td><p><?php echo $data -> name ?></p></td>
                </tr>
                <tr>
                    <th>Email :</th>
                    <td><p><?php echo $data -> email ?></p></td>
                </tr>
                <tr>
                    <th>Cell :</th>
                    <td><p><?php echo $data -> cell ?></p></td>
                </tr>
                <tr>
                    <th>Address :</th>
                    <td><p><?php echo $data -> address ?></p></td>
                </tr>
            </table>
            <a class="btn btn-success" href="update_stu.php?stu_id=<?php echo $data -> stu_id ?>">Update Student</a>
        </div>
        <div class="card-footer">
            <a style="display: block;" class="btn btn-info" href="all_stu.php">Back</a>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>