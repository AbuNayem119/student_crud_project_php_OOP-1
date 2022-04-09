<?php

    use App\Controllers\Student;
    include_once "../vendor/autoload.php";

    $stu = new Student;

    $data = $stu -> stu_show();

    if (isset($_GET['stu_id'])) {
        $stu_id = $_GET['stu_id'];

        $stu -> delete_student($stu_id);
        header("location:all_stu.php");
        $all_data = $data -> fetch_object();
        unlink("image/". $all_data -> image);
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

    <div class="mt-2 w-75 mx-auto card">
        <div class="card-body">
            <h3>All Students</h3>
            <hr>
            <table class="table table-striped table-hover table-bordered">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Cell</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php 
                    $i = 1;
                    while($all_data = $data -> fetch_object()):
                ?>

                <tbody>
                    <tr>
                        <th><?php echo $i; $i++ ?></th>
                        <th><?php echo $all_data -> name ?></th>
                        <th><?php echo $all_data -> email ?></th>
                        <th><?php echo $all_data -> cell ?></th>
                        <th><?php echo $all_data -> address ?></th>
                        <th><img style="width: 50px; height:50px" src="image/<?php echo $all_data -> image ?>" alt=""></th>
                        <th>
                            <a class="btn btn-sm btn-primary" href="show_stu.php?stu_id=<?php echo $all_data -> stu_id ?>">Show</a>
                            <a class="btn btn-sm btn-secondary" href="update_stu.php?stu_id=<?php echo $all_data -> stu_id ?>">Update</a>
                            <a class="btn btn-sm btn-danger" href="?stu_id=<?php echo $all_data -> stu_id ?>">Delete</a>
                        </th>
                    </tr>
                </tbody>

                <?php 
                    endwhile;
                ?>


            </table>
        </div>
        <div class="card-footer">
            <a style="display: block;" class="btn btn-info" href="../admin/dashboard.php">Back to Dashboard</a>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>