<?php ob_start() ?>

<title>page pour femme tendance </title>
<meta name="description" content="la tendance à ne pas rater pour les femmes chez K&M...">



<?php $meta = ob_get_clean() ?>


<!-------------------------------------->


<!-------------------------------------->

<?php ob_start() ?>
<section class="mb-4">
      <div class="m-2 ">
            <form class="w-100" action="index.php?class=front&action=search_product" method="post">
            <label for="search_product">cherchez votre produit...</label>
                <div class="d-flex  justify-content-center h-100">
                    <div class="searchbar">
                        <input class="search_input" id="search_product" type="text" name="search_product" placeholder="Search...">
                        <button type="submit" class=" btn p-1 search_icon" ><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
    </div>
</section>
<section class=" my-5 container ">
    <div class=" individuel-page home_image d-flex flex-row my-3 shadow bg-light">
            <img src="http://localhost/phpsite/ecommerce/image/lookf1.jpg" class=" rounded  w-50 h-100" alt="lookf1">
            <img src="http://localhost/phpsite/ecommerce/image/lookf2.jpg" class=" rounded  w-50 h-100" alt="lookf2">
            <div class="home_absolute_div">
                <h3  class="h3">Pimentez votre look printanièrs</h3>
                <a href=""> <button type="button" class="btn btn-outline-primary">Lire la suite</button></a>
            </div>
            
    </div>
    <div class="individuel-page home_image d-flex flex-row my-3 shadow bg-light">
            <img src="http://localhost/phpsite/ecommerce/image/lookf3.png" class=" rounded  w-100 h-100" alt="lookf3">
            <div class="home_absolute_div">
                <h3  class="h3">collection d'été à bras ouvert </h3>
                <a href=""> <button type="button" class="btn btn-outline-primary">Lire la suite</button></a>
            </div>
            
    </div>    
    <div class=" individuel-page home_image d-flex flex-row my-3 shadow bg-light">
            <img src="http://localhost/phpsite/ecommerce/image/lookf5.jpg" class=" rounded pr-3 w-50 h-100" alt="lookf4">
            <img src="http://localhost/phpsite/ecommerce/image/lookf4.jpg" class="  rounded pl-3 w-50 h-100" alt="lookf5">
            <div class="position-absolute fixed-bottom d-flex flex-row justify-content-around">
                <div class="text-center m-auto pb-3">
                    <h3  class="h3">Pimentez votre look habituel</h3>
                    <button type="button" class="btn btn-outline-primary">Lire la suite</button>
                </div>
                <div class="text-center m-auto pb-3">
                    <h3  class="h3">style: chico gothique parisien</h3>
                    <a href=""> <button type="button" class="btn btn-outline-primary">Lire la suite</button></a>
                </div>   
            </div>
            
    </div>
</section>

<section class="container">

    <div>
        <h2 class="text-center">Vêtements pour femmes</h2>
        <p class="p-2 m-2">Shoppez le meilleur de la mode en ligne chez K&M et découvrez les nouveaux favoris pour femme. Trouvez tout ce qu'il vous faut, des robes décontractées aux tenues de travail chic. Nous proposons des jeans pour toutes les formes, des articles de qualité premium et les dernières nouveautés. Découvrez notre collection Conscious Exclusive, confectionnée avec des matières durables, pour une garde-robe féminine plus responsable</p>
        <a class="text-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Lire plus</a>
        <div class="collapse" id="collapseExample">
            <p  class="p-2 m-2">Une fois que vous avez trouvé votre tenue, complétez votre look avec des chaussures, des sacs et des accessoires tendance. Ne manquez pas notre vaste gamme de produits de beauté, sans oublier la ravissante lingerie, les accessoires sculptant et les tenues d'intérieur.</p>
            <p class="pl-2 ml-2"> Trouvez des bikinis et des maillots de bain avantageux et tendance. Construisez votre nouvelle garde-robe dès aujourd'hui. Explorez nos collections pour découvrir les dernières tendances pour femmes et renouvelez votre garde-robe avec des vêtements tendance. Votre nouveau style de la saison commence ici chez K&M.</p> 
        </div>
    </div>

    
</section>
 
    
   
    




 <?php $content = ob_get_clean() ?>

<!-------------------------------------->


<!-------------------------------------->

<?php require "views/layout.php" ?>