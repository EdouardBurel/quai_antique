<?php

function getRecipeImage(string|null $image) {
  if ($image === null) {
      return _ASSETS_IMG_PATH_.'recipe_default.jpg';
  } else {
      return _RECIPES_IMG_PATH_.$image;
  }
}


function saveCard(PDO $pdo, string $title, string $description, int $price, int $category, string|null $image) {
  $sql = "INSERT INTO `menu_card` (`title`, `description`, `price`, `category_id`, `image`) VALUES (:title, :description, :price, :category_id, :image);";
  $query = $pdo->prepare($sql);
  $query->bindParam(':title', $title, PDO::PARAM_STR);
  $query->bindParam(':description', $description, PDO::PARAM_STR);
  $query->bindParam(':price', $price, PDO::PARAM_INT);
  $query->bindParam(':category_id', $category, PDO::PARAM_INT);
  $query->bindParam(':image', $image, PDO::PARAM_STR);
  return $query->execute();
}

function saveGalery(PDO $pdo, string $title, string|null $image) {
  $sql = "INSERT INTO `galery` (`title`, `image`) VALUES (:title, :image);";
  $query = $pdo->prepare($sql);
  $query->bindParam(':title', $title, PDO::PARAM_STR);
  $query->bindParam(':image', $image, PDO::PARAM_STR);
  return $query->execute();

}