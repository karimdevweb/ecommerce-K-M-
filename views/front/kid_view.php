<?php ob_start() ?>

<title>page pour enfant tendance </title>
<meta name="description" content="la tendance à ne pas rater pour les enfant chez K&M...">



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
    <div class="home_image d-flex flex-row my-3 shadow bg-light">
            <img src="http://localhost/phpsite/ecommerce/image/lookenf1.jpg" class=" rounded  w-100 h-100" alt="lookenf1">
            <div class="home_absolute_div">
                <h3  class="h3">Pimentez votre look printanièrs</h3>
                <a href=""> <button type="button" class="btn btn-outline-primary">Lire la suite</button></a>
            </div>
            
    </div>    
    <div class="home_image d-flex flex-row my-3 shadow bg-light">
            <img src="http://localhost/phpsite/ecommerce/image/lookenf2.jpg" class=" rounded pr-3 w-50 h-100" alt="lookenf2">
            <img src="http://localhost/phpsite/ecommerce/image/lookenf3.jpg" class=" rounded pr-3 w-50 h-100" alt="lookenf3">
            <div class="position-absolute fixed-bottom d-flex flex-row justify-content-around">
                <div class="text-center m-auto pb-3">
                    <h3  class="h3">Pimentez votre look habituel</h3>
                    <button type="button" class="btn btn-outline-primary">Lire la suite</button>
                </div>
                <div class="text-center m-auto pb-3">
                    <h3  class="h3">style: menteau de la saison</h3>
                    <a href=""> <button type="button" class="btn btn-outline-primary">Lire la suite</button></a>
                </div>   
            </div>
            
    </div>
</section>

<section class="container">

    <div class="p-2">
        <h2 class="text-center">Vêtements pour enfant</h2>
        <div class="text-center m-2 p-2">
            <p class="p-2 m-2">Des tenues adorables pour les bébés, les petits et les adolescents. Dénichez vos nouveaux favoris dans notre vaste collection pour enfants.</p>
        </div>
        
        <a class="text-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Lire plus</a>

        <div class="collapse" id="collapseExample">
            <div class="text-center m-2 p-2">
                 <h6>Pour bébé</h6>
                <p  class="p-2 m-2">Nous nous occupons de la garde-robe de votre bébé avec nos superbes pièces pour nouveaux nés de 0 à 9 mois. Découvrez nos lots de pièces super douces en coton biologique.Lorsque votre bébé grandit, optez pour nos pièces 0-24 mois pour bébé fille et bébé garçon : salopettes, pièces en jersey doux et t-shirts imprimés rigolos.</p>
            </div>
            <div class="text-center m-2 p-2">
                 <h6>Pour les filles</h6>
                <p  class="p-2 m-2">Les filles de 18 mois à 10 ans trouveront leur bonheur parmi nos imprimés fleuris et papillons, nos rayures colorées et nos motifs Disney. Découvrez nos vêtements pour enfants : combinaisons, ballerines et jolies barrettes et serre-têtes. Pour les 8-14 ans, robes en jersey fluides, jeans slim et débardeurs vaporeux feront le bonheur des jeunes filles.</p>
            </div>
            <div class="text-center m-2 p-2">
                 <h6>Pour les garçons</h6>
                <p  class="p-2 m-2">Les garçons de 18 mois à 10 ans peuvent explorer notre collection de graphiques originaux, d'imprimé dinosaures et de modèles nautiques. Découvrez les jeans ajustés, shorts cargo et t-shirts ludiques dans cette collection énergique. Les 8-14 ans pourront opter pour des looks inspirés du surf avec des t-shirts à message, des bas de survêtement et des casquettes snapback..</p>
            </div>  
        </div>
    </div>









    


</section>




<?php $content = ob_get_clean() ?>

<!-------------------------------------->


<!-------------------------------------->

<?php require "views/layout.php" ?>