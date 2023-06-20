<?php
  require_once('lib/category.php');
  require_once ('lib/menuCard.php');
  require_once ('templates/header.php');

  $categories = getCategories($pdo);

?>
<main>
  <div class="containerMenu">
    <div class="titleMenu">
      <h2>La Carte du Restaurant</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est fugit inventore officia provident cupiditate nemo eius nesciunt? Delectus incidunt minima tempore modi, adipisci itaque quidem distinctio ipsum, omnis officiis minus.</p>
    </div>
    <div class="listMenu">
      <ul class="menuItems">
        <li data-filter=".All">La carte</li>
        <li class="separator"></li>
        <li data-filter=".Entrée">Entrées</li>
        <li data-filter=".Plat">Plats</li>
        <li data-filter=".Dessert">Desserts</li>
        <br> <hr>
        <li class="separator"></li>
        <li data-filter=".Menus">Menus</li>
      </ul>
    </div>
    <a href="book.php" class="button button-book" style="font-size: 1.5rem;margin: 1.5rem;font-family: 'Gloock', serif;padding: 10px 20px;">Réserver une table</a>
    <div class="contentMenu">
      <?php
            $query = 'SELECT * FROM menu_card';
            $res = $pdo->prepare($query);
            $res->execute();

            if ($res->rowCount() > 0) {
              while ($card = $res->fetch(PDO::FETCH_ASSOC)) {
            ?>
      <div class="boxMenu All .<?php foreach ($categories as $category) { ?> <?php if ($card['category_id'] == $category['id']) { echo $category['name'];?>
              <?php } }?>">
        <div class="imageMenu">
          <img src="<?=getRecipeImage($card['image']); ?>" alt="<?= $card['title']; ?>">
        </div>
        <div class="text">       
          <h3><?= $card['title']; ?> </h3>
          <hr>
          <section><?= $card['description']; ?></section>
          <hr>
          <p class><?= $card['price']; ?>€</p>
          <article>Catégorie: <?php foreach ($categories as $category) { ?>
          <?php if ($card['category_id'] == $category['id']) { echo $category['name']; } }?></article>
        </div>
      </div>
      <?php } } ?>
      <div class="boxMenu Menus" style="width: 50%; justify-content:center; background-color:#cab5a7; border: solid 1px black">
        <div class="text">       
          <h3 style="font-size: 2rem"> Formule Menu Midi </h3>
          <hr>
          <section style="font-size: 1.7rem; font-family: 'Cinzel', 'serif'">Entrée + Plat + Dessert</section>
          <hr>
          <section style="font-size: 1.7rem; font-family: 'Cinzel', 'serif'">37€</section>
        </div>
      </div>
      <div class="boxMenu Menus" style="width: 50%; justify-content:center; background-color:#cab5a7; border: solid 1px black">
        <div class="text">       
          <h3 style="font-size: 2rem"> Formule menu soir </h3>
          <hr>
          <section style="font-size: 1.7rem; font-family: 'Cinzel', 'serif'">Entrée + Plat + Dessert</section>
          <hr>
          <section style="font-size: 1.7rem; font-family: 'Cinzel', 'serif'">48€</section>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
  require_once('templates/footer.php');
?>