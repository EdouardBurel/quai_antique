<?php
require_once ('pdo.php');

if ($_SERVER['HTTP_HOST'] === 'localhost') {
    $baseUrl = 'http://localhost'; // Update with your local URL
} else {
    $baseUrl = 'https://quai-antique-site-restaurant.herokuapp.com';
}

function getRecipeImage(string|null $image) {
    global $baseUrl;
    if ($image === null) {
        return $baseUrl . _ASSETS_IMG_PATH_ . 'recipe_default.jpg';
    } else {
        return $baseUrl . _RECIPES_IMG_PATH_ . $image;
    }
}

// ADD A MENU CARD IN MENUS PAGE
function saveMenuCard(PDO $pdo, string $title, string $description, int $price, int $category, string|null $image) {
  $sql = "INSERT INTO `menu_card` (`title`, `description`, `price`, `category_id`, `image`) VALUES (:title, :description, :price, :category_id, :image);";
  $query = $pdo->prepare($sql);
  $query->bindParam(':title', $title, PDO::PARAM_STR);
  $query->bindParam(':description', $description, PDO::PARAM_STR);
  $query->bindParam(':price', $price, PDO::PARAM_INT);
  $query->bindParam(':category_id', $category, PDO::PARAM_INT);
  $query->bindParam(':image', $image, PDO::PARAM_STR);
  return $query->execute();
}

// DELETE A MENU CARD IN MENUS PAGE
if(isset($_POST['delete_menu']))
{
    $galery_id = $_POST['delete_menu'];

    $query = "DELETE FROM menu_card WHERE id=:galery_id";
    $res = $pdo->prepare($query);
    $res->bindParam(':galery_id', $galery_id);
    $res->execute();

    if($res)
    {
        $_SESSION['message'] = "Plat supprimé";
        header("Location: ../admin/menus/menuIndex.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite.";
        header("Location: ../admin/menus/menuIndex.php");
        exit(0);
    }

}
