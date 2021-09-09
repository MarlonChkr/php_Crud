<?php include("db.php") ?>
<?php include("include/header.php") ?>
    
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                
            <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset();  }?>

                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-grup">
                            <input type="text" name="title" class="form-control" placeholder="task Title"  autofocus>
                        </div>
                        <div class="form-group pt-3">
                            <textarea name="description"  rows="2" class="form-control"  placeholder="task desscription" ></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block mt-3" name="save_task" Value="save">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <TAble class="table table-bordered">
                    <thead>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * From  tareas";
                            $resul_task = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($resul_task)){?>
                            <tr>
                                <td><?php echo $row['Titulo'] ?></td>
                                <td><?php echo $row['Descripcion'] ?></td>
                                <td><?php echo $row['Fecha'] ?></td>
                                <td>
                                    <a href="edit.php?ID=<?php echo $row['ID']?>" class="btn btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                        </svg>
                                    </a>
                                    <a href="delete_task.php?ID=<?php echo $row['ID']?>" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                        <?php    }?>
                    </tbody>
                </TAble>
            </div>
        </div>
    </div>


<?php include("include/footer.php") ?>



