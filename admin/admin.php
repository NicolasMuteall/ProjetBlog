<?php
        include("connect.php");
        include("headadmin.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleadmin.css">
    <title>acceuil</title>
</head>
<body>
        <?php
        if ($_GET['var']=='nouvel') {
                $reponsecat = $cnx->query('select * from categorie');
                $donneescat = $reponsecat->fetchall(PDO::FETCH_OBJ);    
        ?>
        <div class="formulaire">
                <form action="ajoutart.php?var=nouveau" method="get" id="ajoute">
                    <h3>Saisissez votre article</h3>
                    <input type="text" name="Titre" placeholder="Entrez un titre" required>
                    <input id="prodId" name="prodId" type="hidden" value="ajoutart" required="required">
                    <DIV class="BOX1">
                       <select name="Categorie" id="Categorie" required="required">
                                        <option value="">Choisissez une Categorie</option>
                                <?php
                                    foreach($donneescat as $resultat)
                                    {
                                ?>
                                        <option value="<?=$resultat->CODE_TYPE_ART?>"><?=$resultat->LIB_TYPE_ART?></option>
                                <?php
                                    }
                                ?>
                     </select> 
                    </DIV>
                    
                    <input type="date" name="Date de publication" placeholder="Date" required="required">
                    <input type="file" name="Image" required="required">
                    <input type="text" name="Résumé" placeholder="Resumé....." required="required">
                    <input type="text" name="vote" id="vote" placeholder="info ou intox" maxlength="1" minlength="1" required="required">
                    <small></small>
                    <textarea name="article" id="article" cols="30" rows="10" required="required" placeholder="Article....." ></textarea>
                    <input type="submit" value="Ajouter" id="valider" name="Valide">
                </form>
        </div>
        <?php
        }
        if ($_GET['var']=='sup_a') {
                $reponsecat = $cnx->query('select * from article WHERE ARCHIVE = 1');
                $donneescat = $reponsecat->fetchall(PDO::FETCH_OBJ);
        ?>
        <div class="formulaire">
                <form id="check" action="ajoutart.php?var=sup_a" method="get">
                <h3>Archiver un article</h3>
                        <select name="id_article" id="Categorie" required>
                                                <option value="">Choisissez un article</option>
                                        <?php
                                        foreach($donneescat as $resultat)
                                        {
                                        ?>
                                                <option value="<?=$resultat->ID_ARTICLE?>"><?=$resultat->TITRE_ARTICLE?></option>
                                        <?php
                                        }
                                        ?>
                        </select> 
                        <input id="prodId" name="prodId" type="hidden" value="supart">
                        <h2>Merci de confirmer la mise en archive</h2>
                        <div class="validation">
                        <input type="checkbox" name="demo5" class="demo5" id="demo5" onclick="exemple()">
                        <label for="demo5"></label>   
                        </div>
                        
                        <input type="submit" value="Archiver" id="sub" disabled>  
                </form>
        </div>
                        
        <?php
        }
        
        ?>
        <?php
        if ($_GET['var']=='dsup_a') {
                $reponsecat = $cnx->query('select * from article WHERE ARCHIVE = 0');
                $donneescat = $reponsecat->fetchall(PDO::FETCH_OBJ);
        ?>
        <div class="formulaire">
                <form id="check" action="ajoutart.php?var=sup_a" method="get">
                <h3>désarchiver un article</h3>
                        <select name="id_article" id="Categorie" required>
                                                <option value="">Choisissez un article</option>
                                        <?php
                                        foreach($donneescat as $resultat)
                                        {
                                        ?>
                                                <option value="<?=$resultat->ID_ARTICLE?>"><?=$resultat->TITRE_ARTICLE?></option>
                                        <?php
                                        }
                                        ?>
                        </select> 
                        <input id="prodId" name="prodId" type="hidden" value="rsupart">
                        <h2>Merci de confirmer le désarchivage</h2>
                        <div class="validation">
                        <input type="checkbox" name="demo5" class="demo5" id="demo5"onclick="exemple()" >
                        <label for="demo5"></label>   
                        </div>
                        
                        <input type="submit" value="Désarchiver" id="sub" disabled>  
                </form>
        </div>
                        
        <?php
        }
        
        ?>
        <?php
        if ($_GET['var']== 'sup_c') {
                $reponsecat1 = $cnx->query('SELECT * FROM commentaire NATURAL JOIN utilisateur NATURAL JOIN article ORDER BY DATE_COMMENTAIRE DESC');
                $donneescat1 = $reponsecat1->fetchall(PDO::FETCH_OBJ);
        ?>
         <div class="formulaire">
                <form id="check" action="ajoutart.php?var=sup_c" method="get">
                <h3>Supprimer un commentaire</h3>
                        <select name="id" id="Categorie2" required>
                                                <option value="">Choisissez le commentaire a supprimer</option>
                                        <?php
                                        foreach($donneescat1 as $resultat1)
                                        {
                                        ?>
                                                <option value="<?=$resultat1->ID_COMMENTAIRE." ".$resultat1->ID_ARTICLE?>"> <?=$resultat1->PSEUDO_UTILISATEUR." ".$resultat1->DATE_COMMENTAIRE." ".$resultat1->CONTENU_COMMENTAIRE?></option>
                                        <?php
                                        }
                                        
                                        ?>
                        </select>
                        <input id="prodId" name="prodId" type="hidden" value="supcom">
                        <h2>Merci de confirmer la suppression</h2>
                        <div class="validation">
                        <input type="checkbox" name="demo5" class="demo5" id="demo5" onclick="exemple()">
                        <label for="demo5"></label>   
                        </div>
                        <input type="submit" value="Supprimer" id="sub" disabled>  
                </form>
        </div>
        <?php
                    
        }
        
        
        if ($_GET['var']== 'sup_u') {
                $reponsecat1 = $cnx->query('SELECT * FROM `utilisateur` WHERE BLACKLIST = 0 ORDER BY `utilisateur`.`ID_UTILISATEUR` ASC');
                $donneescat1 = $reponsecat1->fetchall(PDO::FETCH_OBJ);
        ?>
         <div class="formulaire">
                <form id="check" action="ajoutart.php?var=sup_c" method="get">
                <h3>Liste noire</h3>
                        <select name="id" id="Categorie2" required>
                                                <option value="">Choisissez l'utilisateur à placer sur liste noire...</option>
                                        <?php
                                        foreach($donneescat1 as $resultat1)
                                        {
                                        ?>
                                                <option value="<?=$resultat1->ID_UTILISATEUR?>"> <?=$resultat1->PSEUDO_UTILISATEUR?></option>
                                        <?php
                                        }
                                        
                                        ?>
                        </select>
                        <input id="prodId" name="prodId" type="hidden" value="supu">
                        <h2>Merci de confirmer la suppression</h2>
                        <div class="validation">
                        <input type="checkbox" name="demo5" class="demo5" id="demo5" onclick="exemple()" >
                        <label for="demo5"></label>   
                        </div>
                        <input type="submit" value="Lister" id="sub" disabled>  
                </form>
        </div>
        <?php          
        }

        if ($_GET['var']== 'dsup_u') {
                $reponsecat1 = $cnx->query('SELECT * FROM `utilisateur` WHERE BLACKLIST = 1 ORDER BY `utilisateur`.`ID_UTILISATEUR` ASC');
                $donneescat1 = $reponsecat1->fetchall(PDO::FETCH_OBJ);
        ?>
         <div class="formulaire">
                <form id="check" action="ajoutart.php?var=sup_c" method="get">
                <h3>Liste noire</h3>
                        <select name="id" id="Categorie2" required>
                                                <option value="">Choisissez l'utilisateur à délister</option>
                                        <?php
                                        foreach($donneescat1 as $resultat1)
                                        {
                                        ?>
                                                <option value="<?=$resultat1->ID_UTILISATEUR?>"> <?=$resultat1->PSEUDO_UTILISATEUR?></option>
                                        <?php
                                        }
                                        
                                        ?>
                        </select>
                        <input id="prodId" name="prodId" type="hidden" value="dsupu">
                        <h2>Merci de confirmer la suppression</h2>
                        <div class="validation">
                        <input type="checkbox" name="demo5" class="demo5" id="demo5" onclick="exemple()" >
                        <label for="demo5"></label>   
                        </div>
                        <input type="submit" value="Délister" id="sub" disabled>  
                </form>
        </div>
        <?php          
        }
        ?>
        <script type="text/javascript" src="script.js"></script>
</body>
</html>

