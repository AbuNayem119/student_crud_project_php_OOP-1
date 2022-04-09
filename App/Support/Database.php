<?php

    namespace App\Support;
    use mysqli;





    abstract class Database{

        private $host_name = "localhost";
        private $user = "root";
        private $pass = "";
        private $db_name = "stu_crud";
        private $Connection;

        protected function Connection()
        {
            return $this -> Connection = new mysqli($this -> host_name, $this -> user, $this -> pass, $this -> db_name);
        }


        // Email Check System.....
        public function value_check($table, $value)
        {
            return $this -> Connection() ->query("SELECT * FROM $table WHERE email='$value'");
        }
































    }

