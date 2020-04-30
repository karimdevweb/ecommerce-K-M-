<?php ob_start() ?>

<title>categories</title>
<meta name="description" content="consulter notre produit et achetez le ...  ">

<?php $meta = ob_get_clean() ?>





<!-------------------------------------->

<!-------------------------------------->





<?php ob_start() ?>



<section id ="oneproduct_section" class="oneproduct_section">
 <div class="oneproduct_div">
      <?php foreach($images as $image)  : ?> 
        <div class="oneproduct_image"> <img src="image/<?php echo $image["path"] ?>" alt="<?php echo $image["path"] ?> "> </div>
    <?php endforeach ?> 
 </div><!--
--><div id="description" class="description">
    <div class="description_div">
        <div>
            <form class="d-flex flex-wrap" action="index.php?class=sessioncart&action=add" method="post">
                    <!-- /********************************/ -->
                        <input type ="hidden" name="id_product" value="<?php echo $product["id"] ?>">
                        <input type ="hidden" name="priceEach" value="<?php echo ($product["priceHT"] *TVA)?>">
                    <!-- /********************************/ -->
                <div class=" text-left w-75  ">
                    <div class="d-inline-block text-left ">
                          <h4><?php echo $product["name"] ?></h4>
                           <p><?php echo number_format( $priceTTC= $product["priceHT"]*TVA,2,'.',' ') ?> €</p>
                    </div>
                  

                    <select class="d-inline-block m-3 rounded form-control align-top font-weight-bold w-25" name="quantity" id="quantity">

                            <?php for ($k=1;$k<10 ; $k++) : ?> 
                        <option value="<?php echo $k ?>"><?php echo $k ?></option>
                             <?php endfor ?>

                    </select>
                </div>

                    <div class="text-right w-25 ">
                        <?php if(!empty($favoris) && in_array($product["id"],$favoris)) { ?>

                            <a class="" href="index.php?class=sessionfavoris&action=add&id=<?php echo $product["id"] ?>"><i class="red_heart fas fa-heart"></i></a>
                        <?php }else{ ?>

                            <a class="" href="index.php?class=sessionfavoris&action=add&id=<?php echo $product["id"] ?>"><i class=" far fa-heart"></i></a>

                        <?php } ?>
                   </div>
                     <h4 class="p-2 m-auto">autres articles à voir: </h4>
                        <div id="carouselExampleControls" class="carousel slide  carousel_div" data-ride="carousel">
                            <div class="carousel-inner carousel_inner">
                            <?php foreach($imagesSug as $imagesSug) : ?>
                                <div class="img_suggestion carousel-item  border rounded border-dark align-top active w-25 m-3">
                                    <a href="index.php?class=front&action=getById&id=<?php echo $imagesSug["id_product"] ?>"><img class="d-block h-100 w-100  " src="image/<?php echo $imagesSug["path"] ?>" alt="<?php echo $imagesSug["path"] ?> "></a> 
                                </div>  
                            <?php endforeach ?>
                            </div>
                        </div>
                        <div class="w-100 mt-2" >
                            <button  type="submit" class="btn btn-primary w-100"><i class="fa fa-shopping-cart"></i> ajouter au panier</button>
                        </div>
            </form>
        </div>
    </div>
        
</div>
    
</section>
<div class="m-3 p-3 text-center bg-light shadow w-100 ">
    <h4><?php echo $product["name"] ?> :</h4>
      <p><?php echo $product["description"] ?></p>
</div>
<div class="m-auto p-3 w-75">
    <div class=" d-inline-block text-right p-3 w-25">
        <h3>C'EST VOTRE STYLE</h3>
        <p>On adore voir comment vous portez vos favoris de chez H&M et styliser votre intérieur avec H&M HOME: Continuez de partager votre style avec @HM et #HMxME pour tenter votre chance d’apparaître sur hm.com, dans notre matériel publicitaire et dans nos magasins.</p>
    </div><!--
      --><div class="align-top w-75 d-inline-block p-3 text-left">
        <img class=" rounded img_style" src="http://localhost/phpsite/ecommerce/image/fashion3.jpeg" alt="fashion3">
        <img  class=" rounded img_style"src="http://localhost/phpsite/ecommerce/image/fashion4.jpg" alt="fashion4">
        <img class=" rounded img_style" src="http://localhost/phpsite/ecommerce/image/fashion6.jpg" alt="fashion6">
    </div>
</div>

<?php $content = ob_get_clean() ?>




<!-------------------------------------->

<!-------------------------------------->


<?php require "views/layout.php" ?>