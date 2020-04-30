<?php ob_start() ?>

<title>favoris</title>
<meta name="description" content="cochez vos favoris et n'hésitez plus à les consulter...  ">

<?php $meta = ob_get_clean() ?>





<!-------------------------------------->

<!-------------------------------------->

<?php ob_start() ?>
<section class="container py-4">
        <section class=" shadow border border-primary rounded my-3 p-3 h-100 w-100 d-flex flex-wrap justify-content-center">
                <?php 
                    if(empty($favoris))
                    { ?>
                        <p class="m-auto p-3 " >vous n'avez aucun favoris , veuillez choisir parmi le catalogue , merci</p>
                 <?php   }else
                  {

                    foreach ($products as $product) { ?>

                <div class=" m-2  favoris_div product_div">  
                    <div class=" h-75">
                        
                            <?php foreach($images as $image)  {
                                if(  $image["id_product"] == $product["id"] ) { ?> 
                            
                                <a href="index.php?class=front&action=getById&id=<?php echo $product["id"] ?>"><img  class="w-100 h-100" src="image/mini/<?php echo $image["path"] ?>" alt="<?php echo $image["path"] ?> "></a>    

                            <?php }} ?>  
                     
                    </div>
                    <div class="mt-2 d-flex flex-row-reverse justify-content-between">
                        <div class="p-2">
                            <ul class=" option_product">
                                
                                <li><a href="index.php?class=sessionfavoris&action=delete&id=<?php echo $product["id"] ?>" ><i class="fas fa-times"></i></a></li>
                                
                            </ul>
                        </div>
                        <div class="m-2">
                            <h6 class="m-0"><a href="index.php?class=front&action=getById&id=<?php echo $product["id"] ?>"><?php echo $product["name"] ?></a></h6>
                            <span class="price">$<?php echo $priceTTC= $product["priceHT"]*TVA ?></span>
                        </div>
                    </div>
                    
                </div>

                <?php } }  ?>
        </section>
        <a href="index.php?class=sessionfavoris&action=empty"><button type="button" class="btn btn-primary btn-lg btn-block">vider la liste</button></a>
</section>

    

<?php $content = ob_get_clean() ?>

<!-------------------------------------->

<!-------------------------------------->

 <?php require "views/layout.php" ?>



  