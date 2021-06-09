<?php
   session_start();
   

        
        
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
<?php include('moncss.css') ?>
.erreur{
    color:red;
}
</style>
</head>
<body>


<?php if (!isset($_SESSION['message'])):?>
<form class=login  method="post" action="confirmationinscription.php">
    <h1>login</h1>
  
    <input type="text" placeholder="Nom" name="lastName" id="lastName"></br>

    <input type="text" placeholder="prenom" name="firstName" id="firstName"></br>
        
    <input type="text"placeholder="Pseudo *" name="pseudo" id="pseudo"></br>
    <input type="email" name="email"placeholder="Email *" id="email"></br>
    <input type="password" name="motdepasse" placeholder="Mot-de-passe *" id="motdepasse"></br>
    <input type="password" name="motdepasse1" placeholder="Mot-de-passe à nouveau*" id="motdepasse1"></br>
    <input type="submit" value="Envoyer!">
    
    
    </form>
    <?php else :?>
        <form class=login  method="post" action="confirmationinscription.php">
        <h1>login</h1>
        <h2 class="erreur"><?php echo $_SESSION['message'] ?></h2>
        <input type="text" placeholder="Nom" name="lastName" id="lastName"></br>
        
        <input type="text" placeholder="prenom" name="firstName" id="firstName"></br>
            
        <input type="text"placeholder="Pseudo *" name="pseudo" id="pseudo"></br>
        <input type="email" name="email"placeholder="Email *" id="email"></br>
        <input type="password" name="motdepasse" placeholder="Mots-de-passe *" id="motdepasse"></br>
        <input type="password" name="motdepasse1" placeholder="Mots-de-passe à nouveau*" id="motdepasse1"></br>
        <input type="submit" value="Envoyer!">
        



        </form>
    
        <?php endif;?>
</body>
</html>