<?php ob_start() ?>

<title>modifiez produit</title>
<meta name="description" content="modifiez un produit à volonté  ...  ">

<?php $meta = ob_get_clean() ?>



<!-------------------------------------->

<!-------------------------------------->




<?php ob_start() ?>
<section class="p-3 m-3 border rounded border-primary">
    
        <form class=""   action="index.php?class=products&action=edit&id=<?php echo $oneproduct["id"] ?>" method="post" enctype='multipart/form-data'>
            <table class="p-3 m-auto text-center table shadow">
                    <thead>
                        <tr>
                            <th class="p-5 shadow" colspan=8>One Product :</th>
                        </tr>
                        <tr class="tr"> 
                            <th class="p-3">name</th>
                            <th class="p-3">description</th>
                            <th class="p-3">pour</th>
                            <th class="p-3">catégorie</th>
                            <th class="p-3">ajouté le: </th>
                            <th class="p-3">prix acheté</th>
                            <th class="p-3">le prix HT</th>
                            <th class="p-3">en stock</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                                    <tr class="  shadow bg-light ">  
                                        <td class=" p-3 align-middle text-center">
                                            <input class="w-100 p-2 text-center font-weight-bold" type="text" id="name" name="name" value="<?php echo $oneproduct["name"] ?>"> 
                                        </td>
                                        <td class=" p-3 align-middle text-center">
                                            <textarea class="w-100 p-2 text-center font-weight-bold"  id="description" name="description" ><?php echo $oneproduct["name"] ?></textarea>
                                        </td>
                                        <td class=" p-3 font-weight-bold align-middle text-center">
                                            <label class="w-100 text-center font-weight-normal " for="type">--Please choose an option--</label>
                                            <div>
                                                <?php if($catName["type"] == "homme") { ?>
                                                    <input type="radio" name="type" value="homme" checked>
                                                <?php } else { ?>
                                                    <input type="radio" name="type" value="homme">
                                                <?php } ?>
                                                <label for="homme">Homme</label>
                                            </div>
                                            <div>
                                                <?php if($catName["type"] == "femme") { ?>
                                                    <input type="radio" name="type" value="femme" checked>
                                                <?php } else { ?>
                                                    <input type="radio" name="type" value="femme">
                                                <?php } ?>
                                                
                                                <label for="femme">Femme</label>
                                            </div>
                                            <div>
                                                <?php if($catName["type"] == "kid") { ?>
                                                    <input type="radio" name="type" value="kid" checked>
                                                <?php } else { ?>
                                                    <input type="radio" name="type" value="kid">
                                                <?php } ?>
                                                
                                                <label for="kids">Kid</label>
                                            </div>
                                        </td>
                                        <td>

                                            <label class="w-75 text-center " for="category">--Please choose an option--</label>
                                            <select class="w-50 shadow bg-light font-weight-bold border-danger rounded p-2 m-2" name="id_category" id="category">
                                                    <option value="<?php echo $catName["id"] ?>"><?php echo $catName["name"] ?> </option>
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
                                            
                                        </td>
                                            
                                        <td class="align-middle">
                                            <?php echo $oneproduct["createdAt"] ?>
                                        </td> 
                                        <td class="align-middle">
                                            <input class="w-50 p-2 text-center font-weight-bold" type="text" id="buyPrice" name="buyPrice" value="<?php echo $oneproduct["buyPrice"] ?>">
                                        </td> 
                                        <td class="align-middle">
                                            <input class="w-50 p-2 text-center font-weight-bold" type="text" id="priceHT" name="priceHT" value="<?php echo $oneproduct["priceHT"] ?>">
                                        </td> 
                                        <td class="align-middle">
                                            <input class="w-50 p-2 text-center text-danger font-weight-bold" type="text" id="quantity" name="quantity" value="<?php echo $oneproduct["quantity"] ?>">
                                        </td>   
                                </tr>
                    </tbody>
                </table>
                <fieldset class=" m-3 p-2">
                    <label class=" w-100 font-weight-bold p-2" for="image">entrez une/des image(s):</label>
                    <input class=" btn btn-success border border-danger p-2" type="file" name="image_uploads[]" accept=".jpg, .jpeg, .png" id="image" multiple>                 
                </fieldset>
                <div class="d-flex flex-wrap justify-content-around border border-danger rounded shadow m-auto w-50 image_div">
                    <?php foreach($images as $image) : ?>
                        <div class="position-relative w-25 h-25 m-1 ">
                            <?php if(count($images) > 1)
                            { ?>
                                <div ><a class=" edit_image " href="index.php?class=products&action=deleteImage&id=<?php echo $image["id"] ?>"><i class="fas fa-times"></i></a></div>
                           <?php }else{ ?>
                                <div ><a class=" edit_image " href="#"><i class="fas fa-ban"></i></a></div>
                               <?php } ?>
                            <img class="h-100 w-100" src="image/<?php echo $image["path"] ?>" alt="<?php echo $image["path"] ?>">
                        </div>
                    
                    <?php endforeach ?>
                </div>
                 <p class="text-danger m-2 p-1"> Note: chaque article ou produit doit au minimum contenir une photo, merci!</p>
                    
                    <button class=" m-5 btn btn-warning font-weight-bold" type="submit" name="edit" >modifier</button>

        </form>

    
    
        <a href="index.php?class=products&action=list"><button class=" m-4 btn btn-outline-primary font-weight-bold"  id="" name=""><- retour</button></a>
</section>

<?php $content = ob_get_clean() ?>

<!-------------------------------------->

<!-------------------------------------->


<?php require "views/layout.php" ?>