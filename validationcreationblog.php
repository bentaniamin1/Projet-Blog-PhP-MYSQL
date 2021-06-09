<?php

session_start();
echo $_POST['categori'];
echo $_POST['titre'];
echo $_POST['contenu'];
include('pagedeconnection.php');

$stmt7 = $bdd ->prepare('SELECT user_id FROM profil WHERE email = :email');
$stmt7->execute(
    array(
        ":email" => $_SESSION['email']
    )
);
echo $_SESSION['email'];
$recuperationiduser = $stmt7->fetch(PDO::FETCH_ASSOC);
echo $recuperationiduser['user_id'].'edddd</br>  ';



$prep = $bdd->prepare( 'SELECT COUNT(billiets_id) FROM billiets' );
    
    $prep->execute(
        

    );
    $users = $prep->fetch();
    if (   isset($_POST['titre']) && isset($_POST['contenu']))   :
        echo $users['COUNT(billiets_id)'];
        $id=$users['COUNT(billiets_id)'];
        echo $id;
        while($users['COUNT(billiets_id)'] >= $id){
            $id++;
        }
        // Je donne une variable d'authorisation
        echo $id.'salut';
        $prep = $bdd ->prepare('INSERT INTO billiets(billiets_id, user_id, titre, contenu, date_publication) VALUES(:id,:userid,:titre,:contenu, :datepublication)');
        
        $prep->execute([

            ':id' => $id, ':userid' => $recuperationiduser['user_id'], ':titre' => $_POST['titre'],':contenu' => $_POST['contenu'], ':datepublication'=>date('d-m-y h:i:s') 
         ] );
        $prep = $bdd ->prepare('SELECT COUNT(category_id) FROM category_billiets');
        
        $prep->execute( );
       $category = $prep->fetch(PDO::FETCH_ASSOC);
       

       echo $category['COUNT(category_id)'];
       $_id=$category['COUNT(category_id)'];
       echo $_id.'cacaaaaaa';
       echo $_POST['categori'];
       while($category['COUNT(category_id)'] >= $_id){
           $_id++;
       }

        $prep = $bdd ->prepare('INSERT INTO category_billiets (category_id, billiets_id) VALUES (:category_id,:billiets_id);');
        
        $prep->execute([

            ':category_id' => $_id, ':billiets_id' => $id ] )
            
        ;
        #$blog = $prep->fetch(PDO::FETCH_ASSOC);

       $prep = $bdd ->prepare('INSERT INTO category (category_id, nom) VALUES (:category_id, :nom)');
        
       $prep->execute([

           ':category_id' => $_id, ':nom' => $_POST['categori']
        ] )
           
       ;
      #$category_bi = $prep->fetch(PDO::FETCH_ASSOC);


        
        
        
       
        echo 'tas reussi';
        
        header("Location: evenements.php");
        exit; // Je redirige vers la page forum 
          
    else :
        header("Location: monblog.php");
        exit;
       
    endif;



?>