 <?php
$pdo = new PDO('mysql:dbname=edouardburel_quai-antique;host=mysql-edouardburel.alwaysdata.net', '302132_ecf2023', 'Ecf-2023');
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);