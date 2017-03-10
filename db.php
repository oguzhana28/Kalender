<?php

function ConnectDB(){
    $connection = new mysqli('localhost','root','','calendar');

        if( ! $connection = mysqli_connect() ){
            die('No connection: ' . mysqli_connect_error());
        }
    
    return $connection;
}