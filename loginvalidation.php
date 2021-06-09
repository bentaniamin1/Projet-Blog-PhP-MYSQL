<?php 
    
    session_start();
    
    echo $_POST['motdepasse'];
    
    
    include 'pagedeconnection.php';
    
   
    $prep = $bdd->prepare( 'SELECT * FROM profil  ' );
    
    $prep->execute(
        array( 
            ':bn' => $_POST['email'],
            ':ps' => $_POST['motdepasse'])

    );
    $users = $prep->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($users as $user){
        echo $user['email'].' '. $user['motdepasse'].'</br>';
        
        
        if  (isset($_POST['email']) && isset($_POST['motdepasse']) ) :
            
            echo 'coucoucccccc';
            if(($_POST['email'] == $user['email'] )&& ($_POST['motdepasse'] == $user['motdepasse']) ){
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['pseudo'] = $user['pseudo'];
                
                echo'bonne donééé';
                header("Location: billiets.php");
                exit;
            }
            else{
                $_SESSION['message1']='mots-de passe ou identifiant incorrect';
                $_SESSION['message2'] ='Veuillez remplir les champs';
                header("Location: login.php");
                
            }
        else :
            
            
        endif;
    }
    

    ?>

    
    
    
    