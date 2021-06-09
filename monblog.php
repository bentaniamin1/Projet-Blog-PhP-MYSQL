<?php
   session_start();

   //c'est la ou il y aura la creation d'article ou bien on pourra poser une question sur un probleme en precisant la categorie
   

        
        
        ?>
<!DOCTYPE html>
<html lang="en">
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
            height: 100vh ;
          
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

.login h1 {
    color:
}
.login {
    max-width:380px;
    margin: auto;
    margin-top:100px;
    background-color: rgba(0,0,1,0.8);
    text-align:center;
    border-radius: 20px;
    padding:40px;
    box-sizing:border-box;
    color: #f1f1f1;
}

input{
    width:100%;
    margin: 10px 0;
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
    position: relative;
    right:12px;

}








</style>
</head>
<header>
    <nav>
    
        <ul>
            <li><a href="acceuil.php">Home</a></li>
            <li><a href="logut.php">Logut</a> </li>
        </ul>
    </nav>
    
    
</header>
<body>
    


    
    

<form class=login  method="post" action="validationcreationblog.php">
    <h1>Creation article/blog</h1>
    <input type="text" placeholder="Titre" name="titre" id="titre"></br>
    <input type="text" placeholder="Catégorie" name="categori" id="categori"></br>
    <textarea type= "text" class="textarea" name="contenu" id ="contenu" rows="5" cols="40"></textarea>
    <input type="submit" value="Envoyer!">
</form>
</body>