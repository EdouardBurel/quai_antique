 <?php
$pdo = new PDO('mysql:dbname=edouardburel_quai-antique;host=mysql-edouardburel.alwaysdata.net', '302132_ecf2023', 'Ecf-2023');

$con = mysqli_connect("mysql-edouardburel.alwaysdata.net","302132_ecf2023","Ecf-2023","edouardburel_quai-antique");

if(!$con){
    die('Connection failed'.mysqli_connect_error());
}


/*$pdo = new PDO('mysql:dbname=heroku_8ec8af75fcbe495;host=us-cdbr-east-06.cleardb.net;charset=utf8mb4', 'ba1742d8fcbee0', 'a0fadf04');
*/
/*$pdo = new PDO('mysql:dbname=studi_cuisinea;host=localhost;charset=utf8mb4', 'root', '');
*/