<?php
session_start();
require('dbcon.php');

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier horaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cinzel&family=Gloock&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier plat
                            <a href="galery-index.php" class="btn btn-danger float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $galery_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM galery WHERE id='$galery_id' ";
                            $query_run = mysqli_query($con, $query);
                            //$fetch=mysqli_fetch_array($query_run);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $galery = mysqli_fetch_array($query_run);
                                ?>             
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <input type='hidden' name="hour_id" value="<?= $galery['id']; ?>">
                                    <div class="mb-3">
                                        <label>Titre</label>
                                        <input type="text" name="title" value="<?= $galery['title']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Image</label>
                                        <input type="file" name="GaleryPhoto">
                                        <img src="/images/<?php $galery['image'] ?>" width="70px" >
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_galery" class="btn btn-primary">Mettre à jour le plat</button>
                                    </div>
                                </form>
                                <?php 
                                if (isset($_POST['update_galery'])) {
                                    $title=$_POST['title'];
                                    $image=$_FILES['GaleryPhoto']['name'];
                                    $tmp_name=$_FILES['GaleryPhoto']['tmp_name'];
                                    $destination="images/".$image;
                                    if ($image=!"")
                                    {
                                        move_uploaded_file($tmp_name, $destination);
                                        $update="UPDATE galery SET title='$title', image='$image' WHERE id='$galery_id'";
                                        $update_q =mysqli_query($con, $update);
                                        header('location:galery-index.php');
                                    } else {

                                        move_uploaded_file($tmp_name, $destination);
                                        $update="UPDATE galery SET title='$title', image='$image' WHERE id='$galery_id'";
                                        $update_q =mysqli_query($con, $update);
                                        header('location:galery-index.php');
                                    

                                    }
                                }
                                ?>
                                <?php

                            }
                            else
                            {
                               echo "<h4> No such Id found</h4>"; 
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>
    body{
        background-color: #cab5a7;
    }

    .card-header{
        background-color: #05263b;
        font-family: 'Cinzel', serif;
        color: #fcf8f5;
    }
    .card-body{
        background-color: #fcf8f5;
        font-family: 'Bree Serif', serif;
    }

    .bttn {
        background-color: #0f4454;
        color: #fcf8f5;
        font-family: 'Cinzel', serif;
    }

    .bttn:hover{
    background-color: #cab5a7;
    color:#0f4454;
    
    }


  </style>
    </body>

</html>

