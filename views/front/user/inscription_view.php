<?php ob_start() ?>

<title>inscription</title>
<meta name="description" content="inscrivez-vous sur notre site et profitez des avantages hébdomadaire....  ">

<?php $meta = ob_get_clean() ?>





<!-------------------------------------->

<!-------------------------------------->

<?php ob_start() ?>
<section class="inscription_section d-flex justify-content-middle">
    <div class=" container text-center myForm m-auto">
      
      <a href="index.php?class=front&action=login_view"><button class="m-2 btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          déjà membre
      </button></a>

      <button class=" m-2 btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      s'inscire
      </button>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form class="justify-content-center d-flex flex-wrap"  action="index.php?class=user&action=register" method="post">
              <input class="form-control m-2 w-25"  type="text" name="firstName" id="firstName" placeholder="enter your firstName">
              <input class="form-control m-2 w-25" type="email" name="email" id="email" placeholder="enter your  email">
              <input class="form-control m-2 w-25" type="password" name="password"  id="password" placeholder="enter your password">
              <input class="form-control m-2 w-25" type="text" name="lastName" id="lastName" placeholder ="enter your lastName">
              <input class="form-control m-2 w-25" type="email" name="confirme_email" id="confirme_email" placeholder="confirme your email">
              <input class="form-control m-2 w-25" type="password"  name="confirme_password" id="confirme_password" placeholder="confirme your password">
              <input class="form-control m-2 w-50" type="text"  name="address" id="address" placeholder="enter your address">
              <input type="hidden" class="g-recaptcha" name ="recaptcha_response" data-sitekey="<?php echo KEY["site"] ?>">
              
              <button type="submit" name="inscription" class="btn btn-primary m-3 w-50">Submit</button>
            </form>
        </div>
    </div>
</div>
</section>




<?php $content = ob_get_clean() ?>

<!-------------------------------------->




<?php require "views/layout.php" ?>


name="" 