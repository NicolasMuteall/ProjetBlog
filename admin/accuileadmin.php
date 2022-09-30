<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
                background-color: #BEEBF7;
        }
        h1{
            text-align: center;
            margin-top: 20%;
            color: #28373b;
            box-shadow: #28373b;
        }
    </style>
    
    <?php
    if (!empty($_GET)) {
        $conextion = $_GET;
    }
    if(empty($_GET)){
        $conextion = $_POST;
    }
        if ($conextion['user']!='admin' || $conextion['pass']!='admin') {
        ?>
        <h1>Erreur sur le nom d'utilisateur ou le mot de passe</h1>
        <?php   
        }elseif($conextion['user'] =='admin' && $conextion['pass']=='admin'){
        include("headadmin.php");
        ?>
        <h1>Bienvenue sur la page administrateur</h1>
        <?php
        }
    
        
        ?>
</body>
</html>