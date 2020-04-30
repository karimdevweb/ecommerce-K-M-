<?php
    $flash= new SessionFlash();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/normalize.css">
<script src="https://kit.fontawesome.com/2d9041cabd.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo $meta ?>
</head>
<body class="bg-light">
    <header >
    <div class=" nav_cell mt-3 text-right panier"> 
                  <?php $session =new SessionUser();
                      if($session -> isLogged()) :?>
                        <a class="text-primary" href="index.php?class=user&action=logout">Sign-Out</a>
                        <a class="shadow p-2 rounded text-danger" href="index.php?class=user&action=index">dashboard</a>
                    <?php else :?>
                        <a class="text-primary" href="index.php?class=user&action=register">Sign-In</a>
                    <?php endif ?>
                    <?php 
                    $count = 0;
                        if(isset($_SESSION["favoris"]))
                        {
                            $count = count($_SESSION["favoris"]);
                        } ?>
                        <a class="text-primary" href="index.php?class=Sessionfavoris&action=show">favoris(<span class="text-danger font-weight-bold p-1"><i class="fas fa-heart"><?php echo $count ?></i></span>)</a>
                    <?php 
                       $countCart =0;
                        if(isset($_SESSION["cart"]))
                        {
                            $countCart = count($_SESSION["cart"]);
                        } ?>
                        <a class="text-primary" href="index.php?class=Sessioncart&action=show">panier(<span class="text-danger font-weight-bold p-1"><i class="fa fa-shopping-cart"><?php echo $countCart ?></i></span>)</a>
    </div>   

    <nav class=" nav_cell navbar navbar-expand-lg navbar-light bg-light">
                <h1 class="p-2 k_m"><a class=" h1 navbar-brand p-3 text-primary" href="index.php">K&M</a></h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class=" collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class=" d-flex flex-row justify-content-around navbar-nav mr-auto">
                        <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Homme</a>

                            <div class=" text-center dropdown-menu" aria-labelledby="navbarDropdown">
                                        <h5 class="font-weight-bold">Catalogue par produit</h5>
                                        <div class="dropdown-divider"></div>
                                        <?php $categories = Category::getAll();
                                            foreach($categories as $category) {
                                            if($category["type"] == "homme")
                                            { ?>
                                               <a class=" dropdown-item" href="index.php?class=front&action=getAllProducts&id=<?php echo $category["id"] ?>"><?php echo $category["name"] ?></a>
                                           <?php }} ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plus</a>
                                    <div class=" text-center dropdown-menu" aria-labelledby="navbarDropdown1">   
                                            <h5 class="font-weight-bold">En ce moment</h5>
                                            <div class="dropdown-divider"></div>
                                            <a class=" dropdown-item" href="">Lot à partir de 7,99€</a>
                                            <a class=" dropdown-item" href="">L’heure est aux chaussures de printemps</a>
                                            <a  class=" dropdown-item" href="">Chaussettes 3 pour 2</a>    
                                            
                                            <h5 class="font-weight-bold">Nouveautés</h5>
                                            <div class="dropdown-divider"></div>
                                            <a class=" dropdown-item" href="">Vêtements</a>
                                            <a class=" dropdown-item" href="">Chaussures et accessoires</a>
                                            
                                            
                                            <h5 class="font-weight-bold">Catalogue par concept</h5>
                                            <div class="dropdown-divider"></div>
                                            <a class=" dropdown-item" href="">Trend</a>
                                            <a class=" dropdown-item" href="">Conscious</a>
                                            <a class=" dropdown-item" href="">Premium Quality</a> 
                                            <a class=" dropdown-item" href="">un style éco-responsable</a>
                                            <a class=" dropdown-item" href="">Divided</a>
                                    </div>                                                      
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Femme</a>

                            <div class=" text-center dropdown-menu" aria-labelledby="navbarDropdown">
                                        <h5 class="font-weight-bold">Catalogue par produit</h5>
                                        <div class="dropdown-divider"></div>
                                        <?php $categories = Category::getAll();
                                            foreach($categories as $category) {
                                            if($category["type"] == "femme")
                                            { ?>
                                               <a class=" dropdown-item" href="index.php?class=front&action=getAllProducts&id=<?php echo $category["id"] ?>"><?php echo $category["name"] ?></a>
                                           <?php }} ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plus</a>
                                    <div class=" text-center dropdown-menu" aria-labelledby="navbarDropdown2">   
                                            <h5 class="font-weight-bold">En ce moment</h5>
                                            <div class="dropdown-divider"></div>
                                            <a class=" dropdown-item" href="">Nouvelles tendances</a>
                                            <a class=" dropdown-item" href="">Confortable et casual</a> 

                                            <h5 class="font-weight-bold">Nouveautés</h5>
                                            <div class="dropdown-divider"></div>
                                            <a class=" dropdown-item" href="">Vêtements</a>
                                            <a class=" dropdown-item" href="">Chaussures et accessoires</a>
                                            <a class=" dropdown-item" href="">Lingerie et chemises de nuit</a> 
                                            <a class=" dropdown-item" href="">Maillots</a>     
                                            
                                            <h5 class="font-weight-bold">Catalogue par concept</h5>
                                            <div class="dropdown-divider"></div>
                                            <a class=" dropdown-item" href="">Trend</a>
                                            <a class=" dropdown-item" href="">Basiques</a>
                                            <a class=" dropdown-item" href="">Modern Classic</a> 
                                            <a class=" dropdown-item" href="">Vêtements Casual</a>
                                            <a class=" dropdown-item" href="">Divided</a>   
                                    </div>                                                      
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kids</a>
                            <div class=" text-center dropdown-menu" aria-labelledby="navbarDropdown">
                                        <h5 class="font-weight-bold">Catalogue par produit</h5>
                                        <div class="dropdown-divider"></div>
                                        <?php $categories = Category::getAll();
                                            foreach($categories as $category) {
                                            if($category["type"] == "kid")
                                            { ?>
                                               <a class=" dropdown-item" href="index.php?class=front&action=getAllProducts&id=<?php echo $category["id"] ?>"><?php echo $category["name"] ?></a>
                                           <?php }} ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plus</a>
                                    <div class=" text-center dropdown-menu" aria-labelledby="navbarDropdown3">   
                                            <h5 class="font-weight-bold">En ce moment</h5>
                                            <div class="dropdown-divider"></div>
                                            <a class=" dropdown-item" href="">Multipacks Magiques</a>
                                            <a class=" dropdown-item" href="">L’heure est aux chaussures de printemps</a>
                                            <a  class=" dropdown-item" href="">Shorts du printemps</a>    
                                            
                                            <h5 class="font-weight-bold">Catalogue par concept</h5>
                                            <div class="dropdown-divider"></div>
                                            <a class=" dropdown-item" href="">Baby Exclusive</a>
                                            <a class=" dropdown-item" href="">Dessins animés et bandes dessinée</a>
                                            <a class=" dropdown-item" href="">Chambre d'enfant </a>   
                                    </div>                                                      
                            </div>
                        </li>
                    </ul>
                    <div class="service text-center m-2 p-2">
                        <a href="index.php?class=front&action=contact">Service client</a>
                        <a href="" class="">Newsletter</a>
                        <a href="#">...</a>
                    </div>

                </div>
    </nav>



    <nav class="nav-desktop">
        <div class="flex">
            
            <div class="service">
                <a href="index.php?class=front&action=contact">Service client</a>
                <a href="" id="newsletter" >Newsletter</a>  
                <a href="#">...</a>
            </div>
                <div class="text-center ">
                        <h1 class="p-2 k_m"><a href="index.php">K&M</a></h1>
                    <div class=" flex choix">
                        <ul>
                            <li  ><a href="index.php?class=front&action=women_view" class="show h3">Femme</a>
                                <section class=" hide bg-light w-100 h-100">
                                    <div class="w-25 h-100">
                                       <h5 class="font-weight-bold">Nouveautés</h5>
                                        <ul class="m-2 p-2">
                                     <a href="index.php?class=front&action=getByCatalogues&searchProduct=Nouveautés&type=femme"><li>Vêtements</li></a>
                                     <a href="index.php?class=front&action=getByCatalogues&searchProduct=Nouveautés&type=femme"><li>Chaussures et accessoires</li></a>
                                     <a href="index.php?class=front&action=getByCatalogues&searchProduct=Nouveautés&type=femme"><li>Lingerie et chemises de nuit</li></a>
                                     <a href="index.php?class=front&action=getByCatalogues&searchProduct=Nouveautés&type=femme"><li>Maillots</li></a>       
                                           
                                            
                                            
                                        </ul>
                                    </div>
                                    <div class="w-25 h-100">
                                        <h5 class="font-weight-bold">En ce moment</h5>
                                       <ul class="m-2 p-2">
                                            <a href="index.php?class=front&action=getByCatalogues&searchProduct=En ce moment&type=femme"><li> Nouvelles tendances</li></a>
                                           <a href="index.php?class=front&action=getByCatalogues&searchProduct=En ce moment&type=femme"><li>Confortable et casual</li> </a>                             
                                       </ul>
                                    </div>
                        
                                    <div class="w-25 h-100">
                                        <h5 class="font-weight-bold">Catalogue par produit</h5>
                                        <ul class="m-1 p-2">
                                           <?php $categories = Category::getAll();
                                            foreach($categories as $category) {
                                            if($category["type"] == "femme")
                                            { ?>
                                               <a href="index.php?class=front&action=getAllProducts&id=<?php echo $category["id"] ?>&type=femme"><li><?php echo $category["name"] ?></li></a>
                                           <?php }} ?>
                                            </ul>
                                    </div>
                                    <div class="w-25 h-100">
                                        <h5 class="font-weight-bold">Catalogue par concept</h5>
                                           <ul class="m-2 p-2">
                                               <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=femme"><li>Trend</li></a>
                                               <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=femme"><li>Basiques</li></a>
                                               <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=femme"><li>Modern Classic</li></a>
                                               <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=femme"><li>Vêtements Casual</li></a>
                                               <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=femme"><li>Divided</li></a>                                         
                                           </ul>
                                    </div>
                                </section>
                            </li>
                        </ul>
                        <ul>
                            <li><a href="index.php?class=front&action=men_view" class="show h3">Homme</a>
                                <section class=" hide bg-light  w-100 h-100">
                                    <div class="w-25 h-100">
                                       <h5 class="font-weight-bold">Nouveautés</h5>
                                          <ul class="m-2 p-2">
                                              <a href="index.php?class=front&action=getByCatalogues&searchProduct=Nouveautés&type=homme"><li>Vêtements</li></a>
                                              <a href="index.php?class=front&action=getByCatalogues&searchProduct=Nouveautés&type=homme"><li>Chaussures et accessoires</li></a>                                           
                                          </ul>
                                    </div>
                                    <div class="w-25 h-100">
                                        <h5 class="font-weight-bold">En ce moment</h5>
                                        <ul class="m-2 p-2">
                                            <a href="index.php?class=front&action=getByCatalogues&searchProduct=En ce moment&type=homme"><li>Lot à partir de 7,99€</li></a>
                                            <a href="index.php?class=front&action=getByCatalogues&searchProduct=En ce moment&type=homme"><li>Chaussettes 3 pour 2</li></a>                                        
                                    </ul>
                                    </div>
                                    
                                    <div class="w-25 h-100">
                                        <h5 class="font-weight-bold">Catalogue par produit</h5>
                                        <ul class="m-1 p-2">
                                            <?php $categories = Category::getAll();
                                            foreach($categories as $category) {
                                            if($category["type"] == "homme")
                                            { ?>
                                               <a href="index.php?class=front&action=getAllProducts&id=<?php echo $category["id"] ?>&type=homme"><li><?php echo $category["name"] ?></li></a>
                                           <?php }} ?>
                                        </ul>
                                        
                                    </div>
                                    <div class="w-25 h-100">
                                        <h5 class="font-weight-bold">Catalogue par concept</h5>
                                        <ul class="m-2 p-2">
                                            <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=homme"><li>Trend</li></a>
                                            <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=homme"><li>Conscious</li></a>
                                            <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=homme"><li>Premium Quality</li></a>
                                            <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=homme"><li>un style éco-responsable</li></a>
                                            <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=homme"><li>Divided</li></a>                                    
                                           </ul>
                                    </div>
                                </section>
                            </li>
                            
                        </ul>
                        <ul>
                            <li><a href="index.php?class=front&action=kid_view" class="show h3">kids</a>
                                <section class=" hide bg-light w-100 h-100">
                                    <div class="w-25 h-100">
                                        <h5 class="font-weight-bold">En ce moment</h5>
                                        <ul class="m-2 p-2">
                                            <a href="index.php?class=front&action=getByCatalogues&searchProduct=En ce moment&type=kid"><li>Multipacks Magiques</li></a>
                                            <a href="index.php?class=front&action=getByCatalogues&searchProduct=En ce moment&type=kid"><li>L’heure est aux chaussures de printemps</li></a>
                                            <a href="index.php?class=front&action=getByCatalogues&searchProduct=En ce moment&type=kid"><li>Shorts du printemps</li></a>    
                                        </ul>
                                    </div>
                                   
                                    <div class="w-25 h-100">
                                        <h5 class="font-weight-bold">Catalogue par produit</h5>
                                        <ul class="m-1 p-2">
                                             <?php $categories = Category::getAll();
                                            foreach($categories as $category) {
                                            if($category["type"] == "kid")
                                            { ?>
                                               <a href="index.php?class=front&action=getAllProducts&id=<?php echo $category["id"] ?>&type=kid"><li><?php echo $category["name"] ?></li></a>
                                           <?php }} ?>
                                        </ul>
                                       
                                    </div>
                                    <div class="  w-25 h-100">
                                        <h5 class="font-weight-bold">Catalogue par concept</h5>
                                           <ul class="m-2 p-2">
                                               <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=kid"><li>Baby Exclusive</li></a>
                                               <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=kid"><li>Dessins animés et bandes dessinées</li></a>
                                               <a href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=kid"><li>Chambre d'enfant</li> </a>                                                        
                                           </ul>
                                    </div>
                                </section>
                            </li>
                            
                        </ul>
                    </div>
                </div>
               
                <div class="panier"> 
                  <?php $session =new SessionUser();
                      if($session -> isLogged()) :?>
                        <a class="text-primary" href="index.php?class=user&action=logout">Sign-Out</a>
                        <a class="shadow p-2 rounded text-danger" href="index.php?class=user&action=index">dashboard</a>
                    <?php else :?>
                        <a class="text-primary" href="index.php?class=user&action=register">Sign-In</a>
                    <?php endif ?>
                    <?php 
                    $count = 0;
                        if(isset($_SESSION["favoris"]))
                        {
                            $count = count($_SESSION["favoris"]);
                        } ?>
                        <a class="text-primary" href="index.php?class=Sessionfavoris&action=show">favoris(<span class="text-danger font-weight-bold p-1"><i class="fas fa-heart"><?php echo $count ?></i></span>)</a>
                    <?php 
                       $countCart =0;
                        if(isset($_SESSION["cart"]))
                        {
                            $countCart = count($_SESSION["cart"]);
                        } ?>
                        <a class="text-primary" href="index.php?class=Sessioncart&action=show">panier(<span class="text-danger font-weight-bold p-1"><i class="fa fa-shopping-cart"><?php echo $countCart ?></i></span>)</a>
              </div>   
        </div>
               
            <div class=" text-center offre">
            <a class="font-weight-bold shadow-sm rounded p-3" href="">Membres = Livraison offerte pour toute commande de 15€ ou plus</a>
            <a class="font-weight-bold shadow-sm rounded p-3" href="">Achetez en ligne et retournez en magasin, gratuitement</a>
            <a class="font-weight-bold shadow-sm  rounded p-3"  href="">Cartes cadeau</a>
            </div>
        </nav>
    </header>





    <main >

            <?php $flash->flash() ?>
                  
            <?php echo $content ?>

           
    </main>




    <footer class="footer shadow-lg p-2">
    <nav>
        <div class="footer_flex">
            
                    <ul class="footer_service">
                        <li><h2>HELP</h2> </li>
                        <li><a href="index.php?class=front&action=contact">Service client</a></li>
                        <li><a href="">Newsletter</a></li>
                        <li><a href="index.php?class=front&action=login_view">Mon Compte</a></li>
                        <li><a href="#">Magasin</a></li>
                        <li><a href="">Mention légales et confidentialité</a></li>
                        <li><a href="index.php?class=front&action=contact">contact</a></li>
                    </ul>
                    
                    <ul class="footer_choix">
                        <li><h2>SHOP</h2> </li>
                        <li><a href="index.php?class=front&action=women_view">Femme</a></li>
                        <li><a href="index.php?class=front&action=men_view">Homme</a></li>
                        <li><a href="index.php?class=front&action=kid_view">Enfant</a></li>
                        <li><a href="">K&M Home</a></li>
                        <li><a href="">Promotion</a></li>
                   </ul>

                    <ul class="info">
                           <li><h2>CORPORATE INFO</h2> </li>
                            <li><a href="">Votre carrière chez K&M</a></li>
                            <li><a href="">À propos de K&M</a></li>
                            <li><a href="">Développement durable</a></li>
                            <li><a href="">Presse</a></li>
                            <li><a href="">Investor relations</a></li>
                            <li><a href="">Corporate governance"></a></li>
                    </ul>
                    <ul>
                        <li><h2>INSCRIPTION</h2></li>
                        <li><a>Devenez membre & obtenez -10%<a></li>
                    </ul>
                
        </div>
    </nav>
    <ul class="icon">
        <li><a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a></li>
        <li><a href="https://www.pinterest.com"><i class="fab fa-pinterest-square"></i></a></li>
        <li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
        <li><a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a></li>
    </ul>
    <p> Le concept du groupe K&M est de proposer mode et qualité au meilleur prix et de façon durable. Depuis sa création en 1947, 
    K&M est devenu l'un des principaux groupes de prêt-à-porter du...
    </p>
    
    <p >Karim <span class="sigle"> K&M </span> Mouzai</p>
</footer>

    <script src="js/jquery.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LeDe-EUAAAAAEH8ifvUHV0T6pPoOxiGXyWuXdFJ"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!------------------------------------------>

</body>
</html>