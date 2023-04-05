<?php
require_once ('templates/header.php');
require_once('lib/category.php');
require_once ('lib/card.php');

?>

<body>
    <section class="our-team" id="team">
        <h1 class="heading">Our talented chef</h1>
        <div class="our-chef">
        <?php
                $query = 'SELECT * FROM galery';
                $query_run = mysqli_query($con, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $card)
                    {
            ?>
            <div class="item">
                <div class="image">
                <img src="<?=getRecipeImage($card['image']); ?>" alt="<?= $card['title']; ?>">
                </div>
                <div class="chef-info">
                    <div>
                        <h3>Chef info</h3>
                        <span>Master poo</span>
                    </div>
                </div>
            </div>
            <?php }
                    }
            ?>


            <div class="item">
                <div class="image">
                    <img src="images/chef2.jpg" alt="">
                </div>
                <div class="chef-info">
                    <div>
                        <h3>Chef info</h3>
                        <span>Master poo</span>
                    </div>
                </div>
            </div>

        </div>

    </section>
</body>
</html>