<?php

    include_once "../vendor/autoload.php";
    session_start();
    session_destroy();
    header("location:../index.php");









?>