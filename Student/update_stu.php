<?php

    use App\Controllers\Student;
    include_once "../vendor/autoload.php";

    $stu = new Student;

    if (isset($_GET['stu_id'])) {
        $stu_id = $_GET['stu_id'];
    }



    if (isset($_POST['submit'])) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $cell = $_POST['cell'];
        $address = $_POST['address'];
        $old_image = $_POST['old_image'];

        // New Image Management.....
        $img_name = $_FILES['new_image']['name'];
        $explode = explode(".",$img_name);
        $array_end_part = end($explode);
        $final_img_name = md5(time().rand().$img_name).".".$array_end_part;
        $tmp_img = $_FILES['new_image']['tmp_name'];

        if (empty($img_name)) {
            $f_image = $old_image;
        }else{
            $f_image = $final_img_name;
            move_uploaded_file($tmp_img, "image/".$final_img_name);
            unlink("image/".$old_image);
            
            // if (!file_exists("image/".$old_image)) {
            //     return true;
            // }else{
            //     unlink("image/".$old_image);
            // }

        }

        $stu -> stu_update($name,$email,$cell,$address,$f_image,$stu_id);

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

<form action="<?php echo $_SERVER['PHP_SELF']?>?stu_id=<?php echo $data -> stu_id ?>" method="POST" enctype="multipart/form-data">
    <div class="mt-3 w-50 mx-auto card">
        <div class="card-body">
            <img style="width: 120px; height:120px; border-radius:50%" src="image/<?php echo $data -> image ?>" alt="">
            <table class="mt-3 table table-bordered">
                <tr>
                    <th>Name :</th>
                    <td><input name="name" value="<?php echo $data -> name ?>" type="text"></td>
                </tr>
                <tr>
                    <th>Email :</th>
                    <td><input name="email" value="<?php echo $data -> email ?>" type="text"></td>
                </tr>
                <tr>
                    <th>Cell :</th>
                    <td><input name="cell" value="<?php echo $data -> cell ?>" type="text"></td>
                </tr>
                <tr>
                    <th>Address :</th>
                    <td><input name="address" value="<?php echo $data -> address ?>" type="text"></td>
                </tr>
                <tr>
                    <th>Image :</th>
                    <td>
                        <input name="old_image" value="<?php echo $data -> image ?>" type="hidden">
                        <input name="new_image" value="" type="file">
                    </td>
                </tr>
            </table>
            <input name="submit" class="btn btn-primary" type="submit" value="Submit">
        </div>
        <div class="card-footer">
            <a style="display: block;" class="btn btn-info" href="../Student/all_stu.php">Back</a>
        </div>
    </div>
</form>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>