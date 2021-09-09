<?php
    session_start();
    //conecto a la bae de datos  la igualo a un objeto que me devuelve la conexión
    $conn=mysqli_connect(
        'localhost', //ubicacion de archivo
        'root',//usuario
        '', //contraseña de la base de datos
        'php_mysql'// nombre de la base de datos
    );
    /*
    if (isset($conn)){
        echo 'DB esta conectada';
    }*/



?>