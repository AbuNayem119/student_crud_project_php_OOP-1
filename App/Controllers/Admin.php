<?php
    namespace App\Controllers;
    use App\Support\Database;

    class Admin extends Database{


        // Email Check........
        public function email_check($email)
        {
            $e_check =  $this -> value_check('admin', $email);
            $num_data = $e_check -> num_rows;
            if ($num_data > 0) {
                return false;
            }else{
                return true;
            }
        }


        // Password Hash......
        public function pass_hash($pass)
        {
            return password_hash($pass, PASSWORD_DEFAULT);
        }


        // Admin Registration......
        public function admin_registration($name, $uname, $email, $cell, $hash_pass, $final_img_name)
        {
            $data = $this -> Connection() -> query("INSERT INTO admin (name, uname, email, cell, pass, image) VALUES ('$name', '$uname', '$email', '$cell', '$hash_pass', '$final_img_name')");

            if ($data) {
                return true;
            }else{
                return false;
            }
            
        }

        //Admin Login......
        public function admin_login($u_email, $pass)
        {
            $data = $this -> Connection() -> query("SELECT * FROM admin WHERE uname='$u_email' || email='$u_email'");
            $num_data = $data -> num_rows;
            $fetch_data = $data -> fetch_object();
            
            if ($num_data > 0) {
                
                if (password_verify($pass, $fetch_data -> pass) == false) {
                    return false;
                }else{
                    return true;
                }

            }else{
                return false;
            }


        }

        // Session Data......
        public function session_data($u_email, $pass)
        {
            $data = $this -> Connection() -> query("SELECT * FROM admin WHERE uname='$u_email' || email='$u_email'");
            $fetch_data = $data -> fetch_object();

            return $fetch_data;


        }




















    }

