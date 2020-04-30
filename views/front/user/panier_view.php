<?php ob_start() ?>

<title>panier</title>
<meta name="description" content="n'hésitez plus à alléger vos bras et mettre tout dans votre panier...  ">

<?php $meta = ob_get_clean() ?>





<!-------------------------------------->

<!-------------------------------------->
<?php ob_start() ?>
<section class="container d-flex flex-row ">
    <section class=" py-4 h-100 w-50">
            <section class=" shadow border border-primary rounded my-3 p-3  w-100 d-flex flex-wrap justify-content-center">
                    
                    <?php  
                        $Total = 0;
                       
                        if(empty($cartContents))
                        { ?>
                            <p class="m-auto p-3 " >vous n'avez aucun article dans votre panier , veuillez choisir parmi le catalogue , merci</p>
                    <?php   }else
                    {
                       
                        foreach ($products as $product) { ?>

                    <div class=" m-2 p-1 d-flex flex-row justify-content-between  cart_div product_div">  
                        <div class=" mx-2 w-50 h-100">
                               
                                <?php foreach($images as $image)  {
                                    if(  $image["id_product"] == $product["id"] ) { ?> 
                                
                                            <a href="index.php?class=front&action=getById&id=<?php echo $product["id"] ?>"><img  class="w-100 h-100" src="image/mini/<?php echo $image["path"] ?>" alt="<?php echo $image["path"] ?> "></a>     
                                <?php }} ?>  
                            
                        </div>
                        
                        <div class=" w-50 p-1">
                            <div class="">
                                <ul class="flex-row option_product">
                                    <li><a href="index.php?class=front&action=getById&id=<?php echo $product["id"] ?>" ><i class="fa fa-search"></i></a></li>
                                    <li><a href="index.php?class=sessioncart&action=delete&id=<?php echo $product["id"] ?>" ><i class="fas fa-times"></i></a></li>
                                </ul>
                            </div>

                            
                            <div class="">
                                <h6 class="m-0"><a href="index.php?class=front&action=getById&id=<?php echo $product["id"] ?>"><?php echo $product["name"] ?></a></h6>
                                         <?php $quantity = $cartContents[$product["id"]]["quantity"] ?>
                                        <span class="price"><?php echo $sousTotal = ($product["priceHT"]*TVA) *  $quantity ?>  €</span>
                                        <?php $Total +=$sousTotal ;?> 
                            </div>
                            <div class=" p-0 mx-auto h-50 w-100 ">
                                        
                                        <form class="m-0" class="rounded m-0" action="index.php?class=sessioncart&action=show" method="post" onchange="this.submit()" >
                                            
                                

                                            <input type="hidden" name="id" class="id_product" value="<?php echo $product["id"] ?>">
                                        </form>
                            </div> 
                        </div>
                        
                    </div>

                    <?php } }  ?>
            </section>
            <a href="index.php?class=sessioncart&action=empty"><button type="button" class=" w-100 btn btn-primary btn-lg btn-block">vider le panier</button></a>
    </section>
    <section class="border bg-light rounded p-4 text-left w-50 h-75 m-auto">
        <div class="text-center">
            <h3>Total Panier</h3>
             <p>cumulez des achats pour gagner des réductions personnalisées</p>
            <a href="index.php?class=front&action=login_view"><button type="button" class=" m-auto w-50 btn btn-outline-primary btn-lg btn-block">se connecter</button></a>
        </div>
        <div class="d-flex flex-row justify-content-around">
            <div class="m-2 p-2">
                    <p>Valeur de la commande</p>
                    <p>Livraison</p>
                    <p><strong>Total</strong></p>
            </div>
            <div class="m-2 p-2">
                <p> <?php echo $Total ?> €</p>
                <p>Gratuit</p>
                <p><strong><?php echo $Total  ?> €</strong></p>
            </div>
        </div>
        <a href="index.php?class=orders&action=payment"><button type="button" class=" m-auto w-100 btn btn-dark btn-lg btn-block">TERMINER MA CAMMANDE</button></a>
    </section>
</section>


<?php $content = ob_get_clean() ?>


<!-------------------------------------->

<!-------------------------------------->
<?php require "views/layout.php" ?>



