<?php ob_start() ?>

<title>liste des client</title>
<meta name="description" content="consultez la liste des clients  ...  ">

<?php $meta = ob_get_clean() ?>



<!-------------------------------------->

<!-------------------------------------->




<?php ob_start() ?>
<div class="m-2 ">
        <form class="w-100" action="index.php?class=user&action=Allusers" method="post">
            <div class="d-flex justify-content-center h-100">
                <div class="searchbar">
                    <input class="search_input" id="search_user" type="text" name="search_user" placeholder="Search...">
                    <button type="submit" class=" btn p-1 search_icon" ><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
</div>

                    <?php if(empty($users)) { ?>

                          <div class="w-75 m-auto p-3 border border-danger rounded"> 
                              <p class='m-3 p-3 text-center text-danger font-weight-bold'>le client que vous cherchez n'existe pas, revérifiez vore recherche !</p>
                          </div>
                      
                    <?php } else{ ?>

<section class="m-3 p-3 shadow ">
    <table class="p-3 m-auto text-center table shadow">
      <thead>
      <tr>
           <th class="p-5 shadow" colspan=4>
             <h2>liste des clients :</h2>
             <p> mes félicitations , le nobre de vous clients s'élève à :  <span class="h4 p-2 text-danger"><?php echo $userNumber[0][0] ?></span> </p> 
            </th>
      </tr>
      <tr class="tr"> 
          <th  class="p-3">nom</th>
          <th  class="p-3">prénom</th>
          <th  class="p-3">email</th>
          <th  class="p-3">créer le :</th>
      </tr>
      </thead>
      <tbody class="tbody"> 

        <?php  foreach ($users as $user){ ?>
          
          <tr>
                  <td  class="align-middle font-weight-bold"><?php echo $user["lastName"] ?></td>
                  <td  class="align-middle font-weight-bold"><?php echo $user["firstName"] ?></td>
                  <td  class="align-middle  font-weight-bold"> <a href="index.php?class=user&action=oneuser&id=<?php echo $user["id"] ?>"><?php echo $user["email"] ?></a></td>
                  <td  class="align-middle"><?php echo $user["createdAt"] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</section>

                     <?php } ?>

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
       }?>
</div>

<a href="index.php?class=user&action=index"><button class=" m-4 btn btn-outline-primary font-weight-bold"  id="" name=""><- retour</button></a>





<?php $content = ob_get_clean() ?>


<!-------------------------------------->

<!-------------------------------------->

<?php require "views/layout.php" ?>