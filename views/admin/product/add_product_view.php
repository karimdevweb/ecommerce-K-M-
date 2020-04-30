<?php ob_start() ?>

<title>ajouter un produit</title>
<meta name="description" content="ajoutez des produit à volonté  ...  ">

<?php $meta = ob_get_clean() ?>




<!-------------------------------------->

<!-------------------------------------->



<?php ob_start() ?>
<section class="p-3 m-3 border rounded border-primary">
    
        <form class=""   action="index.php?class=products&action=add" method="post" enctype='multipart/form-data'>
            <table class="p-3 m-auto text-center table shadow">
                    <thead>
                        <tr>
                            <th class="p-5 shadow" colspan=6>One Product :</th>
                        </tr>
                        <tr class="tr"> 
                            <th class="p-3">name</th>
                            <th class="p-3">description</th>
                            <th class="p-3">catégorie</th>
                            <th class="p-3">prix acheté</th>
                            <th class="p-3">le prix HT</th>
                            <th class="p-3">en stock</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                                    <tr class="  shadow bg-light ">  
                                        <td class=" p-3 align-middle text-center">
                                            <input class="w-100 p-2 text-center font-weight-bold" type="text" id="name" name="name" placeholder="name ici"> 
                                        </td>
                                        <td class=" p-3 align-middle text-center">
                                            <textarea class="w-100 p-2 text-center font-weight-bold"  id="description" name="description" placeholder="description ici" ></textarea>
                                        </td>
                                        <td>

                                            <label class="w-75 text-center " for="category">--Please choose an option--</label>
                                            <select class="w-50 shadow bg-light font-weight-bold border-danger rounded p-2 m-2" name="id_category" id="category">
                                                    <option value="">which category ?</option>
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
                                            <input class="w-75 p-2 text-center font-weight-bold" type="text" id="buyPrice" name="buyPrice" placeholder="prix achat">
                                        </td> 
                                        <td class="align-middle">
                                            <input class="w-75 p-2 text-center font-weight-bold" type="text" id="priceHT" name="priceHT" placeholder="prix HT">
                                        </td> 
                                        <td class="align-middle">
                                            <input class="w-75 p-2 text-center text-danger font-weight-bold" type="text" id="quantity" name="quantity" placeholder="quantié en stock">
                                        </td>   
                                </tr>
                    </tbody>
                </table>
                <fieldset class=" m-3 p-2">
                    <label class=" w-100 font-weight-bold p-2" for="image">entrez une/des image(s):</label>
                    <input class=" btn btn-success border border-danger p-2" type="file" name="image_uploads[]" accept=".jpg, .jpeg, .png" id="image" multiple>                 
                </fieldset>

                 <p class="text-danger m-2 p-1"> Note: chaque article ou produit doit au minimum contenir une photo, merci!</p>
                    
                    <button class=" m-5 btn btn-success font-weight-bold" type="submit" name="add" >ajouter</button>

        </form>

    
    
        <a href="index.php?class=products&action=list"><button class=" m-4 btn btn-outline-primary font-weight-bold"  id="" name=""><- retour</button></a>
</section>





<?php $content = ob_get_clean() ?>

<!-------------------------------------->

<!-------------------------------------->


<?php require "views/layout.php" ?>