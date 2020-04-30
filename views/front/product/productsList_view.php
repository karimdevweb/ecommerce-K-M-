<?php ob_start() ?>

<title>liste des produits</title>
<meta name="description" content="cconsulter notre liste de produit...  ">

<?php $meta = ob_get_clean() ?>






<!-------------------------------------->

<!-------------------------------------->





<?php ob_start() ?>
<section class="w-100">


    <section class=" align-top d-inline-block text-left m-0 pl-5 w-25">

        <h5 class="mt-3font-weight-bold">Nouveautés</h5>
            <ul class="m-2">
            <li><a class="text-body" href="index.php?class=front&action=getByCatalogues&searchProduct=Nouveautés&type=<?php echo $category["type"] ?>">Vêtements</a></li>
            <li><a class="text-body" href="index.php?class=front&action=getByCatalogues&searchProduct=Nouveautés&type=<?php echo $category["type"] ?>">Chaussures et accessoires</a></li>
            <li><a class="text-body" href="index.php?class=front&action=getByCatalogues&searchProduct=Nouveautés&type=<?php echo $category["type"] ?>">Lingerie et chemises de nuit</a></li>        
        </ul>
        <h5 class="mt-3 font-weight-bold">En ce moment</h5>
        <ul class="m-2">
            <li><a class="text-body" href="index.php?class=front&action=getByCatalogues&searchProduct=En ce moment&type=<?php echo $category["type"] ?>"> Nouvelles tendances</a></li>
            <li><a class="text-body" href="index.php?class=front&action=getByCatalogues&searchProduct=En ce moment&type=<?php echo $category["type"] ?>">Confortable et casual</a> </li>                             
        </ul>
    </div>
    <h5 class="mt-3 font-weight-bold">Catalogue par produit</h5>
            <ul class="m-2">
            <?php foreach($categories as $categorie) : ?>

               <li><a class="text-body" href="index.php?class=front&action=getAllProducts&id=<?php echo $categorie["id"] ?>&type=<?php echo $categorie["type"] ?>"><?php echo $categorie["name"] ?></a></li>

            <?php  endforeach ?>   
            </ul>
            <h5 class=" mt-3 font-weight-bold">Catalogue par concept</h5>
            <ul class="m-2">
                <li><a class="text-body" href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=<?php echo $category["type"] ?>">Trend</a></li>
                <li><a class="text-body" href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=<?php echo $category["type"] ?>">Basiques</a></li>
                <li><a class="text-body" href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=<?php echo $category["type"] ?>">Modern Classic</a></li>
                <li><a class="text-body" href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=<?php echo $category["type"] ?>">Vêtements Casual</a></li>
                <li><a class="text-body" href="index.php?class=front&action=getByCatalogues&searchProduct=concept&type=<?php echo $category["type"] ?>">Divided</a></li>                                         
            </ul>
             
 
        
    </section><!--
--><section class="align-top d-inline-block mt-2 w-75">

                            <?php if(empty($products)) { ?>

                            <div class="w-75 m-auto p-3 border border-danger rounded"> 
                                <p class='m-3 p-3 text-center text-danger font-weight-bold'>le produit que vous cherchez n'existe pas, revérifiez vore recherche !</p>
                            </div>
                                

                            <?php } else{ ?>


        <section class="p-2 text-left">
            <div>  
                        <h2><?php echo $category["name"] ?> pour <?php echo $category["type"] ?></h2>
                        <p><?php echo $category["description"] ?></p> 
        
            </div>
        <section class="d-flex flex-wrap">
            <?php foreach ($products as $product) : ?>

            <div class=" shadow flex-column w-25 h-75 product_div">  
                <div>
            
                    <?php foreach($images as $image)  {
                        if(  $image["id_product"] == $product["id"] ) { ?> 
                    
                    <a href="index.php?class=front&action=getById&id=<?php echo $product["id"] ?>" ><img  class="img_product" src="image/mini/<?php echo $image["path"] ?>" alt="<?php echo $image["path"] ?> "> </a>   
                    <?php }} ?>  
              
                </div>
                <div class="d-flex flex-row-reverse justify-content-between " >
                    <div class="p-2">
                        <ul class="flex-row option_product">

                            <li>
                            <?php if(!empty($favoris) && in_array($product["id"],$favoris)) { ?>

                                <a class="" href="index.php?class=sessionfavoris&action=add&id=<?php echo $product["id"] ?>"><i class=" red_heart fas fa-heart"></i></a>
                            <?php }else{ ?>

                                <a class="" href="index.php?class=sessionfavoris&action=add&id=<?php echo $product["id"] ?>"><i class=" far fa-heart"></i></a>

                            <?php } ?>
                            </li>
                        </ul>
                    </div>
                    <div class="p-2">
                        <h3 class="title"><a href="#"><?php echo $product["name"] ?></a></h3>
                        <span class="price">$<?php echo $priceTTC= $product["priceHT"]*TVA ?></span>
                    </div>
                </div>
                
            </div>

            <?php endforeach ?>
            </section>
        </section>
        <div class="p-2 w-75 m-auto text-center">
                <?php 
                    if($totalPages == 1)
                    {
                        echo "<span class='m-3 text-center text-danger font-weight-bold'>qu'une seule page pour l'instant</span>";
                    }else
                    {
                        for($i=1;$i<=$totalPages;$i++)
                        {    $id= $category["id"];
                            $type= $category["type"];
                            echo "<a class='paginationbtn' href=index.php?class=front&action=getAllProducts&id=$id&page=$i&type=$type><button class='btn btn-primary m-2 ' >$i</button></a>";

                        }
                    }
                ?>
        </div>
            <?php } ?>

    <a href="index.php?class=front&action=HomePage"><button class=" m-4 btn btn-outline-primary font-weight-bold"  id="" name=""><- retour</button></a>
    </section>

</section>

 



<?php $content = ob_get_clean() ?>



<!-------------------------------------->
<?php require "views/layout.php" ?>