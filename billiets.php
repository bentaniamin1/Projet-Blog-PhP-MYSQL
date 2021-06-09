<?php

session_start();
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
            width:70%;
            border: 1px solid black;
            margin: 80px auto;
        }
        section .main h2{
            text-align:center;


        }

        .message {
            position:relative;
            border: 1px black solid;
            width:30%;
            bottom:180px;
            height:80px ;
            margin:50px 10%;
            border-radius:5px;
            background-color: rgba(0,0,1,0.8);
            color:#f1f1f1;
         }
        
        .texte{
            position:absolute;
            top:30%;
            left:10%;
            
        }
        .pseudo{
            position:absolute;
            bottom:0;
            left:5%;
            
        }

        .formulaire{
            margin-left:50%;
            top:50%;
            transform:translateX(50%);
            transform:translateY(50%);
           
        }
        section .main {
            background-color: rgba(0,0,1,0.8);
            color:#f1f1f1;
            border-radius:10px;
        }
            .formulaire {
        max-width:380px;
        margin: auto;
        margin-top:80px;
        margin-right:150px;
        background-color: rgba(0,0,1,0.8);
        text-align:center;
        border-radius: 20px;
        padding:40px;
        box-sizing:border-box;
        color: #f1f1f1;
        text-align:center;
        }
        h3{
            position:relative;
            bottom:15px;
        }

        input{
            width:100%;
            margin: 5px 0;
            outline:none;
            padding:10px 6px;
            background-color: transparent;
            color: #f1f1f1;
            font-weight:bold;
            font-size:19px;
            border: none;
            border-bottom: 2px solid #f1f1f1;


        }


        input[type=submit]{
            width:80%;
            border-radius:10px;
            background-color:black;
            cursor:pointer;

        }

        .textarea{
            position:relative;
            right:15px;
        }

    </style>
</head>
<body>  

    <header>
        <nav>
        
            <ul>
                <li><a href="billiets.php">Home</a></li>

                <li><a href="evenements.php">Forum</a>  </li>
                <li><a href="monblog.php">Ma question forum/blog</a> </li>
                <li><a href="logout.php">logout</a> </li>
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
        //recuperation des categories
        
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
            //recuperation des commentaires
            $_SESSION['id'] = $id;
            ?>
          
          <section class="main">
            <div class="main">
                <H1>Festvial:</H1>
                <h2>
            <?php echo $billiets['titre'].'</br>';?>
            </h2>
            <p>
            <?php echo $category['nom'].'</br> ';?>
            </p>
            <?php echo $billiets['contenu'].'</br>';?>
            </div>
          </section>
   
          
    <form class = "formulaire"action="commentaires.php" action ="get">
    <h3>Repondre en tant que <?= $_SESSION['pseudo']?> </h3>
    
    <textarea type= "text" class ="textarea" name="comment" id ="comment" rows="5" cols="40"></textarea>
    <label for="comment"></label></br>
    <input type="submit" value="Publier!">
    </form>
    
    <section class="commentaires">
    
    
    <?php foreach($commentaires as $commentaire):?>
    <div class="message">
     
     <p class="texte"><?= $commentaire['textecommentaire']; ?></p>
     <p class="pseudo"> Par <?= $commentaire['pseudo'].' '.''.' '.' '.'le '.' '.''.$commentaire['date_publication']; ?> </p>
     
     
    </div>
    
    <?php endforeach;?>
    
    </section>
    
    
    
      
</body>
</html>
