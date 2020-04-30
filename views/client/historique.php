<?php ob_start() ?>

<title>historique</title>
<meta name="description" content="n'hésitez plus à consulter votre historique ...  ">

<?php $meta = ob_get_clean() ?>



<!-------------------------------------->

<!-------------------------------------->


<?php ob_start() ?>
<section class="p-3 m-3 border rounded border-primary ">
                  <?php if(empty($orders)) { ?>

                              <div class="w-75 m-auto p-3 border border-danger rounded"> 
                              <p class='m-3 p-3 text-center text-danger font-weight-bold'> aucun achat n'a été effectué  sur ce compte, si vous considérez que cela doit être une erreur veuillez contacter le <a href="index.php?class=front&action=contact">service client</a>  ! merci à vous, </p>
                              </div>

                  <?php } else{ ?>

   
                        <table class="p-3 m-auto text-center table shadow">
                <thead>
                    <tr class="tr"> 
                            <th>nom de produit</th>
                            <th>statut</th>
                            <th>date de la commande</th>
                            <th>date d'expédition</th>
                            <th>quantité</th>  
                            <th>prix unitaire(euro)</th>   
                    </tr>
                </thead>
                <tbody class="tbody ">
                    <tr></tr>
                    <?php foreach($orders as $order) : ?>
                    <tr class="shadow bg-light ">
                    <td>
                          <?php foreach($products as $product) { 
                                foreach($product as $key => $value) {
                               if($order["id_product"] == $value["id"]) {?>
                            <a href="index.php?class=front&action=getById&id=<?php echo $value["id"] ?>"><?php echo $value["name"] ?>  
                          <?php }}} ?>
                    </td>
                    <td>
                            <?php echo $order["status"] ?>  
                    </td>
                            
                    <td>
                            <?php echo $order["orderDate"] ?>  
                    </td>
                    <td>
                            <?php echo $order["shippedDate"] ?>  
                    </td>
                 
                           
                    <td>
                            <?php echo $order["quantityOrdered"] ?>  
                    </td>
                            
                    <td>
                            <?php echo $order["priceEach"] ?> € 
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
        </table>
                   
                
       

            <?php }  ?>
</section>





<?php $content = ob_get_clean() ?>

<!-------------------------------------->

<!-------------------------------------->

<?php require "views/layout.php" ?>