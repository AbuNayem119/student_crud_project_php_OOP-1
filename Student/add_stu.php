<?php

    use App\Controllers\Student;
    include_once "../vendor/autoload.php";
    $stu = new Student;

    if (isset($_POST['submit'])) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $cell = $_POST['cell'];
        $address = $_POST['address'];

        // Image File Management.....
        $image = $_FILES['image']['name'];
        $explode = explode(".",$image);
        $array_end_part = end($explode);
        $final_img_name = md5(time().rand().$image).".".strtolower($array_end_part);
        $tmp_img = $_FILES['image']['tmp_name'];


        if (empty($name)||empty($email)||empty($cell)||empty($address)||empty($image)) {
            $mess = "<p class='alert alert-danger'> Field Must not be Empty !<button style='float:right;' class='close' data-bs-dismiss='alert' >&times;</button></p>";

        }else{

            $add_stu = $stu -> add_student($name,$email,$cell,$address,$final_img_name);

            if ($add_stu == false) {
                $mess = "<p class='alert alert-danger'> Data not sent !<button style='float:right;' class='close' data-bs-dismiss='alert' >&times;</button></p>";
            }else{

                move_uploaded_file($tmp_img,"image/".$final_img_name);

                $mess = "<p class='alert alert-success'> Data send Successfully !<button style='float:right;' class='close' data-bs-dismiss='alert' >&times;</button></p>";


            }


        }





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

    <div class="mt-2 w-50 mx-auto mess">
        <?php
            if (isset($mess)) {
            echo $mess;
            }
        ?>
    </div>
    <div class="mt-2 w-50 mx-auto card">
        <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                <h2>Add Student</h2>
                <hr>
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Cell</label>
                    <input name="cell" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input name="address" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input name="image" type="file" class="form-control">
                </div>
                <input name="submit" type="submit" class="mt-2 btn btn-success">
            </form>
        </div>
        <div class="card-footer">
            <a style="display: block;" class="btn btn-info" href="../admin/dashboard.php">Back to Dashboard</a>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>