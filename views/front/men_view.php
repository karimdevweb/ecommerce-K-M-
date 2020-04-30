<?php ob_start() ?>

<title>page pour homme tendance </title>
<meta name="description" content="la tendance à ne pas rater pour les homme chez K&M...">



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
            <img src="http://localhost/phpsite/ecommerce/image/lookh1.jpg" class=" rounded  w-50 h-100" alt="lookh1">
            <img src="http://localhost/phpsite/ecommerce/image/lookh2.jpg" class=" rounded  w-50 h-100" alt="lookh2">
            <div class="home_absolute_div">
                <h3  class="h3">Pimentez votre look printanièrs</h3>
                <a href=""> <button type="button" class="btn btn-outline-primary">Lire la suite</button></a>
            </div>
            
    </div>
    <div class="home_image d-flex flex-row my-3 shadow bg-light">
            <img src="http://localhost/phpsite/ecommerce/image/lookh3.jpg" class=" rounded  w-100 h-100" alt="lookh3">
            <div class="home_absolute_div">
                <h3  class="h3">collection d'été à bras ouvert </h3>
                <a href=""> <button type="button" class="btn btn-outline-primary">Lire la suite</button></a>
            </div>
            
    </div>    
    <div class="home_image d-flex flex-row my-3 shadow bg-light">
            <img src="http://localhost/phpsite/ecommerce/image/lookh4.jpg" class=" rounded pr-3 w-100 h-100" alt="lookh4">
            <div class="position-absolute fixed-bottom d-flex flex-row justify-content-around">
                <div class="text-center m-auto pb-3">
                    <h3  class="h3">Pimentez votre look habituel</h3>
                    <button type="button" class="btn btn-outline-primary">Lire la suite</button>
                </div>
                <div class="text-center m-auto pb-3">
                    <h3  class="h3">style: chico cuir parisien</h3>
                    <a href=""> <button type="button" class="btn btn-outline-primary">Lire la suite</button></a>
                </div>   
            </div>
            
    </div>
</section>

<section class="container">

    <div class="p-2">
        <h2 class="text-center">Vêtements pour hommes</h2>
        <h4>Les Impressions De Notre Responsable Du Prêt-À-Porter Masculin Chez K&M</h4>
        <div class="text-center m-2 p-2">
            <h6>Pouvez-vous m'expliquer votre rôle en tant que responsable du prêt-à-porter masculin chez K&M ?</h6>
            <p class="p-2 m-2">Mon rôle consiste essentiellement à analyser les tendances actuelles et à venir en termes de mode pour hommes, et les vêtements que les clients aimeraient acheter et porter. Ma responsabilité est de distinguer ces tendances auprès de nos différents designers et de nos différentes équipes de prêt-à-porter masculin. Mon objectif est que notre vision soit toujours clairement représentée dans nos magasins et visible dans les rues. Mon travail consiste à encourager nos équipes à créer et à proposer le meilleur de la mode pour hommes dans nos magasins.</p>
        </div>
        
        <a class="text-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Lire plus</a>

        <div class="collapse" id="collapseExample">
            <div class="text-center m-2 p-2">
                 <h6>Analysez-vous le marché ou les tendances de prêt-à-porter masculin ?</h6>
                <p  class="p-2 m-2">Je regarde dans nos magasins mais aussi chez la concurrence et d'autres concepts pour veiller à ce que nous restions dans la tendance avec nos collections actuelles et à venir. Je regarde aussi ce que portent les hommes dans la rue. Je suis les défilés pour rechercher de nouvelles tendances et directions. Ce sont souvent les nouveaux concepts les plus inspirants. Il peut s'agir d'un magasin spécifique, d'un film ou d'un album. La combinaison d'une créativité hors-pair et de la rentabilité sont souvent les facteurs qui m'inspirent le plus.</p>
            </div>
            <div class="text-center m-2 p-2">
                 <h6>Analysez-vous le marché ou les tendances de prêt-à-porter masculin ?</h6>
                <p  class="p-2 m-2">Je regarde dans nos magasins mais aussi chez la concurrence et d'autres concepts pour veiller à ce que nous restions dans la tendance avec nos collections actuelles et à venir. Je regarde aussi ce que portent les hommes dans la rue. Je suis les défilés pour rechercher de nouvelles tendances et directions. Ce sont souvent les nouveaux concepts les plus inspirants. Il peut s'agir d'un magasin spécifique, d'un film ou d'un album. La combinaison d'une créativité hors-pair et de la rentabilité sont souvent les facteurs qui m'inspirent le plus.</p>
            </div>
            <div class="text-center m-2 p-2">
                 <h6>Analysez-vous le marché ou les tendances de prêt-à-porter masculin ?</h6>
                <p  class="p-2 m-2">Je regarde dans nos magasins mais aussi chez la concurrence et d'autres concepts pour veiller à ce que nous restions dans la tendance avec nos collections actuelles et à venir. Je regarde aussi ce que portent les hommes dans la rue. Je suis les défilés pour rechercher de nouvelles tendances et directions. Ce sont souvent les nouveaux concepts les plus inspirants. Il peut s'agir d'un magasin spécifique, d'un film ou d'un album. La combinaison d'une créativité hors-pair et de la rentabilité sont souvent les facteurs qui m'inspirent le plus.</p>
            </div>
          
           
        </div>
    </div>

    


</section>




<?php $content = ob_get_clean() ?>

<!-------------------------------------->


<!-------------------------------------->

<?php require "views/layout.php" ?>