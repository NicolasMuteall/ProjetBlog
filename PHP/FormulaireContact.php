

<!-- <?php include ("index.html")?> -->
<link rel="stylesheet" type="text/css" href="./CSS/FormulaireContact.css">

<div class="FormulaireContact">
    <div>
        <h2>Formulaire de contact</h2>

        

            <form method="POST">
  

                <div id="from">
                    <label for="Nom">Votre nom :</label>
                    <br>
                    <input type="text" id="name" name="user_name" size="45">
                </div>
                <br>

                <div id="reply">
                    <label for="mail">Saisissez votre e-mail :</label>
                    <br>
                    <input type="email" id="mail" name="user_email" size="45">
                </div>

                <?php
            $email=$_POST["user_email"];
            // var_dump($email);
            if(isset($_POST['submit'])){

            
            
            if(isset($email)) {

            
            
            if (preg_match('/^[a-z][a-z_0-9.-]+@[a-z_0-9.-]+.[a-z]{2,3}$/', $email)) {

                echo ' ';
            
            } else {
            
                echo 'Votre email est erroné';
            
            }
        }
    }
            ?>
                
                <br>

                <div id="objet">
                    <label for="objet">Objet de votre message :</label>
                    <br>
                    <input type="text" size="45">
                </div>
                <br>

                <div id="message">
                    <label for="msg">Saisissez votre message :</label>
                    <br>
                    <textarea id="msg" name="user_message" rows=10 cols=60></textarea>
                </div>
                <br>
                <div class="envoyer">
                <button type="submit" name="submit">Envoyer</button>
                </div>

                <?php
                $to='bereni21@yahoo.fr';
                $subject='Validation du mail automatique';
                $message='votre mail a été reçu par le destinaire';
                $headers='From: '."\r\n".'Reply-To: '."\r\n".'X-Mailer:PHP/'.phpversion();
                mail($to, $subject, $message, $headers);
                ?>


                </form>
    </div>
    </div>

