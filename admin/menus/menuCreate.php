<?php
require_once ('../../lib/tools.php');
require_once ('../../lib/config.php');
require_once('../../lib/category.php');
require_once('../../lib/menuCard.php');
require_once('../../lib/pdo.php');
require_once ('../../templates/headerBootstrap.php');


$categories = getCategories($pdo);

$errors = [];
$messages = [];
$card = [
    'title' => '',
    'description' => '',
    'price' => '',
    'category_id' => '',
];

if (isset($_POST['save_card'])) {
    $fileName = null;
    // Si un fichier a été envoyé
    if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
        // la méthode getimagessize va retourner false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // Si c'est une image on traite
            $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], '../../uploads/card-img/'.$fileName);
        } else {
            // Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit être une image';
        }
    }

if (!$errors) {
    $res = saveMenuCard($pdo, $_POST['title'], $_POST['description'], $_POST['price'], $_POST['category_id'], $fileName);

    if ($res) {;
        $messages[] = 'Le plat a bien été ajouté';
    } else {
        $errors[] = "Une erreur s\'est produite.";
    }
}
}

?>

<body class="bodyForm">
    <main>
        <?php include('../../lib/message.php'); ?>
        <div class="container mt-4">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Ajouter un plat
                                <a href="../admin.php" class=" bttn btn float-end">Retour</a>
                                <a href="/index.php" class=" bttn btn float-end">Accueil</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label>Titre</label>
                                    <input type="text" name="title" class="form-control" required></input>
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" required></input>
                                </div>
                                <div class="mb-3">
                                    <label>Prix</label>
                                    <input type="text" name="price" class="form-control" required></input>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Catégorie</label>
                                    <select name="category_id" id="category_id" class="form-select" required>

                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?=$category['id']; ?>" <?php if ($card['category_id'] == $category['id']) { echo 'selected="selected"'; } ?>><?=$category['name'];?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Image</label>
                                    <input type="file" name="file" id="file">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save_card" class=" bttn btn">Ajouter plat</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('../../templates/footer.php') ;?>

