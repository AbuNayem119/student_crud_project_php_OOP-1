<?php

    session_start();
    use App\Controllers\Admin;
    include_once "vendor/autoload.php";
    if (isset($_SESSION['image']) || isset($_SESSION['email'])) {
        header("location:admin/dashboard.php");
    }

    $admin = new Admin;


    if (isset($_POST['submit'])) {
        
        $u_email = $_POST['u_email'];
        $pass = $_POST['pass'];

        if (empty($u_email) || empty($pass)) {
            $mess = "<p class='alert alert-danger'> Field Must not be Empty !<button style='float:right;' class='close' data-bs-dismiss='alert' >&times;</button></p>";
        }else{

            $data = $admin -> admin_login($u_email, $pass);

            if ($data == false) {
                $mess = "<p class='alert alert-danger'> Login Info Incorrect !<button style='float:right;' class='close' data-bs-dismiss='alert' >&times;</button></p>";
            }else{

               
                $all_data = $admin -> session_data($u_email, $pass);
                
                $_SESSION['name'] = $all_data -> name;
                $_SESSION['email'] = $all_data -> email;
                $_SESSION['cell'] = $all_data -> cell;
                $_SESSION['image'] = $all_data -> image;

                header("location:admin/dashboard.php");


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
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <h2>Admin Sign In</h2>
                <hr>
                <div class="form-group">
                    <label for="">User name / Email</label>
                    <input name="u_email" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="pass" type="text" class="form-control">
                </div>
                <input name="submit" type="submit" class="mt-2 btn btn-success">
            </form>
        </div>
        <div class="card-footer">
            <a style="display: block;" class="btn btn-info" href="admin/signup.php">Sign Up</a>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>