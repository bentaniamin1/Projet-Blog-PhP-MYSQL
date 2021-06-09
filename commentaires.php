<?php

session_start();

date_default_timezone_set('Europe/Paris');


echo $_SESSION['id'].'</br>';


include 'pagedeconnection.php';
$stmt = $bdd->prepare("SELECT * FROM billiets WHERE billiets_id = :id");
$stmt->execute([
    ":id" => $_SESSION['id']
]);
$stmt9 = $bdd->prepare("
SELECT *
FROM commentaires
INNER JOIN profil ON commentaires.user_id=profil.user_id
JOIN billiets  ON commentaires.billiets_id= billiets.billiets_id
        AND commentaires.billiets_id = :id
");
$stmt9->execute([
    ":id" => $_SESSION['id']
]);

$commentaires = $stmt9->fetch(PDO::FETCH_ASSOC);

$stmt6 = $bdd ->prepare('SELECT MAX(commentaires_id) FROM commentaires');
$stmt6->execute();
$somme = $stmt6->fetch(PDO::FETCH_ASSOC);

$stmt7 = $bdd ->prepare('SELECT user_id FROM profil WHERE email = :email');
$stmt7->execute(
    array(
        ":email" => $_SESSION['email']
    )
);

$recuperationiduser = $stmt7->fetch(PDO::FETCH_ASSOC);
//je recupere l'user id en fonction de son email

echo $recuperationiduser['user_id'].'</br>  ';

     
    

if  (isset($_GET['comment'])) { 
    
    echo $_GET['comment'];
    echo'on a reussi';
    
    $_id = $somme['MAX(commentaires_id)'];
    while($somme['MAX(commentaires_id)'] >= $_id) {

        $_id++;
    }
    echo $_id;
    
    $stmt5 = $bdd ->prepare('INSERT INTO commentaires(user_id,commentaires_id, textecommentaire, billiets_id,date_publication) VALUES(:userid,:commentaireid,:txt,:id2, :ora)');
    $stmt5->execute(
        [
            ":userid" =>$recuperationiduser['user_id'],
            ":commentaireid" => $_id,
            ":txt"=> $_GET['comment'],
            ":id2"=> $_SESSION['id'],
            ":ora"=> date('d-m-y h:i:s')
            
            ]
        );
    #$commentaires1 = $stmt5->fetch(PDO::FETCH_ASSOC);
    header("Location: billiets.php?id=".$_SESSION['id']); // Je redirige
    exit;

    
} 

  
    
    



?>