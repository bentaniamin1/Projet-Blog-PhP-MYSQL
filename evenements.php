<?php

session_start();
//evenements c'est le forum c'est la ou il y aura tout les questios tout les articles des user où on pourra y acceder pour y voir plus et y repondre;
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
       
        *{
            margin: 0;
            padding: 0;
           
           ;
            
            ;
       }
       
       
       header{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items:flex-end;
            padding:20px 50px;
            background-color: gray;
            opacity: 0.8;
            
            
            
            

        }
        body {
            background:url('fond.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-style: "roboto";
            height:100%;
        }
        nav ul {
            display:flex;
            list-style: none;
          
        }

        nav ul li a {
            flex: 2;
            padding: 10px;
            text-decoration: none;
            color: honeydew;
            font-size: 20px;
        }
        nav ul li a:nth-child(1):hover
        
        {
            color:blue;
            
            background-color:red;
            border-radius: 20px;

        }


        .liens li  {
           
            padding: 0px 10px;
        }

        section .main {
            background-image: linear-gradient( 109.6deg,  rgba(185,212,242,1) 11.2%, rgba(244,210,226,1) 100.3% );
            width:70%;
          
            border-radius:5px;
         
            margin: 80px auto;
        }
        section .main h2{
            text-align:center;
        }

       
        a{
            text-decoration:none;
            color:#f1f1f1;
        }
        
    </style>
</head>
<body>  

    <header>
    <nav>
    
    <ul>
    <li><a href="billiets.php">Home</a></li>
    <li><a href="monblog.php">Ma question forum/blog</a> </li>
    <li><a href="logout.php">Logout</a> </li>
    </ul>
    </nav>
    
    
    </header>
    <p> Vous etes bien  connecté <?=   $_SESSION['pseudo']?> , dernière connexion le <?=  ''.date('d-m-y h:i:s') ?></p>
        <?php
      
        
        include 'pagedeconnection.php';
        if($id <=1 ){
            
            $id = 1;
        }
        $stmt = $bdd->prepare("SELECT * FROM billiets WHERE billiets_id = :id");
        $stmt->execute([
            ":id" => $id
            ]);
            
        $billiets = $stmt->fetch(PDO::FETCH_ASSOC);
       
        $stmt2 = $bdd->prepare("
        SELECT * FROM category bi
        JOIN category_billiets c ON bi.category_id = c.category_id 
                AND c.billiets_id = :id
                ");
        $stmt2->execute([
            ":id" => $id
            ]);
        $category = $stmt2->fetch(PDO::FETCH_ASSOC);
        
        $stmt3 = $bdd->prepare("
        SELECT * FROM profil pr
        JOIN billiets b ON pr.user_id = b.user_id 
                AND b.billiets_id = :id
        ");
        $stmt3->execute([
            ":id" => $id
        ]);
        $profils = $stmt3->fetch(PDO::FETCH_ASSOC);
        
        $stmt5 = $bdd->prepare("
        SELECT *
        FROM commentaires 
        INNER JOIN profil ON commentaires.user_id=profil.user_id
        JOIN billiets  ON commentaires.billiets_id= billiets.billiets_id
        AND billiets.billiets_id = :id 
        ");
        $stmt5->execute([
            ":id" => $id
            ]);
            $commentaires = $stmt5->fetchAll(PDO::FETCH_ASSOC);
            
        $stmt6 = $bdd->prepare("
        SELECT *
        FROM category_billiets cb 
        INNER JOIN category ca ON cb.category_id=ca.category_id
        JOIN billiets  ON cb.billiets_id= billiets.billiets_id
        
        
        ");
        $stmt6->execute([
            
            
            ]);
            $evenements = $stmt6->fetchAll(PDO::FETCH_ASSOC);
            
            $_SESSION['id'] = $id;
            
            ?>
          
          <section class="main">
           
    <?php foreach($evenements as $evenement):?>
            <div class="main">
            <h2>
            <?php echo $evenement['titre'].'</br>';?>
            </h2>
            <p>
            <?php echo'Category: '.$evenement['nom'].'</br> ';?>
            </p>
            <?php echo $evenement['contenu'].'</br>';?>
            <a href="acceuil.php">Voir plus pour commenter</a>
            </div>
    <?php endforeach;?>
          </section>
       
</body>
</html>