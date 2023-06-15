<?php
require('../../lib/pdo.php');
require_once('../../lib/config.php');
require_once('../../lib/category.php');
require_once('../../lib/menuCard.php');
require_once ('../../templates/headerBootstrap.php');


$categories = getCategories($pdo);

?>

<body class="bodyForm">
    <main>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Détails du plat menu
                                <a href="menuIndex.php" class="bttn btn btn float-end">Retour</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_GET['id']))
                            {
                                $galery_id = $_GET['id'];
                                $query = "SELECT * FROM menu_card WHERE id = :galery_id";
                                $res = $pdo->prepare($query);
                                $res->bindParam(":galery_id", $galery_id);
                                $res->execute();

                                if ($res->rowCount() > 0) {
                                    $menu = $res->fetch(PDO::FETCH_ASSOC);
                                    ?>             
                                        <div class="mb-3">
                                            <label>Titre</label>
                                            <p class="form-control">
                                                <?= $menu['title']; ?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <p class="form-control">
                                                <?= $menu['description']; ?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Prix</label>
                                            <p class="form-control">
                                                <?= $menu['price'];?>€
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Catégorie</label>
                                            <p class="form-control">
                                            <?php foreach ($categories as $category) { ?>
                                                <?php if ($menu['category_id'] == $category['id']) { echo $category['name']; } }?>
                                            </p>
                                        </div>

                                        <div class="mb-3">
                                            <label>Image</label>
                                        </div>
                                        <img src="<?=getRecipeImage($menu['image']); ?>" alt="<?= $menu['title'];?>" class="img">

                                    <?php
                                }
                                else
                                {
                                echo "<h4> No such Id found</h4>"; 
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('../../templates/footer.php') ;?>