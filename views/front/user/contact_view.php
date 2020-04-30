<?php ob_start() ?>

<title>contacte</title>
<meta name="description" content="prenez contacte avec le service client de  K&M en toutre sécurité..  ">

<?php $meta = ob_get_clean() ?>





<!-------------------------------------->

<!-------------------------------------->






<?php ob_start() ?>
<section class=" contact_firstsection">
        <section class=" d-flex justify-content-bottom contact_section p-5">
        <form class=" p-3 contact_form m-auto bg-light rounded d-flex flex-wrap container justify-content-center"   id="contact" action="index.php?class=user&action=emailingToAdmin" method="post">
            <input  class="form-control m-2 w-25" type="text" name="firstName" placeholder="firstName">
            <input class="form-control m-2 w-25" type="text" name="lastName" placeholder="lastName">
            <input class="form-control m-2 w-25" type="email" name="email" placeholder="your email please">
            <textarea class="form-control m-2 w-100" name="message" id="message" cols="30" rows="10" placeholder="your message here..."></textarea>
            <input type="hidden" class="g-recaptcha" name ="recaptcha_response" data-sitekey="<?php echo KEY["site"] ?>">

            <input class="btn btn-primary m-3 w-50" type="submit"  id="submit" name="send" value="envoyer">
        </form>
       </section>
</section>






<?php $content = ob_get_clean() ?>



<?php require "views/layout.php" ?>






