<?php
    session_start();
    require_once 'dbcon.php';

    $errors = [];
    $messages = [];


if (isset($_POST['insert_btn'])) {
    $title=$_POST['GaleryTitle'];
    $image=$_FILES['GaleryPhoto']['name'];
    $tmp_name=$_FILES['GaleryPhoto']['tmp_name'];
    $destination="images/".$image;
    move_uploaded_file($tmp_name, $destination);

    $insert="INSERT INTO galery (title, image) VALUES ('$title', '$image')";
    $insert_q=mysqli_query($con,$insert);
    
    
    if ($insert_q) {
        $_SESSION['message'] = "Plat bien ajouté";
        header("Location: galery-index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite";
        header("Location: galery-index.php");
        exit(0);
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Hours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cinzel&family=Gloock&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include('message.php'); ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 col-md-10 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Galerie Restaurant
                            <a href="/admin.php" class=" bttn btn float-end">Retour</a>
                        </h4>
                    </div> 
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">    
                                <label>Titre</label>    
                                <input type="text" name="GaleryTitle">
                            </div>
                            <div class="mb-3">
                                <label>Image</label> 
                                <input type="file" name="GaleryPhoto">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="insert_btn" value="Ajouter">
                            </div>
                        </form>
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