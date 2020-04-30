<?php ob_start() ?>

<title>liste des client</title>
<meta name="description" content="consultez la liste des clients  ...  ">

<?php $meta = ob_get_clean() ?>



<!-------------------------------------->

<!-------------------------------------->

<?php ob_start() ?>

<section>
    <section class="p-3 m-3 border rounded border-primary ">
                        <?php if(empty($orders)) { ?>

                            <div class="w-75 m-auto p-3 border border-danger rounded"> 
                                <p class='m-3 p-3 text-center text-danger font-weight-bold'>ce client n'a effectué aucun achat jusqu'à maintenant !</p>
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
</section>


<!-- <div class="p-2 w-75 m-auto text-center">
     <?php 
            if($totalPages == 1)
            {
                echo "<span class='m-3 text-center text-danger font-weight-bold'>qu'une seule page pour l'instant</span>";
            }else
            {
                for($i=1;$i<=$totalPages;$i++)
                {    
                    echo "<a class='paginationbtn' href=index.php?class=products&action=list&page=$i><button class='btn btn-primary m-2 ' >$i</button></a>";

                }
       }?>
</div> -->

<a href="index.php?class=user&action=Allusers"><button class=" m-4 btn btn-outline-primary font-weight-bold"  id="" name=""><- retour</button></a>




<?php $content = ob_get_clean() ?>



<!-------------------------------------->

<!-------------------------------------->

<?php require "views/layout.php" ?>