<?php 
    
    session_start();
    echo $_POST['email'];
   

    
    include 'pagedeconnection.php';
   
    $prep = $bdd->prepare( 'SELECT COUNT(user_id) FROM profil' );
    
    $prep->execute(
        

    );
    $users = $prep->fetch();
    if ( (   isset($_POST['email']) && isset($_POST['motdepasse']) && isset($_POST['motdepasse1'])) && ($_POST['motdepasse'] == $_POST['motdepasse1']))   :
        echo $users['COUNT(user_id)'];
        $id=$users['COUNT(user_id)'];
        while($users['COUNT(user_id)'] >= $id){
            $id++;
        }
       
        
        $prep = $bdd ->prepare('INSERT INTO profil(user_id,email, motdepasse,pseudo,commentaires_id) VALUES(:id,:bn,:ps,:pseudo, :idcommentaire)');
        
        $prep->execute(
            array( ':bn' => $_POST['email'], ':ps' => $_POST['motdepasse'], ':id' => $id,':pseudo' => $_POST['pseudo'],':idcommentaire' => $id  )
            
        );
       $users = $prep->fetchAll(PDO::FETCH_ASSOC);


        
        
        
        
        echo 'tas reussi';
        header("Location: login.php");
                exit;
    else :
        $_SESSION['message'] = 'l\'un des mot-de-passe n\'est pas pareil à l\'autre';
        header("Location: inscription.php");
       
    endif;
    ?>

    
    
    
   