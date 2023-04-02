<?php
require_once ('templates/header.php');
require_once('lib/category.php');
require_once ('lib/card.php');

?>
    <main>
        <!-- START Cover : La première section de la page -->
        <section class="cover flux">
            <div class="cover-text">
                <h1 class="cover-title">Quai Antique - Le Restaurant de Chambery</h1>
                <p class="cover-introduction text-paragraphe">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                <a href="#generation-entrepreneurs" class="icon-scroll" >
                    <img src="./images/arrow.svg" alt="Cliquez ici pour accéder à la section ...">
                </a>
            </div>
            <img src="./images/chef-front.jpg" class="image-office" alt="Photographie des locaux de Station F">
        </section>
        <!-- END Cover -->

        <!-- START Programs : La deuxième section de la page -->
        <section class="programs" id="generation-entrepreneurs">
            <div class="flux">
                <div class="container-texts">
                    <h2 class="title-2">Quai Antique - Le Restaurant de Chambery</h2>
                    <p class="text-paragraphe">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                </div>
                
                <ul class="container-images">
                <?php
                    $query = 'SELECT * FROM galery';
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $card)
                        {
                ?>
                    <li class="contain-img1">
                    <img src="<?=getRecipeImage($card['image']); ?>" alt="<?= $card['title']; ?>" class="img1">
                        <div class="middle">
                            <div class="hoverText"><?= $card['title']; ?></div>
                        </div>
                    </li>
                <?php }
                    }
                ?>
                </ul>
            </div>
            <a href="book.php" class="button button-orange">Réserver une table</a>
        </section>
            <!-- END Programs -->
    </main>
    
<?php
require_once('templates/footer.php');
?>