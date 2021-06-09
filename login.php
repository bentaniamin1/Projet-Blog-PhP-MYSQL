<?php
    session_start();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue-Login</title>
    <style>
    
<?php include('moncss.css')?>
    </style>
</head>
<body>
    
    
    
    <?php if (!isset($_SESSION['message1']) && !isset($_SESSION['message2']) ): ?>
    <form class ="login" action="loginvalidation.php" method="post">
        
        <input type="email" name="email"placeholder="Email *" id="email"></br>
        <input type="password" name="motdepasse" placeholder="mot-de-passe *" id="motdepasse"></br>
        <input type="submit" value="Envoyer!"></br>
        <p>Vous etes Nouveau?<a href="inscription.php">inscrit toi!</a> </p> 
    </form>
   
    <?php else :?>
        
        <form class ="login" action="loginvalidation.php" method="post">
    
            <?php echo $_SESSION['message1']?>
            <?php echo $_SESSION['message2']?>
            
            <input type="email" name="email"placeholder="Email *" id="email"></br>
            <input type="password" name="motdepasse" placeholder="mots-de-passe *" id="motdepasse"></br>
            <input type="submit" value="Envoyer!"></br>
            <p>Vous etes Nouveau?<a href="inscription.php">inscrit toi!</a> </p> 
        </form>
    <?php endif;?>
    
</body>
</html>