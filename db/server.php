<?php

    $connect = new mysqli("localhost:2004","root","r[dyomujsohkveg4v","2gether");

    if($connect->connect_error) {
        echo "Connection Failed";
        exit();
    }
