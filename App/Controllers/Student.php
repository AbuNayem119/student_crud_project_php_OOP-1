<?php

    namespace App\Controllers;
    use App\Support\Database;

    class Student extends Database{


        //Add Students......
        public function add_student($name,$email,$cell,$address,$final_img_name)
        {
            $send_data =  $this -> Connection() -> query("INSERT INTO student (name,email,cell,address,image) VALUES ('$name','$email','$cell','$address','$final_img_name')");
            
            if ($send_data) {
                return true;
            }else{
                return false;
            }

        }

        //Show Students....
        public function stu_show()
        {
            return $this -> Connection() -> query("SELECT * FROM student");
  
        }


        //Single Student Show.....
        public function show_single_stu($stu_id)
        {
            $data = $this -> Connection() -> query("SELECT * FROM student WHERE stu_id='$stu_id'");
            return $data -> fetch_object();
        }


        // Update Students....
        public function stu_update($name,$email,$cell,$address,$f_image,$stu_id)
        {
            return $this -> Connection() -> query("UPDATE student SET name='$name', email='$email', cell='$cell', address='$address', image='$f_image' WHERE stu_id='$stu_id'");
        }

        // Delete Student.....
        public function delete_student($stu_id)
        {
            return $this -> Connection() -> query("DELETE FROM student WHERE stu_id='$stu_id'");
        }

























    }













?>