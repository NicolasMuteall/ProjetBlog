<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleajout.css">
    <title>Document</title>
</head>
<body>
<?php
include("headadmin.php");
include("connect.php");


if ($_GET['prodId'] == 'ajoutart') {
    $nouvauxart=$_GET;
    $cnx->exec("alter table article auto_increment = 0");
    $cnx->exec("INSERT INTO article (TITRE_ARTICLE , DATE_PUBLICATION ,REF_IMAGE ,REPONSE_ART ,COM_REPONSE, CONTENU_ARTICLE , RESUME_ART , CODE_TYPE_ART, ID_ADMIN) 
    values ('$nouvauxart[Titre]','$nouvauxart[Date_de_publication]','$nouvauxart[Image]','$nouvauxart[vote]','','$nouvauxart[article]','$nouvauxart[Résumé]','$nouvauxart[Categorie]','1')");  

    $searchpseudo = $cnx->query('select * from utilisateur where ABONNE_NEWS = 1');
    $donneespseudo = $searchpseudo->fetchall(PDO::FETCH_OBJ);
    foreach($donneespseudo as $resultat){
    $to = "$resultat->EMAIL_UTILISATEUR";
    $subject = "Nouvel article";
    $message = "Un nouvel article à été publié.";

    $headers = "Content-Type: text/plain; charset=utf-8\r\n";
    $headers .= "From: belamiri113@gmail.com\r\n";

    if(mail($to, $subject, $message, $headers)){
        

    }else{

        echo 'Erreur envoi !';

    }}
?>
    <h1> Votre article a bien été rajouté</h1>
    <?php
}


if (!empty($_GET['demo5'])) {
    if ($_GET['prodId'] == 'rsupart' && $_GET['demo5'] == 'on') {
    $cnx->exec("UPDATE article SET ARCHIVE = '1' WHERE ID_ARTICLE ='$_GET[id_article]'");
?>
    <h1>Votre article a bien été désarchivé</h1>
<?php
}
}


?>

<?php
if (!empty($_GET['demo5'])) {
    if ($_GET['prodId'] == 'supart' && $_GET['demo5'] == 'on') {
    $cnx->exec("UPDATE article SET ARCHIVE = '0' WHERE ID_ARTICLE ='$_GET[id_article]'");
?>
    <h1>Votre article a bien été archivé</h1>
<?php
}
}


if ($_GET['prodId'] == 'supcom') {
    $id = explode(" ", $_GET['id']);
    $cnx->exec("DELETE FROM commentaire WHERE ID_ARTICLE ='$id[1]' and ID_COMMENTAIRE ='$id[0]'");

?>
    <h1>Votre commentaire a bien été supprimé</h1>
<?php
 }


 if ($_GET['prodId'] == 'supu') {
    
    $cnx->exec("UPDATE utilisateur SET BLACKLIST = '1' WHERE ID_UTILISATEUR ='$_GET[id]'");
    

?>
    <h1>L'utilisateur a bien etait mis sur liste noir</h1>
<?php
 }  
 
 
 if ($_GET['prodId'] == 'dsupu') {
    
    $cnx->exec("UPDATE utilisateur SET BLACKLIST = '0' WHERE ID_UTILISATEUR ='$_GET[id]'");
    

?>
    <h1>L'utilisateur a bien etait retiré de liste noir</h1>
<?php
 } 
?>

    
</body>
</html>