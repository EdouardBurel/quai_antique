<?php
    require_once ('templates/header.php');
    require_once('lib/category.php');
    require_once ('lib/card.php');
?>
    <main>
        <!-- START Cover : 1st section Page -->
        <section>
            <div class="home" id="home">
                <div class="home-cover">
                    <div class=>
                        <div class="cover">
                            <div class="content">
                                <h3>Quai Antique - Restaurant Chambery</h3>
                                <h1>Chef Arnaud Michaud</h1>
                                <a href="#gallery-pictures" class="icon-scroll" >
                                    <img src="images/arrow.svg" alt="Cliquez ici pour accéder à la section ...">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END Cover -->

        <!-- START Galery : 2nd section of page -->
        <section id="gallery-pictures">
            <div class="our-chef">
                <?php
                $query = 'SELECT * FROM galery';
                $query_run = mysqli_query($con, $query);
                
                if(mysqli_num_rows($query_run) > 0) {
                    foreach($query_run as $card) { 
                ?>
                <div class="item"> 
                    <div class="image">
                        <img src="<?=getRecipeImage($card['image']); ?>" alt="<?= $card['title']; ?>">
                        <div class="chef-info">
                            <div>
                                <h4><?= $card['title']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } }?>
            </div>
            <a href="book.php" class="button button-book">Réserver une table</a>
        </section>
        <!-- END Programs -->
    </main>
        
    <?php
    require_once('templates/footerMain.php');
    ?>