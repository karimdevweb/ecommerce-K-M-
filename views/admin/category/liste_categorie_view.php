<?php ob_start() ?>

<title>modifier le profil</title>
<meta name="description" content="n'hésitez plus à  modifier votre profil ...  ">

<?php $meta = ob_get_clean() ?>



<!-------------------------------------->

<!-------------------------------------->




<?php ob_start() ?>
<div class="m-2 ">
        <form class="w-100" action="index.php?class=category&action=list" method="post">
            <div class="d-flex justify-content-center h-100">
                <div class="searchbar">
                    <input class="search_input" id="search_category" type="text" name="search_category" placeholder="Search...">
                    <button type="submit" class=" btn p-1 search_icon" ><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
</div>


<section class="m-3">
    
    <div class="m-auto p-2 shadow text-center">
        <a href="index.php?class=category&action=add"><button class=" w-25 p-3 m-4 btn btn-success font-weight-bold"  id="" name="">ajouter une categorie</button></a>
    </div>

                        <?php if(empty($categories)) { ?>

                                <div class="w-75 m-auto p-3 border border-danger rounded"> 
                                    <p class='m-3 p-3 text-center text-danger font-weight-bold'>la categorie que vous cherchez n'existe pas, revérifiez vore recherche !</p>
                                </div>

                        <?php } else{ ?>

    <section class="p-3 m-3 border rounded border-primary">
        <table class="p-3 m-auto text-center table shadow">
            <thead>
                <tr >
                    <th class="p-4 shadow" colspan=4>modification d'une catégorie:</th>
                </tr>
                <tr class="tr"> 
                    <th>name</th>
                    <th> description</th>
                    <th colspan="=2"> action à executer</th>
                </tr>
            </thead>
            <tbody class="tbody">
                    <?php foreach ($categories as $categorie): ?>
                            <tr class="  shadow bg-light ">  
                                <td class="align-middle text-center">
                                        <h4 class="text-center"><?php echo ucfirst($categorie["type"]) ?></h4>
                                        <fieldset>
                                            <input class="m-auto text-center shadow form-control m-2 w-75" type="text" name="name" id="name" placeholder="name " value="<?php echo $categorie["name"] ?>">
                                        </fieldset>
                                </td>
                                <td class="align-middle">
                                    <fieldset>
                                            <textarea class="text-center shadow form-control" name="description" id="description" cols="50" rows="7" ><?php echo $categorie["description"] ?></textarea>
                                    </fieldset>
                                    
                                </td>      
                                <td class="align-middle"><a class="btn btn-warning font-weight-bold" href="index.php?class=category&action=edit_view&id=<?php echo $categorie["id"]?>">modifier</a></td> 
                                <td class="align-middle"><a class="btn btn-danger font-weight-bold" href="index.php?class=category&action=delete&id=<?php echo $categorie["id"]?>">supprimer</a></td> 
                        </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>
                        <?php } ?>
</section>


    <div class="p-2 w-75 m-auto text-center">
        <?php 
                    if($totalPages == 1)
                    {
                        echo "<span class='m-3 text-center text-danger font-weight-bold'>qu'une seule page pour l'instant</span>";
                    }else
                    {
                        for($i=1;$i<=$totalPages;$i++)
                        {    
                            echo "<a class='paginationbtn' href=index.php?class=category&action=list&page=$i><button class='btn btn-primary m-2 ' >$i</button></a>";

                        }
                    }
                ?>
    </div>
           
    <a href="index.php?class=user&action=index"><button class=" m-4 btn btn-outline-primary font-weight-bold"  id="" name=""><- retour</button></a>



<?php $content = ob_get_clean() ?>

<!-------------------------------------->

<!-------------------------------------->


<?php require "views/layout.php" ?>