<?php
require_once ('templates/header.php');
require_once('lib/category.php');
require_once ('lib/card.php');


$categories = getCategories($pdo);

?>

<div class="containerMenu">
  <div class="titleMenu">
    <h2>La Carte du Restaurant</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est fugit inventore officia provident cupiditate nemo eius nesciunt? Delectus incidunt minima tempore modi, adipisci itaque quidem distinctio ipsum, omnis officiis minus.</p>
  </div>
  <div class="listMenu">
    <li data-filter=".Entrée">Entrées</li>
    <li data-filter=".Plat">Plats</li>
    <li data-filter=".Dessert">Desserts</li>
    <br>
    <hr>
    <li data-filter=".Menu">Menus</li>
  </div>
  <div class="contentMenu">
  <?php
          $query = 'SELECT * FROM menu_card';
          $query_run = mysqli_query($con, $query);

          if(mysqli_num_rows($query_run) > 0)
          {
              foreach($query_run as $card)
              {
          ?>
    <div class="boxMenu Menu .<?php foreach ($categories as $category) { ?>
                <?php if ($card['category_id'] == $category['id']) { echo $category['name'];?>
            <?php } }?>.">
      <div class="imageMenu">
        <img src="<?=getRecipeImage($card['image']); ?>" alt="<?= $card['title']; ?>">
      </div>
      <div class="text">
                  
        <h3><?= $card['title']; ?> </h3>
        <hr>
        <section><?= $card['description']; ?></section>
        <hr>
        <section><?= $card['price']; ?>€</section>
        <article>Catégorie: <?php foreach ($categories as $category) { ?>
                <?php if ($card['category_id'] == $category['id']) { echo $category['name'];?>
            <?php } ?>
        <?php

              }?></article>
      </div>
    </div>
    <?php }
          }
        ?>

  </div>

</div>

<script src="main.js"></script>


<?php
require_once('templates/footer.php');
?>