<?php
require_once('pdo.php');

// ADD A GALERY CARD IN MAIN PAGE
function saveGalery(PDO $pdo, string $title, string|null $image) {
    $sql = "INSERT INTO `galery` (`title`, `image`) VALUES (:title, :image);";
    $query = $pdo->prepare($sql);
    $query->bindParam(':title', $title, PDO::PARAM_STR);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    return $query->execute();
  }

// DELETE A GALERY CARD IN MAIN PAGE
if(isset($_POST['delete_galery']))
{
    $galery_id = $_POST['delete_galery'];

    $query = "DELETE FROM galery WHERE id=:galery_id";
    $res = $pdo->prepare($query);
    $res->bindParam(':galery_id', $galery_id);
    $res->execute();

    if($res)
    {
        $_SESSION['message'] = "Plat supprimé";
        header("Location: ../admin/galery/galeryIndex.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite.";
        header("Location: ../admin/galery/galeryIndex.php");
        exit(0);
    }

}