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
        body { /* <a href='https://fr.freepik.com/photos/fond'>Fond photo créé par denamorado - fr.freepik.com</a>*/
            background-image: url(fond.jpg);
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
            width:70%;
            
            margin: 80px auto;
        }
        section .main h2{
            text-align:center;


        }
        section .main {
           
          
        }

        .message {
            position:relative;
            border: 1px black solid;
            width:30%;
            height:80px ;
            margin:50px 10%;
            background-color: rgba(0,0,1,0.8);
            color:#f1f1f1;
            border-radius:5px;
            z-index:-1;
            border-bottom:3px red solid;
            
            
         }
       
        .message p:nth-child(1) {
            position : absolute;
            top: 30px;
            
            
        }

        .formulaire{
            margin-left:50%;
            top:50%;
            transform:translateX(50%);
            transform:translateY(50%);
           
        }

        .lien {
           position: relative;
           text-decoration:none;
           
           left:43%;
           

           
        }
        a{
            text-decoration: none;
            padding:10px 5px;
            background-color:#f1f1;
            color:rgba(0,0,1,0.8);
        }

    </style>
</head>
<body>  

    <header>
    <nav>
    
    <ul>
    <li><a href="login.php">Login</a> </li>
    </ul>
    </nav>
    
    
    </header>
     
        <?php
        echo date('d-m-y h:i:s');
        
        
       
        
        include 'pagedeconnection.php';
        if($id <=1 ){
            
            $id = 1;
        }
        $stmt = $bdd->prepare("SELECT * FROM billiets WHERE billiets_id = :id");
        $stmt->execute([
            ":id" => $id
            ]);
           
        $billiets = $stmt->fetch(PDO::FETCH_ASSOC);
        //je recupere les questions en fonction de leurs id
        $stmt2 = $bdd->prepare("
        SELECT * FROM category bi
        JOIN category_billiets c ON bi.category_id = c.category_id 
                AND c.billiets_id = :id
                ");
        $stmt2->execute([
            ":id" => $id
            ]);
        $category = $stmt2->fetch(PDO::FETCH_ASSOC);
        //j'utilise une jointure pou recuperer les categories en fonction des billiets
        
        $stmt3 = $bdd->prepare("
        SELECT * FROM profil pr
        JOIN billiets b ON pr.user_id = b.user_id 
                AND b.billiets_id = :id
        ");
        $stmt3->execute([
            ":id" => $id
        ]);
        $profils = $stmt3->fetch(PDO::FETCH_ASSOC);
        //je recuperes les profils en fonction des id
        
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
            
            
            
            
            
            $_SESSION['id'] = $id;
           
           
            
            
            ?>
          
          <section class="main">
            <div class="main">
            <H1>Ecrit par le</H1>
            <h2>
            <?php echo $billiets['titre'].'</br>';?>
            </h2>
            <p>
            <?php echo 'style: '.$category['nom'].'</br> ';?>
            </p></br>
            <?php echo $billiets['contenu'].'</br>';?>
            </div>
    <div class="lien">

        <?php if($id > 0): ?>
            
            <a href="acceuil.php?id=<?= $id - 1 ?>">Page précédente</a>
            <?php endif; ?>
            <a href="acceuil.php?id=<?= $id + 1 ?>">Page suivante</a>
        </div>
          </section>
   
          
  
    
    
    <?php foreach($commentaires as $commentaire):?>
    <div class="message">
     
     <p class="texte"><?= $commentaire['textecommentaire']; ?></p>
     <p class="pseudo"> Par <?= $commentaire['pseudo'].' '.''.' '.' '.'le '.' '.''.$commentaire['date_publication']; ?></p>
     
     
    </div>
    
    <?php endforeach;?>
    
    </section>
    
    
</body>
</html>