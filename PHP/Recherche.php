<?php include("head.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/accueil.css">
    <link rel="stylesheet" href="./CSS/style2.css">
    <title>Document</title>
</head>
<body>
    <?php include('Connect.php');
        $recherche = $_GET['search'];

        if($recherche===""){
            echo "<h3>Vous n'avez rien écrit dans la barre de recherche.</h3>";
        }else{
            
            $reponse = $cnx->query('SELECT * FROM `article` join categorie on article.CODE_TYPE_ART=categorie.CODE_TYPE_ART 
            WHERE CONTENU_ARTICLE LIKE \''.'%'.$recherche.'%'.'\' OR LIB_TYPE_ART = \''.$recherche.'\' and ARCHIVE = 1 order by DATE_PUBLICATION DESC');
            $donnees = $reponse->fetchall(PDO::FETCH_OBJ);

            if(empty($donnees)){
                echo "<h3>Nous n'avons trouvé aucun résultat pour votre recherche.</h3>";
            }else{
                echo '<h3>Voici les résultats pour: \''.$recherche.'\'.</h3>';
                foreach($donnees as $contenu){?>
                <article>
                    <div id="titrearticle">                       
                    </div>
                    <div id="contentart">
                        <h3><a href="Article.php?idarticle=<?=$contenu->ID_ARTICLE?>"><?=$contenu->TITRE_ARTICLE?></a></h3>
                        <div class="box">
                            <div class="image">
                            <img id="imgart" src="images/imagesArticle/<?=$contenu->REF_IMAGE?>" alt="popcorn">
                            </div>
                            <div id="textart">
                                <p><?=$contenu->RESUME_ART." ... "?></p>
                            </div>
                        </div> 
                    </div>
                </article>
            <?php
            }
            }
        }

    ?>

<footer style ="margin-top:15em;">

<?php $msgnews = "" ?>
<?php
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
     <h4>souhaitez-vous vous inscrire à notre newsletter pour être informé de la sortie de nos nouveaux articles ?</h4>
     <form action="" method="post">
         <input type="email" name='mailnews' placeholder="Saississez votre mail...">
         <input type="submit" name='submitnews' value="S'incrire">
     </form>
     <?= $msgnews ?>
     <button class="btnFooter" onclick="location.href='charte.php';">La charte du blog</button>
     <button class="btnFooter" onclick="location.href='FooterMentionsLegales.php';">Mentions légales</button>
     
 </div>

</footer>
</body>
</html>