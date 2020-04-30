<?php ob_start() ?>

<title>modifier le profil</title>
<meta name="description" content="n'hésitez plus à  modifier votre profil ...  ">

<?php $meta = ob_get_clean() ?>



<!-------------------------------------->

<!-------------------------------------->




<?php ob_start() ?>
<section class="client_dashboard_section p-2 h-100 w-100">
    <section class=" edit_section d-flex flex-row my-2 p-4 text-center shadow-lg container">
      <div class="w-50 align-top">
            <h2 class="bg-light border rounded-pill shadow p-2 m-1">vos coordonnées presonnelles </h2>
            <form class="container"   id="contact" action="index.php?class=user&action=editProfile" method="post">
            <input class="text-center font-weight-bold form-control my-2 p-3 mx-auto w-75" type="text" id="firstName" name="firstName" value="<?php echo $user["firstName"] ?>" >
            <input class="text-center font-weight-bold form-control my-2 p-3 mx-auto w-75" type="text" id="lastName" name="lastName" value="<?php echo $user["lastName"] ?>" >
            <input class="text-center font-weight-bold form-control my-2 p-3 mx-auto w-75" type="email" id="email" name="email" value="<?php echo $user["email"] ?>" >
            <input class="text-center font-weight-bold form-control my-2 p-3 mx-auto w-75" type="email" id="confirme_email" name="confirme_email" placeholder="confirme your email" >
            <input class="text-center font-weight-bold form-control my-2 p-3 mx-auto w-75" type="password" id="password" name="password" placeholder="your password" >
            <input class="text-center font-weight-bold form-control my-2 p-3 mx-auto w-75" type="password" id="confirme_password" name="confirme_password" placeholder="confirme your password" >
            <input class="text-center font-weight-bold form-control my-2 p-3 mx-auto w-75" type="text" id="address" name="address" value="<?php echo $user["address"] ?>" >

                  <button type="submit" name="edit" class="btn btn-primary m-3 w-50">Submit</button>
            </form>
      </div>
            
      <div class="w-50 align-top">
                  <h2 class="bg-light border rounded-pill shadow p-2 m-1">vos réductions et points gagnés</h2>
                  <div class=" bg-light border rounded my-2 p-4 text-center shadow-lg" >
                        <p class="font-weight-bold">mes felicitaions , jusqu'à aujourd'hui :</p>
                         <p class="font-weight-bold"> vous avez gagnez : 50p</p>
                         <p>cumulez 150p et gagnez de multiples cadeaux <a href="#"><i class="fas fa-gifts"></i></a></p>
                         <p>à vous de jouer <a href="#"><i class="far fa-thumbs-up"></i></a></p>
                         <button type="submit" name="reduction" class="btn btn-outline-primary m-3 w-50">échanger</button>
                  </div>
      </div>

        
    </section>

</section>
      
      






<?php $content = ob_get_clean() ?>

<!-------------------------------------->

<!-------------------------------------->

<?php require "views/layout.php" ?>