<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./CSS/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet" type="text/css" />
    <title>ProjetBlog</title>
</head>

<body>

</body>

<footer>

   <?php $msgnews = "" ?>
   <?php
        include('Connect.php');

        if(isset($_POST['submitnews']) && isset($_POST['mailnews'])){
            $mailnews = $_POST['mailnews'];

            if(empty($mailnews)){
                $msgnews = "<p>L'adresse mail doit être renseignée.</p>";
            }else{
                $searchmail = $cnx->query('select * from utilisateur where EMAIL_UTILISATEUR = \''.$mailnews.'\' and ABONNE_NEWS = 1');
                $donneesmail = $searchmail->fetch(PDO::FETCH_OBJ);

               if($donneesmail === false){  
                    $sqlnews = "insert into utilisateur (EMAIL_UTILISATEUR, ABONNE_NEWS)
                    VALUES ('$mailnews', '1')";
                    $cnx->exec($sqlnews);
                    $msgnews = "<p>Vous êtes maintenant inscrit à notre newsletter.</p>";
                }else{
                    $msgnews = "<p>Vous êtes déjà inscrit à notre newsletter.</p>";
                }
            }
        }
        ?>

    <div id="TotalFooter">
        <h4>Souhaitez-vous vous inscrire à notre newsletter pour être informé de la sortie de nos nouveaux articles ?</h4>
        <form action="" method="post">
            <input type="email" name='mailnews' placeholder="Saississez votre mail...">
            <input type="submit" name='submitnews' value="S'incrire">
        </form>
        <?= $msgnews ?>
        <button class="btnFooter" onclick="location.href='charte.php';" >La charte du blog</button>
        <button class="btnFooter" onclick="location.href='FooterMentionsLegales.php';" >Mentions légales</button>
        
    </div>

</footer>

</html>