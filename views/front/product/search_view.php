<?php ob_start() ?>

<title>liste des produits</title>
<meta name="description" content="cconsulter notre liste de produit...  ">

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

<section class="mt-3 container ">

                        <?php if(empty($products)) { ?>

                        <div class="w-75 m-auto p-3 border border-danger rounded"> 
                            <p class='m-3 p-3 text-center text-danger font-weight-bold'>le produit que vous cherchez n'existe pas, revérifiez vore recherche ! merci,</p>
                        </div>
                            

                        <?php } else{ ?>


    <section class=" mt-3 text-center">
        <div>  
                    <h2>affiche les résulats pour "<span class="text-danger"><?php echo $searchProduct ?></span>"</h2>
                    <p>n'hésitez pas à consulter nos articles par categories , des promotions et cadeeaux sont tous les jours à gagner! </p> 
    
        </div>
        <section class=" mt-4 d-flex flex-wrap">
            <?php foreach ($products as $product) : ?>

            <div class=" shadow flex-column w-25 h-75 product_div">  
                <div>
                
                <?php foreach($images as $image)  {
                    if(  $image["id_product"] == $product[0] ) { ?> 
                
                <a href="index.php?class=front&action=getById&id=<?php echo $product[0] ?>" ><img  class="img_product" src="image/mini/<?php echo $image["path"] ?>" alt="<?php echo $image["path"] ?> "> </a>   
                <?php }} ?>  
       
            </div>
                <div class="d-flex flex-row-reverse justify-content-between">
                    <div class="p-2">
                    <ul class=" option_product">
                        <li>
                        <?php if(!empty($favoris) && in_array($product["id"],$favoris)) { ?>

                            <a class="" href="index.php?class=sessionfavoris&action=add&id=<?php echo $product[0] ?>"><i class=" red_heart fas fa-heart"></i></a>
                        <?php }else{ ?>

                            <a class="" href="index.php?class=sessionfavoris&action=add&id=<?php echo $product[0] ?>"><i class=" far fa-heart"></i></a>

                        <?php } ?>
                        </li>
                    </ul>
                    </div>
                    <div class="p-2">
                        <h6 class="title"><a href="#"><?php echo $product["name"] ?></a></h6>
                        <span class="price">$<?php echo $priceTTC= $product["priceHT"]*TVA ?></span>
                    </div>
                </div>
                
            </div>

            <?php endforeach ?>
        </section>
    </section>
     <!-- <div class="p-2 m-5 w-75 m-auto text-center">
            <?php 
                if($totalPages == 1)
                {
                    echo "<span class='m-3 text-center text-danger font-weight-bold'>qu'une seule page pour l'instant</span>";
                }else
                {
                    for($i=1;$i<=$totalPages;$i++)
                    {    $id= $category["id"];
                        echo "<a class='paginationbtn' href=index.php?class=front&action=getAllProducts&id=$id&page=$i><button class='btn btn-primary m-2 ' >$i</button></a>";

                    }
                }
               ?>
    </div> -->
           <?php } ?>

<a href="index.php?class=front&action=HomePage"><button class=" m-4 btn btn-outline-primary font-weight-bold"  id="" name=""><- retour</button></a>
</section>


 



<?php $content = ob_get_clean() ?>



<!-------------------------------------->
<?php require "views/layout.php" ?>