<?php
        include("Connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="acceuiladmin.css">
    <title>Document</title>
</head>
<body>
    <div class="image">
        <a href="accuileadmin.php?user=admin&pass=admin"><img src="src/logoinfointox.png" alt=""></a>
    </div>
    <div id="mySidenav" class="sidenav">
    <a id="closeBtn" href="#" class="close">&times;</a>
            <ul>
                <li><a href="admin.php?var=nouvel">Ajouter un article</a></li>
                <li><a href="admin.php?var=sup_a">Archiver article</a></li>
                <li><a href="admin.php?var=dsup_a">Désarchiver article</a></li>
                <li><a href="admin.php?var=sup_c">Supprimer un commentaire</a></li>
                <li><a href="admin.php?var=sup_u">Lister un utilisateur</a></li>
                <li><a href="admin.php?var=dsup_u">Délister un utilisateur </a></li>
            </ul>
    </div>
    
    <div class="box">
        <a href="#" id="openBtn">
        <span class="burger-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
        </a> 
    </div>
    
    <script type="text/javascript" src="scripthead.js"></script>
</body>
</html>