<?php
    include ("db.php");
    if (isset($_POST['save_task'])){
        $titulo=$_POST['title'];
        $descripcion=$_POST['description'];

        $query= "INSERT INTO tareas(Titulo, Descripcion) values ('$titulo', '$descripcion')";
        $result= mysqli_query($conn, $query);
        if(!$result){
            die("query failed");
        }
        
        $_SESSION['message'] = 'task saved succesfully';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");

    }
?>