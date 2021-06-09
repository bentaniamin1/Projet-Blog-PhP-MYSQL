<?php 

$dsn = 'mysql:host=localhost;dbname=amin_bentani';

$us = 'root';

$pwd = 'root';

$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);



try {

    $bdd = new PDO($dsn, $us, $pwd , $options);  

}

catch ( PDOException $e ) {

    die ( 'Erreur : ' . $e->getMessage() );

}

?>