<?php
        include("head.php");
          ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/accueil.css">
    <title>Document</title>
</head>
<body>
    
    <?php
        include('Connect.php');

        $idarticle = $_GET['idarticle'];

        $reponse = $cnx->query('select * from article where ID_ARTICLE = \''.$idarticle.'\'');
        $donnees = $reponse->fetch(PDO::FETCH_OBJ);

        $msgvote = "";
        $vote = "";
        $repvote = "";

        if(isset($_POST['submit'])){
            if(isset($_POST['contact'])){
                $reputilisateur = $_POST['contact'];
                
                if($reputilisateur === '1'){ 
                    $sqlvote = "insert into vote (ID_ARTICLE, CPT_VOTE_INFO)
                    VALUES ('$idarticle', '1')";
                    $cnx->exec($sqlvote);
                    $repvote = "Info est la ";
                }else{
                    $sqlvote = "insert into vote (ID_ARTICLE, CPT_VOTE_INTOX)
                    VALUES ('$idarticle', '1')";
                    $cnx->exec($sqlvote);
                    $repvote = "Intox est la ";
                }

                $reponsenbvote = $cnx->query('select count(CPT_VOTE_INTOX) FROM `vote` WHERE ID_ARTICLE = \''.$idarticle.'\'');
                $nbvoteintox = $reponsenbvote->fetch();

                $reponsenbvote2 = $cnx->query('select count(CPT_VOTE_INFO) FROM `vote` WHERE ID_ARTICLE = \''.$idarticle.'\'');
                $nbvoteinfo = $reponsenbvote2->fetch();

                $vote = "<p>Nombre de votes 'Info': ".$nbvoteinfo[0]."</p><p>Nombre de votes 'Intox': ".$nbvoteintox[0]."</p>";

                $reponsevote = $cnx->query('select * from article where ID_ARTICLE = \''.$idarticle.'\' and REPONSE_ART = \''.$reputilisateur.'\'');
                $donneesvote = $reponsevote->fetch(PDO::FETCH_OBJ);

                if($donneesvote === false){
                    $msgvote = "<p style='color:#dc2f02;'>$repvote Mauvaise réponse !</p>";
                }else{
                    $msgvote = "<p style='color:#588157;'>$repvote Bonne réponse !</b>";
                }

            }else {
                $msgvote = "Il faut voter !";
            }
        }
    ?>
    
    <article>
            <div id="titrearticle">
                
            </div>
            <div id="contentart">
                <h3><?=$donnees->TITRE_ARTICLE?></h3>
                    <div class='textaligncenter'>
                        <img class="imgart" src="images/imagesArticle/<?=$donnees->REF_IMAGE?>" alt="popcorn">
                    </div>
                <div id="textart">
                    <p><?=$donnees->CONTENU_ARTICLE?></p>
                </div> 
            </div>
    </article>
    <div id="vote">
        <form action="" method="post">
            <p>Selon-vous cet article est-il une Info ou est-ce une Intox ?</p>
            <div>
                <input type="radio" id="choix1" name="contact" value="1">
                <label for="contactChoice1">Info</label>
                <input type="radio" id="choix2" name="contact" value="0">
                <label for="contactChoice2">Intox</label>
            </div>
            <div id="btnvote">
                <button name='submit' type="submit">Voter</button>
            </div>
            <div class="textaligncenter margintop">
                <?=$msgvote?>
                <?=$vote?>
            </div>
        </form>
    </div>
    <?php
        date_default_timezone_set('Europe/Paris');
        $today = date("Y-m-d H:i");
        $msgerror = ""; 

        if(isset($_POST['submit2'])){
            
            if(isset($_POST['nom']) && isset($_POST['comm']) && !empty($_POST['nom']) && !empty($_POST['comm']) && empty($_POST['news'])){
                $pseudo = $_POST['nom'];
                $text = addslashes($_POST['comm']);
                $mail = $_POST['mail'];

                $searchpseudo = $cnx->query('select * from utilisateur where PSEUDO_UTILISATEUR = \''.$pseudo.'\'');
                $donneespseudo = $searchpseudo->fetch(PDO::FETCH_OBJ);
                
                //Pour ne pas ajouter un pseudo qui existe déjà dans la BDD.
                if($donneespseudo === false){  
                    $sql = "insert into utilisateur (PSEUDO_UTILISATEUR, EMAIL_UTILISATEUR, ABONNE_NEWS)
                    VALUES ('$pseudo', '$mail', '0')";
                    $cnx->exec($sql);
                        
                    $reponseid = $cnx->query('select * from utilisateur where PSEUDO_UTILISATEUR = \''.$pseudo.'\'');
                    $donneesid = $reponseid->fetch(PDO::FETCH_OBJ);
                    

                    $sql2 = "insert into commentaire (CONTENU_COMMENTAIRE, DATE_COMMENTAIRE, ID_ARTICLE, ID_UTILISATEUR)
                    VALUES ('$text', '$today', '$idarticle', '$donneesid->ID_UTILISATEUR')";
                    $cnx->exec($sql2);
    
                }else{
                    
                    $reponseliste = $cnx->query('select * from utilisateur where PSEUDO_UTILISATEUR = \''.$pseudo.'\' and BLACKLIST = 1');
                    $donneesliste = $reponseliste->fetch(PDO::FETCH_OBJ);
                    
                    //Vérifier si l'utilisateur est blacklisté ou nom
                    if($donneesliste === false){ 

                    $reponseid = $cnx->query('select * from utilisateur where PSEUDO_UTILISATEUR = \''.$pseudo.'\'');
                    $donneesid = $reponseid->fetch(PDO::FETCH_OBJ);
                
                    $sql2 = "insert into commentaire (CONTENU_COMMENTAIRE, DATE_COMMENTAIRE, ID_ARTICLE, ID_UTILISATEUR)
                    VALUES ('$text', '$today', '$idarticle', '$donneesid->ID_UTILISATEUR')";
                    $cnx->exec($sql2);

                    }else{
                        $msgerror = "Vous ne pouvez pas publier de commentaires car vous êtes blacklisté.";
                    }
    
                }
    
            }elseif(!empty($_POST['news']) && isset($_POST['nom']) && 
                isset($_POST['comm']) && isset($_POST['mail']) && 
                !empty($_POST['nom']) && !empty($_POST['mail']) &&
                !empty($_POST['comm'])){

                    $pseudo = $_POST['nom'];
                    $text = addslashes($_POST['comm']);
                    $mail = $_POST['mail'];

                    $searchpseudo = $cnx->query('select * from utilisateur where PSEUDO_UTILISATEUR = \''.$pseudo.'\'');
                    $donneespseudo = $searchpseudo->fetch(PDO::FETCH_OBJ);

                    if($donneespseudo === false){  
                        $sql = "insert into utilisateur (PSEUDO_UTILISATEUR, EMAIL_UTILISATEUR, ABONNE_NEWS)
                        VALUES ('$pseudo', '$mail', '1')";
                        $cnx->exec($sql);
                            
                        $reponseid = $cnx->query('select * from utilisateur where PSEUDO_UTILISATEUR = \''.$pseudo.'\'');
                        $donneesid = $reponseid->fetch(PDO::FETCH_OBJ);
                        
    
                        $sql2 = "insert into commentaire (CONTENU_COMMENTAIRE, DATE_COMMENTAIRE, ID_ARTICLE, ID_UTILISATEUR)
                        VALUES ('$text', '$today', '$idarticle', '$donneesid->ID_UTILISATEUR')";
                        $cnx->exec($sql2);
    
                    }else{

                        $reponseliste = $cnx->query('select * from utilisateur where PSEUDO_UTILISATEUR = \''.$pseudo.'\' and BLACKLIST = 1');
                        $donneesliste = $reponseliste->fetch(PDO::FETCH_OBJ);
                    
                        //Vérifier si l'utilisateur est blacklisté ou nom
                        if($donneesliste === false){
                        
                        $reponseid = $cnx->query('select * from utilisateur where PSEUDO_UTILISATEUR = \''.$pseudo.'\'');
                        $donneesid = $reponseid->fetch(PDO::FETCH_OBJ);
                    
                        $sql2 = "insert into commentaire (CONTENU_COMMENTAIRE, DATE_COMMENTAIRE, ID_ARTICLE, ID_UTILISATEUR)
                        VALUES ('$text', '$today', '$idarticle', '$donneesid->ID_UTILISATEUR')";
                        $cnx->exec($sql2);
                        
                        }else{
                            $msgerror = "Vous ne pouvez pas publier de commentaires car vous êtes blacklisté.";
                        }
                    }
                

            }else{
                $msgerror = 'Le pseudo et le commentaire doivent être renseignés';
            }
        } 
    ?>
    <?php 
        $reponsecom = $cnx->query('select * from commentaire join utilisateur on commentaire.ID_UTILISATEUR = utilisateur.ID_UTILISATEUR where ID_ARTICLE= \''.$idarticle.'\' order by DATE_COMMENTAIRE DESC');
        $donneescom = $reponsecom->fetchall(PDO::FETCH_OBJ);
    ?>
    
    
        <div class="commentaire">
            <div class="titrecom"><h3>Commentaires</h3></div>
            <?php if(!empty($donneescom)){
                foreach($donneescom as $resultats){?>
                    <div class="com margintop">
                        <div class="pseudo"><?=$resultats->PSEUDO_UTILISATEUR?></div>
                        <div class="">
                            <p>
                                <?=$resultats->CONTENU_COMMENTAIRE?>
                            </p>
                        </div>
                        <div class="date"><?=$resultats->DATE_COMMENTAIRE?></div>
                    </div>
                <?php
                }}else{
                    echo'<br>Il y a 0 commentaire.';
                }
                    ?>
        </div>
                

    <div class="commentaire">
        <div class="titrecom"><h3>Ecrire un Commentaire :</h3></div>
        <div>
            <form class="margintop" action="" method='post'>
                <input class="margintop" type="text" placeholder="Votre pseudo..." name='nom'><br>
                <input class="margintop" type="email" placeholder="Votre Email..." name='mail'><br>
                <textarea class="margintop" placeholder="Ecrivez votre commentaire..." name="comm" id="com" cols="30" rows="10"></textarea><br>               
                <div class="margintop">
                    <label for="news">Si vous souhaitez vous abonnez à nos articles, cochez ici :</label>
                    <input type="checkbox" id="news" name="news[]">
                </div>
                <?= "<p style='color:#9a031e;'>".$msgerror.'</p>' ?>
                <input class="margintop marginbot" type="submit" name='submit2' value="Commenter">
            </form>
        </div>
    </div>    
</body>
<?php
        include("footer.php");
          ?>
</html>