 <?php 
 define('DB_HOST', 'mysql-edouardburel.alwaysdata.net');
 define('DB_NAME', 'edouardburel_quai-antique');
 define('DB_USER', '302132_ecf2023');
 define('DB_PASSWORD', 'Ecf-2023');

 try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Gérer l'erreur de connexion
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    // Arrêter l'exécution du script ou effectuer d'autres actions appropriées
}
