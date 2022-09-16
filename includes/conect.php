<?php

    $host = 'localhost';
    $db = 'bd_sirann';
    $user = 'root';
    $password = '';
    $charset ='utf8mb4';
    $con=mysqli_connect($host,$user,$password,$db) or die 
            ('Error en la conexion con el servidor');
             
?>