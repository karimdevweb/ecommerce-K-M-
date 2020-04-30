<?php ob_start() ?>

<title>liste des produitss</title>
<meta name="description" content="consultez la liste des produits ...  ">

<?php $meta = ob_get_clean() ?>



<!-------------------------------------->

<!-------------------------------------->




<?php ob_start() ?>

<div class="m-2 ">
        <form class="w-100" action="index.php?class=products&action=list" method="post">
            <div class="d-flex justify-content-center h-100">
                <div class="searchbar">
                    <input class="search_input" id="search_product" type="text" name="search_product" placeholder="Search...">
                    <button type="submit" class=" btn p-1 search_icon" ><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
</div>


<section class="m-3">
    <div class="m-auto p-2 shadow text-center ">    
        <a href="index.php?class=products&action=add"><button class=" w-25 p-3 m-4 btn btn-success font-weight-bold"  id="" name="">ajouter un article</button></a>
    </div>
    <div>
        <form action="index.php?class=products&action=list" method="GET">
            <input type="hidden" name="class" value="products">
            <input type="hidden" name="action" value="list">
        <label class="w-75 text-center " for="category">--Please choose an option--</label>
            <select class="w-25 shadow bg-light font-weight-bold border-danger rounded p-2 m-2" name="category" id="category">
                    <option value="all">all products </option>
                <optgroup label="Homme">
                       <?php foreach($categories as $category) {
                           if($category["type"] == "homme")
                           { ?>
                            <option value="<?php echo $category["id"]?>"><?php echo $category["name"]?></option>
                        <?php }} ?>
                </optgroup>
                <optgroup label="Femme">
                       <?php foreach($categories as $category) {
                           if($category["type"] == "femme")
                           { ?>
                            <option value="<?php echo $category["id"]?>"><?php echo $category["name"]?></option>
                        <?php }} ?>
                </optgroup>
                <optgroup label="Kids">
                       <?php foreach($categories as $category) {
                           if($category["type"] == "kid")
                           { ?>
                            <option value="<?php echo $category["id"]?>"><?php echo $category["name"]?></option>
                        <?php }} ?>
                </optgroup>
            </select>
            <button type="submit" class=" w-25 p-3 m-4 btn btn-warning font-weight-bold"  id="" name="">consulter par categorie</button>
        </form>
    </div>
</section>

        <?php if(empty($products)) { ?>

                   <div class="w-75 m-auto p-3 border border-danger rounded"> 
                       <p class='m-3 p-3 text-center text-danger font-weight-bold'>le produit que vous cherchez n'existe pas, revérifiez vore recherche !</p>
                   </div>
                        
                
                <?php } else{ ?>

<section class="m-3 p-3 shadow ">
    <table class="p-3 m-auto text-center table shadow">
        <thead>
            <tr>
                <th class="p-5 shadow" colspan=8>liste des produits :</th>
            </tr>
            <tr class="tr"> 
                <th class="p-3">name</th>
                <th class="p-3">pour</th>
                <th class="p-3">ajouté le: </th>
                <th class="p-3">prix acheté</th>
                <th class="p-3">le prix HT</th>
                <th class="p-3">en stock</th>
                <th class="p-3"  colspan="2"> action à executer</th>
            </tr>
        </thead>
        <tbody class="tbody">
                <?php foreach ($products as $product): ?>
                        <tr class="  shadow bg-light ">  
                            <td class=" p-4 font-weight-bold align-middle text-center">
                                <?php echo $product["name"] ?>
                            </td>
                    <?php foreach($categories as $categorie) 
                    { 
                        if($categorie["id"] == $product["id_category"])
                        {?>
                            <td class="align-middle font-weight-bold text-danger">
                        <?php echo $categorie["type"] ?>
                            </td> 
                    <?php  }} ?>
                                 
                            <td class="align-middle">
                                <?php echo $product["createdAt"] ?>
                            </td> 
                            <td class="align-middle">
                                <?php echo $product["buyPrice"] ?>
                            </td> 
                            <td class="align-middle">
                                <?php echo $product["priceHT"] ?>
                            </td> 
                            <td class=" font-weight-bold text-danger align-middle">
                                <?php echo $product["quantity"] ?>
                            </td>  
                            <td class="align-middle"><a class="btn btn-warning font-weight-bold" href="index.php?class=products&action=edit&id=<?php echo $product["id"]?>">modifier</a></td> 
                            <td class="align-middle"><a class="btn btn-danger font-weight-bold" href="index.php?class=products&action=delete&id=<?php echo $product["id"]?>">supprimer</a></td> 
                    </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>
</section>
                        <?php }?>

                    <?php if(!empty($id_category) && intval($id_category) ) 
                     {  ?>

                            <div class="p-2 w-75 m-auto text-center">
                                <?php 
                                            if($totalPages == 1)
                                            {
                                                echo "<span class='m-3 text-center text-danger font-weight-bold'>qu'une seule page pour l'instant</span>";
                                            }else
                                            {
                                                for($i=1;$i<=$totalPages;$i++)
                                                {    
                                                    echo "<a class='paginationbtn' href=index.php?class=products&action=list&category=$id_category&per_category=$i><button class='btn btn-primary m-2 ' >$i</button></a>";
                                                }
                                            }
                                        ?>
                            </div>
                        <?php } else{ ?>
                            <div class="p-2 w-75 m-auto text-center">
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
                                            }
                                        ?>
                            </div>
                     <?php } ?>



<a href="index.php?class=user&action=index"><button class=" m-4 btn btn-outline-primary font-weight-bold"  id="" name=""><- retour</button></a>

<?php $content = ob_get_clean() ?>


<!-------------------------------------->

<!-------------------------------------->


<?php require "views/layout.php" ?>