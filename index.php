<?php
require_once ('templates/header.php');

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
            <img src="./images/chef3.jpg" class="image-office" alt="Photographie des locaux de Station F">
        </section>
        <!-- END Cover -->

        <!-- START Programs : La deuxième section de la page -->
        <section class="programs" id="generation-entrepreneurs">
            <div class="flux">
                <div class="container-texts">
                    <h2 class="title-2">Quai Antique - Le Restaurant de Chambery</h2>
                    <p class="text-paragraphe">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                    <a href="book.php" class="button button-orange">Réserver une table</a>
                </div>
                <ul class="container-images">
                    <li>
                        <img src="images/food.jpg" alt="Logo HEC">
                    </li>
                    <li>
                        <img src="images/food5.jpg" alt="Logo Microsof">
                    </li>
                    <li>
                        <img src="images/food6.jpg" alt="Logo Founders">
                    </li>
                </ul>
            </div>
        </section>
            <!-- END Programs -->

            <!-- START online : La troisième section de la page -->
        <section class="online" id="contact-details">
            <div class="flux online-content">
                <img class="img-contact" src="images/food1.jpg" alt="Capture d'écran du tableau de bord des cours en ligne">
                <div class="container-texts">
                    <h2 class="title-2">Nos Horaires d'ouverture</h2>
                    <table class="text-paragraphe">
                        <tr><th>Sunday</th><td>Closed</td></tr>
                        <tr><th>Monday</th><td>9am - 5pm</td></tr>
                        <tr><th>Tuesday</th><td>9am - 5pm</td></tr>
                        <tr><th>Wednesday</th><td>9am - 5pm</td></tr>
                        <tr><th>Thursday</th><td>9am - 5pm</td></tr>
                    </table>
  
                    <a href="#" class="button button-black">Nous contacter</a>
                </div>
            </div>
        </section>
            <!-- END online -->
    </main>
    <footer></footer>
    
<?php
require_once('templates/footer.php');
?>