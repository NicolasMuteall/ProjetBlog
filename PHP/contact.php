<?php include('head.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./CSS/contact.css" rel="stylesheet">
    <title>ProjetBlog</title>
</head>

<body>
    <h2>Formulaire de contact</h2>

    <form action="" method="post" id="form1">

        <div id="renseign">
            <div>
                <label for="name"></label>
                <input type="text" id="name" name="user_name" placeholder="Votre Nom">
            </div>
            <div>
                <label for="mail"></label>
                <input type="email" id="mail" name="user_mail" placeholder="Votre e-mail">
            </div>
            <div>
                <label for="objet"></label>
                <input type="text" id="objet" placeholder="Objet" name="objet">
            </div>
            <div>
                <label for="msg"></label>
                <textarea id="msg" name="user_message" placeholder="Ecrivez içi votre message"></textarea>
            </div>

        </div>
        <div>
            <input type="submit" id="bouton" placeholder="Envoyez" name="submit">
        </div>
    </form>
    
    <?php 
    if (isset($_POST["submit"])){
        if (isset($_POST["user_name"])&& !empty($_POST["user_name"])&&
        isset($_POST["objet"])&& !empty($_POST["objet"])&& isset($_POST["user_message"])&& !empty($_POST["user_message"])&& 
        isset($_POST["user_mail"]) && !empty($_POST["user_mail"])){

            $nom=$_POST["user_name"];
            $mail=$_POST["user_mail"];
            $objet=$_POST["objet"];
            $msgutilisateur = $_POST["user_message"];
            $message=' 
                        Nom de l\'expéditeur: '.$nom.'
                        Mail de l\'expéditeur: '.$mail.'
                        '.$msgutilisateur.'
            ';

            echo "<p style='color:green; font-size:20px; border: 1px black solid; width:20%; text-align:center; margin-left:650px'>Votre message  bien été envoyé, merci.</p>";
            
            $subject = "Test envoi mail";

            $headers = "Content-Type: text/plain; charset=utf-8\r\n";

            $headers .= "From: nicolas.dupontnew@gmail.com\r\n";

            if(mail("nicolas.dupontnew@gmail.com", $objet, $message, $headers)){
                
                echo'';

            }else{

                echo 'Erreur envoi !';

            }
        }
        else {echo"<p style='color:red; font-size:20px; border: 1px black solid; width:20%; text-align:center; margin-left:650px'>Il manque quelque chose !</p> ";}
    
    }
    
include('footer.php'); ?>
</body>

</html>