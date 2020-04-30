<?php ob_start() ?>

<title>connexion</title>
<meta name="description" content="se connecter au site K&M en toutre sécurité..  ">

<?php $meta = ob_get_clean() ?>




<!-------------------------------------->

<!-------------------------------------->




<?php ob_start() ?>

<section class="connexion_section d-flex flex-column justify-content-middle">
  <div class=" container text-center mt-auto myForm ">
      <button class="m-2 btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      log-in
      </button>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
          <form class="justify-content-center d-flex flex-wrap"  action="index.php?class=user&action=login" method="post">
              <input class="form-control m-2 w-25" type="email" name="email" id="email" placeholder="enter your  email">
              <input class="form-control m-2 w-25" type="password" name="password"  id="connect_password" placeholder="enter your password">
              <input type="hidden" class="g-recaptcha" name ="recaptcha_response" data-sitekey="<?php echo KEY["site"] ?>">
              
              <button type="submit" name="login" class=" btn btn-primary m-3 w-50">Submit</button>
          </form>
          <div class="text-right">
              <a hre="index.php?class=user&action=forget"><button class="button btn btn-primary" data-toggle="collapse" data-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm"  type="button">mot de passe oublié</button></a>
          </div>
                  
          </div>
        </div>
  </div>
  
  <div class=" container text-center mb-auto  myForm">
      <div class="collapse" id="collapseForm">
          <div class="card card-body">
            <form class="justify-content-center d-flex flex-wrap"  action="index.php?class=user&action=editPassword" method="post">
                <input class="form-control m-2 w-25" type="email" name="email" id="email" placeholder="enter your email">
                <input class="form-control m-2 w-25" type="password" name="password"  id="password" placeholder="new password">
                <input class="form-control m-2 w-25" type="password" name="confirme_password"  id="confirmepassword" placeholder="confirme your password">
                <input type="hidden" class="g-recaptcha" name ="recaptcha_response" data-sitekey="<?php echo KEY["site"] ?>">

                <button type="submit" name="editPassword" class="btn btn-primary m-3 w-50">Submit</button>
            </form>  
          </div>
        </div>
  </div>
   
</section>



<?php $content = ob_get_clean() ?>



<?php require "views/layout.php" ?>
