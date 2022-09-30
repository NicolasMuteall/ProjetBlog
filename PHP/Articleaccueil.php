
<?php
include("head.php")
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/accueil.css">
    <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>
<body>
    <?php 
        /*include('../entete.html');*/
        include('Connect.php');
        $reponsecat = $cnx->query('select * from categorie');
        $donneescat = $reponsecat->fetchall(PDO::FETCH_OBJ);
    ?>
            
            <select name="Categorie" id="Categorie">
                <option value="Rien">Choisissez une catégorie</option>
                <?php
                    foreach($donneescat as $resultat){?>
                        <option value="<?=$resultat->CODE_TYPE_ART?>"><?=$resultat->LIB_TYPE_ART?></option>
                    <?php
                    }
                ?>
            </select>
            
            <script>
                let categorie = document.getElementById('Categorie');
                categorie.addEventListener('change', function() {
                    if(categorie.value === 'Rien'){
                        window.location = "Articleaccueil.php";
                    }else{
                        /*alert('You selected: ' + categorie.value);*/
                        window.location = "ArticleTheme.php?cat="+categorie.value;
                    }  
                });
            </script>
            
    <?php
        $reponse = $cnx->query('select * from article where ARCHIVE = 1 order by DATE_PUBLICATION DESC');
        $donnees = $reponse->fetchall(PDO::FETCH_OBJ);
        foreach($donnees as $contenu){
    ?>
        <article>
            <div id="titrearticle">
                
            </div>
            <div id="contentart">
                <h3><a href="Article.php?idarticle=<?=$contenu->ID_ARTICLE?>"><?=$contenu->TITRE_ARTICLE?></a></h3>
                <div class="box">
                    <div class="conteneur-image">
                    <img class="imgart" src="images/imagesArticle/<?=$contenu->REF_IMAGE?>" alt="popcorn">
                    </div>
                    <div class="textart">
                        <p><?=$contenu->RESUME_ART."...."?></p>
                    </div> 
                </div>
            </div>
        </article>
    <?php
    }
    include("footer.php")
    ?>
     <script type="text/javascript" src="script.js"></script>
</body>
</html>