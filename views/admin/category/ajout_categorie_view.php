<?php ob_start() ?>

<title>modifier le profil</title>
<meta name="description" content="n'hésitez plus à  modifier votre profil ...  ">

<?php $meta = ob_get_clean() ?>



<!-------------------------------------->

<!-------------------------------------->



<?php ob_start() ?>

<section class="p-3 m-3 border rounded border-primary">

    <form class="container"  action="index.php?class=category&action=add" method="post">
        <table class="p-3 m-5 text-center table shadow">
            <thead>
                <tr >
                    <th class="p-4 shadow" colspan=2>ajout d'une catégorie:</th>
                </tr>
                <tr class="tr"> 
                    <th>name</th>
                    <th>description</th>
                </tr>
            </thead>
            <tbody >
                <tr class="  shadow bg-light ">  
                        <td class="align-middle ">
                            <h4>veuillez choisir la categorie:</h4>
                                <div>
                                    <input type="radio" name="type" value="homme">
                                    <label for="homme">Homme</label>
                                </div>
                                <div>
                                    <input type="radio" name="type" value="femme">
                                    <label for="femme">Femme</label>
                                </div>
                                <div>
                                    <input type="radio" name="type" value="kid">
                                    <label for="kid">Kid</label>
                                </div>
                               
                            </fieldset>
                                <fieldset >
                                     <input class=" m-auto text-center shadow form-control m-2 w-75" type="text" name="name" id="name" placeholder="titre ici">
                                </fieldset>
                        </td>
                        <td>
                            <fieldset>
                                <textarea class="text-center shadow form-control" name="description" id="description" cols="50" rows="15" placeholder="contenu ici"></textarea>
                            </fieldset>
                        </td>
                </tr>
            </tbody>
        </table>
        
                
                <input class=" m-4 btn btn-success font-weight-bold" type="submit"  id="add" name="add" value="ajouter">
        
    </form>

    <a href="index.php?class=category&action=list"><button class=" m-4 btn btn-outline-primary font-weight-bold"  id="" name=""><- retour</button></a>
</section>

<?php $content = ob_get_clean() ?>

<!-------------------------------------->

<!-------------------------------------->

<?php require "views/layout.php" ?>