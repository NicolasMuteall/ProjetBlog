<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">

    <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet" type="text/css" />
    <title>ProjetBlog</title>
</head>

<body>
    <header>
        <div class="header">

            <div class="logo"> 
                <img class="logoA" src="src/logoinfointox.png" alt="logo du site Info ou intox">
            </div>
            <div>
                <h1 class="titrePrincipal" id="typedtext">Info ou Intox ?!</h1>
            </div>
            <div id="navigation">
                <div id="boxnav">
                    <nav>
                        <ul>
                            <li><a href="Articleaccueil.php">Accueil</a></li>
                            <li><a href="Contact">Contact</a></li>
                            <li><a href="qsn">Qui sommes-nous ?</a></li>
                            <li>
                                <input id="searchbar" type="text" name="search" placeholder="Cherche un article">
                            </li>
                            <script>
                                
                                let searchbar = document.getElementById('searchbar');
                                
                                searchbar.addEventListener('keyup', function() {
                                    switch(event.key){
                                    case "Enter":    
                                        window.location = "Recherche.php?search="+searchbar.value;
                                    break;   
                                    }
                                });

                            </script>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div id=menuBur>
            <div id="mySidenav" class="sidenav">
        
                <a id="closeBtn" href="#" class="close">x</a>
                <ul>
                    <input id="searchbar2" type="text" name="search" placeholder="Recherche">
                    <li><a href="Articleaccueil.php">Accueil</a></li>
                    <li><a href="Contact">Contact</a></a></a></li>
                    <li><a href="qsn.php">Qui sommes-nous ?</a></li>
                    
                </ul>
            </div>

                <a href="#" id="openBtn">
                    <span class="burger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    </span>
                </a>
        </div>

<script>
var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;

/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add("active");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove("active");
}
</script>
        <div class="bienvenue">
            <h2>Bienvenue sur notre site de vraies/fake news !<br> Saurez-vous démêler le vrai du faux ?<br>
                VOTEZ !
            </h2>
            <span class="txt-rotate" data-period="2000"
                data-rotate='[ "nerdy.", "simple.", "pure JS.", "pretty.", "fun!" ]'></span>
        </div>

        <hr>
    </header>
    <script type="text/javascript" src="script.js"></script>
    
</body>

</html>