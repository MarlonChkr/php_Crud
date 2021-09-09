<?php
    include("db.php");
    if(isset($_GET['ID'])){
        $ID = $_GET['ID'];
        $query = "SELECT * From tareas where ID = $ID";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $Titulo = $row['Titulo'];
            $Descripcion = $row['Descripcion'];
        }
    }

    if (isset($_POST['update'])){
        $ID = $_GET['ID'];
        $Titulo = $_POST['Titulo'];
        $Descripcion = $_POST['Descripcion'];
         
        $query = "UPDATE tareas set Titulo = '$Titulo', Descripcion = '$Descripcion' where ID =$ID ";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Tarea actualizada';
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");
    }
?>
 

<?php include("include/header.php");?>
    <div class="containe p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card-body">
                    <form action="edit.php?ID=<?php echo $_GET['ID']; ?>" method="POST">
                        <div class="form-grup">
                            <input type="text" name="Titulo" value="<?php echo $Titulo; ?>" class="form-control" placeholder="Update Titulo">
                        </div>
                        <div class="form-gru mt-3">
                            <textarea name="Descripcion"  rows="2" class="form-control" placeholder="Update Descripcion"> <?php  echo $Descripcion?> </textarea>
                        </div>
                        <button class="btn btn-success mt-3"  name="update">
                            update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("include/footer.php");?>
