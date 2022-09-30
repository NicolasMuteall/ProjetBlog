<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./CSS/styleentete.css">
    
    <link rel="stylesheet" href="./CSS/footer.css">
    <script defer src="script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet" type="text/css" />
    <title>ProjetBlog</title>
</head>

<body>
    <header>
        <div class="header">

            <div class="logo"> <img class="logoA" src="src/logoinfointox.png" alt="logo du site Info ou intox"></div>
            <div>
                <h1 class="titrePrincipal" id="typedtext">Info ou Intox ?!</h1>
            </div>
            <div id="navigation" class="navigation">
                
                <div id="boxnav">
                    <nav>
                        <ul>
                            <li><a href="accueil">Accueil</a></li>
                            <li><a href="Contact">Contact</a></li>
                            <li><a href="qui sommes-nous">Qui sommes-nous ?</a></li>
                            <li>
                                <input id="searchbar" type="text" name="search" placeholder="Cherche un article">
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div id=menuBur>
        <div id="mySidenav" class="sidenav">
        
  <a id="closeBtn" href="#" class="close">x</a>
  <ul>
    <li><a href="#">Accueil</a></li>
    <li><a href="#">Contact</a></a></a></li>
    <li><a href="#">Qui sommes-nous</a></li>
    
  </ul>
</div>

<a href="#" id="openBtn">
  <span class="burger-icon">
    <span></span>
    <span></span>
    <span></span>
  </span>
</a></div>

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
        <!---   <div class="bienvenue">
            <h2>Bienvenue sur notre site de vraies/fake news !<br> Saurez-vous démêler le vrai du faux ?<br>
                VOTEZ !
            </h2>
            <span class="txt-rotate" data-period="2000"
                data-rotate='[ "nerdy.", "simple.", "pure JS.", "pretty.", "fun!" ]'></span>
        </div>

        <select name="Categorie" id="Categorie">
            <option value="">Choisissez une catégorie</option>
            <option value="Divers">Divers</option>
            <option value="People">People</option>
            <option value="Sciences">Sciences</option>
            <option value="Sport">Sport</option>

        </select>-->


        <!-- <nav id="deroul">
            <ul>
                <li class="deroulant"><a href="categorie">Catégorie :</a>
                    <ul class="sous">
                        <li><a href="#">a</a></li>
                        <li><a href="#">b</a></li>
                        <li><a href="#">c</a></li>
                    </ul>
            </ul>
        </nav> -->

    </header>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>